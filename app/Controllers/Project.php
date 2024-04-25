<?php

namespace App\Controllers;

use App\Models\CorrelativeModel;
use App\Models\CustomerModel;
use App\Models\ProjectModel;
use App\Models\UserModel;

class Project extends BaseController
{
    public function index()
    {
        if (session("user") < 1) {
            return view("/login/index");
        }
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

    public function save()
    {
        $date = date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($date . ' -1 day'));
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        $modelProject = new ProjectModel();
        $success = $modelProject->insert([
            "codigo" => $year . $month . $day . "-" . $this->getNumberProject(),
            "name" => trim($_POST["name"]),
            "id_customer" => trim($_POST["id_customer"]),
            "date_register" => $newDate,
            "lactitud" => trim($_POST["lactitud"]),
            "longitud" => trim($_POST["longitud"]),
            "status" => 1,
            "id_user" => 2
        ]);
        $correlativeModel = new CorrelativeModel();
        $correlative = $correlativeModel->where("type", "project")->first();
        $numberCorrelative = $correlative["number_correlative"];
        $correlative = $correlativeModel->find(1);
        $correlative = [
            "number_correlative" => $numberCorrelative + 1
        ];
        $correlativeModel->update(1, $correlative);

        // Devuelve true si la inserción fue exitosa, de lo contrario, devuelve false
        echo $success;
        die();
    }

    public function getById($Id = null)
    {
        if ($Id == null) {
            return  redirect()->to(base_url('project'));
        }
        $projectModel = new ProjectModel();
        $data = $projectModel->find($Id);

        header("Content-Type: application/json");
        echo json_encode($data);
        die();
    }

    public function getNumberProject()
    {
        $correlativeModel = new CorrelativeModel();
        $correlative = $correlativeModel->where("type", "project")->first();
        $numberCorrelative = $correlative["number_correlative"];
        $numberCorrelative = $numberCorrelative + 1;
        $ceros = str_repeat("0", $correlative["number_quantity"]);
        $numberProject = $ceros . $numberCorrelative;

        // Obtener solo los últimos dígitos
        $numberProject = substr($numberProject, -$correlative["number_quantity"]);


        return $numberProject;
    }

    public function updateProject($id = null)
    {
        $date = date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($date . ' -1 day'));

        $projectModel = new ProjectModel();
        $userData = $projectModel->find($id);

        $updateData = [
            "codigo" => null,
            "name" => trim($_POST["name"]),
            "id_customer" => trim($_POST["id_customer"]),
            "date_register" => $newDate,
            "lactitud" => trim($_POST["lactitud"]),
            "longitud" => trim($_POST["longitud"]),
            "status" => $_POST["status"],
            "id_user" => null
        ];

        $projectModel->update($id, $updateData);

        echo json_encode(["message" => "Proyecto actualizado correctamente"]);
    }

    public function deleteProject($id)
    {
        // Validar si el id es válido
        if (!is_numeric($id)) {
            return redirect()->to(base_url('user'))->with('error', 'ID de usuario no válido.');
        }

        $projectModel = new ProjectModel();

        // Verificar si el projecto existe antes de eliminar
        $project = $projectModel->find($id);
        if (!$project) {
            return redirect()->to(base_url('project'))->with('error', 'El proyecto que intenta eliminar no existe.');
        }

        // Eliminar el projecto seleccionado
        $deleted = $projectModel->delete($id);

        // Verificar si se elimino correctamente
        if ($deleted) {
            return redirect()->to(base_url('project'))->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->to(base_url('project'))->with('error', 'Error al eliminar el usuario.');
        }
    }
}
