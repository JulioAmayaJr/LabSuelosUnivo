<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupSampleModel extends Model
{
    protected $table      = 'tbl_group_sample';
    protected $primaryKey = 'id_group_sample';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name','statu'];
}
