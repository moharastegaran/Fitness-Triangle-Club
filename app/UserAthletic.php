<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAthletic extends Model
{
    protected $fillable=['user_id','athletic_history','target'];

    public function attachment(){
        return $this->morphMany(Attachment::class,'attachmentable');
    }

    public function image(){
//        return $this->attachment()->where('type','image')->first();
    }

    public function test(){
        return $this->attachment()->where('title','test')->first();
    }
}
