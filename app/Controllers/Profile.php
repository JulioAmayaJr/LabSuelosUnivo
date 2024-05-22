<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RolModel;

class Profile extends BaseController{
    
    public function __construct(){
        helper("url");
    }
    
    public function index(){
        if (session("user") < 1){
            return view("/login/index");
        }

        $session = session();
        $session = $session->get("user");
        $sessionId = $session["id_user"];

        $profileModel = new UserModel();
        $rolModel = new RolModel();

        $resultProfile = $profileModel->find($sessionId);
        $resultRol = $rolModel->findAll();

        $data = [
            "user" => $resultProfile,
            "roles" => $resultRol
        ];

        helper("form");
        return view('/profile/index', $data);
    }

    public function updateInfo(){
        // helper("img_helper");
        // $image = saveImg($_FILES["image"]["name"], $_FILES["image"]["tmp_name"]);
        $date = date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($date . ' -1 day'));
        $userModel = new UserModel();
        $session = session();
        $session = $session->get("user");
        $sessionId = $session["id_user"];
        //$password = password_hash($password, PASSWORD_BCRYPT);

        $updateData = [
            "email" => trim($_POST['email']),
            "phone" => trim($_POST['phone'])
        ];
        
        $userModel->update($sessionId, $updateData);

        echo json_encode(["message" => "Datos actualizados correctamente"]);
    }

    public function updatePassword($Id = null){ 
        $userModel = new UserModel();
        $session = session();
        $session = $session->get("user");
        $sessionId = $session["id_user"];

        $password = $_POST["txtClaveNueva"];
        $password = password_hash($password, PASSWORD_BCRYPT);

        $updateData = [
            "password" => $password
        ];

        $userModel->update($sessionId, $updateData);
        echo json_encode(["message" => "Contraseña actualizada correctamente"]);
    }

}

?>