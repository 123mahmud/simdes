<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\d_penduduk_keluar;
use Yajra\DataTables\DataTables;
use DB;
use App\d_penduduk;
use App\d_pekerjaan;
use App\provinsi;
use App\kabupaten;
use App\kecamatan;
use Crypt;

class pendudukKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('master.Penduduk_Keluar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        
        return view('master.Penduduk_Keluar.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penduduk_keluar = d_penduduk_keluar::select('d_penduduk_keluar.*',
                             'd_penduduk.*')
            ->join('d_penduduk','d_penduduk.id','=','d_penduduk_keluar.id_penduduk')
            ->where('d_penduduk_keluar.id',$id)->first();

        $pekerjaan = d_pekerjaan::where('id',$penduduk_keluar->pekerjaan)->first();
        $kabupaten = kabupaten::where('id',$penduduk_keluar->tempat_lahir)->first();
        $kecamatan_tujuan = kecamatan::where('id',$penduduk_keluar->kecamatan_tujuan)->first();
        $kabupaten_tujuan = kabupaten::where('id',$penduduk_keluar->kabupaten_tujuan)->first();
        $provinsi_tujuan = provinsi::where('id',$penduduk_keluar->provinsi_tujuan)->first();

        return response()->json([
            'nik' => $penduduk_keluar->nik,
            'nama' => $penduduk_keluar->nama,
            'urut_kk' => $penduduk_keluar->urut_kk,
            'kelamin' => $penduduk_keluar->kelamin,
            'tempat_lahir' => $kabupaten->name,
            'tgl_lahir' => date('d M Y', strtotime($penduduk_keluar->tgl_lahir)),
            'gol_darah' => $penduduk_keluar->gol_darah,
            'agama' => $penduduk_keluar->agama,
            'status_nikah' => $penduduk_keluar->status_nikah,
            'status_keluarga' => $penduduk_keluar->status_keluarga,
            'pendidikan' => $penduduk_keluar->pendidikan,
            'pekerjaan' => $pekerjaan->nama,
            'nama_ibu' => $penduduk_keluar->nama_ibu,
            'nama_ayah' => $penduduk_keluar->nama_ayah,
            'no_kk' => $penduduk_keluar->no_kk,
            'rt' => $penduduk_keluar->rt,
            'rw' => $penduduk_keluar->rw,
            'warga_negara' => $penduduk_keluar->warga_negara,
            'alamat_tujuan' => $penduduk_keluar->alamat_tujuan,
            'rt_tujuan' => $penduduk_keluar->rt_tujuan,
            'rw_tujuan' => $penduduk_keluar->rw_tujuan,
            'kecamatan_tujuan' => $kecamatan_tujuan->name,
            'kabupaten_tujuan' => $kabupaten_tujuan->name,
            'provinsi_tujuan' => $provinsi_tujuan->name,
            'tgl_pindah' => date('d M Y', strtotime($penduduk_keluar->tgl_pindah)),
            'keterangan' => $penduduk_keluar->keterangan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $penduduk_keluar = d_penduduk_keluar::where('id', Crypt::decrypt($request->id))->first();
        $penduduk = d_penduduk::where('id', $penduduk_keluar->id_penduduk)->first();
        $kabupaten = kabupaten::all();
        $pekerjaan = d_pekerjaan::all();
        $kec = DB::table('kecamatan')->where('id',$penduduk_keluar->kecamatan_tujuan)->first();
        $kab = DB::table('kabupaten')->where('id',$penduduk_keluar->kabupaten_tujuan)->first();
        $pro = DB::table('provinsi')->where('id',$penduduk_keluar->provinsi_tujuan)->first();

        return view('master.Penduduk_Keluar.edit',compact('penduduk','kabupaten','pekerjaan','penduduk_keluar','kec','kab','pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $penduduk_keluar = d_penduduk_keluar::find(Crypt::decrypt($request->id));
            $penduduk_keluar->alamat_tujuan = $request->alamat_tujuan;
            $penduduk_keluar->rt_tujuan = $request->rt_tujuan;
            $penduduk_keluar->rw_tujuan = $request->rw_tujuan;
            $penduduk_keluar->kecamatan_tujuan = $request->kecamatan_tujuan;
            $penduduk_keluar->kabupaten_tujuan = $request->kabupaten_tujuan;
            $penduduk_keluar->provinsi_tujuan = $request->provinsi_tujuan;
            $penduduk_keluar->tgl_pindah = date('Y-m-d',strtotime($request->tgl_pindah));
            $penduduk_keluar->keterangan = $request->keterangan;
            $penduduk_keluar->save();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function get()
    {
        $data = d_penduduk_keluar::select('d_penduduk.*',
                                        'd_pekerjaan.nama as pekerjaan_nama',
                                        'd_penduduk_keluar.id as id_penduduk_keluar')
        ->join('d_penduduk','d_penduduk.id','=','d_penduduk_keluar.id_penduduk')
        ->join('d_pekerjaan','d_pekerjaan.id','=','d_penduduk.pekerjaan')
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
                                    onclick=detail("'.$data->id_penduduk_keluar.'")
                                    type="button" 
                                    title="Info">
                                    <i class="fa fa-exclamation-circle"></i>
                            </button>'.'
                            <button class="btn btn-warning btn-edit btn-sm" 
                                    onclick=edit("'.Crypt::encrypt($data->id_penduduk_keluar).'")
                                    type="button" 
                                    title="Edit">
                                    <i class="fa fa-pencil"></i>
                            </button>'.'
                            <button class="btn btn-danger btn-sm" 
                                    id="destroy'.$data->id_penduduk_keluar.'"
                                    onclick="destroy('.$data->id_penduduk_keluar.')" 
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
            $penduduk_keluar = new d_penduduk_keluar;
            $penduduk_keluar->id_penduduk = $request->id_penduduk;
            $penduduk_keluar->alamat_tujuan = $request->alamat_tujuan;
            $penduduk_keluar->rt_tujuan = $request->rt_tujuan;
            $penduduk_keluar->rw_tujuan = $request->rw_tujuan;
            $penduduk_keluar->kecamatan_tujuan = $request->kecamatan_tujuan;
            $penduduk_keluar->kabupaten_tujuan = $request->kabupaten_tujuan;
            $penduduk_keluar->provinsi_tujuan = $request->provinsi_tujuan;
            $penduduk_keluar->tgl_pindah = date('Y-m-d',strtotime($request->tgl_pindah));
            $penduduk_keluar->keterangan = $request->keterangan;
            $penduduk_keluar->save();

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

   public function destroy(Request $request)
   {
         $penduduk_keluar = d_penduduk_keluar::where('id',$request->id)->first();
         $penduduk = d_penduduk::findOrFail($penduduk_keluar->id_penduduk);
         DB::beginTransaction();
         try {
            $penduduk->active = 1;
            $penduduk->save();
            $penduduk_keluar->delete();
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
