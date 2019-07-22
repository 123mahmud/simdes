<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use carbon\Carbon;
use App\MasterBarang;
use DataTables;
use App\d_kelahiran;
use App\d_penduduk;
use App\kabupaten;
use App\d_pekerjaan;
use Crypt;

class kelahiranController extends Controller
{
    public function index()
    {

    	return view('master.Kelahiran.index');
    }

    public function get()
    {
      $data = d_kelahiran::select('d_kelahiran.id as id_kelahiran','d_penduduk.*')
         ->join('d_penduduk','d_penduduk.id','=','d_kelahiran.id_penduduk')
         ->where('active',1)
         ->get();

      return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('tempat_tgl_lahir', function($data) {
            $tempat_lahir = kabupaten::select('name')->where('id',$data->tempat_lahir)->first();
            return  $tempat_lahir->name .', '. date('d M Y', strtotime($data->tgl_lahir));
        })        

        ->addColumn('action', function($data) {
                return  '<div class="text-center">'.
                            '<button class="btn btn-info btn-sm" 
                                    onclick=detail("'.$data->id_kelahiran.'") 
                                    type="button" 
                                    title="Info">
                                    <i class="fa fa-exclamation-circle"></i>
                            </button>'.'
                            <button class="btn btn-warning btn-edit btn-sm" 
                                    onclick=edit("'.Crypt::encrypt($data->id_kelahiran).'")
                                    type="button" 
                                    title="Edit">
                                    <i class="fa fa-pencil"></i>
                            </button>'.'
                            <button class="btn btn-danger btn-sm" 
                                    id="destroy'.$data->id_kelahiran.'"
                                    onclick="destroy('.$data->id_kelahiran.')" 
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
      $kabupaten = kabupaten::all();
      $pekerjaan = d_pekerjaan::all();   
                
      return view('master.Kelahiran.add',compact('kabupaten','pekerjaan'));
   }

   public function create(Request $request)
   {
      DB::beginTransaction();
        try {
            $penduduk = new d_penduduk;
            $penduduk->id = d_penduduk::max('id')+1;
            $penduduk->nik = $request->nik;
            $penduduk->nama = $request->nama;
            $penduduk->urut_kk = $request->urut_kk;
            $penduduk->kelamin = $request->kelamin;
            $penduduk->tempat_lahir = $request->tempat_lahir;
            $penduduk->tgl_lahir = date('Y-m-d',strtotime($request->tgl_lahir));
            $penduduk->gol_darah = $request->gol_darah;
            $penduduk->agama = $request->agama;
            $penduduk->status_nikah = $request->status_nikah;
            $penduduk->status_keluarga = $request->status_keluarga;
            $penduduk->pendidikan = $request->pendidikan;
            $penduduk->pekerjaan = $request->pekerjaan;
            $penduduk->nama_ibu = $request->nama_ibu;
            $penduduk->nama_ayah = $request->nama_ayah;
            $penduduk->no_kk = $request->no_kk;
            $penduduk->rt = $request->rt;
            $penduduk->rw = $request->rw;
            $penduduk->warga_negara = $request->warga_negara;
            $penduduk->save();

            $kelahiran = new d_kelahiran;
            $kelahiran->id_penduduk = $penduduk->id;
            $kelahiran->save();

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

   public function destroy(Request $request)
   {
         $kelahiran = d_kelahiran::where('id',$request->id)->first();
         $penduduk = d_penduduk::findOrFail($kelahiran->id_penduduk);
         DB::beginTransaction();
         try {
            $penduduk->delete();
            $kelahiran->delete();
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
      $kelahiran = d_kelahiran::select('d_kelahiran.id as id_kelahiran','d_penduduk.*')
         ->join('d_penduduk','d_penduduk.id','=','d_kelahiran.id_penduduk')
         ->where('d_kelahiran.id',$id)->first();
      $pekerjaan = d_pekerjaan::where('id',$kelahiran->pekerjaan)->first();
      $kabupaten = kabupaten::where('id',$kelahiran->tempat_lahir)->first();

      return response()->json([
         'nik' => $kelahiran->nik,
         'nama' => $kelahiran->nama,
         'urut_kk' => $kelahiran->urut_kk,
         'kelamin' => $kelahiran->kelamin,
         'tempat_lahir' => $kabupaten->name,
         'tgl_lahir' => date('d M Y', strtotime($kelahiran->tgl_lahir)),
         'gol_darah' => $kelahiran->gol_darah,
         'agama' => $kelahiran->agama,
         'status_nikah' => $kelahiran->status_nikah,
         'status_keluarga' => $kelahiran->status_keluarga,
         'pendidikan' => $kelahiran->pendidikan,
         'pekerjaan' => $pekerjaan->nama,
         'nama_ibu' => $kelahiran->nama_ibu,
         'nama_ayah' => $kelahiran->nama_ayah,
         'no_kk' => $kelahiran->no_kk,
         'rt' => $kelahiran->rt,
         'rw' => $kelahiran->rw,
         'warga_negara' => $kelahiran->warga_negara,
      ]);
   }

   public function edit(Request $request)
   {
      $kelahiran = d_kelahiran::where('id', Crypt::decrypt($request->id))->first();
      $penduduk = d_penduduk::where('id', $kelahiran->id_penduduk)->first();
      $kabupaten = kabupaten::all();
      $pekerjaan = d_pekerjaan::all();

      return view('master.Kelahiran.edit',compact('penduduk','kabupaten','pekerjaan','kelahiran'));
   }

   public function update(Request $request)
   {
        DB::beginTransaction();
        try {
            $kelahiran = d_kelahiran::find(Crypt::decrypt($request->id));

            $penduduk = d_penduduk::find($kelahiran->id_penduduk);
            $penduduk->nik = $request->nik;
            $penduduk->nama = $request->nama;
            $penduduk->urut_kk = $request->urut_kk;
            $penduduk->kelamin = $request->kelamin;
            $penduduk->tempat_lahir = $request->tempat_lahir;
            $penduduk->tgl_lahir = date('Y-m-d',strtotime($request->tgl_lahir));
            $penduduk->gol_darah = $request->gol_darah;
            $penduduk->agama = $request->agama;
            $penduduk->status_nikah = $request->status_nikah;
            $penduduk->status_keluarga = $request->status_keluarga;
            $penduduk->pendidikan = $request->pendidikan;
            $penduduk->pekerjaan = $request->pekerjaan;
            $penduduk->nama_ibu = $request->nama_ibu;
            $penduduk->nama_ayah = $request->nama_ayah;
            $penduduk->no_kk = $request->no_kk;
            $penduduk->rt = $request->rt;
            $penduduk->rw = $request->rw;
            $penduduk->warga_negara = $request->warga_negara;
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
 
}

