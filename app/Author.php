<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'email', 'dob', 'password'];

    protected $dates = ['dob'];

    public function setDobAttribute($dob){

        $this->attributes['dob'] = Carbon::parse($dob);

    }
}
