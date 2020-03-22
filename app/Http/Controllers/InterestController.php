<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;

class InterestController extends Controller
{
    public function getInterest(Request $request){
        
        if(!$request->ajax()) return redirect('/');
        $select =  Interest::all(); 
        return ['interest'=>$select]; 
        
    }
}