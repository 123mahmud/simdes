<?php

namespace App\Http\Controllers\Purchasing;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\PurchaseController;
use Illuminate\Http\Request;
use App\model\purchasing\d_purchase_return;
use App\model\purchasing\d_purchase_return_dt;
use App\model\purchasing\d_purchase_order;
use App\model\purchasing\d_purchase_order_dt;
use App\model\purchasing\d_purchase_plan;
use App\model\purchasing\d_purchase_plan_dt;
use App\model\master\m_item;
use App\model\master\m_supplier;
use DB;
use Response;

class ReturnPembelianController extends Controller
{
    public function returnpembelian()
    {
      return view('purchasing/returnpembelian/returnpembelian');
    }
    
    public function tambah_returnpembelian()
    {
      return view('purchasing/returnpembelian/tambah_returnpembelian');
    }

    public function edit_returnpembelian($id)
    {
      $d_purchase_return = d_purchase_return::leftJoin('m_supplier', 'pr_supplier', '=', 's_id')->leftJoin('users', 'pr_officer', '=', 'id')->leftJoin('d_purchase_plan', 'pr_purchase_order', '=', 'pp_id');
      $d_purchase_return = $d_purchase_return->where('pr_id', $id)->select('pr_id','pr_status', 'pr_total_net', 'pr_total_gross', 'pr_tax_percent', 'pr_disc_percent', 'pr_disc_value', DB::raw("CONCAT('Rp ', FORMAT(pr_total_net, 0)) AS pr_total_net_label"), 'pr_method', 'pr_officer', 'pr_code', 'pp_code', 'pr_supplier', 's_name', 'name', DB::raw("DATE_FORMAT(pr_tanggal_kirim, '%d-%m-%Y') AS pr_tanggal_kirim_label"), DB::raw("DATE_FORMAT(pr_tanggal, '%d-%m-%Y') AS pr_tanggal_label"), DB::raw("CASE pr_status WHEN 'WT' THEN 'Waiting' WHEN 'AP' THEN 'Disetujui' WHEN 'NA' THEN 'Tidak Disetujui' END AS pr_status_label"))->first();
      // die($d_purchase_return);
      $d_purchase_return_dt = d_purchase_return_dt::leftJoin('m_item', 'prdt_item', '=', 'i_id')->leftJoin('m_satuan', 'prdt_satuan', '=', 's_id');
      $d_purchase_return_dt = $d_purchase_return_dt->where('prdt_purchase_return', $id)->select('prdt_item', 'prdt_prev_price', 'prdt_satuan', 'prdt_qty', 'prdt_price', 's_id', 's_name', 'i_id', 'i_code', 'i_name', DB::raw("IFNULL((SELECT s_qty FROM d_stock WHERE s_item = m_item.i_id), 0) AS stock"))->get();

      $res = [
        "purchase_return" => $d_purchase_return,
        "purchase_return_dt" => $d_purchase_return_dt
      ];
      return view('purchasing/returnpembelian/edit_returnpembelian', $res);
    }

    public function preview_returnpembelian($id)
    {
      $d_purchase_return = d_purchase_return::leftJoin('m_supplier', 'pr_supplier', '=', 's_id')->leftJoin('users', 'pr_officer', '=', 'id');
      $d_purchase_return = $d_purchase_return->where('pr_id', $id)->first();
      $d_purchase_return_dt = d_purchase_return_dt::leftJoin('m_item', 'prdt_item', '=', 'i_id')->leftJoin('m_satuan', 'prdt_satuan', '=', 's_id');
      $d_purchase_return_dt = $d_purchase_return_dt->where('prdt_purchase_return', $id)->select('prdt_item', 'prdt_prev_price','prdt_price', 'prdt_satuan', 'prdt_qty', 's_id', 's_name', 'i_id', 'i_code', 'i_name', DB::raw("IFNULL((SELECT s_qty FROM d_stock WHERE s_item = m_item.i_id), 0) AS stock"))->get();

      $res = [
        "purchase_return" => $d_purchase_return,
        "purchase_return_dt" => $d_purchase_return_dt
      ];


    	return response()->json($res);
    }



    public function find_m_item(Request $req) {
      $m_item = new m_item();
      // die('dsa');
      $res = $m_item->find_data($req);
      return response()->json($res);
    }

    public function find_m_supplier(Request $req) {
      $m_supplier = new m_supplier();
      $res = $m_supplier->find_data($req);

      return response()->json($res);
    }

