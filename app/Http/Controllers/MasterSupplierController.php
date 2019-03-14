<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use carbon\Carbon;
use App\MasterBarang;

class MasterSupplierController extends Controller
{
    public function datasuplier()
    {
        $data['supplier'] = DB::table('m_supplier')
                            ->join('m_comp' , 'c_code' , '=' , 's_company')
                            ->get();
    	return view('master/datasuplier/datasuplier' , compact('data'));
    }
    public function tambah_datasuplier()
    {   
        $data['cabang'] = DB::table('m_comp')
                        ->get();
        $supplier = DB::table('m_supplier')
                    ->max('s_id');
        $urut = $supplier + 1;
        $index = str_pad($urut, 6, '0' , STR_PAD_LEFT);
        $nota = 'SP' . '-' . $index;         
          return view('master/datasuplier/tambah_datasuplier' , compact('data','nota'));
    }
    public function edit_datasuplier($id)
    {

         $data['cabang'] = DB::table('m_comp')
                        ->get();

        $data['supplier'] = DB::table('m_supplier')
                            ->where('s_id' , $id)
                            ->get();

        $data['kendaraan'] = DB::table('m_kendaraan')
                            ->where('k_pemilik' , $id)
                            ->where('k_flag' , 'SUPPLIER')
                            ->get();

         return view('master/datasuplier/edit_datasuplier' , compact('data'));
    }

    public function update(Request $request){
        return DB::transaction(function() use ($request){
            $idsupplier = $request->idsupplier;
            DB::table('m_supplier')
            ->where('s_id' , $idsupplier)
            ->update([
                's_name' => $request->namasupplier,
                's_company' => $request->cabang,
                's_npwp' => $request->npwp,
                's_email' => $request->email,
                's_address' => $request->alamat,
                's_phone' => $request->nmr_hp,
                's_rekening' => $request->rekening,
                's_bank' => $request->namabank,
                's_fax' => $request->fax,
                's_note' => $request->keterangan,
                's_top' => $request->top,
                's_limit' => $limit,
                's_insert_by' => $request->username,
                's_update_by' => $request->username,
                's_isactive' => 'Y',
                's_code' => $request->kodesupplier,
            ]);

            DB::DELETE("DELETE FROM m_kendaraan where k_flag = 'SUPPLIER' and k_pemilik = '$idsupplier'");

            for($j = 0; $j < count($request->nopol); $j++){
                $urut_kendaraan = DB::table('m_kendaraan')
                        ->max('k_id');
                $urut_kendaraan = $urut_kendaraan +1;
                DB::table('m_kendaraan')
                ->insert([
                    'k_id' => $urut_kendaraan,
                    'k_pemilik' => $urut,
                    'k_flag' => 'SUPPLIER',
                    'k_nopol' => strtoupper($request->nopol[$j]),
                    'created_by' => $request->username,
                    'updated_by' => $request->username,
                ]);
            }

            return json_encode('sukses');

        });
    }

    public function save_datasupplier(Request $request){
          return DB::transaction(function() use ($request){
            $urut = DB::table('m_supplier')
                    ->max('s_id');

            $limit = str_replace("." , "" , $request->limit);
            $limit = str_replace(",", ".", $limit);
            $urut = $urut + 1;
            DB::table('m_supplier')
            ->insert([
                's_id' => $urut,
                's_name' => $request->namasupplier,
                's_company' => $request->cabang,
                's_npwp' => $request->npwp,
                's_email' => $request->email,
                's_address' => $request->alamat,
                's_phone' => $request->nmr_hp,
                's_rekening' => $request->rekening,
                's_bank' => $request->namabank,
                's_fax' => $request->fax,
                's_note' => $request->keterangan,
                's_top' => $request->top,
                's_limit' => $limit,
                's_insert_by' => $request->username,
                's_update_by' => $request->username,
                's_isactive' => 'Y',
                's_code' => $request->kodesupplier,
            ]);


            for($j = 0; $j < count($request->wilayah); $j++){
                $urut_kendaraan = DB::table('m_kendaraan')
                        ->max('k_id');
                $urut_kendaraan = $urut_kendaraan +1;
                DB::table('m_kendaraan')
                ->insert([
                    'k_id' => $urut_kendaraan,
                    'k_pemilik' => $urut,
                    'k_flag' => 'SUPPLIER',
                    'k_nopol' => strtoupper($request->wilayah[$j]),
                    'created_by' => $request->username,
                    'updated_by' => $request->username,
                ]);
            }
            return json_encode('sukses');
          });
    }

    public function disabled(Request $request){
        $aktif = $request->active;
        $id = $request->id;

        if($aktif == 'Y'){
            DB::table('m_supplier')
            ->where('s_id' , $id)
            ->update([
                's_isactive' => 'T',
            ]);
        }
        else {
            DB::table('m_supplier')
            ->where('s_id' , $id)
            ->update([
                's_isactive' => 'Y',
            ]);
        }

        return json_encode('sukses');
    }

   

   


}

