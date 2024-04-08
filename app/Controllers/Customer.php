<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\TypeCustomerModel;

class Customer extends BaseController
{
    public function __construct()
    {
        helper('url');
    }

    public function index()
    {
        $model = new CustomerModel();
        $typeCustomer = new TypeCustomerModel();

        $result = $model->findAll();
        $resultType = $typeCustomer->findAll();
        
        $data = [
            "customers" => $result,
            "typecustomers" => $resultType
        ];
        helper("form");
        return view('/customer/index', $data);
    }

    public function saveCustomer()
    {
        $customModel = new CustomerModel();

        $success = $customModel->insert([
            "address" => trim($_POST["address"]),
            "cell_phone" => trim($_POST["cell_phone"]),
            "department" => trim($_POST["department"]),
            "email" => trim($_POST["email"]),
            "id_type_customer" => trim($_POST["id_type"]),
            "municipality" => trim($_POST["municipality"]),
            "name_customer" => trim($_POST["name"]),
            "no_register_nrc" => trim($_POST["no_nrc"]),
            "number_dui" => trim($_POST["dui"]),
            "number_nit" => trim($_POST["nit"]),
            "social_reason" => trim($_POST["social_reason"]),
            "spin" => trim($_POST["spin"])
        ]);

        // Devuelve true si la inserción fue exitosa, de lo contrario, devuelve false
        echo $success;
        die();
    }

    public function getCustomerById($Id = null)
    {
        if(Id == null){
            return redirect()->to(base_url('customer'));
        }
        $customModel = new CustomerModel();
        $data = $customModel->find($Id);

        header("Content-Type: application/json");
        echo json_encode($data);
        die();
    }

    public function updateCustomer($Id = null){
        $customModel = new CustomerModel();
        
        $updateData = [
            "address" => trim($_POST["address"]),
            "cell_phone" => trim($_POST["cell_phone"]),
            "department" => trim($_POST["department"]),
            "email" => trim($_POST["email"]),
            "id_type_customer" => trim($_POST["id_type_customer"]),
            "municipality" => trim($_POST["municipality"]),
            "name_customer" => trim($_POST["name_customer"]),
            "no_register_nrc" => trim($_POST["no_register_nrc"]),
            "number_dui" => trim($_POST["number_dui"]),
            "number_nit" => trim($_POST["number_nit"]),
            "social_reason" => trim($_POST["social_reason"]),
            "spin" => trim($_POST["spin"])
        ];

        $customModel->update($Id, $updateData);

        echo json_encode(["message" => "Cliente actualizado correctamente"]);
    }

    public function deleteCustomer($Id){
        if(!is_numeric($id)){
            return redirect()->to(base_url('customer'))->with('error', 'El cliente no existe!');
        }

        $customModel = new customerModel();

        $delete = $customModel->delete($Id);

        // Verificar si se elimino correctamente
        if ($deleted) {
            return redirect()->to(base_url('customer'))->with('success', 'Cliente eliminado correctamente.');
        } else {
            return redirect()->to(base_url('customer'))->with('error', 'Error al eliminar el cliente.');
        }
    }

}