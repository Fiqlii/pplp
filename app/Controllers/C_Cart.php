<?php

namespace App\Controllers;

use App\Models\M_Barang;
use App\Models\M_Cart;

class C_Cart extends BaseController
{
    protected $cart;
    protected $session;

    protected $barang;

    public function __construct()
	{
        $this->session = session();
        $this->cart = new M_Cart();
        $this->barang = new M_Barang();
	}

    public function index()
    {
        // $dataCart = $this->cart->getAllJoinWBarang();
        $session = session();
        $dataCart = $session->get('datacart');
        return view('barang/V_Cart', compact('dataCart'));
    }

    // public function index()
    // {
    //     $cart = session()->get('cart');
    //     $total_harga = $this->totalHarga();
    //     return view('v_shopping_cart', ['cart' => $cart, 'total_harga' => $total_harga]);
    // }


    public function savecart(){

        $session = session();
        
        $barang = $this->barang->getOne($this->request->getPost('KodeBarang'));
        $dataCart = $session->get('datacart');
        // if (is_object($barang) && property_exists($barang, 'Harga')) {
        if($dataCart){
            $arr = array_search($this->request->getPost('KodeBarang'), array_column($dataCart, 'KodeBarang'));
            if($arr !== false){
                $dataCart[$arr]['StokBarang'] += 1;
                    $session->set('datacart', $dataCart);
                    session()->setFlashdata('success', 'Data Berhasil Ditambahkan ke Cart');
                    return redirect()->to('/barang');
                    // ->with('success', 'Data Berhasil Ditambahkan ke Cart');
            }
        }
        $dataCart[] = ([
                'KodeBarang' => $this->request->getPost('KodeBarang'),
                'StokBarang' => 1,
                'HargaBarang' => $barang->HargaBarang,
                'FileBarang' => $barang->FileBarang
            ]);
            $session->set('datacart', $dataCart);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan ke Cart');
            return redirect()->to('/barang');
    }        
    
    public function deletecart($kode){
        //Retrieve the current cart items from the session
        $cartItems = session('datacart') ?? [];

        // Loop through the cart items to find the item with the matching kode
        foreach($cartItems as $index => $item){
            if($item['KodeBarang'] == $kode){
                // Remove the item from the cart array
                unset($cartItems[$index]);
                // Save the updated cart array back to the session
                session()->set('datacart', $cartItems);
                // Redirect back to the cart page
                return redirect()->to('/cart');
            }
        }
        // If the item was not found in the cart, redirect back to the cart page
        return redirect()->to('/cart');
    }

}
