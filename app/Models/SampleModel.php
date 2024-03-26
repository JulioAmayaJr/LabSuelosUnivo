<?php

namespace App\Models;

use CodeIgniter\Model;

class SampleModel extends Model
{
    protected $table      = 'tbl_sample';
    protected $primaryKey = 'id_sample';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'rules', 'id_group_sample', 'id_user', 'id_project'];
}
