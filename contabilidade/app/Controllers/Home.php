<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }
    public function abertura()
    {
        return view('abertura');
    }
 
     public function trocar()
    {
        return view('trocar');
    }

    public function cliente()
    {
        return view('cliente');
    }
}
