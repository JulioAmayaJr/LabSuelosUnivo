<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model{
    protected $table = "tbl_users";

    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'full_name', 
        'date_register', 
        'modification_date', 
        'image', 
        'status', 
        'email',
        'phone',
        'id_rol', 
        'user_name', 
        'password',
    ];
}

?>