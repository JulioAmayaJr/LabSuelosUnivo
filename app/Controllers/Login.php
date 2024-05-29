<?php

namespace App\Controllers;

use App\Models\UserModel;


class Login extends BaseController
{

    public function index(): string
    {
        if (session("user")) {
            return view("index");
        }

        return view('/login/index');
    }

    public function do_login()
    {
        $userModel = new UserModel();
        $userName = $this->request->getPost("user_name");
        $password = $_POST["password"];

        $result = $userModel->where("user_name", $userName)->first();
        $pass=$result["password"];
        $key="LabSuelosUnivo";
        $pass=$this->decrypt($pass,$key);
    
        if ($result && $pass==$password) {
            if ($result["status"] == 1) {
                $this->session->set("user", $result);
                return redirect()->to(base_url());
            } else {
                return redirect()->to(base_url('login'))->with('error', 'Cuenta desactivada');
            }
        } else {
            return redirect()->to(base_url('login'))->with('error', 'Usuario o contraseña incorrectos');
        }
    }


    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }


    private function SHA256($text, $key) {
        $iv = random_bytes(16);
        $encrypted_text = openssl_encrypt($text, 'aes-256-cbc', $key, 0, $iv);
        return rtrim(strtr(base64_encode($iv . $encrypted_text), '+/', '-_'), '=');
    }

  private function decrypt($encrypted_text, $key) {
        $encrypted_text = base64_decode(str_pad(strtr($encrypted_text, '-_', '+/'), strlen($encrypted_text) % 4, '=', STR_PAD_RIGHT));
        $iv = substr($encrypted_text, 0, 16);
        $text = substr($encrypted_text, 16);
        return openssl_decrypt($text, 'aes-256-cbc', $key, 0, $iv);
    }
}
