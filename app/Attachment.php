<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
//    use SoftDeletes;
    protected $fillable=['attachmentable_id','attachmentable_type','type','filename','title'];

    public function attachmentable(){
        return $this->morphTo();
    }
}
