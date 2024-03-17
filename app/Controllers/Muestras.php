<?php

namespace App\Controllers;



class Muestras extends BaseController
{

    public function __construct()
    {
        helper('url');
    }

    
    public function index()
    {
        return view('/muestras/index');
    }

   
    
}
