<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function perencanaanpengiriman()
    {
    	return view('pengiriman/perencanaanpengiriman/perencanaanpengiriman');
    }
    public function tambah_perencanaanpengiriman()
    {
        return view('pengiriman/perencanaanpengiriman/tambah_perencanaanpengiriman');
    }    
    public function suratjalan()
    {
    	return view('pengiriman/suratjalan/suratjalan');
    }
    public function tambah_suratjalan()
    {
        return view('pengiriman/suratjalan/tambah_suratjalan');
    }    
    public function print_suratjalan()
    {
        return view('pengiriman/suratjalan/print_suratjalan');
    }      
    public function upahboronganpengiriman()
    {
    	return view('pengiriman/upahboronganpengiriman/upahboronganpengiriman');
    }
    public function proses_upahboronganpengiriman()
    {
        return view('pengiriman/upahboronganpengiriman/proses_upahboronganpengiriman');
    }
    public function proses_operasionaljalan()
    {
        return view('pengiriman/upahboronganpengiriman/proses_operasionaljalan');
    }    
}
