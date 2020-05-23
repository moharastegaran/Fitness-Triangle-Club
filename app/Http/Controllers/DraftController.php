<?php

namespace App\Http\Controllers;

use App\Attachment;
use Illuminate\Support\Facades\Storage;

class DraftController extends Controller
{
    public static function remove(){
        $drafts = Attachment::where('attachmentable_id', 0)->get();
        if (count($drafts)) {
            foreach ($drafts as $draft) {
                if (Storage::disk('draft')->exists($draft->filename)) {
                    Storage::disk('draft')->delete($draft->filename);
                    $draft->delete();
                }
            }
        }
    }

    public static function syncWith($id){
        $files = Attachment::where('attachmentable_id', 0)->get();
        if (count($files)) {
            foreach ($files as $file) {
                $file->attachmentable_id = $id;
                $file->save();
                Storage::move(env('WORKOUT_DIR_PATH') . '0/' . $file->filename, env('WORKOUT_DIR_PATH') . $id . '/' . $file->filename);
            }
        }
    }
}
