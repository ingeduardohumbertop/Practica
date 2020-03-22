<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaritialStatus;

class MritalStatusController extends Controller
{
    //

    public function getMaritalStatus(Request $request){
        
        if(!$request->ajax()) return redirect('/');
        $select =  MaritialStatus::all(); 
        return ['maritial_status'=>$select]; 
        
    }
}