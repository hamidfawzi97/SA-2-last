<?php

namespace App\helper;
use Illuminate\Http\Request;
use App\Patient;
use DB;
class labsUser implements builderInterface {

  private $patient;
  public function __construct(){
    $this->patient = new Patient();
  }

  public function setrole(){
    $this->patient->Role_type = 6;
  }

  public function getresult(){
    return $this->patient;
  }

}