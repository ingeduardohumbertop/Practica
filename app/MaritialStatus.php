<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaritialStatus extends Model
{
    protected $table = 'marital_status';
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;

    public function users(){
        return $this->belongTo('App/User'); 
    }
}