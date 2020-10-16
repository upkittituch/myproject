<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Order extends Model
{
    protected $fillable = ['cart','payment','phone','name','company','tracking_number'];
    

    public function user(){
    	return $this->belongsTo(User::class);
    }
   
    

   
}
