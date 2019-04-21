<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair_Device extends Model
{
	protected $table = 'repair_devices';
    protected $fillable = ['company_name','appearience_date','call_date','visit_date','caller_name','cost','comment'];
}
