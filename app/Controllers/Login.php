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

        if ($result && password_verify($password, $result["password"])) {
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
}