    function find_d_purchase_return_dt(Request $req) {
       $tgl_awal = $req->tgl_awal;
       $tgl_awal = $tgl_awal != null ? $tgl_awal : '';
       $tgl_akhir = $req->tgl_akhir;
       $tgl_akhir = $tgl_akhir != null ? $tgl_akhir : '';

       $tgl_awal = preg_replace('/(\d+)[-\/](\d+)[-\/](\d+)/', '$3-$2-$1', $tgl_awal);
      $tgl_akhir = preg_replace('/(\d+)[-\/](\d+)[-\/](\d+)/', '$3-$2-$1', $tgl_akhir);

       DB::enableQueryLog();
      $d_purchase_return_dt = d_purchase_return_dt::leftJoin('m_item', 'prdt_item', '=', 'i_id')->leftJoin('m_satuan', 'prdt_satuan', '=', DB::raw('m_satuan.s_id'))->leftJoin('d_purchase_return', 'prdt_purchase_return', '=', 'pr_id')->leftJoin('m_supplier', 'pr_supplier', '=', DB::raw('m_supplier.s_id'));  
      $d_purchase_return_dt = $d_purchase_return_dt->whereBetween('pr_tanggal', [$tgl_awal, $tgl_akhir]);
      $d_purchase_return_dt = $d_purchase_return_dt->select(DB::raw("DATE_FORMAT(pr_tanggal, '%d-%m-%Y') AS pr_tanggal_label"), 'pr_code', DB::raw('m_satuan.s_name AS satuan_name'),DB::raw('m_supplier.s_name AS supplier_name'), 'prdt_item','prdt_qty','prdt_price','prdt_satuan','i_id','i_code','i_name', DB::raw('IFNULL((SELECT s_qty FROM d_stock WHERE s_item = m_item.i_id), 0) AS s_qty'), DB::raw('IFNULL((SELECT s_qty FROM d_stock WHERE s_item = m_item.i_id), 0) AS s_qty'))->get();
      // print_r(DB::getQueryLog());

       $res = array('data' => $d_purchase_return_dt);
       return response()->json($res);
    }
   
    function find_d_purchase_return(Request $req) {

       $data = array();
       $rows = d_purchase_return::leftJoin('m_supplier', 'pr_supplier', '=', 's_id')->leftJoin('users', 'pr_officer', '=', 'id')->returnBy('pr_tanggal', 'DESC');

       // Filter berdasarkan tanggal dan keyword
       $pr_status = $req->pr_status;
       $pr_status = $pr_status != null ? $pr_status : '';
       $use_purchase_plan = $req->use_purchase_plan;
       $use_purchase_plan = $use_purchase_plan != null ? $use_purchase_plan : 'yes';
       $keyword = $req->keyword;
       $keyword = $keyword != null ? $keyword : '';
       $tgl_awal = $req->tgl_awal;
       $tgl_awal = $tgl_awal != null ? $tgl_awal : '';
       $tgl_akhir = $req->tgl_akhir;
       $tgl_akhir = $tgl_akhir != null ? $tgl_akhir : '';
       if($tgl_awal != '' && $tgl_akhir != '') {
        $tgl_awal = preg_replace('/(\d+)[-\/](\d+)[-\/](\d+)/', '$3-$2-$1', $tgl_awal);
        $tgl_akhir = preg_replace('/(\d+)[-\/](\d+)[-\/](\d+)/', '$3-$2-$1', $tgl_akhir);
        $rows = $rows->whereBetween('pr_tanggal', array($tgl_awal, $tgl_akhir));
       }

       if($keyword != '') {
        $rows = $rows->where('pr_code', 'LIKE', DB::raw("'%$keyword%'"));

       }
       if($pr_status != '') {
        $rows = $rows->where('pr_status', $pr_status);
       }
       if($use_purchase_plan == 'no') {
        $rows = $rows->where('pr_purchase_order', '0');
       }
       else if($use_purchase_plan == 'yes') {
        $rows = $rows->where([['pr_purchase_order', '!=', 0]]);
       }


       $rows = $rows->select('pr_id','pr_status', 'pr_total_net', DB::raw("CONCAT('Rp ', FORMAT(pr_total_net, 0)) AS pr_total_net_label"), 'pr_method', 'pr_officer', 'pr_code', 'pr_supplier', 's_name', 'name', DB::raw("DATE_FORMAT(pr_tanggal_kirim, '%d-%m-%Y') AS pr_tanggal_kirim_label"), DB::raw("DATE_FORMAT(pr_tanggal, '%d-%m-%Y') AS pr_tanggal_label"), DB::raw("CASE pr_status WHEN 'WT' THEN 'Waiting' WHEN 'AP' THEN 'Disetujui' WHEN 'NA' THEN 'Tidak Disetujui' END AS pr_status_label"))->get();
       

       $res = array('data' => $rows);
       return response()->json($res);
    }

