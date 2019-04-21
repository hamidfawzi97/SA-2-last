<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name' , 'phone' , 'address' , 'general_diagnosis', 'job' , 'other_diseases'];

    public function visits()
    {
        return $this->hasMany('App\Visit');
    }
}
