<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $allowedFields = ['username', 'password', 'nama'];
}
