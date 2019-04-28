<?php

namespace App\helper;
use Illuminate\Http\Request;
use App\Users;
use DB;
class doctorUser implements builderInterface {

  private $Users;
  public function __construct(){
    $this->Users = new Users();
  }

  public function setrole(){
    $this->Users->Role_type = 3;
  }

  public function getresult(){
    return $this->Users;
  }

}