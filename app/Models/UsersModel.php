<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    public function cek_user($username)
    {
        $query = $this->select('*');
         $query = $this->join('user_level', 'user_level.id = users.id_user_level');
         $query = $this->getWhere(['username' => $username]);
         return $query->getRow();
    }
}
