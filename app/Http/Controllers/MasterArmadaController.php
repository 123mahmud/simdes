<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use carbon\Carbon;
use App\MasterBarang;

class MasterArmadaController extends Controller
{
   public function dataarmada()
    {
        return view('master/dataarmada/dataarmada');
    }
    public function tambah_dataarmada()
    {
        return view('master/dataarmada/tambah_dataarmada');
    }



    public function tambah_dataarmada_customer()
    {
        return view('master/dataarmada/tambah_dataarmada_customer');
    }
    
    public function tambah_dataarmada_own()
    {
        return view('master/dataarmada/tambah_dataarmada_own');
    }

    public function save_dataarmada_own()
    {
         return DB::transaction(function() use ($request){

            

            
             return view('master/dataarmada/tambah_dataarmada_own');
         });
    }    


    
    public function edit_dataarmada()
    {
        return view('master/dataarmada/edit_dataarmada');
    }
    public function modal_dataarmada()
    {
        return view('master/dataarmada/modal_dataarmada');
    }

}

