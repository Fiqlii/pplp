<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_admin;

class C_auth extends BaseController
{
    protected $M_admin;
    public function __construct()
    {
        $this->M_admin = new M_admin();
    }

    public function index(){
        return view('V_Login');
    }

    public function login(){
        $session = session();
        $user_name = $this->request->getVar('user_name');
        $Password = ($this->request->getVar('password'));
        $where = ['user_name' => $user_name, 'password' => $Password];
        $data = $this->M_admin->getWhere($where);
        // dd($data );
        if($data){
            $ses_data = [
                'user_name'     => $data->user_name,
                'logged_in'     => true
            ];
            $session->set($ses_data);
            return redirect()->to('/mahasiswa');
        }else{
            $session->setFlashdata('msg', 'Akun Salah');
            return redirect()->to('/login');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}