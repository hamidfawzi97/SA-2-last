<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';
    protected $fillable = ['emp_name','delivery_date','work_days','absence_days',
    					   'delay_days','salary','discount','net_salary'];
}
