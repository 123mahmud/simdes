<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use DataTables;
use App\d_pindah_rt;
use App\d_penduduk;
use App\d_pekerjaan;
use App\kabupaten;

class pindahRtController extends Controller
{
	public function index()
	{

		return view('master.Pindah_RT.index');
	}

   public function get()
   {
      $data = d_pindah_rt::select('d_penduduk.*',
                                 'd_pekerjaan.nama as pekerjaan_nama',
                                 'd_pindah_rt.id as id_pindah_rt')
        ->join('d_penduduk','d_penduduk.id','=','d_pindah_rt.id_penduduk')
        ->join('d_pekerjaan','d_pekerjaan.id','=','d_penduduk.pekerjaan')
        ->get();

      return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('tempat_tgl_lahir', function($data) {
            return $data->tempat_lahir .'-'. $data->tgl_lahir;
        })        

        ->addColumn('action', function($data) {
                return  '<div class="text-center">'.
                            '<button class="btn btn-info btn-edit btn-sm" 
                                    onclick=detail("'.$data->id_pindah_rt.'")
                                    type="button" 
                                    title="Info">
                                    <i class="fa fa-exclamation-circle"></i>
                            </button>'.'
                            <button class="btn btn-warning btn-edit btn-sm" 
                                    onclick="window.location.href=\''. url("master/databarang/edit/".$data->id_pindah_rt) .'\'" 
                                    type="button" 
                                    title="Edit">
                                    <i class="fa fa-pencil"></i>
                            </button>'.'
                            <button class="btn btn-danger btn-sm" 
                                    id="destroy'.$data->id_pindah_rt.'"
                                    onclick="destroy('.$data->id_pindah_rt.')" 
                                    type="button" 
                                    title="Hapus">
                                    <i class="fa fa-times"></i>
                            </button>'.
                        '</div>';
        })
        ->rawColumns(['tempat_tgl_lahir', 'action'])
        ->make(true);
   }

   public function add()
   {

   	return view('master.Pindah_RT.add');
   }

   public function create(Request $request)
   {
      DB::beginTransaction();
        try {
            $penduduk = d_penduduk::findOrFail($request->id_penduduk);

            $pindah_rt = new d_pindah_rt;
            $pindah_rt->id_penduduk = $request->id_penduduk;
            $pindah_rt->rt_lama = $penduduk->rt;
            $pindah_rt->rw_lama = $penduduk->rw;
            $pindah_rt->rt_tujuan = $request->rt_tujuan;
            $pindah_rt->rw_tujuan = $request->rw_tujuan;
            $pindah_rt->tgl_pindah = date('Y-m-d',strtotime($request->tgl_pindah));
            $pindah_rt->keterangan = $request->keterangan;
            $pindah_rt->save();

            $penduduk = d_penduduk::findOrFail($request->id_penduduk);
            $penduduk->rt = $request->rt_tujuan;
            $penduduk->rw = $request->rw_tujuan;
            $penduduk->save();
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

   public function show($id)
   {
         $pindah_rt = d_pindah_rt::select('d_pindah_rt.*',
                             'd_penduduk.*')
            ->join('d_penduduk','d_penduduk.id','=','d_pindah_rt.id_penduduk')
            ->where('d_pindah_rt.id',$id)->first();
         $kabupaten = kabupaten::where('id',$pindah_rt->tempat_lahir)->first();
         $pekerjaan = d_pekerjaan::where('id',$pindah_rt->pekerjaan)->first();

         return response()->json([
            'nik' => $pindah_rt->nik,
            'nama' => $pindah_rt->nama,
            'urut_kk' => $pindah_rt->urut_kk,
            'kelamin' => $pindah_rt->kelamin,
            'tempat_lahir' => $kabupaten->name,
            'tgl_lahir' => date('d M Y', strtotime($pindah_rt->tgl_lahir)),
            'gol_darah' => $pindah_rt->gol_darah,
            'agama' => $pindah_rt->agama,
            'status_nikah' => $pindah_rt->status_nikah,
            'status_keluarga' => $pindah_rt->status_keluarga,
            'pendidikan' => $pindah_rt->pendidikan,
            'pekerjaan' => $pekerjaan->nama,
            'nama_ibu' => $pindah_rt->nama_ibu,
            'nama_ayah' => $pindah_rt->nama_ayah,
            'no_kk' => $pindah_rt->no_kk,
            'rt' => $pindah_rt->rt,
            'rw' => $pindah_rt->rw,
            'warga_negara' => $pindah_rt->warga_negara,
            'alamat_tujuan' => $pindah_rt->alamat_tujuan,
            'rt_lama' => $pindah_rt->rt_lama,
            'rw_lama' => $pindah_rt->rw_lama,
            'tgl_pindah' => date('d M Y', strtotime($pindah_rt->tgl_pindah)),
            'keterangan' => $pindah_rt->keterangan,
        ]);
   }

   public function distroy($id)
   {
    
   }

}
