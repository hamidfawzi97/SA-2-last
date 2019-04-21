<?php

namespace App\helper;
use Illuminate\Http\Request;
use App\Patient;
use DB;
class adminUser implements builderInterface {

  private $patient;
  public function __construct(){
    $this->patient = new Patient();
  }

  public function setrole(){
    $this->patient->Role_type = 1;
  }

  public function getresult(){
    return $this->patient;
  }

}