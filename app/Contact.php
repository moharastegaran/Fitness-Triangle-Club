<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['sender', 'email', 'subject', 'content'];

    public function reply()
    {
        return $this->hasOne(Reply::class);
    }
}
