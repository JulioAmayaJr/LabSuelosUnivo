<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table      = 'tbl_project';
    protected $primaryKey = 'id_project';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'codigo', 'id_customer', 'date_register', 'lactitud', 'longitud', 'status', 'id_user'];
}
