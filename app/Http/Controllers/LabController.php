<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lab;

use App\Exports\LabExport;
use Excel;

use DataTables;

class LabController extends Controller
{
    public function index()
    {
        $labss = Lab::all()->toArray();

        // if($labss)
        //     $labs = array($labss[sizeof($labss)-1]);
        // else
        //     $labs = array();

        return view('Lab.index', compact('labss'));
    }

    function getdata()
    {
        $lab = Lab::all();
        return DataTables::of($lab)->make(true);
    }

    public function create()
    {
        return view('Lab.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'labName'      => 'required',
            'deliveryDate' => 'required | date',
            'receiptDate'  => 'required | date',
            'cost'         => 'required | numeric',
            'comment'      => 'required',
            'case_closed'  => 'required',
            'select_file'  => 'image|mimes:jpeg,jpg,png,gif'
        ]);

        

        $lab = new Lab([
            'lab_name'      => $request->get('labName'),
            'delivery_date' => $request->get('deliveryDate'),
            'receipt_date'  => $request->get('receiptDate'),
            'cost'          => $request->get('cost')
        ]);

        $lab->case_closed = $request->get('case_closed');
        $lab->comment     = $request->get('comment');
        $lab->created_by  = session('username');

        if($request->file('select_file') != ''){

            $image = $request->file('select_file');

            $imgname = $image->getClientOriginalName();

            $image->move(public_path('images/Labs'), $imgname);
            
            $lab->img_name = $imgname;
        }

        $lab->save();

        return redirect()->route('Lab.index')->with('success', 'تم إضافة المعمل');
    }

    public function edit($id)
    {
        $lab = Lab::find($id);

        return view('Lab.edit', compact('lab'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'labName'      => 'required',
            'deliveryDate' => 'required | date',
            'receiptDate'  => 'required | date',
            'cost'         => 'required | numeric',
            'comment'      => 'required',
            'select_file'  => 'image|mimes:jpeg,jpg,png,gif'
        ]);

        $lab = Lab::find($id);

        $lab->lab_name      = $request->get('labName');
        $lab->delivery_date = $request->get('deliveryDate');
        $lab->receipt_date  = $request->get('receiptDate');
        $lab->cost          = $request->get('cost');
        $lab->comment       = $request->get('comment');
        $lab->case_closed   = $request->get('case_closed');

        if($request->file('select_file') != ''){
            
            $image = $request->file('select_file');

    		$imgname = $image->getClientOriginalName();

            $image->move(public_path('images/Labs'), $imgname);

            
            $lab->img_name = $imgname;
        }

        $lab->save();

        return redirect()->route('Lab.index')->with('success', 'تم التعديل');
    }

    public function search(Request $request)
    {
        $lab_name = $request->get('labName');
        $receipt_date = $request->get('recieptDate');

        $dateArray = explode('-', $receipt_date);

            
        if ($lab_name != "" && $receipt_date != "") {
        
            if (strlen($dateArray[0]) == 4 && strlen($dateArray[1]) == 2 && is_numeric($dateArray[0]) && is_numeric($dateArray[1])) {
                $lab = Lab::where('lab_name', $lab_name)
                        ->whereMonth('receipt_date', $dateArray[1])
                        ->whereYear('receipt_date', $dateArray[0])
                        ->get();

                if($lab)
                {
                    return view('Lab.show', compact('lab'));
                }
            }else{
                return redirect()->route('Lab.index')->with('fail', 'التاريخ غير صحيح');
            }
            
        }
        elseif($lab_name != "" && $receipt_date == "")
        {
            $lab = Lab::where('lab_name', $lab_name)->get();

            if($lab)
            {
                return view('Lab.show', compact('lab'));
            }

        }elseif ($receipt_date != "" && $lab_name == "") {
            
            if (strlen($dateArray[0]) == 4 && strlen($dateArray[1]) == 2 && is_numeric($dateArray[0]) && is_numeric($dateArray[1])) {
            
                $lab = Lab::whereMonth('receipt_date', $dateArray[1])
                            ->whereYear('receipt_date', $dateArray[0])
                            ->get();

                if($lab)
                {
                    return view('Lab.show', compact('lab'));
                }
            }else{
                return redirect()->route('Lab.index')->with('fail', 'التاريخ غير صحيح');
            }

        }else{

            $lab = Lab::all();

            if($lab)
            {
               return view('Lab.show', compact('lab'));
            }

        }

        
    }

    // public function show($id)
    // {
    //     $lab = Lab::find($id);
        
    //     return view('Lab.show', compact('lab'));
    // }

    public function destroy($id)
    {
        $lab = Lab::find($id);

        $imgname = $lab->img_name;

   		unlink("images/Labs/" . $imgname);
   	
		$lab->delete();

        return redirect()->route('Lab.index')->with('success','تم الحذف');
    }

    public function excel(Request $req,$id)
    {   
        $from = $req->get('from');
        $to = $req->get('to');
        if($from == '' and $to == ''){
                 
        }elseif ($from == '') {
           $from = '0000-01-01';
        }elseif ($to == '') {
            $to = '9999-01-01';
        }
        return Excel::download(new LabExport($from,$to),'labs.xlsx');
    }
}
