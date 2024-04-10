<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'tbl_customer';
    protected $primaryKey = 'id_customer';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'address', 'cell_phone', 'department', 'email', 'id_type_customer', 'municipality', 'name_customer',
        'no_register_nrc', 'number_dui', 'number_nit', 'social_reason', 'spin'
    ];
}
