<?php

namespace App\Controllers;



class Home extends BaseController
{
    public function index(): string
    {
        if (session("user") < 1) {
            return view("/login/index");
        }
        return view("index");
    }
}