    function delete_d_purchase_return($pr_id) {
      
      if($pr_id != '') {
        
        DB::beginTransaction();
        try {
          $d_purchase_return = d_purchase_return::where('pr_id', $pr_id);
          $d_purchase_return->delete();
          $d_purchase_return_dt = d_purchase_return_dt::where('prdt_purchase_return', $pr_id)->delete();

          DB::commit();
          $res = array('status' => 'sukses' );
        }
        catch(\Exception $e) {
          DB::rollback();
          
          $res = array('status' => 'Error. ' . $e);
        }
      }
      else {
        $res = array('status' => 'ID Kosong');
      }

      return response()->json($res);
    }


   function insert_d_purchase_return(Request $request){
      $pr_tanggal = $request->pr_tanggal;
      $pr_tanggal = $pr_tanggal != null ? $pr_tanggal : '';
      $pr_tanggal = preg_replace('/([0-9]+)([\/-])([0-9]+)([\/-])([0-9]+)/', '$5-$3-$1', $pr_tanggal);

      $pr_purchase_order = $request->pr_purchase_order;
      $pr_purchase_order = $pr_purchase_order != null ? $pr_purchase_order : 0;
      $pr_method = $request->pr_method;
      $pr_method = $pr_method != null ? $pr_method : '';
      $pr_officer = $request->pr_officer;
      $pr_officer = $pr_officer != null ? $pr_officer : '';
      $pr_cabang = 1;
      DB::beginTransaction();
      try {

        $init = d_purchase_return::select(DB::raw('IFNULL(MAX(pr_id), 0) + 1 AS pr_id'))->first();
        $pr_id = $init->pr_id;
        // membuat kode purchase return
        $firstdate = date('Y-m-01', strtotime($pr_tanggal));
        $enddate = date('Y-m-31', strtotime($pr_tanggal));
        $init2nd = d_purchase_return::select( DB::raw('IFNULL(MAX(pr_id), 0) + 1 AS return_number') )->whereBetween('pr_tanggal', [$firstdate, $enddate])->first();
        $return_number = $init2nd->return_number; 
        $pr_code = DB::raw("(SELECT CONCAT('PR/', DATE_FORMAT('$pr_tanggal', '%m%y'), '/', LPAD($return_number, 4, '0')))");
        $grand_total = 0;
        
        $d_purchase_return_dt = new d_purchase_return_dt();

        $prdt_item = $request->prdt_item;
        $prdt_item = $prdt_item != null ? $prdt_item : array();
        if( count($prdt_item) > 0 ) {
            $prdt_qtybeli = $request->prdt_qtybeli;
            $prdt_qtybeli = $prdt_qtybeli != null ? $prdt_qtybeli : array();
            $prdt_qtyreturn = $request->prdt_qtyreturn;
            $prdt_qtyreturn = $prdt_qtyreturn != null ? $prdt_qtyreturn : array();
            $prdt_price = $request->prdt_price;
            $prdt_price = $prdt_price != null ? $prdt_price : array();
            $prdt_satuan = $request->prdt_satuan;
            $prdt_satuan = $prdt_satuan != null ? $prdt_satuan : array();

            $units = [];
            for($x = 0; $x < count($prdt_item);$x++) {
                $price = $prdt_price[$x];
                $price = preg_replace('/\D/', '', $price);
                $unit = [
                  'prdt_detailid' => $x + 1,
                  'prdt_purchase_return' => $pr_id,
                  'prdt_item' => $prdt_item[$x],
                  'prdt_qtyreturn' => $prdt_qtyreturn[$x],
                  'prdt_qtybeli' => $prdt_qtybeli[$x],
                  'prdt_price' => $price,
                  'prdt_satuan' => $prdt_satuan[$x]
                ];
                array_push($units, $unit);
            }

            d_purchase_return_dt::insert($units);            
        }

        d_purchase_return::insert([
          'pr_code' => $pr_code,
          'pr_officer' => $pr_officer,
          'pr_id' => $pr_id,
          'pr_purchase_order' => $pr_purchase_order,
          'pr_method' => $pr_method,
          'pr_tanggal' => $pr_tanggal,
          'pr_tanggal_kirim' => $pr_tanggal_kirim,
          'pr_supplier' => $pr_supplier,
          'pr_status' => 'WT',
          'pr_disc_value' => $pr_disc_value,
          'pr_disc_percent' => $pr_disc_percent,
          'pr_tax_percent' => $pr_tax_percent,
          'pr_total_gross' => $pr_total_gross,
          'pr_total_net' => $pr_total_net
        ]);

        d_purchase_plan::where('pp_id', $pr_purchase_order)->update([
          'pp_status_po' => 'A'
        ]);

        DB::commit();
        $status = 'sukses';
      }
      catch(\Exception $e) {
        DB::rollback();
        $status = 'gagal. ' . $e;
      }
      $res = array( 'status' => $status);

      return response()->json($res);
    }
    
