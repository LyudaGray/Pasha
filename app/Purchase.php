<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class Purchase extends Model
{
    protected $table = 'purchases';

    public function order(){
        return $this->belongsTo('App\Order');
    }

}
