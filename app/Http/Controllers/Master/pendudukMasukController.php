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
                                'd_pekerjaan.nama as pekerjaan_nama')
    	->join('d_penduduk','d_penduduk.id','=','d_penduduk_masuk.id_penduduk')
        ->join('d_pekerjaan','d_pekerjaan.id','=','d_penduduk.pekerjaan')
        ->get();

      return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('tempat_tgl_lahir', function($data) {
            return $data->tempat_lahir .'-'. $data->tgl_lahir;
        })        

        ->addColumn('action', function($data) {
            if ($data->active == '1') 
            {
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
                            <button id="status'.$data->id.'" 
                                        onclick="status('.$data->id.')" 
                                        class="btn btn-primary btn-sm" 
                                        title="Aktif">
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                    </button>'.'
                            <button class="btn btn-danger btn-sm" 
                                    id="destroy'.$data->id.'"
                                    onclick="destroy('.$data->id.')" 
                                    type="button" 
                                    title="Hapus">
                                    <i class="fa fa-times"></i>
                            </button>'.
                        '</div>';
            }else{
                return  '<div class="text-center">'.
                                    '<button id="status'.$data->id.'" 
                                        onclick="status('.$data->id.')" 
                                        class="btn btn-danger btn-sm" 
                                        title="Tidak Aktif">
                                        <i class="fa fa-minus-square" aria-hidden="true"></i>
                                    </button>'.
                                '</div>';
            }
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
            $penduduk_masuk->kec_asal = $request->kec_asal;
            $penduduk_masuk->kab_asal = $request->kab_asal;
            $penduduk_masuk->prov_asal = $request->prov_asal;
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

}

