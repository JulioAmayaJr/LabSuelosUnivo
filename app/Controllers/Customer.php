<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customer extends BaseController
{
    public function index(): string
    {
        return view('/customer/index');
    }
}