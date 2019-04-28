<?php

namespace App\helper;
use Illuminate\Http\Request;
use App\Users;
use DB;
class adminUser implements builderInterface {

  private $Users;
  public function __construct(){
    $this->Users = new Users();
  }

  public function setrole(){
    $this->Users->Role_type = 1;
  }

  public function getresult(){
    return $this->Users;
  }

}