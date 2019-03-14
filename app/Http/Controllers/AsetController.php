<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function datagolongan()
    {
    	return view('aset/datagolongan/datagolongan');
    }
    public function tambah_datagolongan()
    {
    	return view('aset/datagolongan/tambah_datagolongan');
    }
    public function dataaset()
    {
    	return view('aset/dataaset/dataaset');
    }
    public function tambah_dataaset()
    {
    	return view('aset/dataaset/tambah_dataaset');
    }    
}
