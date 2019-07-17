<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use DB;
use carbon\Carbon;
use App\MasterBarang;
use App\Http\Controllers\Controller;
use App\d_penduduk_masuk;
use Yajra\DataTables\DataTables;
use App\kabupaten;
use App\d_pekerjaan;
use App\provinsi;
use App\kecamatan;
use Response;
use App\d_penduduk;

class pendudukMasukController extends Controller
{
    public function index()
    {

        return view('master.Penduduk_Masuk.index');
    }

    public function add()
    {
        $pekerjaan = d_pekerjaan::all();
        $kabupaten = kabupaten::all();
        $provinsi = provinsi::all();
        $kecamatan = kecamatan::all();

        return view('master.Penduduk_Masuk.add',compact('pekerjaan','provinsi','kabupaten','kecamatan'));
    }

    public function get()
    {
    	$data = d_penduduk_masuk::select('d_penduduk.*',
                                        'd_pekerjaan.nama as pekerjaan_nama',
                                        'd_penduduk_masuk.id as id_penduduk_masuk',
                                        'd_penduduk_masuk.*')
    	->join('d_penduduk','d_penduduk.id','=','d_penduduk_masuk.id_penduduk')
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
                                    onclick=detail("'.$data->id_penduduk_masuk.'")
                                    type="button" 
                                    title="Info">
                                    <i class="fa fa-exclamation-circle"></i>
                            </button>'.'
                            <button class="btn btn-warning btn-edit btn-sm" 
                                    onclick="window.location.href=\''. url("master/databarang/edit/".$data->id_penduduk_masuk) .'\'" 
                                    type="button" 
                                    title="Edit">
                                    <i class="fa fa-pencil"></i>
                            </button>'.'
                            <button class="btn btn-danger btn-sm" 
                                    id="destroy'.$data->id_penduduk_masuk.'"
                                    onclick="destroy('.$data->id_penduduk_masuk.')" 
                                    type="button" 
                                    title="Hapus">
                                    <i class="fa fa-times"></i>
                            </button>'.
                        '</div>';
        })
        ->rawColumns(['tempat_tgl_lahir', 'action'])
        ->make(true);
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

            $penduduk_masuk = new d_penduduk_masuk;
            $penduduk_masuk->id_penduduk = $penduduk->id;
            $penduduk_masuk->alamat_asal = $request->alamat_asal;
            $penduduk_masuk->rt_asal = $request->rt_asal;
            $penduduk_masuk->kecamatan_asal = $request->kecamatan_asal;
            $penduduk_masuk->kabupaten_asal = $request->kabupaten_asal;
            $penduduk_masuk->provinsi_asal = $request->provinsi_asal;
            $penduduk_masuk->tgl_pindah = date('Y-m-d',strtotime($request->tgl_pindah));
            $penduduk_masuk->keterangan = $request->keterangan;
            $penduduk_masuk->save();
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

    public function autocomplete(Request $request)
    {
    	$term = $request->term;
		$items = kecamatan::where('name', 'LIKE', '%'.$term.'%')->take(25)->get();

		if (sizeof($items) > 0) {
		foreach ($items as $item) {
		  $results[] = [
		    				'id' => $item->id, 
		    				'label' => $item->name,
      						'text' => $item->name,
      						$kabupaten = kabupaten::where('id',$item->kabupaten_id)->first(),
      						'id_kabupaten' => $kabupaten->id,
      						'nama_kabupaten' => $kabupaten->name,
      						$provinsi = provinsi::where('id',$kabupaten->provinsi_id)->first(),
      						'id_provinsi' => $provinsi->id,
      						'nama_provinsi' => $provinsi->name
		  ];
		}
		} else {

		$results[] = ['id' => null, 'label' => 'Tidak ditemukan data terkait'];
		}
		
		return response()->json($results);
	}

   public function show($id)
   {
        $penduduk_masuk = d_penduduk_masuk::select('d_penduduk_masuk.*',
                             'd_penduduk.*')
            ->join('d_penduduk','d_penduduk.id','=','d_penduduk_masuk.id_penduduk')
            ->where('d_penduduk_masuk.id',$id)->first();

        $pekerjaan = d_pekerjaan::where('id',$penduduk_masuk->pekerjaan)->first();
        $kabupaten = kabupaten::where('id',$penduduk_masuk->tempat_lahir)->first();
        $kecamatan_asal = kecamatan::where('id',$penduduk_masuk->kecamatan_asal)->first();
        $kabupaten_asal = kabupaten::where('id',$penduduk_masuk->kabupaten_asal)->first();
        $provinsi_asal = provinsi::where('id',$penduduk_masuk->provinsi_asal)->first();

        return response()->json([
            'nik' => $penduduk_masuk->nik,
            'nama' => $penduduk_masuk->nama,
            'urut_kk' => $penduduk_masuk->urut_kk,
            'kelamin' => $penduduk_masuk->kelamin,
            'tempat_lahir' => $kabupaten->name,
            'tgl_lahir' => date('d M Y', strtotime($penduduk_masuk->tgl_lahir)),
            'gol_darah' => $penduduk_masuk->gol_darah,
            'agama' => $penduduk_masuk->agama,
            'status_nikah' => $penduduk_masuk->status_nikah,
            'status_keluarga' => $penduduk_masuk->status_keluarga,
            'pendidikan' => $penduduk_masuk->pendidikan,
            'pekerjaan' => $pekerjaan->nama,
            'nama_ibu' => $penduduk_masuk->nama_ibu,
            'nama_ayah' => $penduduk_masuk->nama_ayah,
            'no_kk' => $penduduk_masuk->no_kk,
            'rt' => $penduduk_masuk->rt,
            'rw' => $penduduk_masuk->rw,
            'warga_negara' => $penduduk_masuk->warga_negara,
            'alamat_asal' => $penduduk_masuk->alamat_asal,
            'rt_asal' => $penduduk_masuk->rt_asal,
            'rw_asal' => $penduduk_masuk->rw_asal,
            'kecamatan_asal' => $kecamatan_asal->name,
            'kabupaten_asal' => $kabupaten_asal->name,
            'provinsi_asal' => $provinsi_asal->name,
            'tgl_pindah' => date('d M Y', strtotime($penduduk_masuk->tgl_pindah)),
            'keterangan' => $penduduk_masuk->keterangan,
        ]);
   }

   public function destroy(Request $request)
   {
         $penduduk_masuk = d_penduduk_masuk::where('id',$request->id)->first();
         $penduduk = d_penduduk::findOrFail($penduduk_masuk->id_penduduk);
         DB::beginTransaction();
         try {
            $penduduk->delete();
            $penduduk_masuk->delete();
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

