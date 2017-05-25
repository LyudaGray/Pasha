<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public $menu=[];

    public function __construct(){
        $this->menu = Menu::all();
    }
}
