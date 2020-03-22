<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){

        return view('auth.register');

    }
    public function store(Request $request){
        if (!$request->ajax()) return redirect('/');
        try{
            
            $user = new User();
            $user->name = $request->name; 
            $user->first_last_name = $request->first_last_name; 
            $user->second_last_name = $request->second_last_name; 
            $user->age = $request->age; 
            $user->email = $request->email; 
            $user->password = bcrypt( $request->password);       
            $user->id_gender = $request->gender; 
            $user->id_interest = $request->interest; 
            $user->id_marital_status = $request->marital_status;
            $user->save();
            DB::commit();

    
            Auth::login($user);
            
        } catch (Exception $e){
            DB::rollBack();
        }
        
       
    }
}