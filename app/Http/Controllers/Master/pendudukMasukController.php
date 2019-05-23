<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use DB;
use carbon\Carbon;
use App\MasterBarang;
use App\Http\Controllers\Controller;

class pendudukMasukController extends Controller
{
   public function dataarmada()
    {
        return view('master/pendudukMasuk/dataarmada');
    }
    public function tambah_dataarmada()
    {
        return view('master/pendudukMasuk/tambah_dataarmada');
    }



    public function tambah_dataarmada_customer()
    {
        return view('master/pendudukMasuk/tambah_dataarmada_customer');
    }
    
    public function tambah_dataarmada_own()
    {
        return view('master/pendudukMasuk/tambah_dataarmada_own');
    }

    public function save_dataarmada_own()
    {
         return DB::transaction(function() use ($request){

            

            
             return view('master/pendudukMasuk/tambah_dataarmada_own');
         });
    }    


    
    public function edit_dataarmada()
    {
        return view('master/pendudukMasuk/edit_dataarmada');
    }
    public function modal_dataarmada()
    {
        return view('master/pendudukMasuk/modal_dataarmada');
    }

}

