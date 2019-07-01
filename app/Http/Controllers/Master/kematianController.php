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

class kematianController extends Controller
{

   public function index()
   {

      return view('master.Kematian.index');
   }

   public function get()
   {
      $data = d_kematian::all();

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


   public function create()
   {

      return view('master.Kematian.add');
   }

    public function store(Request $request)
    {

      DB::beginTransaction();
      try {
            $year = carbon::now()->format('y');
            $month = carbon::now()->format('m');
            $date = carbon::now()->format('d');

            $id_cust = DB::Table('m_customer')->max('c_id')+1;
            $kode = 'CUS' . $month . $year . '/' . 'C001' . '/' . $id_cust;
            if ($request->tgl_lahir == '') {
                DB::table('m_customer')
                    ->insert([
                        'c_id' => $id_cust,
                        'c_code' => $kode,
                        'c_name' => $request->c_name,
                        'c_type' => $request->c_type,
                        'c_email' => $request->c_email,
                        'c_hp1' => $request->c_hp1,
                        'c_hp2' => $request->no_hp2,
                        'c_address' => $request->c_address,
                        'c_pagu' => str_replace(',', '',  $request->c_pagu),
                        'c_jatuh_tempo' => $request->c_jatuh_tempo,
                        'c_insert' => Carbon::now()
                    ]);
            } else {
                DB::table('m_customer')
                    ->insert([
                        'c_id' => $id_cust,
                        'c_code' => $kode,
                        'c_name' => $request->c_name,
                        'c_type' => $request->c_type,
                        'c_birthday' => date('Y-m-d', strtotime($request->c_birthday)),
                        'c_email' => $request->c_email,
                        'c_hp1' => $request->c_hp1,
                        'c_hp2' => $request->c_hp2,
                        'c_address' => $request->c_address,
                        'c_pagu' => str_replace(',', '',  $request->c_pagu),
                        'c_jatuh_tempo' => $request->c_jatuh_tempo,
                        'c_insert' => Carbon::now()
                    ]);
            }

        // insert Kendaraan
        $nopols = $request->nopol;
        if ($nopols != null) {
          foreach ($nopols as $nopol) {
            $k_id = m_kendaraan::max('k_id') + 1;
            $kendaraan            = new m_kendaraan;
            $kendaraan->k_id      = $k_id;
            $kendaraan->k_pemilik = $id_cust;
            $kendaraan->k_flag    = 'CUSTOMER';
            $kendaraan->k_nopol   = $nopol;
            $kendaraan->save();
          }
        }

        DB::commit();
        return response()->json([
          'status' => 'sukses',
          'id' => $id_cust,
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal',
          'message' => $e->getMessage()
        ]);
      }
    }


   public function editCustomer(Request $request)
   {
      $customer = DB::table('m_customer')
                         ->where('c_id' , Crypt::decrypt($request->id))
                         ->first();

      $kendaraan = DB::table('m_kendaraan')
                            ->where('k_pemilik' , Crypt::decrypt($request->id))
                            ->where('k_flag' , 'CUSTOMER')
                            ->get();

      return view('master.dataKematian.edit_datacustomer' , compact('customer','kendaraan'));
   }

    public function update(Request $request)
    {
      DB::beginTransaction();
         try {
            DB::table('m_customer')
            ->where('c_id' , Crypt::decrypt($request->id))
            ->update([
                'c_name' => $request->c_name,
                'c_birthday' => date('Y-m-d', strtotime($request->c_birthday)),
                'c_email' => $request->c_email,
                'c_hp1' => $request->c_hp1,
                'c_hp2' => $request->c_hp2,
                'c_address' => $request->c_address,
                'c_pagu' => str_replace(',', '', $request->c_pagu),
                'c_jatuh_tempo' => $request->c_jatuh_tempo,
                'c_type' => $request->c_type,
                'c_update' => Carbon::now()
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
        $cek = DB::table('m_customer')->select('c_isactive')
            ->where('c_id',$request->id)
            ->first();
        if ($cek->c_isactive == 'Y')
        {
            DB::table('m_customer')
            ->where('c_id',$request->id)
            ->update([
                'c_isactive' => 'N'
            ]);
        }
        else
        {
            DB::table('m_customer')
            ->where('c_id',$request->id)
            ->update([
                'c_isactive' => 'Y'
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
