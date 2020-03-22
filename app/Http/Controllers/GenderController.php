<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;

class GenderController extends Controller
{
    public function getGender(Request $request){
        
        if(!$request->ajax()) return redirect('/');
        $select =  Gender::all(); 
        return ['gender'=>$select]; 
        
    }
}