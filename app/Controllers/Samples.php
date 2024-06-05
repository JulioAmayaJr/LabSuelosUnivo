<?php

namespace App\Controllers;
use App\Models\SampleModel;
use App\Models\FieldSampleModel;
use App\Models\FieldModel;
use App\Models\ProjectModel;
class Samples extends BaseController
{
    public function index()
    {
        $sampleModel = new SampleModel();
        $result=$sampleModel->where("id_project",null)->findAll();
        $projectModel=new ProjectModel();
        $selectProject=$projectModel->findAll();
        $data = [
            "sample" => $result,
            "project"=>$selectProject
        ];

        return view("/samples/index",$data);
    }

    public function getFields(){

        $idSample = $_POST["id_sample"];
        $fieldSampleModel = new FieldSampleModel();
        $fieldModel = new FieldModel();
        $fields = $fieldSampleModel->where("id_sample", $idSample)->findAll();
        $data = [];
        foreach ($fields as $field) {
            $fieldData = $fieldModel->where("id_field", $field["id_field"])->first();
            if ($fieldData) {
                $data[] = $fieldData;
            }
        }
        header("Content-Type: application/json");
        echo json_encode(["result" => $data]);
        die();
    }

    public function save() {
        //Models
        $fieldModel = new FieldModel();
        $sampleModel = new SampleModel();
        $fieldSampleModel = new FieldSampleModel();

        $list = json_decode($_POST['listField'], true); 
        $idSample=$_POST["id_sample"];
        $result=$sampleModel->where("id_sample",$idSample)->first();


        $sampleId = $this->insertAndGetId($sampleModel, [
            "name" => $result["name"],
            'rules' => $result["rules"],
            'id_group_sample' => $result["id_group_sample"],
            'id_user' => $result["id_user"],
            'id_project' => $_POST["id_project"]
        ]);
        
        foreach ($list as $object) {
            $name = $object['name_field'];
            $value=$object['value_field'];
            $type=$object['type_field'];

            $fieldId = $this->insertAndGetId($fieldModel, [
                "name_field" => $name,
                "value_field" => $value,
                "type_field" => $type
            ]);
            $fieldSampleId = $this->insertAndGetId($fieldSampleModel, [
                'id_sample' => $sampleId,
                'id_field' => $fieldId,
                'status' => 1
            ]);
        }


        echo json_encode(["result" => "se agrego exitosamente"]);
        die();
    }
    
    
    
    private function insertAndGetId($model, $data)
    {
        $model->insert($data);
        return $model->insertID();
    }

}