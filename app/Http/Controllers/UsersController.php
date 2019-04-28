<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

use App\helper\adminUser;
use App\helper\normalUser;
use App\helper\doctorUser;
use App\helper\purchasesUser;
use App\helper\repairUser;
use App\helper\labsUser;
use App\helper\receptionUser;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all()->toArray();

        return view('Admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.create');
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
            'UserName'  => 'required',
            'Password'  => 'required',
            'Role_type' => 'required'
        ]);

        $director = new builderClass();

        if($request->get('Role_type') == 1){
            $adminUser = new adminUser();
            $user = $director->build($adminUser);
        }
        if($request->get('Role_type') == 2){
            $normalUser = new normalUser();
            $user = $director->build($normalUser);
        }
        if($request->get('Role_type') == 3){
            $doctorUser = new doctorUser();
            $user = $director->build($doctorUser);
        }
        if($request->get('Role_type') == 4){
            $purchasesUser = new purchasesUser();
            $user = $director->build($purchasesUser);
        }
        if($request->get('Role_type') == 5){
            $repairUser = new repairUser();
            $user = $director->build($repairUser);
        }
        if($request->get('Role_type') == 6){
            $labsUser = new labsUser();
            $user = $director->build($labsUser);
        }
        if($request->get('Role_type') == 7){
            $receptionUser = new receptionUser();
            $user = $director->build($receptionUser);
        }

        $user->UserName = $request->get('UserName');
        $user->Password = $request->get('Password');

        // $user = new Users([
        //     'UserName'  => $request->get('UserName'),
        //     'Password'  => $request->get('Password'),
        //     'Role_type' => $request->get('Role_type')
        // ]);

        $user->save();

        return redirect()->route('Admin.index')->with('success', 'تمت الأضافه');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::find($id);

        return view('Admin.edit', compact('user', 'id'));
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
        $this->validate($request,[
            'UserName'  => 'required',
            'Password'  => 'required',
            'Role_type' => 'required'
        ]);

        $user = Users::find($id);
        $user->UserName  = $request->get('UserName');
        $user->Password  = $request->get('Password');
        $user->Role_type = $request->get('Role_type');
        $user->save();

        return redirect()->route('Admin.index')->with('success', 'تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();
        return redirect()->route('Admin.index')->with('success', 'تم الحذف');
    }
}
