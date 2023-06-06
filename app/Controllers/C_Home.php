<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class c_Home extends BaseController
{
    public function home()
    {
        if(session()->get('logged_in') == false){
            return redirect()->to('/login');
        }
        $title = "Page Home";
        return view('V_Home', compact('title'));
    }
}