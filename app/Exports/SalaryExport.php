<?php

namespace App\Exports;

use App\Salary;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalaryExport implements FromCollection
{

      public function __construct($from , $to)
    {
        $this->from =$from ;
        $this->to =$to;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        $rev = array_reverse(['اسم الموظف','تاريخ الأستلام  ','عدد أيام الشغل   ','عدد أيام الغياب  ','عدد أيام التأخير ','المرتب   ','قيمة الخصومات    ','صافى المرتب  ']);
    	$c = collect([$rev]);
    	

    	if($this->from == '' or $this->to == ''){
            $salaries_array = Salary::all();
        }else{
            $salaries_array = Salary::whereBetween('delivery_date', [$this->from, $this->to])->orWhereDate('delivery_date',$this->to."00:00:00")->get();
        }
    	
    	foreach ($salaries_array as $value) {
    	
    		$salary = new Salary();

            $salary->net_salary = $value['net_salary'];

            $salary->discount = $value['discount'];

            $salary->salary = $value['salary'];

            $salary->delay_days = $value['delay_days'];

            $salary->absence_days = $value['absence_days'];

            $salary->work_days = $value['work_days'];

            $salary->delivery_date = $value['delivery_date'];

  			$salary->company_name = $value['emp_name'];	
	 
			$c = $c->concat([$salary]);

    	}

    	return $c;
    }

}
