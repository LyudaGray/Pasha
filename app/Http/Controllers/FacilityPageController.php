<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class FacilityPageController extends MainController
{
    public function showFacilityPage(){

        $categories = Category::all();
        return view('facility', ['menus'=>$this->menu, 'categories'=>$categories]);


    }
}
