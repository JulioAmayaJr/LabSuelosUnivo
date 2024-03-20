<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function __construct()
    {
        helper('url');
    }

    public function index()
    {
        $model = new UserModel();
        $resultado = $model->findAll();

        $data = ["users" => $resultado];
        helper("form");
        return view('/user/index', $data);
    }

    public function save()
    {
        helper("img_helper");

        $image = saveImg($_FILES["image"]["name"], $_FILES["image"]["tmp_name"]);
        $date = date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($date . ' -1 day'));
        $userModel = new UserModel();
        $userModel->insert([
            "full_name" => trim($_POST["name"]),
            "image" => trim($image),
            "date_register" => $newDate,
            "status" => '1'
        ]);
        return redirect()->to(base_url("user"));
    }
}
