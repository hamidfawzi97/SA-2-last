<?php

namespace App\Http\Controllers;
use App\Exports\PurchaseExport;
use Excel;
use Illuminate\Http\Request;
use App\Purchase;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();

        // if(sizeof($purchases) >= 1){
        //         $siz = sizeof($purchases);
        //         $purchase = array($purchases[$siz-1]);  
        //         return view('Purchases.index')->with('purchases',$purchase);
        // }else{

        return view('Purchases.index', compact('purchases'));
        //}
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Purchases.create');
    }
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
            'resource_name'  => 'required',
            'purchase_date'  => 'required',
            'cost'           => 'required',
            'comment'        => 'required',
            'officer'        => 'required',
            'select_file'  => 'image|mimes:jpeg,jpg,png,gif'
        ]);



        $purchase = new Purchase();
        $purchase->resource_name = $request->get('resource_name');
        $purchase->purchase_date = $request->get('purchase_date');
        $purchase->cost          = $request->get('cost');
        $purchase->comment       = $request->get('comment');
        $purchase->officer       = $request->get('officer');
        $purchase->created_by    = session('username');

        if($request->file('select_file') != ''){

            $image = $request->file('select_file');

            $imgname = $image->getClientOriginalName();

            $image->move(public_path('images/Purchases'), $imgname);

            $purchase->img_name = $imgname;
        }

        $purchase->save();

        if($request->session()->has('role')){
            if(session('role') == 1)
                return redirect('Purchases')->with('success', 'تم إضافة الفاتورة');
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
        return Excel::download(new PurchaseExport($from,$to), 'purchase.xlsx');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);

        return view("Purchases.edit")->with('purchase',$purchase);
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
            $this->validate($request, [
            'resource_name'  => 'required',
            'purchase_date'  => 'required',
            'cost'           => 'required',
            'comment'        => 'required',
            'officer'        => 'required',
            'select_file'  => 'image|mimes:jpeg,jpg,png,gif'
        ]);

        $purchase = Purchase::find($id);
        $purchase->resource_name = $request->get('resource_name');
        $purchase->purchase_date = $request->get('purchase_date');
        $purchase->cost = $request->get('cost');
        $purchase->comment = $request->get('comment');
        $purchase->officer = $request->get('officer');

        if($request->file('select_file') != ''){
            
            $image = $request->file('select_file');

            $imgname = $image->getClientOriginalName();

            $image->move(public_path('images/Purchases'), $imgname);

            
            $purchase->img_name = $imgname;
        }

        $purchase->save();

        if($request->session()->has('role')){
            if(session('role') == 1)
                return redirect('Purchases')->with('success', 'تم تعديل الفاتورة');
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
        $Purchase = Purchase::find($id);

        $imgname = $Purchase->img_name;

        unlink("images/Purchases/" . $imgname);

        $Purchase->delete();

        return redirect('Purchases')->with('success', 'تم الحذف');
    }

    public function excel()
    {
    }

}
