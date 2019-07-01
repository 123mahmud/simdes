<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use DB;
use carbon\Carbon;
use App\MasterBarang;
use App\Http\Controllers\Controller;

class pendudukMasukController extends Controller
{
    public function index()
    {

        return view('master.Penduduk_Masuk.index');
    }

    public function create()
    {

        return view('master.Penduduk_Masuk.add');
    }

}

