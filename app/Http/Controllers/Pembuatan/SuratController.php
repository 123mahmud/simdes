<?php

namespace App\Http\Controllers\Pembuatan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\d_surat;
use App\d_penduduk;
use App\surat;
use App\kabupaten;
use App\d_pekerjaan;
use App\kecamatan;
use DB;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pegawai = DB::table('m_pegawai_man')
            ->select('m_pegawai_man.c_id as id_pegawai',
                    'm_jabatan.c_posisi as posisi',
                    'm_pegawai_man.c_nama as nama')
            ->join('m_jabatan','m_jabatan.c_id','m_pegawai_man.c_jabatan_id')
            ->where('m_pegawai_man.c_isactive','TRUE')
            ->get();
        return view('pembuatan.surat.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surat = d_surat::all();
        $penduduk = d_penduduk::where('id',$surat[0]->id_penduduk)->first();
        $pegawai = DB::table('m_pegawai_man')->select('m_pegawai_man.c_nama as nama','m_jabatan.c_posisi')
            ->join('m_jabatan','m_jabatan.c_id','=','m_pegawai_man.c_jabatan_id')
            ->where('m_pegawai_man.c_id',$surat[0]->id_pegawai)->first();
        $kode = surat::all();
        $kabupaten = kabupaten::where('id',$penduduk->tempat_lahir)->first();
        $pekerjaan = d_pekerjaan::where('id',$penduduk->pekerjaan)->first();
        $kecamatan = kecamatan::where('kabupaten_id',$kabupaten->id)->first();
        $desa = DB::table('desa')->where('kecamatan_id',$kecamatan->id)->first();
        $provinsi = DB::table('provinsi')->where('id',$kabupaten->provinsi_id)->first();
        return view('pembuatan.surat.create',compact('surat','penduduk','pegawai','kode','kabupaten','pekerjaan','kecamatan','desa','provinsi'));
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
                'id_penduduk' => 'required',
                'tgl_surat' => 'required',
                'tgl_berlaku' => 'required',
                'keperluan' => 'required',
                'keterangan' => 'required',
                'id_pegawai' => 'required'
            ]);
            $surat = d_surat::find(1);
            $surat->id_penduduk = $request->id_penduduk;
            $surat->tgl_surat = date('Y-m-d',strtotime($request->tgl_surat));
            $surat->tgl_berlaku = date('Y-m-d',strtotime($request->tgl_berlaku));
            $surat->keperluan = $request->keperluan;
            $surat->keterangan = $request->keterangan;
            $surat->id_pegawai = $request->id_pegawai;
            $surat->save();
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
