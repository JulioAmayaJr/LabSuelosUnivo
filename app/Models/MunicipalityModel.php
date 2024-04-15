<?php

namespace App\Models;

use CodeIgniter\Model;

class MunicipalityModel extends Model
{
    protected $table = 'tbl_municipalities';
    protected $primaryKey = 'id_municipality';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name_municipality'];
}

?>