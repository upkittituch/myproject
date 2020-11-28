<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Order;

class Address extends Model
{
    protected $fillable=['itile','user_id','address','postcode','phone'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function orders(){
        return $this->belongsTo('App\Order');
    }
}
