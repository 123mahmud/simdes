<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use carbon\Carbon;
use CodeGenerator;
use Yajra\DataTables\DataTables;
use Crypt;
use App\d_kematian;
use App\d_penduduk;
use App\d_pekerjaan;
use App\kabupaten;

class kematianController extends Controller
{

   public function index()
   {

      return view('master.Kematian.index');
   }

   public function get()
   {
      $data = d_kematian::select('d_kematian.id as id_kematian',
                                 'd_kematian.tempat_meninggal',
                                 'd_kematian.tanggal_meninggal',
                                 'd_penduduk.*')
         ->join('d_penduduk','d_penduduk.id','=','d_kematian.id_penduduk')
         ->get();

      return Datatables::of($data)
         ->addIndexColumn()     
         ->addColumn('tanggal_meninggal', function($data) {
            return date('d M Y', strtotime($data->tanggal_meninggal));
         }) 

         ->addColumn('action', function($data) {
               return  '<div class="text-center">'.
                           '<button class="btn btn-info btn-edit btn-sm" 
                                    onclick=detail("'.$data->id_kematian.'")
                                    type="button" 
                                    title="Info">
                                    <i class="fa fa-exclamation-circle"></i>
                           </button>'.'
                           <button class="btn btn-warning btn-edit btn-sm" 
                                    onclick="window.location.href=\''. url("master/databarang/edit/".$data->id_kematian) .'\'" 
                                    type="button" 
                                    title="Edit">
                                    <i class="fa fa-pencil"></i>
                           </button>'.'
                           <button class="btn btn-danger btn-sm" 
                                    id="destroy'.$data->id_kematian.'"
                                    onclick="destroy('.$data->id_kematian.')" 
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

      return view('master.Kematian.add');
   }

   public function autocomplete(Request $request)
   {
      $term = $request->term;
      $items = d_penduduk::where('nik', 'like', '%'.$term.'%')
      ->where('active',1)
      ->get();
   
      if (sizeof($items) > 0) {
        foreach ($items as $item) {
          $results[] = [
            $tempatLahir = kabupaten::where('id',$item->tempat_lahir)->first(),
            $pekerjaan = d_pekerjaan::where('id',$item->pekerjaan)->first(),
            'label' => $item->nik .', '. $item->nama,
            'id' => $item->id,
            'nik' => $item->nik,
            'nama' => $item->nama,
            'urut_kk' => $item->urut_kk,
            'kelamin' => $item->kelamin,
            'tempat_lahir' => $tempatLahir->name,
            'tgl_lahir' => $item->tgl_lahir,
            'gol_darah' => $item->gol_darah,
            'agama' => $item->agama,
            'status_nikah' => $item->status_nikah,
            'status_keluarga' => $item->status_keluarga,
            'pendidikan' => $item->pendidikan,
            'pekerjaan' => $pekerjaan->nama,
            'nama_ibu' => $item->nama_ibu,
            'nama_ayah' => $item->nama_ayah,
            'no_kk' => $item->no_kk,
            'rt' => $item->rt,
            'rw' => $item->rw,
            'warga_negara' => $item->warga_negara,
          ];
        }
      } else {

        $results[] = ['id' => null, 'label' => 'Tidak ditemukan data terkait'];
      }
      return response()->json($results);
   }

   public function create(Request $request)
   {
      DB::beginTransaction();
        try {
            $kematian = new d_kematian;
            $kematian->id_penduduk = $request->id_penduduk;
            $kematian->tempat_meninggal = $request->tempat_meninggal;
            $kematian->sebab_meninggal = $request->sebab_meninggal;
            $kematian->tanggal_meninggal = date('Y-m-d',strtotime($request->tanggal_meninggal));
            $kematian->save();

            $penduduk = d_penduduk::findOrFail($request->id_penduduk);
            $penduduk->active = $penduduk->active == 1 ? 0 : 1;
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
      $kematian = d_kematian::select('d_kematian.id as id_kematian',
                                 'd_kematian.tempat_meninggal',
                                 'd_kematian.sebab_meninggal',
                                 'd_kematian.tanggal_meninggal',
                                 'd_penduduk.*')
         ->join('d_penduduk','d_penduduk.id','=','d_kematian.id_penduduk')
         ->where('d_kematian.id',$id)->first();
      $pekerjaan = d_pekerjaan::where('id',$kematian->pekerjaan)->first();
      $kabupaten = kabupaten::where('id',$kematian->tempat_lahir)->first();

      return response()->json([
         'nik' => $kematian->nik,
         'nama' => $kematian->nama,
         'urut_kk' => $kematian->urut_kk,
         'kelamin' => $kematian->kelamin,
         'tempat_lahir' => $kabupaten->name,
         'tgl_lahir' => date('d M Y', strtotime($kematian->tgl_lahir)),
         'gol_darah' => $kematian->gol_darah,
         'agama' => $kematian->agama,
         'status_nikah' => $kematian->status_nikah,
         'status_keluarga' => $kematian->status_keluarga,
         'pendidikan' => $kematian->pendidikan,
         'pekerjaan' => $pekerjaan->nama,
         'nama_ibu' => $kematian->nama_ibu,
         'nama_ayah' => $kematian->nama_ayah,
         'no_kk' => $kematian->no_kk,
         'rt' => $kematian->rt,
         'rw' => $kematian->rw,
         'warga_negara' => $kematian->warga_negara,
         'tempat_meninggal' => $kematian->tempat_meninggal,
         'sebab_meninggal' => $kematian->sebab_meninggal,
         'tanggal_meninggal' => date('d M Y', strtotime($kematian->tanggal_meninggal)),
      ]);
   }

   public function destroy(Request $request)
   {
         $kematian = d_kematian::where('id',$request->id)->first();
         $penduduk = d_penduduk::findOrFail($kematian->id_penduduk);
         DB::beginTransaction();
         try {
            $penduduk->active = 1;
            $penduduk->save();
            $kematian->delete();
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
