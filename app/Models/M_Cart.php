<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Cart extends Model
{
    protected $table   = 'cart';
    protected $allowedFields = [
        'id',
        'KodeBarang',
        'StokBarang',
        'HargaBarang',
        'FileBarang'
    ];
    public function getDatabase()
    {
        $query = $this->db->query("SELECT * FROM cart");
        return $query->getResult();
    }

    public function setDatabase($dataCart)
    {
        $KodeBarang = $dataCart['KodeBarang'];
        $StokBarang = $dataCart['StokBarang'];
        $HargaBarang = $dataCart['HargaBarang'];
        $FileBarang = $dataCart['FileBarang'];
        $db = \Config\Database::connect();
        $query = $db->query("INSERT INTO cart VALUES (NULL,'$KodeBarang','$StokBarang','$HargaBarang','$FileBarang')");
    }

    public function getAllJoinWBarang(){
        $query = $this->db->query("SELECT cart.*, barang.NamaBarang as NamaBarang FROM cart INNER JOIN barang ON barang.KodeBarang=cart.KodeBarang");
        return $query->getResult();
    }
}
