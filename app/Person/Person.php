<?php

// Person.php

namespace App\Person;

use Illuminate\Http\Request;
use App\Patient;

class Person
{
    public function fetch(Request $request){
        if($request->get('query')){
            $query = $request->get('query');

            $data = Patient::where('name' , 'LIKE' , '%'.$query.'%')->orWhere('phone' , 'LIKE' , '%'.$query.'%')->get();
            $output = '';

            if($data){
                $output = '<ul class="dropdown-menu col-md-12" style="display:block; position:relative">';
                foreach ($data as $row) {
                    $output .= '<li><a href="'.action("PatientsController@show", $row->id).'" class="btn btn-default col-md-12">'.$row->name.'</a></li>';
                }
                $output .= '</ul>';
            }

            echo $output;
        }
    }
}