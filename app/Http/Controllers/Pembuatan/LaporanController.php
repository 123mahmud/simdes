<?php

namespace App\Http\Controllers\Pembuatan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_pegawai_man;
use App\d_laporan;
use App\d_kelahiran;
use App\d_kematian;
use App\d_penduduk_masuk;
use App\d_penduduk_keluar;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = m_pegawai_man::join('m_jabatan','m_jabatan.c_id','m_pegawai_man.c_jabatan_id')
            ->where('m_pegawai_man.c_isactive','TRUE')
            ->get();
        return view('pembuatan.laporan.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laporan = d_laporan::all();
        if ($laporan[0]->laporan == 'd_kelahiran') {
            $data = d_kelahiran::select('d_penduduk.nik',
                                        'd_penduduk.nama',
                                        'kabupaten.name',
                                        'd_penduduk.tgl_lahir',
                                        'd_penduduk.kelamin',
                                        'd_penduduk.rt',
                                        'd_penduduk.rw')
                ->join('d_penduduk','d_penduduk.id','=','d_kelahiran.id_penduduk')
                ->join('kabupaten','kabupaten.id','=','d_penduduk.tempat_lahir')
                ->whereBetween('d_kelahiran.created_at', [$laporan[0]->tanggal1, $laporan[0]->tanggal2])
                ->get();
        }elseif ($laporan[0]->laporan == 'd_kematian') {
            $data = d_kematian::select('d_penduduk.nik',
                                        'd_penduduk.nama',
                                        'kabupaten.name',
                                        'd_penduduk.tgl_lahir',
                                        'd_penduduk.kelamin',
                                        'd_penduduk.rt',
                                        'd_penduduk.rw')
                ->join('d_penduduk','d_penduduk.id','=','d_kematian.id_penduduk')
                ->join('kabupaten','kabupaten.id','=','d_penduduk.tempat_lahir')
                ->whereBetween('d_kematian.created_at', [$laporan[0]->tanggal1, $laporan[0]->tanggal2])
                ->get();
        }elseif ($laporan[0]->laporan == 'd_penduduk_masuk') {
            $data = d_penduduk_masuk::select('d_penduduk.nik',
                                        'd_penduduk.nama',
                                        'kabupaten.name',
                                        'd_penduduk.tgl_lahir',
                                        'd_penduduk.kelamin',
                                        'd_penduduk.rt',
                                        'd_penduduk.rw')
                ->join('d_penduduk','d_penduduk.id','=','d_penduduk_masuk.id_penduduk')
                ->join('kabupaten','kabupaten.id','=','d_penduduk.tempat_lahir')
                ->whereBetween('d_penduduk_masuk.created_at', [$laporan[0]->tanggal1, $laporan[0]->tanggal2])
                ->get();
        }elseif ($laporan[0]->laporan == 'd_penduduk_keluar') {
            $data = d_penduduk_keluar::select('d_penduduk.nik',
                                        'd_penduduk.nama',
                                        'kabupaten.name',
                                        'd_penduduk.tgl_lahir',
                                        'd_penduduk.kelamin',
                                        'd_penduduk.rt',
                                        'd_penduduk.rw')
                ->join('d_penduduk','d_penduduk.id','=','d_penduduk_keluar.id_penduduk')
                ->join('kabupaten','kabupaten.id','=','d_penduduk.tempat_lahir')
                ->whereBetween('d_penduduk_keluar.created_at', [$laporan[0]->tanggal1, $laporan[0]->tanggal2])
                ->get();
        }
        return view('pembuatan.laporan.laporan',compact('laporan','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        DB::beginTransaction();
        try {
            $request->validate([
                'tanggal1' => 'required',
                'tanggal2' => 'required'
            ]);
            $laporan = d_laporan::find(1);
            $laporan->tanggal1 = date('Y-m-d',strtotime($request->tanggal1));
            $laporan->tanggal2 = date('Y-m-d',strtotime($request->tanggal2));
            $laporan->laporan = $request->laporan;
            $laporan->save();
        DB::commit();
        return response()->json([
         'status' => 'sukses'
        ]);
        } catch (\Exception $e) {
        DB::rollback();
            return response()->json([
            'status' => 'gagal',
            'data' => $e
         ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
