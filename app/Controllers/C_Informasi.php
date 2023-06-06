<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class C_Informasi extends BaseController
{
    public function informasi()
    {
        $title = "Page Informasi";
        return view('V_Informasi', compact('title'));
    }
}