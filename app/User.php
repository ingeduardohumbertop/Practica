<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
        
    protected $fillable = [
        'name', 
        'first_last_name', 
        'second_last_name',
        "age",    
        "email", 
        "password", 
        "id_gender", 
        "id_interest", 
        "id_marital_status",
    ];


    public function gender(){
        return $this->belongTo('App/Gender'); 
    }
    public function marital_status(){
        return $this->belongTo('App/MaritialStatus'); 
    }
    public function Interested(){
        return $this->belongTo('App/Interest'); 
    }
    
}