<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\ProjectModel;
use App\Models\UserModel;

class Project extends BaseController
{
    public function index()
    {
        $model = new ProjectModel();
        $customerModel = new CustomerModel();
        $userModel = new UserModel();

        $resultado = $model->findAll();
        $resultadoClientes = $customerModel->findAll();
        $resultadoUsuarios = $userModel->findAll();

        $data = [
            "projects" => $resultado,
            "clients" => $resultadoClientes,
            "users" => $resultadoUsuarios
        ];
        helper("form");
        return view('/project/index', $data);
    }
}
