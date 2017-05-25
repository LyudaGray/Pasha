<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class AboutPageController extends MainController
{
    public function showAboutPage(){
        $categories = Category::all();
        return view('about', ['menus'=>$this->menu, 'categories'=>$categories]);
    }
}
