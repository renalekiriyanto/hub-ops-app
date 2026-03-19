<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratCutiController extends Controller
{
    public function index()
    {
        return view('manage-surat.surat-cuti.index');
    }
}
