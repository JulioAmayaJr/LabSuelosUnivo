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
        $key= "LabSuelosUnivo";
        $textEncrypt=$resultProfile["password"];
        $password=$this->decrypt($textEncrypt,$key);
        
        $data = [
            "user" => $resultProfile,
            "roles" => $resultRol,
            "pass"=>$password
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

    public function updatePassword(){
        $userModel = new UserModel();
        $session = session();
        $session = session();
        $userSession = $session->get("user");
        if (!$userSession || !isset($userSession['id_user'])) {
            echo json_encode(["message" => "No se encontró el usuario en la sesión"]);
            return;
        }
        $sessionId = $userSession['id_user'];

        $password = $_POST["password"];
        $key="LabSuelosUnivo";
        $password = $this->SHA256($password, $key);

        $updateData = [
            "password" => $password
        ];

        $userModel->update($sessionId, $updateData);
        header("Content-Type: application/json");
        echo json_encode(["message" => "Password actualizada correctamente"]);
    }

    private function decrypt($encrypted_text, $key) {
          $encrypted_text = base64_decode(str_pad(strtr($encrypted_text, '-_', '+/'), strlen($encrypted_text) % 4, '=', STR_PAD_RIGHT));
          $iv = substr($encrypted_text, 0, 16);
          $text = substr($encrypted_text, 16);
          return openssl_decrypt($text, 'aes-256-cbc', $key, 0, $iv);
      }
      
    private function SHA256($text, $key) {
        $iv = random_bytes(16);
        $encrypted_text = openssl_encrypt($text, 'aes-256-cbc', $key, 0, $iv);
        return rtrim(strtr(base64_encode($iv . $encrypted_text), '+/', '-_'), '=');
    }

}

?>
