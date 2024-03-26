<?php

namespace App\Models;

use CodeIgniter\Model;

class FieldSampleModel extends Model
{
    protected $table      = 'tbl_field_sample';
    protected $primaryKey = 'id_field_sample';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_sample', 'id_field', 'status'];
}
