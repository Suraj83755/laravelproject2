<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class userdata extends Model
{
    use SoftDeletes;
    //Table Name
    protected $table = "usersdata";

    //primary key
    protected $primary_key= "id";

    //Fillable colum
    protected $fillable=array('name','email');

    public function setNameAttribute($value){
        $this->attributes['name']= ucwords($value);
    }
}
