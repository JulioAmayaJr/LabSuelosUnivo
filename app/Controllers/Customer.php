<?php

namespace App\Controllers;

class Customer extends BaseController
{
    public function index(): string
    {
        return view('/customer/index');
    }
}