<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function sukien(){
        return view('sukien');
    }
    public function lienhe(){
        return view('lienhe');
    }
}
