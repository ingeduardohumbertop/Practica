<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender';
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;

    public function users(){
        return $this->belongTo('App/User'); 
    }
}