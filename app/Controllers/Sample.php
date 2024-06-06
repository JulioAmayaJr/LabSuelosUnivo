<?php

namespace App\Controllers;

use App\Models\SampleModel;
use App\Models\FieldModel;
use App\Models\FieldSampleModel;
use App\Models\GroupSampleModel;

class Sample extends BaseController
{

    public function index()
    {
        if (session("user") < 1) {
            return view("/login/index");
        }

        $model = new SampleModel();
        $groupSample = new GroupSampleModel();

        $resultado = $model->findAll();
        $resultadoGroupSample = $groupSample->where("statu",1)->findAll();

        $data = [
            "sample" => $resultado,
            "groupSample" => $resultadoGroupSample
        ];

        return view('/sample/index', $data);
    }

    public function method($Id=null)
    {
        if ($Id == null) {
            return  redirect()->to(base_url('sample'));
        }
        $IdEncrypt=$Id;
        $key= "LabSuelosUnivo";
        $Id=$this->decrypt($Id,$key);
        $sampleModel = new FieldSampleModel();
        $data = $sampleModel->where("id_field_sample", $Id)->first();

        if($data){
          $data=[
            "id"=>$IdEncrypt
          ];
          return view('/sample/method',$data);
        }else{

          echo  $this->output->set_status_header('404');
          die();
        }

    }

    public function saveField()
    {
        $data_post = json_decode(file_get_contents("php://input"), true);
        //Aqui se inserta los datos de la tabla tbl_sample
        $sampleModel = new SampleModel();
        $idUSer = $data_post["idUser"];
        $nameSample = $data_post["nameSample"];
        $nameRule = $data_post["nameRule"];
        $idGroup=$data_post["id_group_sample"];
        $sampleId = $this->insertAndGetId($sampleModel, [
            "name" => $nameSample,
            'rules' => $nameRule,
            'id_group_sample' => $idGroup,
            'id_user' => $idUSer,
            'id_project' => null
        ]);

        //Aqui se inserta los datos de la tabla tbl_field_sample
        $fieldSampleModel = new FieldSampleModel();


        //Aqui se inserta los campos (field) en la base de datos

        $list = $data_post['list'];
        $fieldModel = new FieldModel();
        foreach ($list as $object) {

            $name = $object['name'];
            $type=$object["typeField"];

            $fieldId = $this->insertAndGetId($fieldModel, [
                "name_field" => $name,
                "value_field" => "",
                "type_field" => $type
            ]);
            $fieldSampleId = $this->insertAndGetId($fieldSampleModel, [
                'id_sample' => $sampleId,
                'id_field' => $fieldId,
                'status' => 1
            ]);
        }
        $key= "LabSuelosUnivo";
        $id=$fieldSampleId;
        $id = $this->SHA256($id,$key);
        header("Content-Type: application/json");
        echo json_encode(["ID"=>$id]);
        die();

    }

    public function methodID($Id = null) {
      // Models
      $sampleModel = new FieldSampleModel();
      $fieldModel = new FieldModel();
      
      if ($Id == null) {
          header("Content-Type: application/json");
          echo json_encode(["Error" => "No se encontro registro"]);
          return;
      }
  
      $key = "LabSuelosUnivo";
      $Id = $this->decrypt($Id, $key);
      $data = $sampleModel->where("id_field_sample", $Id)->first();
  
      if (!$data) {
          header("Content-Type: application/json");
          echo json_encode(["Error" => "No se encontro registro"]);
          return;
      }
  
      $Id = $data["id_sample"];
      $data = $sampleModel->where("id_sample", $Id)->findAll();
  
      $idField = [];
      foreach ($data as $dataFieldSample) {
          $idField[] = $dataFieldSample["id_field"];
      }
  
      $dataField = [];
      foreach ($idField as $key) {
          $fieldData = $fieldModel->where("id_field", $key)->where("type_field", "Number")->first();
          if ($fieldData) {
              $dataField[] = [
                  "data" => $fieldData,
                  "selected" => false
              ];
          }
      }
  
      header("Content-Type: application/json");
      if (!empty($dataField)) {
          echo json_encode($dataField);
          die();
      } else {
          echo json_encode(["Error" => "No se encontro registro"]);
      }
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



    //funcion para insertar y extraer el id del insert recien hecho
    private function insertAndGetId($model, $data)
    {
        $model->insert($data);
        return $model->insertID();
    }
}
