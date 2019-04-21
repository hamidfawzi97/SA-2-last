<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
	protected $table = 'labs';
	protected $fillable = ['lab_name','delivery_date','receipt_date','cost','img_name'];
}
