<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=[
        'request_id',
        'price'
    ];

    public function request()
    {
        return $this->belongsTo(UserRequest::class,'request_id');
    }
}
