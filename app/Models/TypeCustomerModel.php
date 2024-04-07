<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeCustomerModel extends Model
{
    protected $table = 'tbl_type_customer';
    protected $primaryKey = 'id_type_customer';
    protected $autoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['type_customer'];
}

?>