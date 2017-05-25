<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Purchase;

class Order extends Model
{
    protected $table = 'orders';

    public function purchases(){
        return $this->hasMany('App\Purchase');
    }
}
