<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{

    protected $table = 'interest';
    protected $fillable = [
        'level',
    ];
    public $timestamps = false;

    public function users(){
        return $this->belongTo('App/User'); 
    }
}