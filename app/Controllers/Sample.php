<?php

namespace App\Controllers;

use App\Models\SampleModel;
use App\Models\FieldModel;
use App\Models\FieldSampleModel;

class Sample extends BaseController
{

    public function index()
    {
        if (session("user") < 1) {
            return view("/login/index");
        }
        return view('/sample/index');
    }


    public function saveField()
    {

        //Aqui se inserta los datos de la tabla tbl_sample
        $sampleModel = new SampleModel();
        $sampleId = $this->insertAndGetId($sampleModel, [
            "name" => "Cilindro",
            'rules' => "000-1",
            'id_group_sample' => 1,
            'id_user' => 1,
            'id_project' => null
        ]);

        //Aqui se inserta los datos de la tabla tbl_field_sample
        $fieldSampleModel = new FieldSampleModel();


        //Aqui se inserta los campos (field) en la base de datos
        $data_post = json_decode(file_get_contents("php://input"), true);
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
