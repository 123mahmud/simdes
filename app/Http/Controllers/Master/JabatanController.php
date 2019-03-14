<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use DataTables;
use App\Jabatan;
use App\m_jabatan_pro;
use App\m_jabatan;

class JabatanController extends Controller
{
    public function index()
    {

        return view('master/datajabatan/datajabatan');
    }
    public function jabatanData()
    {
        $data = DB::table('m_jabatan');

        return Datatables::of($data)           
                ->addColumn('action', function ($data) {
                    if ($data->c_isactive == 'TRUE') {
                        return  '<div class="text-center">'.
                                    '<button id="edit" 
                                        onclick="edit('.$data->c_id.')" 
                                        class="btn btn-warning btn-sm" 
                                        title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>'.'
                                    <button id="status'.$data->c_id.'" 
                                        onclick="ubahStatusMan('.$data->c_id.')" 
                                        class="btn btn-primary btn-sm" 
                                        title="Aktif">
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                    </button>'.'
                                </div>';
                    }
                    else
                    {
                        return  '<div class="text-center">'.
                                    '<button id="status'.$data->c_id.'" 
                                        onclick="ubahStatusMan('.$data->c_id.')" 
                                        class="btn btn-danger btn-sm" 
                                        title="Tidak Aktif">
                                        <i class="fa fa-minus-square" aria-hidden="true"></i>
                                    </button>'.
                                '</div>';
                    }
                    
                })
                ->addColumn('kode', function ($data) {
                    return  str_pad($data->c_id, 3, '0', STR_PAD_LEFT);
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->rawColumns(['action','view','posisi'])
                ->make(true);
    }

    public function tambahJabatan(Request $request)
    {
        

        return view('master.datajabatan.tambah_datajabatan');
    }

    public function simpanJabatan(Request $request){
        DB::beginTransaction();
        try {
            //code
            $id = m_jabatan::select('c_id')->max('c_id')+1;
            $code = 'JB'.'000'.$id;
            //end code
            m_jabatan::create([
                'c_code' => $code,
                'c_posisi' => $request->c_posisi
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

    public function editJabatan($id)
    {
        $jabatan = DB::table('m_jabatan')->where('c_id', $id)->first();

        return view('master.datajabatan.edit_datajabatan', ['jabatan' => $jabatan]);
    }

    public function updateJabatan(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            m_jabatan::where('c_id',$id)
                ->update([
                'c_posisi' => $request->c_posisi
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

    public function tablePro(){
        $produksi = m_jabatan_pro::all();
        // dd($produksi);
        return Datatables::of($produksi) 
        ->addIndexColumn()
        ->addColumn('action', function ($data) {
            if ($data->c_isactive == 'TRUE') 
            {
                return '<div class="text-center">'.
                            '<button id="edit" 
                                onclick="editJPro('.$data->c_id.')" 
                                class="btn btn-warning  btn-sm" 
                                title="Edit"><i class="glyphicon glyphicon-pencil"></i>
                            </button>'.'
                            <button id="status'.$data->c_id.'" 
                                onclick="ubahStatusPro('.$data->c_id.')" 
                                class="btn btn-primary btn-sm" 
                                title="Aktif">
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                            </button>'.'
                        </div>';
            }
            else
            {
                return '<div class="text-center">'.
                            '<button id="status'.$data->c_id.'" 
                                onclick="ubahStatusPro('.$data->c_id.')" 
                                class="btn btn-danger btn-sm" 
                                title="Tidak Aktif">
                                <i class="fa fa-minus-square" aria-hidden="true"></i>
                            </button>'.'
                        </div>';
            }
        })

        ->rawColumns(['action'])
        ->make(true);
    }

    public function tambahJabatanPro(){

        return view('master.datajabatan.tambah-jabatanpro');
    }

    public function simpanJabatanPro(Request $req){
        //dd($req->all());
        DB::beginTransaction();
        try {
        $id = m_jabatan_pro::select('c_id')->max('c_id')+1;
        m_jabatan_pro::insert([
            'c_id' => $id,
            'c_jabatan_pro' => $req->c_jabatan_pro,
            'created_at' => Carbon::now()
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

    public function ubahStatusMan(Request $request)
    {
        DB::beginTransaction();
        try {
        $cek = m_jabatan::select('c_isactive')
            ->where('c_id',$request->id)
            ->first();

        if ($cek->c_isactive == 'TRUE') 
        {
            m_jabatan::where('c_id',$request->id)
                ->update([
                    'c_isactive' => 'FALSE'
                ]);       
        }
        else
        {
            m_jabatan::where('c_id',$request->id)
                ->update([
                    'c_isactive' => 'TRUE'
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
