<?php

namespace App\helper;
use Illuminate\Http\Request;
use App\Users;
use DB;
class builderClass {

  public function build(builderInterface $builder)
  {
      $builder->setrole();

      return $builder->getresult();
  }


}