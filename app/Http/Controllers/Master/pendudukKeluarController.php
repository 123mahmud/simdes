<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\d_penduduk_keluar;
use Yajra\DataTables\DataTables;
use DB;
use App\d_penduduk;

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

    public function get()
    {
        $data = d_penduduk_keluar::select('d_penduduk.*',
                                'd_pekerjaan.nama as pekerjaan_nama')
        ->join('d_penduduk','d_penduduk.id','=','d_penduduk_keluar.id_penduduk')
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
                            <button class="btn btn-danger btn-sm" 
                                    id="destroy'.$data->id.'"
                                    onclick="destroy('.$data->id.')" 
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
    
}
