<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workout extends Model
{
    use SoftDeletes;

    protected $table = 'workouts';

    protected $fillable = [
        'category_id',
        'title'
    ];

    public function category()
    {
        return $this->belongsTo(WorkoutCategory::class, 'category_id');
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function images()
    {
        return $this->attachments()->where('type', 'image')->get();
    }

    public function videos()
    {
        return $this->attachments()->where('type', 'video')->get();
    }

}
