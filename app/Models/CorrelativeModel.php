<?php

namespace App\Models;

use CodeIgniter\Model;

class CorrelativeModel extends Model
{
    protected $table = 'tbl_correlative';
    protected $primaryKey = 'id_correlative';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'number_correlative', 'number_quantity', 'type'
    ];
}
