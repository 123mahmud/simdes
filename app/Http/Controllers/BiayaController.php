<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiayaController extends Controller
{
    public function alattuliskantor()
    {
    	return view('biayadanbeban/alattuliskantor/alattuliskantor');
    }
    public function biayabahanbakar()
    {
    	return view('biayadanbeban/biayabahanbakar/biayabahanbakar');
    }
    public function biayakesehatan()
    {
    	return view('biayadanbeban/biayakesehatan/biayakesehatan');
    }
    public function biayakonsumsi()
    {
    	return view('biayadanbeban/biayakonsumsi/biayakonsumsi');
    }
    public function biayaoperasional()
    {
    	return view('biayadanbeban/biayaoperasional/biayaoperasional');
    }
    public function maintenance()
    {
    	return view('biayadanbeban/maintenance/maintenance');
    }
    public function sewalahan()
    {
    	return view('biayadanbeban/sewalahan/sewalahan');
    }
    public function upahborongan()
    {
    	return view('biayadanbeban/upahborongan/upahborongan');
    }
    public function tambah_upahborongan()
    {
        return view('biayadanbeban/upahborongan/tambah_upahborongan');
    }    
    public function upahbulanan()
    {
    	return view('biayadanbeban/upahbulanan/upahbulanan');
    }
    public function tambah_upahbulanan()
    {
        return view('biayadanbeban/upahbulanan/tambah_upahbulanan');
    }
    public function upahharian()
    {
    	return view('biayadanbeban/upahharian/upahharian');
    }
    public function tambah_upahharian()
    {
        return view('biayadanbeban/upahharian/tambah_upahharian');
    }
    public function pengeluarankecil()
    {
        return view('biayadanbeban/pengeluarankecil/pengeluarankecil');
    }
    public function tambah_pengeluarankecil()
    {
        return view('biayadanbeban/pengeluarankecil/tambah_pengeluarankecil');
    }    
}