    function update_d_purchase_return(Request $request){
      $pr_id = $request->pr_id;
      $pr_id = $pr_id != null ? $pr_id : '';  

      $pr_disc_value = $request->pr_disc_value;
      $pr_disc_value = $pr_disc_value != null ? $pr_disc_value : 0;
      $pr_disc_value = preg_replace('/\D/', '', $pr_disc_value);

      $pr_disc_percent = $request->pr_disc_percent;
      $pr_disc_percent = $pr_disc_percent != null ? $pr_disc_percent : 0;

      $pr_tax_percent = $request->pr_tax_percent;
      $pr_tax_percent = $pr_tax_percent != null ? $pr_tax_percent : 0;

      $pr_total_gross = $request->pr_total_gross;
      $pr_total_gross = $pr_total_gross != null ? $pr_total_gross : 0;
      $pr_total_gross = preg_replace('/\D/', '', $pr_total_gross);

      $pr_total_net = $request->pr_total_net;
      $pr_total_net = $pr_total_net != null ? $pr_total_net : 0;
      $pr_total_net = preg_replace('/\D/', '', $pr_total_net);

      if($pr_id != '') {
        DB::beginTransaction();
        try {

          d_purchase_return::where('pr_id', $pr_id)->update([
              'pr_total_gross'=> $pr_total_gross,
              'pr_disc_percent'=> $pr_disc_percent,
              'pr_disc_value'=> $pr_disc_value,
              'pr_tax_percent'=> $pr_tax_percent,
              'pr_total_net'=> $pr_total_net
          ]);

          d_purchase_return_dt::where('prdt_purchase_return', $pr_id)->delete();

          $prdt_item = $request->prdt_item;
          $prdt_item = $prdt_item != null ? $prdt_item : array();
          if( count($prdt_item) > 0 ) {

              $prdt_qty = $request->prdt_qty;
              $prdt_qty = $prdt_qty != null ? $prdt_qty : array();
              $prdt_satuan = $request->prdt_satuan;
              $prdt_satuan = $prdt_satuan != null ? $prdt_satuan : array();
              $prdt_prev_price = $request->prdt_prev_price;
              $prdt_prev_price = $prdt_prev_price != null ? $prdt_prev_price : array();

              $prdt_price = $request->prdt_price;
              $prdt_price = $prdt_price != null ? $prdt_price : array();

            $units = [];
            for($x = 0; $x < count($prdt_item);$x++) {
                $prev_price = $prdt_prev_price[$x];
                $prev_price = preg_replace('/\D/', '', $prev_price);
                $price = $prdt_price[$x];
                $price = preg_replace('/\D/', '', $price);
                $unit = [
                  'prdt_detailid' => $x + 1,
                  'prdt_purchase_return' => $pr_id,
                  'prdt_item' => $prdt_item[$x],
                  'prdt_qty' => $prdt_qty[$x],
                  'prdt_prev_price' => $prev_price,
                  'prdt_price' => $price,
                  'prdt_satuan' => $prdt_satuan[$x]
                ];
                array_push($units, $unit);
            }

            d_purchase_return_dt::insert($units);          }

          DB::commit();
          return response()->json(['status' => 'sukses']);
        }
        catch(\Exception $e) {
          DB::rollback();
          return response()->json(['status' => 'Gagal. ' . $e]);
        }  
      }
      else {
        echo 'ID Kosong';
        return false;
      }
      

      return response()->json($res);
    }

    function approve_d_purchase_return(Request $request){
      $pr_id = $request->pr_id;
      $pr_id = $pr_id != null ? $pr_id : '';  

      if($pr_id != '') {
        DB::beginTransaction();
        try {

          $pr_status = $request->pr_status;
          $pr_status = $pr_status != null ? $pr_status : '';
         
          d_purchase_return::where('pr_id', $pr_id)->update([
            'pr_status' => $pr_status,
            'pr_tanggal_approve' => date('Y-m-d')
          ]);

          DB::commit();
          return response()->json(['status' => 'sukses']);
        }
        catch(\Exception $e) {
          DB::rollback();
          return response()->json(['status' => 'Gagal. ' . $e]);
        }  
      }
      else {
        $res= [
          'status' => 'gagal.',
          'message' => 'ID Kosong'
        ];
      }
      

      return response()->json($res);
    }
}
