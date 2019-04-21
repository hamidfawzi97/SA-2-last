<?php

namespace App\Exports;
use Illuminate\Database\Eloquent\Collection;
use App\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportabl;
class PurchaseExport implements FromCollection
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
        $headers = array_reverse(['اسم المورد','تاريخ الشراء ','التكلفة','تعليق  ','اسم المٌشترى ','سُجل بواسطة']);

    	$c = collect([$headers]);
    	
        if($this->from == '' or $this->to == ''){
            $purchases_array = Purchase::all();
    	}else{
            $purchases_array = Purchase::whereBetween('purchase_date', [$this->from, $this->to])->orWhereDate('purchase_date',$this->to)->get();

        }
   
    	foreach ( $purchases_array as $value) {
    	
    		$purchase = new Purchase();     

            $purchase->created_by = $value['created_by'];
			
            $purchase->officer = $value['officer'];

            $purchase->comment = $value['comment'];
    	   
            $purchase->cost = $value['cost'];

            $purchase->purchase_date = $value['purchase_date'];

            $purchase->resource_name = $value['resource_name'];

    


    		$c = $c->concat([$purchase]);

    	
    	}
 
    	 return $c;
  
    }


}
