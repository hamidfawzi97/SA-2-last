<?php

namespace App\Exports;

use App\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;

class PatientExport implements FromCollection
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
        $c = collect([['سُجل بواسطة','امراض اخرى','التشخيص العام','الوظيفه','العنوان','الموبايل  ','السن','الاسم']]);
    	
    	if($this->from == '' or $this->to == ''){
            $paitents_array = Patient::all();
        }else{
            $paitents_array = Patient::whereBetween('created_at', [$this->from." 00:00:00", $this->to." 00:00:00"])->orWhereDate('created_at',$this->to." 00:00:00")->get();
        

        }
    	
    	foreach ( $paitents_array as $value) {
    	
    		$patient = new Patient();      
     	      

            $patient->created_by = $value['created_by'];

			$patient->other_diseases = $value['other_diseases'];

			$patient->general_diagnosis = $value['general_diagnosis'];

			$patient->job = $value['job'];

			$patient->address = $value['address'];
    		
			$patient->phone = $value['phone'];
	           
            $patient->age = $value['age'];
        
    		$patient->name = $value['name'];
        
    		$c = $c->concat([$patient]);
    	
    	}
    	
    	return $c;
    }
}
