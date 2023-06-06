<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Item extends Model
{
    protected $table = 'item';

    protected $allowedFields = ['id', 'id_transaksi', 'harga_item', 'jumlah_item'];

    public function getAllData()
    {
        $sql_query = 'SELECT * FROM item';
        return $this->db->query($sql_query)->getResultArray();
    }

    public function insertData($data)
    {
        $sql_query = "INSERT INTO item VALUES('" . $data['id'] . "', '" . $data['id_transaksi'] . "', '" . $data['harga_item'] . "', '" . $data['jumlah_item'] . "')";
        return $this->db->query($sql_query);
    }

}
?>