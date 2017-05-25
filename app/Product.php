<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Purchase;
class Product extends Model
{
    protected $table = 'products';

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
