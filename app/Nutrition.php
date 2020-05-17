<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nutrition extends Model
{
//    use SoftDeletes;

    public $timestamps=false;

    protected $fillable=['name','gram','calorie'];
}
