<?php


namespace App\Models;
use App\Controllers\C_Pegawai;

use CodeIgniter\Model;


class M_Pegawai extends Model 
{
    protected $table = "pegawai";
    protected $primaryKey = "NIP";
    protected $useAutoIncrement = false;
    protected $returnType = "object";


    protected $allowedFields = [
        'NIP' ,
        'Nama' ,
        'Gender',
        'Telp',
        'Email',
        'Pendidikan'
    ];
    public function getAll(){
        $query = $this->db->query("SELECT * FROM pegawai");
        return $query->getResult();
    }

    public function insertData($data){
        $NIP = $data ['NIP'];
        $Nama = $data ['Nama'];
        $Gender = $data ['Gender'];
        $Telp = $data ['Telp'];
        $Email = $data ['Email'];
        $Pendidikan = $data ['Pendidikan'];
        $db = \Config\Database::connect();
        $query = $db->query("INSERT INTO pegawai (NIP, Nama, Gender, Telp, Email, Pendidikan) VALUES ('$NIP', '$Nama', '$Gender', '$Telp', '$Email', '$Pendidikan')");


    }
    public function getOne($NIP)
    {
       $query = $this->db->query("SELECT * FROM pegawai where NIP='$NIP'");
       return $query->getRow();
    }
}


