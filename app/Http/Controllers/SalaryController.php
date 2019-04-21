<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salary;
use Excel;
use App\Exports\SalaryExport;
class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Salary = Salary::all();

        return view('Salary.index', compact('Salary'));
    }

    public function show(Request $req,$id){
        $from = $req->get('from');
        $to   = $req->get('to');
        if($from == '' and $to == ''){

        }elseif ($from == '') {
           $from = '0000-01-01';
        }elseif ($to == '') {
            $to = '9999-01-01';
        }       
        return Excel::download(new SalaryExport($from,$to), 'salaries.xlsx');
    }
    
    public function create()
    {
        return view('Salary.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'emp_name'      => 'required',
            'delivery_date' => 'required | date',
            'work_days'     => 'required | numeric',
            'absence_days'  => 'required | numeric',
            'delay_days'    => 'required | numeric',
            'salary'        => 'required | numeric',
            'discount'      => 'numeric',
            'net_salary'    => 'numeric'
        ]);

        $salary = new Salary([
            'emp_name'      => $request->get('emp_name'),
            'delivery_date' => $request->get('delivery_date'),
            'work_days'     => $request->get('work_days'),
            'absence_days'  => $request->get('absence_days'),
            'delay_days'    => $request->get('delay_days'),
            'salary'        => $request->get('salary'),
            'discount'      => $request->get('discount'),
            'net_salary'    => $request->get('net_salary')
        ]);
    
        $salary->save();

        return redirect()->route('Salary.index')->with('success', 'تم إضافة البيان');
    }

    public function edit($id)
    {
        $Salary = Salary::find($id);

        return view('Salary.edit', compact('Salary'));
    }

   public function update(Request $request, $id)
    {
        $this->validate($request , [
            'emp_name'      => 'required',
            'delivery_date' => 'required | date',
            'work_days'     => 'required | numeric',
            'absence_days'  => 'required | numeric',
            'delay_days'    => 'required | numeric',
            'salary'        => 'required | numeric',
            'discount'      => 'numeric',
            'net_salary'    => 'numeric'
        ]);

        $salary = Salary::find($id);

        $salary->emp_name      = $request->get('emp_name');
        $salary->delivery_date = $request->get('delivery_date');
        $salary->work_days     = $request->get('work_days');
        $salary->absence_days  = $request->get('absence_days');
        $salary->delay_days    = $request->get('delay_days');
        $salary->salary        = $request->get('salary');
        $salary->discount      = $request->get('discount');
		$salary->net_salary    = $request->get('net_salary');

        $salary->save();

        return redirect()->route('Salary.index')->with('success', 'تم التعديل');
    }

    public function destroy($id)
    {
        $salary = Salary::find($id);
        $salary->delete();

        return redirect()->route('Salary.index')->with('success','تم الحذف');
    }
}
