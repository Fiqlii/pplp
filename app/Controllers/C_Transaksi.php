<?php

namespace App\Controllers;

use App\Models\M_Barang;
use App\Models\M_Transaksi;
use App\Models\M_Item;
use Config\Services;
use DateTimeZone;
use DateTime;

class C_Trans extends BaseController
{
    public function checkout()
    {
        $request = Services::request();
        $session = session();

        $M_Item = new M_Item();
        $M_Transaksi = new M_Transaksi();
        $M_barang = new M_Barang();

        $countTrans = $M_Transaksi->countAllData()[0]['COUNT(*)'] + 1;

        $nama = $request->getPost('nama');
        $no_hp = $request->getPost('no_hp');
        $alamat = $request->getPost('alamat');
        $kode_pos = $request->getPost('kode_pos');

        $tanggal = new DateTime("now", new DateTimeZone('Asia/Jakarta'));

        $data = [
            'id_transaksi' => $countTrans,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'tanggal' => $tanggal->format('Y-m-d H:i:s'),
            'kode_pos' => $kode_pos,
        ];

        $M_Transaksi->insertData($data);
        $cart = session()->get('cart') ?? array();
        $sub_total = 0;
        foreach ($cart as $cart_item) {
            $data = [
                'id_cart' => $cart_item['id_cart'],
                'id_transaksi' => $countTrans,
                'harga_jual' => $cart_item['harga'],
                'jumlah_jual' => $cart_item['jumlah'],
                'stok_barang_baru' => ($M_barang->getBarang($cart_item['id_cart'])[0]['stock'] - $cart_item['jumlah']),
            ];

            $M_Item->insertData($data);

            $M_barang->updateStok($data);

            $sub_total += $cart_item['harga'] * $cart_item['jumlah'];
        }

        $data = [
            'id_transaksi' => $countTrans,
            'total_trans' => $sub_total,
        ];

        $M_Transaksi->updateTotalTrans($data);

        return redirect('proses_hapus_semua_cart');
    }
}