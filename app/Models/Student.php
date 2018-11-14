<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //Get the points for a student

    public function point()
    {
    	return $this->hasMany('App/Models/Point');
    }

    //Get the group the student belongs to

    public function group()
    {
    	return $this->belongsTo('App/Models/Group');
    }
}