<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile("files")) {
            $photo_allowed_types = array('png','jpg','jpeg','gif');
            $files = $request->file("files");
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalExtension());
                $type = in_array($ext , $photo_allowed_types) ? 'image' : 'video';
                $filename = microtime("true") . "." . $ext;
                $url = asset(env('STORAGE_DIR_PATH').$file->storeAs(env('WORKOUT_DIR_PATH').'0', $filename));
                $title = $request->file_title[0];
                $f=Attachment::create([
                    'attachmentable_id' => 0 ,
                    'attachmentable_type' => Workout::class ,
                    'type' => $type ,
                    'filename' => $filename,
                    'title' => $title
                ]);

                $data[]=[
                    'name' => $title,
                    'size' => $file->getSize(),
                    'url' => $url,
                    'isPhoto' => ($f->type == 'image') ? 'sss' : null,
                    'thumbnailUrl' => $url,
                    'deleteUrl' => route('attachment.destroy',$f->id),
                    'updateUrl' => route('attachment.update',$f->id)
                ];
            }
            return response()->json(['files' => $data]);
        }else{
            return response()->json([
                'message' => 'no file detected'
            ]);
        }
    }

    public function update(Request $request,$id){
        $f = Attachment::find($id);
        $f->update([
            'title' => $request->title
        ]);
        return response()->json([
            "success" => true ,
            "title" => $f->title
        ]);
    }

    public function destroy($id)
    {
        $file = Attachment::find($id);
        $filename = $file->filename;
        Storage::delete(env('WORKOUT_DIR_PATH').$file->attachmentable_id.'/'.$filename);
        $file->delete();
        $data[] = [
            $filename => true
        ];
        return response()->json(['files' => $data]);
    }
}
