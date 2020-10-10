<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Order extends Model
{
    protected $fillable = ['cart','status'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

   
}
