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

        $success = $userModel->insert([
            "full_name" => trim($_POST["name"]),
            "image" => trim($image),
            "date_register" => $newDate,
            "modification_date" => $newDate,
            "status" => '1',
            "id_rol" => $_POST["id_rol"]
        ]);

        // Devuelve true si la inserción fue exitosa, de lo contrario, devuelve false
        echo $success;
        die();
    }

    public function getById($Id = null)
    {
        if ($Id == null) {
            return  redirect()->to(base_url('user'));
        }
        $userModel = new UserModel();
        $data = $userModel->find($Id);

        header("Content-Type: application/json");
        echo json_encode($data);
        die();
    }

    public function updateUser($id)
    {
        helper("img_helper");
        $date = date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($date . ' -1 day'));
        $image = saveImg($_FILES["image"]["name"], $_FILES["image"]["tmp_name"]);

        $userModel = new UserModel();
        $userModel->update($id, [
            "full_name" => trim($_POST["name"]),
            "image" => trim($image),
            'modification_date' => $newDate,
            "status" => '1'
        ]);
    }
}
