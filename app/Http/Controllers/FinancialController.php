<?php

namespace App\Http\Controllers;


use App\helper\PieShow;
use App\helper\TableShow;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use DB;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(){

        $this->pieshow = new PieShow();

        $this->tableshow = new TableShow();

    }

    public function index()
    {
        //
        return view('Financial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function search(Request $req)
    {
       try{
           $paymentMethod = $req['showMethod'];
           // echo $paymentMethod;
           if($paymentMethod == 'pie'){
                $payment = $this->pieshow;
            }else{
                $payment = $this->tableshow;
            }
            $response = $payment->Show($req);

            return $response;
        }catch(Exception $e){

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
