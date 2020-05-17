<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable= ['replier_id','contact_id','content'];

    public function contact(){
        return $this->belongsTo(Contact::class);
    }
}
