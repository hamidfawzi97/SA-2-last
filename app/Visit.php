<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //

	protected $fillable = ['dr_name' , 'visit_date' , 'paid' , 'remain', 'comment' , 'patient_id'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
