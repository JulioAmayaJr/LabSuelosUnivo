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
        $resultadoGroupSample = $groupSample->findAll();

        $data = [
            "sample" => $resultado,
            "groupSample" => $resultadoGroupSample
        ];

        return view('/sample/index', $data);
    }

    public function method()
    {

        return view('/sample/method');
    }

    public function saveField()
    {
        $data_post = json_decode(file_get_contents("php://input"), true);
        //Aqui se inserta los datos de la tabla tbl_sample
        $sampleModel = new SampleModel();
        $idUSer = $data_post["idUser"];
        $nameSample = $data_post["nameSample"];
        $nameRule = $data_post["nameRule"];
        $sampleId = $this->insertAndGetId($sampleModel, [
            "name" => $nameSample,
            'rules' => $nameRule,
            'id_group_sample' => 1,
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

            $fieldId = $this->insertAndGetId($fieldModel, [
                "name_field" => $name,
                "value_field" => "",
                "type_field" => "Text"
            ]);
            $fieldSampleId = $this->insertAndGetId($fieldSampleModel, [
                'id_sample' => $sampleId,
                'id_field' => $fieldId,
                'status' => 1
            ]);
        }
        die();
    }
    //funcion para insertar y extraer el id del insert recien hecho
    private function insertAndGetId($model, $data)
    {
        $model->insert($data);
        return $model->insertID();
    }
}
