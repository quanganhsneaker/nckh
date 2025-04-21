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
    public  function inforba(){
        return view("inforba");
    }
    public  function lienket(){
        return view("lienket");
    }
    public  function thuvien(){
        return view("thuvien");
    }
   
    public  function  detailinfo(){
        return view(" detailinfo");
    }
    public  function  infosonghong(){
        return view(" infosonghong");
    }
    public  function  chitietthuvien(){
        return view(" chitietthuvien");
    }
    public  function  bieudo(){
        return view(" bieudo");
    }
    public function admin(){
        return view("admin");
    }
}
