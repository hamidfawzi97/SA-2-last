<?php

namespace App\helper;
use Illuminate\Http\Request;
use App\Patient;
use DB;
class builderClass implements builderInterface {

  public function build(builderInterface $builder)
  {
      $builder->setrole();

      return $builder->getresult();
  }


}