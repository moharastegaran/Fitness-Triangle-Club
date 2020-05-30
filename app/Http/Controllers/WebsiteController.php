<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Blog;
use App\Http\Requests\ArticleRequest;
use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{

    public function index()
    {
        return view('website.home');
    }

    public function articles()
    {
        $articles = Blog::all();
        return view('website.articles', compact('articles'));
    }

    public function article($id)
    {
        $article = Blog::find($id);
        $others = Blog::where('id', '!=', $id)->get();
        return view('website.article', compact('article', 'others'));
    }
}
