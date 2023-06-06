<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    public function getWhere($where){
        // dd($where);
        $Username = $where['user_name'];
        $Password = $where['password'];
        $admin  = $this->db->query("SELECT * FROM users where user_name = '$Username' and password = '$Password'")->getRow();
        return $admin;
    }
}