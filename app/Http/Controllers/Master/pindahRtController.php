<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use DataTables;
use App\d_pindahrt;

class pindahRtController extends Controller
{
	public function index()
	{

		return view('master.Pindah_RT.index');
	}

   public function get()
   {
      $data = d_pindahrt::all();

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

   public function create()
   {

   	return view('master.Pindah_RT.add');
   }

   public function simpanMesin(Request $request)
   {
   	DB::beginTransaction();
        try {
            //code
            $id = m_mesin::select('m_id')->max('m_id')+1;
            $code = 'MS'.'000'.$id;
            //end code
            m_mesin::create([
            	'm_id' => $id,
					'm_code' => $code,
					'm_nama' => $request->m_nama,
					'm_pegawai' => $request->m_pegawai,
					'm_created' => Carbon::now()
            ]);
		DB::commit();
		return response()->json([
		     'status' => 'sukses',
		     'code' => $code
		   ]);
		 } catch (\Exception $e) {
		DB::rollback();
		return response()->json([
		   'status' => 'gagal',
		   'data' => $e
		   ]);
		}
   }

   public function editDataMesin($id)
   {
   	$pegawai = m_pegawai_man::select('c_id','c_nama')->get();
   	$mesin = m_mesin::where('m_id',$id)->first();

   	return view('master.ppindahRt.edit_datamesin', compact('pegawai','mesin'));
   }

   public function updateDataMesin(Request $request, $id)
   {	
   	DB::beginTransaction();
      try {
         m_mesin::where('m_id',$id)
         	->update([
				'm_nama' => $request->m_nama,
				'm_pegawai' => $request->m_pegawai,
				'm_updated' => Carbon::now()
         ]);
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

   public function ubahStatus(Request $request)
   {
        DB::beginTransaction();
        try {
        $cek = m_mesin::select('m_isactive')
            ->where('m_id',$request->id)
            ->first();

        if ($cek->m_isactive == 'TRUE') 
        {
            m_mesin::where('m_id',$request->id)
                ->update([
                    'm_isactive' => 'FALSE'
                ]);       
        }
        else
        {
            m_mesin::where('m_id',$request->id)
                ->update([
                    'm_isactive' => 'TRUE'
                ]);
        }
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
