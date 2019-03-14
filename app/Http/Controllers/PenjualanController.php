<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function diskonpenjualan()
    {
    	return view('penjualan/diskonpenjualan/diskonpenjualan');
    }
    public function tambah_diskonpenjualan()
    {
        return view('penjualan/diskonpenjualan/tambah_diskonpenjualan');
    }
    public function penjualanorder()
    {
    	return view('penjualan/penjualanorder/penjualanorder');
    }
    public function penjualanproject()
    {
    	return view('penjualan/penjualanproject/penjualanproject');
    }
    public function penjualantanpaorder()
    {
    	return view('penjualan/penjualantanpaorder/penjualantanpaorder');
    }
    public function tambah_penjualantanpaorder()
    {
        return view('penjualan/penjualantanpaorder/tambah_penjualantanpaorder');
    }    
    public function returnpenjualan()
    {
    	return view('penjualan/returnpenjualan/returnpenjualan');
    }
    public function tambah_returnpenjualan()
    {
        return view('penjualan/returnpenjualan/tambah_returnpenjualan');
    }

}
