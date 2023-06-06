<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\M_Pegawai;


class C_Pegawai extends BaseController
{
    protected $pegawai;
    function __construct()
    {
        $this->pegawai = new M_Pegawai();
    }
    public function index()
    {
    if(! session()->get('logged_in')){
            return redirect()->to('/login'); 
        }
        
        $pegawai = new M_Pegawai();
        $data['pegawai'] = $pegawai->getAll();

        return view('V_Pegawai', $data);
    }

    public function create(){
        if(! session()->get('logged_in')){
            return redirect()->to('/login'); 
        }
        echo view('V_Create_Pegawai');
       }

       public function store()
    {
        // Load helper form dan set rules validasi
        helper('form');
        $rules = [
            'NIP' => 'required|integer|max_length[9]',
            'Nama' => 'required|max_length[75]',
            'Gender' => 'required|max_length[20]',
            'Telp' => 'required|integer|max_length[13]|min_length[10]',
            'Email' => 'required|valid_email|max_length[35]',
            'Pendidikan' => 'required|max_length[35]',
        ];
        

        // Set pesan kustom
        $validation = \Config\Services::validation();
        $validation->setRules($rules, [
            'NIP' => [
                'required' => 'NIP harus diisi',
                'integer' => 'NIP harus berupa angka',
                'max_length' => 'NIP maksimal terdiri dari 9 digit'
            ],
            'Nama' => [
                'required' => 'Nama harus diisi',
                'max_length' => 'Nama maksimal terdiri dari 75 karakter'
            ],
            'Gender' => [
                'required' => 'Jenis kelamin harus diisi',
                'max_length' => 'Jenis kelamin maksimal terdiri dari 20 karakter'
            ],
            'Telp' => [
                'required' => 'Nomor telepon harus diisi',
                'integer' => 'Nomor telepon harus berupa angka',
                'max_length' => 'Nomor telepon maksimal terdiri dari 13 digit'
            ],
            'Email' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid',
                'max_length' => 'Email maksimal terdiri dari 35 karakter'
            ],
            'Pendidikan' => [
                'required' => 'Pendidikan harus diisi',
                'max_length' => 'Pendidikan maksimal terdiri dari 35 karakter'
            ]
        ]);

        // Validasi input data
        if (!$this->validate($rules)) {
            $data['errors'] = $validation->getErrors();
            
            echo view('V_Create_Pegawai', $data);
            
        } else {
            $mahasiswaModel = new M_Pegawai();
            $data = [
                'NIP' => $this->request->getVar('NIP'),
                'Nama' => $this->request->getVar('Nama'),
                'Gender' => $this->request->getVar('Gender'),
                'Telp' => $this->request->getVar('Telp'),
                'Email' => $this->request->getVar('Email'),
                'Pendidikan' => $this->request->getVar('Pendidikan'),
            ];
            $mahasiswaModel->insertData($data);
            return $this->response->redirect(base_url('/pegawai'));
        }
    }

       

}
