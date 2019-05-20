<?php

namespace App\Http\Controllers\Penjualan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\d_sales;
use App\d_sales_dt;
use App\d_gudangcabang;
use App\d_sales_return;
use App\d_sales_returndt;
use App\lib\mutasi;
use carbon\Carbon;
use CodeGenerator;
use DB;
use Session;

class PenjualanReturnController extends Controller
{
    /**
     * return sales based on id sales
     *
     * @return json
     */
    public function getSales(Request $request)
    {
      $data['sales'] = d_sales::where('s_id', $request->id_sales)
        ->with('getSalesDt.getItem.getSatuan1')
        ->with('getCustomer')
        ->with('getSalesPayment.getPaymentMethod')
        ->firstOrFail();

      return $data['sales'];
      // return view('penjualan/returnpenjualan/returnpenjualan', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['sales'] = d_sales::get();
      return view('penjualan/returnpenjualan/returnpenjualan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['sales'] = d_sales::where('s_status', 'FN')
        ->orderBy('s_note', 'asc')
        ->get();
      return view('penjualan/returnpenjualan/tambah_returnpenjualan', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());

      DB::beginTransaction();
      try {
        // generate code return
        $salesRetId = d_sales_return::max('dsr_id') + 1;
        $returnCode = CodeGenerator::code('d_sales_return', 'dsr_code', 5, 'DSR');
        // insert new record into sales-return
        $salesReturn = new d_sales_return();
        $salesReturn->dsr_id = $salesRetId;
        $salesReturn->dsr_sid = $request->sales_note_id;
        $salesReturn->dsr_cus = $request->cust_id;
        $salesReturn->dsr_code = $returnCode;
        $salesReturn->dsr_method = $request->return_method;
        $salesReturn->dsr_jenis_return = $request->return_type;
        $salesReturn->dsr_type_sales = $request->sales_type;
        $salesReturn->dsr_date = Carbon::parse($request->return_date);
        $salesReturn->dsr_price_return = $request->sales_total_return;
        $salesReturn->dsr_sgross = $request->sales_gross;
        // $salesReturn->dsr_disc_vpercent = $request->sales_discp;
        // $salesReturn->dsr_disc_value = $request->sales_disch;
        $salesReturn->dsr_tax = $request->sales_ppn;
        $salesReturn->dsr_net = $request->sales_total_net;
        $salesReturn->save();

        // update d_sales based on return
        $sales = d_sales::where('s_id', $request->sales_note_id)
        ->firstOrFail();
        $sales->s_staff = Auth::user()->m_id;
        $sales->s_gross = $request->sales_gross;
        // $sales->s_disc_percent = $request->sales_discp;
        // $sales->s_disc_value = $request->sales_disch;
        $sales->s_tax = $request->sales_ppn;
        $sales->s_net = $request->sales_total_net;
        $sales->save();

        // delete sales-detail from selected salesId
        $salesDt = d_sales_dt::where('sd_sales', $request->sales_note_id)
          ->get();
        foreach ($salesDt as $salesX) {
          $salesX->delete();
        }

        for ($i=0; $i < sizeof($request->listItemId); $i++) {
          // insert new record into sales-return-detail
          $salesRDTId = d_sales_returndt::where('dsrdt_idsr', $salesRetId)
            ->max('dsrdt_smdt') + 1;
          $salesRDT = new d_sales_returndt();
          $salesRDT->dsrdt_idsr = $salesRetId;
          $salesRDT->dsrdt_smdt = $salesRDTId;
          $salesRDT->dsrdt_item = $request->listItemId[$i];
          $salesRDT->dsrdt_qty = $request->listQty[$i];
          $salesRDT->dsrdt_qty_confirm = $request->listReturnQty[$i];
          $salesRDT->dsrdt_price = $request->listPrice[$i];
          $salesRDT->dsrdt_disc_percent = $request->listDiscP[$i];
          $salesRDT->dsrdt_disc_vpercent = $request->listDiscVP[$i];
          // $salesRDT->dsrdt_disc_vpercentreturn = ;
          $salesRDT->dsrdt_disc_value = $request->listDiscH[$i];
          $salesRDT->dsrdt_return_price = $request->listTotalReturn[$i];
          $salesRDT->dsrdt_hasil = $request->listTotalBrgSesuai[$i];
          $salesRDT->save();

          // insert new record in sales-detail
          $valDiscP = (($request->listQty[$i] - $request->listReturnQty[$i]) * $request->listPrice[$i]) * $request->listDiscP[$i] / 100;
          $salesDtId = d_sales_dt::where('sd_sales', $request->sales_note_id)
            ->max('sd_detailid') + 1;
          $salesDt = new d_sales_dt;
          $salesDt->sd_sales = $request->sales_note_id;
          $salesDt->sd_detailid = $salesDtId;
          $salesDt->sd_item = $request->listItemId[$i];
          $salesDt->sd_qty = (int)$request->listQty[$i] - (int)$request->listReturnQty[$i];
          $salesDt->sd_price = $request->listPrice[$i];
          $salesDt->sd_disc_percent = $request->listDiscP[$i];
          $salesDt->sd_disc_vpercent = $valDiscP;
          $salesDt->sd_disc_value = $request->listDiscH[$i];
          $salesDt->sd_total = $request->listTotalBrgSesuai[$i];
          $salesDt->save();

          // mutation
          $userComp = Session::get('user_comp');
          $gudangCabang = d_gudangcabang::where('gc_comp', $userComp)
          ->where('gc_gudang', 'GUDANG PENJUALAN')
          ->firstOrFail();
          $gudangCabangId = $gudangCabang->gc_id;
          mutasi::tambahmutasi(
              $request->listItemId[$i], // iditem
              $request->listReturnQty[$i], // qty-return
              $gudangCabangId, // gudangCabangId (PENJUALAN) -> sama dg penjualan
              $gudangCabangId, // sama dg 'comp'
              'MENAMBAH', // 'MENAMBAH'
              9, // 9
              $returnCode, // dsr_code
              'MENAMBAH', // 'MENAMBAH'
              '', // ''
              '0', // ''
              Carbon::now() // Carbon::now()
            );
        }


        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal',
          'message' => $e->getMessage()
        ]);
      }

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
}
