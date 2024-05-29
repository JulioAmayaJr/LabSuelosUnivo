<?php

namespace App\Controllers;

use App\Models\RolModel;
use App\Models\UserModel;

class Users extends BaseController
{
    public function __construct()
    {
        helper('url');
    }

    public function index()
    {
        if (session("user") < 1) {
            return view("/login/index");
        }
        $session = session();
        $session = $session->get("user");
        $sessionId = $session["id_user"];

        $model = new UserModel();
        $rolModel = new RolModel();

        $resultado = $model->where('id_user !=', $sessionId)->findAll();
        $resultadoRol = $rolModel->findAll();

        $data = [
            "users" => $resultado,
            "roles" => $resultadoRol
        ];

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
        $usernamepost = $_POST["user_name"];
        $password = $usernamepost . "123";
        $key= "LabSuelosUnivo";
        $password = $this->SHA256($password, $key);

        $success = $userModel->insert([
            "full_name" => trim($_POST["name"]),
            "image" => trim($image),
            "date_register" => $newDate,
            "modification_date" => $newDate,
            "status" => '1',
            "id_rol" => $_POST["id_rol"],
            "user_name" => $_POST["user_name"],
            "password" => $password
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

    public function updateUser($id = null)
    {
        helper("img_helper");
        $date = date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($date . ' -1 day'));

        // Obtener el nombre de la imagen actual del usuario
        $userModel = new UserModel();
        $userData = $userModel->find($id);
        $oldImage = $userData['image'];

        $newImage = $oldImage;
        if (!empty($_FILES['image']['name'])) {
            // Guardar la nueva imagen
            $newImageName = saveImg($_FILES['image']['name'], $_FILES['image']['tmp_name']);
            $newImage = $newImageName;
            // Eliminar la imagen antigua si existe
            if (!empty($oldImage)) {
                deleteImg($oldImage);
            }
        }
        // Actualizar los datos del usuario, incluida la imagen si se cambió
        $updateData = [
            "full_name" => trim($_POST["name"]),
            "modification_date" => $newDate,
            "status" => $_POST["status"],
            "id_rol" => $_POST['id_rol'],
            "image" => $newImage
        ];
        $userModel->update($id, $updateData);

        echo json_encode(["message" => "Usuario actualizado correctamente"]);
    }

    public function deleteUser($id)
    {
        // Validar si el id es válido
        if (!is_numeric($id)) {
            return redirect()->to(base_url('user'))->with('error', 'ID de usuario no válido.');
        }

        $userModel = new UserModel();

        // Verificar si el usuario existe antes de eliminar
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->to(base_url('user'))->with('error', 'El usuario que intenta eliminar no existe.');
        }

        $imageName = $user['image'];

        // Eliminar la imagen si existe
        if (!empty($imageName)) {
            $directory = 'img/';
            $filePath = $directory . $imageName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Eliminar el usuario seleccionado
        $deleted = $userModel->delete($id);

        // Verificar si se elimino correctamente
        if ($deleted) {
            return redirect()->to(base_url('user'))->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->to(base_url('user'))->with('error', 'Error al eliminar el usuario.');
        }
    }

    private function SHA256($text, $key) {
        $iv = random_bytes(16);
        $encrypted_text = openssl_encrypt($text, 'aes-256-cbc', $key, 0, $iv);
        return rtrim(strtr(base64_encode($iv . $encrypted_text), '+/', '-_'), '=');
    }


}
