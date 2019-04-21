<?php

namespace App\Http\Controllers;
use App\Exports\ReparDevicesExport;
use Excel;
use Illuminate\Http\Request;
use App\Repair_Device;

class RepairDevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairDevice = Repair_Device::all();

        // if($repairDevices)
        //     $repairDevice = array($repairDevices[sizeof($repairDevices)-1]);
        // else
        //     $repairDevice = array();

        return view('RepairDevices.index', compact('repairDevice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('RepairDevices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'companyName'     => 'required',
            'appearienceDate' => 'required | date',
            'callDate'        => 'required | date',
            'visitDate'       => 'required | date',
            'callerName'      => 'required',
            'cost'            => 'required | numeric',
            'comment'         => 'required'
        ]);

        $repairDevice = new Repair_Device([
            'company_name'     => $request->get('companyName'),
            'appearience_date' => $request->get('appearienceDate'),
            'call_date'        => $request->get('callDate'),
            'visit_date'       => $request->get('visitDate'),
            'caller_name'      => $request->get('callerName'),
            'cost'             => $request->get('cost'),
            'comment'          => $request->get('comment')
        ]);
        $repairDevice->created_by = session('username');

        $repairDevice->save();

        if($request->session()->has('role')){
            if(session('role') == 1)
                return redirect()->route('RepairDevices.index')->with('success', 'تم إضافة الفاتورة');
            else
                return redirect('/')->with('success', 'تم إضافة الفاتورة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req,$id)
    {
        $from = $req->get('from');
        $to   = $req->get('to');

        if($from == '' and $to == ''){

        }elseif ($from == '') {
           $from = '0000-01-01';
        }elseif ($to == '') {
            $to = '9999-01-01';
        }
        return Excel::download(new ReparDevicesExport($from,$to), 'repairDevice.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repairDevice = Repair_Device::find($id);

        return view('RepairDevices.edit', compact('repairDevice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'companyName'     => 'required',
            'appearienceDate' => 'required | date',
            'callDate'        => 'required | date',
            'visitDate'       => 'required | date',
            'callerName'      => 'required',
            'cost'            => 'required | numeric',
            'comment'         => 'required'
        ]);

        $repairDevice = Repair_Device::find($id);

        $repairDevice->company_name     = $request->get('companyName');
        $repairDevice->appearience_date = $request->get('appearienceDate');
        $repairDevice->call_date        = $request->get('callDate');
        $repairDevice->visit_date       = $request->get('visitDate');
        $repairDevice->caller_name      = $request->get('callerName');
        $repairDevice->cost             = $request->get('cost');
        $repairDevice->comment          = $request->get('comment');

        $repairDevice->save();

        if($request->session()->has('role')){
            if(session('role') == 1)
                return redirect()->route('RepairDevices.index')->with('success', 'تم التعديل');
            else
                return redirect('/')->with('success', 'تم تعديل الفاتورة');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repairDevice = Repair_Device::find($id);
        $repairDevice->delete();

        return redirect()->route('RepairDevices.index')->with('success','تم الحذف');
    }
}
