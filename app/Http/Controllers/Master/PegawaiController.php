<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use App\Pegawai;
use App\PegawaiProduksi;
use App\m_jabatan;
use App\m_pegawai_man;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use DataTables;
use URL;
use Illuminate\Support\Facades\Input;
use Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        
        return view('master.datapegawai.index');
    }

    public function pegawaiData(){
        $data = DB::table('m_pegawai_man')
                ->select('m_pegawai_man.c_id',
                        'm_pegawai_man.c_code', 
                        'm_pegawai_man.c_nama',
                        'c_tahun_masuk',
                        'c_posisi',
                        'm_pegawai_man.c_isactive')
                ->join('m_jabatan', 'm_pegawai_man.c_jabatan_id', '=', 'm_jabatan.c_id');

        return Datatables::of($data)  
            ->editColumn('c_tahun_masuk', function ($data)
            {
                return date('d M Y', strtotime($data->c_tahun_masuk));
            })          

            ->addColumn('action', function ($data) 
            {
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
                                </button>'.
                            '</div>';
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
            ->addColumn('none', function ($data) {
                return '-';
            })
            ->rawColumns(['action','confirmed'])
            ->make(true);
    }

    public function tambahPegawai(){

        $jabatan = m_jabatan::where('c_isactive','TRUE')->get();

        return view('/master/datapegawai/tambah_datapegawai', compact('jabatan'));
    }

    public function simpanPegawai(Request $request){
        DB::beginTransaction();
        try {
            //code
            $tanggal = date("ym",strtotime($request->c_tahun_masuk));
            //select max dari c_id dari table m_pegawai_man
            $maxid = DB::Table('m_pegawai_man')->select('c_id')->max('c_id')+1;
            $kode = str_pad($maxid, 2, '0', STR_PAD_LEFT);
            $id_pegawai = 'PG-' . $tanggal . '/' .  $kode;
            //end code
            m_pegawai_man::create([
                'c_id' => $maxid,
                'c_code' => $id_pegawai,
                'c_nama' => $request->c_nama,
                'c_hari_kerja' => $request->c_hari_awal." - ".$request->c_hari_akhir,
                'c_ktp' => $request->c_ktp,
                'c_ktp_alamat' => $request->c_ktp_alamat,
                'c_alamat' => $request->c_alamat,
                'c_lahir' => $request->c_tempat.', '.date('Y-m-d',strtotime($request->c_tanggal)),
                'c_pendidikan' => $request->c_pendidikan,
                'c_email' => $request->c_email,
                'c_hp' => $request->c_hp,
                'c_agama' => $request->c_agama,
                'c_nikah' => $request->c_nikah,
                'c_pasangan' => $request->c_pasangan,
                'c_anak' => $request->c_anak,
                'c_bank' => $request->c_bank,
                'c_rekening' => $request->c_rekening,
                'c_sertification' => $request->c_sertification,
                'c_sertif_tahun' => $request->c_sertif_tahun,
                'c_sertif_tempat' => $request->c_sertif_tempat,
                'c_tahun_masuk' => date('Y-m-d',strtotime($request->c_tahun_masuk)),
                'c_jabatan_id' => $request->c_jabatan_id
            ]);
        // dd($input);exit;
        DB::commit();
        return response()->json([
              'status' => 'sukses',
              'code' => $id_pegawai
            ]);
          } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
            'status' => 'gagal',
            'data' => $e
            ]);
          }
    }

    public function editPegawai($id){
        $jabatan = DB::table('m_jabatan')->where('c_isactive','TRUE')->get(); 
        $data = DB::table('m_pegawai_man')->where('c_id', $id)->first();
        $hari = explode(" - ",$data->c_hari_kerja);
        // dd($data->c_hari_kerja);
        $data->c_hari_awal = $hari[0];
        $data->c_hari_akhir = $hari[1];
        if($data->c_lahir){
            $lahir = explode(", ",$data->c_lahir);
            $data->c_tempat = $lahir[0];
            $data->tgl_lahir = $lahir[1];
        }else{
            $data->c_tempat = "-";
            $data->tgl_lahir = "-";
        }
        return view('master.datapegawai.edit_datapegawai',['data' => $data, 'jabatan'=> $jabatan]);
    }

    public function updatePegawai(Request $request, $id){
        // dd($request->all());
        DB::beginTransaction();
        try {
            m_pegawai_man::where('c_id',$id)
                ->update([
                'c_nama' => $request->c_nama,
                'c_hari_kerja' => $request->c_hari_awal." - ".$request->c_hari_akhir,
                'c_ktp' => $request->c_ktp,
                'c_ktp_alamat' => $request->c_ktp_alamat,
                'c_alamat' => $request->c_alamat,
                'c_lahir' => $request->c_tempat.', '.date('Y-m-d',strtotime($request->c_tanggal)),
                'c_pendidikan' => $request->c_pendidikan,
                'c_email' => $request->c_email,
                'c_hp' => $request->c_hp,
                'c_agama' => $request->c_agama,
                'c_nikah' => $request->c_nikah,
                'c_pasangan' => $request->c_pasangan,
                'c_anak' => $request->c_anak,
                'c_bank' => $request->c_bank,
                'c_rekening' => $request->c_rekening,
                'c_sertification' => $request->c_sertification,
                'c_sertif_tahun' => $request->c_sertif_tahun,
                'c_sertif_tempat' => $request->c_sertif_tempat,
                'c_tahun_masuk' => date('Y-m-d',strtotime($request->c_tahun_masuk)),
                'c_jabatan_id' => $request->c_jabatan_id
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
        $cek = DB::table('m_pegawai_man')->select('c_isactive')
            ->where('c_id',$request->id)
            ->first();
        if ($cek->c_isactive == 'TRUE') 
        {
            DB::table('m_pegawai_man')
            ->where('c_id',$request->id)
            ->update([
                'c_isactive' => 'FALSE'
            ]);
        }
        else
        {
            DB::table('m_pegawai_man')
            ->where('c_id',$request->id)
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
