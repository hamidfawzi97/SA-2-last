<?php

namespace App\helper;
use Illuminate\Http\Request;
use DB;
class PieShow implements showInterface {

public function __construct(){ }

public function Show($req){

 		$from = $req->get('from');
        $to = $req->get('to');
        
        if($from == '' or $to == '')
        {
            $visits = DB::table('visits')->get();
            $visit_money = 0;
            foreach ($visits as $visit) {
                $visit_money += $visit->paid;
            }


            $purchases = DB::table('purchases')->get();
            $purchase_money = 0;
            foreach ($purchases as $purchase) {
                $purchase_money += $purchase->cost;
            }


            $repairDevices = DB::table('repair_devices')->get();
            $repair_device_money = 0;
            foreach ($repairDevices as $repairDevice) {
                $repair_device_money += $repairDevice->cost;
            }

            
            $salaries = DB::table('salaries')->get();
            $salary_money = 0;
            foreach ($salaries as $salary) {
                $salary_money += $salary->net_salary;
            }


            $labs = DB::table('labs')->get();
            $lab_money = 0;
            foreach ($labs as $lab) {
                $lab_money += $lab->cost;
            }


            $money = array(
              "visit_money"         => $visit_money,
              "purchase_money"      => $purchase_money,
              "repair_device_money" => $repair_device_money,
              "salary_money"        => $salary_money,
              "lab_money"           => $lab_money
            ); 

            return view('Financial.pieshow', compact('money'));
        }
        else
        {
            $visits = DB::table('visits')->whereBetween('visit_date', [$from." 00:00:00", $to." 00:00:00"])
                                         ->orWhereDate('visit_date',$to." 00:00:00")
                                         ->get();
            $visit_money = 0;
            foreach ($visits as $visit) {
                $visit_money += $visit->paid;
            }
            
            
            $purchases = DB::table('purchases')->whereBetween('purchase_date', [$from." 00:00:00", $to." 00:00:00"])
                                               ->orWhereDate('purchase_date',$to." 00:00:00")
                                               ->get();
            $purchase_money = 0;
            foreach ($purchases as $purchase) {
                $purchase_money += $purchase->cost;
            }


            $repairDevices = DB::table('repair_devices')->whereBetween('created_at', [$from." 00:00:00", $to." 00:00:00"])
                                                        ->orWhereDate('created_at',$to." 00:00:00")
                                                        ->get();
            $repair_device_money = 0;
            foreach ($repairDevices as $repairDevice) {
                $repair_device_money += $repairDevice->cost;
            }


            $salaries = DB::table('salaries')->whereBetween('delivery_date', [$from." 00:00:00", $to." 00:00:00"])
                                             ->orWhereDate('delivery_date',$to." 00:00:00")
                                             ->get();
            $salary_money = 0;
            foreach ($salaries as $salary) {
                $salary_money += $salary->net_salary;
            }


            $labs = DB::table('labs')->whereBetween('created_at', [$from." 00:00:00", $to." 00:00:00"])
                                     ->orWhereDate('created_at',$to." 00:00:00")
                                     ->get();
            $lab_money = 0;
            foreach ($labs as $lab) {
                $lab_money += $lab->cost;
            }


            $money = array(
              "visit_money"         => $visit_money,
              "purchase_money"      => $purchase_money,
              "repair_device_money" => $repair_device_money,
              "salary_money"        => $salary_money,
              "lab_money"           => $lab_money
            );

            return view('Financial.pieshow', compact('money'));
        }

}

}