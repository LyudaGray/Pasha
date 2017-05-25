<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;


class ProductsController extends MainController
{
   public function showAllProductsFromCat($cat_id){

    $cat_name = Category::all()->where('id', $cat_id)->first();

    $products = Product::all()->where('cat_id', $cat_id)->where('status', 1);

    return view('all_products_from_cat', ['menus'=>$this->menu, 'cat_name'=>$cat_name['title'], 'products'=>$products]);
   }
}
