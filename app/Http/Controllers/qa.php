<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class qa extends Controller
{
    //
    public function index(){
        return view("home");
    }
    public  function lienhe(){
        return view("lienhe");
    }
    public  function info(){
        return view("info");
    }
    public  function lienket(){
        return view("lienket");
    }
}
