<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Address;
class Order extends Model
{
    protected $fillable = ['cart','payment','name','company','tracking_number','address'];
    

    public function user(){
    	return $this->belongsTo('App\User');
    }
   
    public function address(){
    	return $this->hasone(\App\Address::class);
    }

   
}
