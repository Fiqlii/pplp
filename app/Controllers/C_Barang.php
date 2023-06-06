<?php

namespace App\Controllers;

use App\Models\M_Barang;
use CodeIgniter\Controller;
use App\Models\M_Cart;

class C_Barang extends Controller
{
    protected $M_Barang;
    protected $M_Cart;
    public function __construct()
	{
        $this->M_Barang = new M_Barang();
        $this->M_Cart = new M_Cart();
	}

    public function index()
    {
        $barang = $this->M_Barang ->getBarang();
        $data = $this->M_Cart->getAllJoinWBarang();
        return view('barang/V_Barang', compact('barang', 'data'));
    }

    // public function detail($kodeBarang)
    // {
    //     $model = new M_Barang();
    //     $data['barang'] = $model->getDetailM($kodeBarang);
    //     return view('barang/V_DetailBarang', $data);
    // }
}
