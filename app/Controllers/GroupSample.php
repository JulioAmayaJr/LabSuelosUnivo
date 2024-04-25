<?php

namespace App\Controllers;

use App\Models\GroupSampleModel;


class GroupSample extends BaseController
{

    public function index()
    {
        if (session("user") < 1) {
            return view("/login/index");
        }
        $groupSampleModel = new GroupSampleModel();
        $resultado = $groupSampleModel->findAll();
        $data = [
            "groupSample" => $resultado
        ];
        return view('groupSample/index', $data);
    }

    public function save()
    {
        $groupSampleModel = new GroupSampleModel();

        $success = $groupSampleModel->insert([
            "name" => trim($_POST["name"]),
            "statu" => '1'
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
        $groupSampleModel = new GroupSampleModel();
        $data = $groupSampleModel->find($Id);

        header("Content-Type: application/json");
        echo json_encode($data);
        die();
    }

    public function update($id = null)
    {



        $groupSampleModel = new GroupSampleModel();
        $groupData = $groupSampleModel->find($id);


        // Actualizar los datos del usuario, incluida la imagen si se cambió
        $updateData = [
            "name" => trim($_POST["name"]),
            "statu" => $_POST["statu"]
        ];
        $groupSampleModel->update($id, $updateData);

        echo json_encode(["message" => "Usuario actualizado correctamente"]);
    }

    public function delete($id)
    {

        $groupSampleModel = new GroupSampleModel();
        $group = $groupSampleModel->find($id);
        if (!$group) {
            return redirect()->to(base_url('groupSample'))->with('error', 'El usuario que intenta eliminar no existe.');
        }
        // Eliminar el usuario seleccionado
        $deleted = $groupSampleModel->delete($id);

        if ($deleted) {
            return redirect()->to(base_url('groupSample'))->with('success', 'El grupo se ha eliminado correctamente.');
        } else {
            return redirect()->to(base_url('groupSample'))->with('error', 'Error al eliminar el usuario.');
        }
    }
}
