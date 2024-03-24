<?php

namespace App\Controllers;



class Samples extends BaseController
{

    public function __construct()
    {
        helper('url');
    }


    public function index()
    {
        return view('/sample/index');
    }
}
