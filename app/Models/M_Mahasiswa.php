<?php
namespace App\Models;
use CodeIgniter\Model;
class M_Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $returnType = 'object';

    public function getmahasiswa()
    {
        return $this->findAll();
    }
    
    public function GetData()
    {
        $query = $this->db->query("SELECT * FROM mahasiswa");
        return $query->getResult();
    }
    public function saveMahasiswa($data)
    {
        return $this->db->table('mahasiswa')->insert($data);
    }
    public function Detail($Nim)
    {
        $query = $this->db->query("SELECT * FROM mahasiswa WHERE Nim = '$Nim'");
        return $query->getResultArray();
    }
    public function getSearch($search){
        $query = $this->db->query("SELECT * FROM mahasiswa WHERE nama LIKE '%$search%'");
        return $query->getResult();
    }
    // public function update ($data)
    // {
    //     $query = $this->db->table('mahasiswa')->update($data, array('Nim' => $data['Nim']));
    //     return $query;
    // }
    public function updated($data)
    {
        $Nim =  $data['Nim'];
        $Nama = $data['Nama'];
        $Umur = $data['Umur'];
        $query = $this->db->query("UPDATE mahasiswa SET Nama='$Nama', Umur='$Umur' WHERE Nim='$Nim'");
        return $query;
    }
}