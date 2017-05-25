<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class MainPageController extends MainController
{
    public function indexAction(Request $request){
        $categories = Category::all();
        return view('main', ['menus'=>$this->menu, 'categories'=>$categories]);
    }
}
