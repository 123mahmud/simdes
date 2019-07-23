<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\d_kelahiran;
use App\d_kematian;
use App\d_penduduk_masuk;
use App\d_penduduk_keluar;
use App\d_pindah_rt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = DB::table('d_penduduk')
                        ->where('active', 1)
                        ->count();

        $kelahiran = d_kelahiran::select('d_kelahiran.id as id_kelahiran','d_penduduk.*')
             ->join('d_penduduk','d_penduduk.id','=','d_kelahiran.id_penduduk')
             ->where('active',1)
             ->count();

        $kematian = d_kematian::select('d_kematian.id as id_kematian',
                                 'd_kematian.tempat_meninggal',
                                 'd_kematian.tanggal_meninggal',
                                 'd_penduduk.*')
         ->join('d_penduduk','d_penduduk.id','=','d_kematian.id_penduduk')
         ->count();
        
        $penduduk_masuk = d_penduduk_masuk::select('d_penduduk.*',
                                        'd_pekerjaan.nama as pekerjaan_nama',
                                        'd_penduduk_masuk.id as id_penduduk_masuk',
                                        'd_penduduk_masuk.*')
        ->join('d_penduduk','d_penduduk.id','=','d_penduduk_masuk.id_penduduk')
        ->join('d_pekerjaan','d_pekerjaan.id','=','d_penduduk.pekerjaan')
        ->count();

        $penduduk_keluar = d_penduduk_keluar::select('d_penduduk.*',
                                        'd_pekerjaan.nama as pekerjaan_nama',
                                        'd_penduduk_keluar.id as id_penduduk_keluar')
        ->join('d_penduduk','d_penduduk.id','=','d_penduduk_keluar.id_penduduk')
        ->join('d_pekerjaan','d_pekerjaan.id','=','d_penduduk.pekerjaan')
        ->count();

        $pindah_rt = d_pindah_rt::select('d_penduduk.*',
                                 'd_pekerjaan.nama as pekerjaan_nama',
                                 'd_pindah_rt.id as id_pindah_rt')
        ->join('d_penduduk','d_penduduk.id','=','d_pindah_rt.id_penduduk')
        ->join('d_pekerjaan','d_pekerjaan.id','=','d_penduduk.pekerjaan')
        ->count();
        return view('home',compact('penduduk','kelahiran','kematian','penduduk_masuk','penduduk_keluar','pindah_rt'));
    }
}
