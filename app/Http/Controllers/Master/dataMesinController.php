<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use DataTables;
use App\m_mesin;
use App\m_pegawai_man;

class dataMesinController extends Controller
{
	public function index()
	{

		return view('master.datamesin.index');
	}

    public function table()
    {
    	$data = m_mesin::select('m_id',
    									'm_code',
    									'm_nama',
    									'c_nama',
    									'm_isactive')
    		->join('m_pegawai_man','m_pegawai_man.c_id','=','m_pegawai');

    	return Datatables::of($data)           
                ->addColumn('action', function ($data) {
                    if ($data->m_isactive == 'TRUE') {
                        return  '<div class="text-center">'.
                                    '<button id="edit" 
                                        onclick="edit('.$data->m_id.')" 
                                        class="btn btn-warning btn-sm" 
                                        title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>'.'
                                    <button id="status'.$data->m_id.'" 
                                        onclick="ubahStatus('.$data->m_id.')" 
                                        class="btn btn-primary btn-sm" 
                                        title="Aktif">
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                    </button>'.'
                                </div>';
                    }
                    else
                    {
                        return  '<div class="text-center">'.
                                    '<button id="status'.$data->m_id.'" 
                                        onclick="ubahStatus('.$data->m_id.')" 
                                        class="btn btn-danger btn-sm" 
                                        title="Tidak Aktif">
                                        <i class="fa fa-minus-square" aria-hidden="true"></i>
                                    </button>'.
                                '</div>';
                    }
                    
                })

                ->rawColumns(['action'])
                ->make(true);
   }

   public function tambah_datamesin()
   {
   	$pegawai = m_pegawai_man::select('c_id','c_nama')->get();

   	return view('master.datamesin.tambah_datamesin', compact('pegawai'));
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

   	return view('master.datamesin.edit_datamesin', compact('pegawai','mesin'));
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
