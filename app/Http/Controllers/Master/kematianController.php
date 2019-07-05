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
      $data = d_kematian::join('d_penduduk','d_penduduk.id','=','d_kematian.id_penduduk')
         ->get();

      return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('rt/rw', function($data) {
            return $data->rt .'/'. $data->rw;
        })        

        ->addColumn('action', function($data) {
                return  '<div class="text-center">'.
                           '<button class="btn btn-info btn-edit btn-sm" 
                                    onclick="window.location.href=\''. url("master/databarang/edit/".$data->id) .'\'" 
                                    type="button" 
                                    title="Info">
                                    <i class="fa fa-exclamation-circle"></i>
                           </button>'.'
                           <button class="btn btn-warning btn-edit btn-sm" 
                                    onclick="window.location.href=\''. url("master/databarang/edit/".$data->id) .'\'" 
                                    type="button" 
                                    title="Edit">
                                    <i class="fa fa-pencil"></i>
                           </button>'.'
                           <button class="btn btn-danger btn-edit btn-sm" 
                                    onclick="window.location.href=\''. url("master/databarang/edit/".$data->id) .'\'" 
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
}
