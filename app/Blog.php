<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=['title','content','category'];

    public function attachment()
    {
//        return Attachment::where('attachmentable_type',Blog::class)->where('attachmentable_id',$this->id);
        return $this->morphOne(Attachment::class, 'attachmentable');
    }
}
