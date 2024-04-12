<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartamentModel extends Model 
{
    protected $table = 'tbl_departments';
    protected $primaryKey = 'id_department';
    protected $useAutoincrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name_department'];
}

?>