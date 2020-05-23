<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMedical extends Model
{

    protected $fillable=['user_id','height','weight','blood_type','disease_history','injury_history'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attachment(){
        return $this->morphOne(Attachment::class,'attachmentable');
    }
}
