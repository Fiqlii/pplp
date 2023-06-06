<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Barang extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'KodeBarang';
    protected $returnType = 'object';

    protected $allowedFields = ['KodeBarang', 'NamaBarang', 'HargaBarang', 'StokBarang', 'FileBarang'];

    public function getBarang()
    {
        $db = db_connect();
        $data= $db->query('SELECT * from barang');
        return $data->getResultObject();
    }

    public function getOne($kode)
    {
        $query = $this->db->query(
            "SELECT * FROM barang 
            where KodeBarang='$kode'");
        return $query->getRow();
    }

    public function getDetailM($kodeBarang)
    {
        $db = db_connect();
        $data= $db->query(
            "SELECT * from barang 
            where KodeBarang='$kodeBarang'");
        return $data->getResultObject();
    }
}
