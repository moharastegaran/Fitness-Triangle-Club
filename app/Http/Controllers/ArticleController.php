<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Blog;
use App\Http\Requests\ArticleRequest;
use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function index()
    {
        $blogs = Blog::latest()->get();
        $categories = Blog::pluck('category');
//        $category = \request('blog_category');
//        if ($category) {
//            $blogs = $blogs->where('category', $category);
//        }
        return view('panel.articles.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        abort_unless(Gate::allows(Permission::ARTICLE_CREATE), 403);

        return view('panel.articles.create');
    }

    public function store(ArticleRequest $request)
    {
        abort_unless(Gate::allows(Permission::ARTICLE_CREATE), 403);

        $blog = Blog::create($request->all());
        $this->uploadAttachment($request->file, null, env('ARTICLE_DIR_PATH'), $blog);
        return redirect()->route('panel.admin.articles.index');
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('panel.articles.show', compact('blog'));

    }

    public function edit($id)
    {
        abort_unless(Gate::allows(Permission::ARTICLE_EDIT), 403);

        $blog = Blog::find($id);
        return view('panel.articles.edit', compact('blog'));
    }

    public function update(ArticleRequest $request,$id){
        $blog = Blog::find($id);
        $blog->update($request->all());
        $this->uploadAttachment($request->file, $blog->attachment, env('ARTICLE_DIR_PATH'), $blog);
        return redirect()->route('panel.admin.articles.index');
    }

    public function destroy($id)
    {
        abort_unless(Gate::allows(Permission::ARTICLE_DELETE), 403);

        $blog = Blog::find($id);
        if($blog->attachment){
            Storage::delete(env('ARTICLE_DIR_PATH') . $blog->attachment->filename);
        }
        $blog->delete();
        return redirect()->route('panel.admin.articles.index');
    }

    private function uploadAttachment($file, $attachment, $dir, $attachmentable, $type = null)
    {
       if ($file){
           $ext = strtolower($file->getClientOriginalExtension());
           $filename = microtime("true") . "." . $ext;
           $file->storeAs($dir, $filename);
           if ($attachment) {
               $attachment->filename = $filename;
               $attachment->save();
               $isFirst = false;
           } else {
               Attachment::create([
                   'attachmentable_id' => $attachmentable->id,
                   'attachmentable_type' => get_class($attachmentable),
                   'type' => $type ?: 'image',
                   'filename' => $filename,
                   'title' => null
               ]);
               $isFirst = true;
           }

           return response()->json([
               'isFirst' => $isFirst,
               'redirect' => url()->previous(),
               'message' => 'آپلود فایل با موفقیت انجام شد'
           ]);
       }
    }

    public function downloadAttachment(Blog $blog)
    {
        return Response::download(
            storage_path('app/public/' . env('ARTICLE_DIR_PATH') . $blog->attachment->filename));
    }
}
