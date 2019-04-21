<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visit_tooth extends Model
{
	protected $table = 'visit_tooth';
    protected $fillable = ['visit_id' ,'tooth'];
    public $timestamps = false;

}
