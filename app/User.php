<?php

namespace App;

use App\Notifications\ContactSent;
use App\Notifications\UserRegistered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile', 'family', 'birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getName()
    {
        return $this->name . ' ' . $this->family;
    }

    public function medical()
    {
        return $this->hasOne(UserMedical::class);
    }

    public function athletic(){
        return $this->hasOne(UserAthletic::class);
    }

    public function requests(){
        return $this->hasMany(UserRequest::class);
    }

    public function workout_programs(){
        return $this->hasMany(WorkoutProgram::class,'requester_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function attachment(){
        return $this->morphMany(Attachment::class,'attachmentable');
    }

    public static function members(){
        return Role::where('title','user')->first()->users()->latest()->get();
    }

    public static function admins()
    {
        return Role::where('title','admin')->first()->users;
    }

    public function isAdmin(){
        return in_array(
            Role::where('title','admin')->first()->id ,
            $this->roles()->pluck("roles.id")->toArray());
    }

    public function avatar(){
        $file = $this->attachment()->where('title','avatar')->first();
        return $file ? $file->filename : null;
    }

}

