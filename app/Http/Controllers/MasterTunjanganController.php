<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Yajra\DataTables\DataTables;

class MasterTunjanganController extends Controller
{
    /**
     * Validate request before execute command.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 'error message' or '1'
     */
    public function validate_req(Request $request)
    {
      // start: validate data before execute
      $messages = [
        'tunjangan_name.required' => 'Nama Tunjangan masih kosong, silahkan isi terlebih dahulu !',
        'tunjangan_nominal.required' => 'Nominal Tunjangan masih kosong, silahkan isi terlebih dahulu !'
      ];
      $validator = Validator::make($request->all(), [
        'tunjangan_name' => 'required',
        'tunjangan_nominal' => 'required'
      ], $messages);
      if($validator->fails())
      {
        return $validator->errors()->first();
      }
      else
      {
        return '1';
      }
    }

    /**
     * convert 'nominal' to float format before execute to db.
     *
     * @param string (nominal input from 'view')
     * @return float (nominal)
     */
    public function convert_nominal($nominal)
    {
      $subs_nominal = str_replace('Rp. ', '', $nominal);
      $float_nominal = (float)str_replace('.', '', $subs_nominal);
      return $float_nominal;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('master/datatunjangan/datatunjangan');
    }

    /**
     * Return a DataTable list for server-side view.
     *
     * @return Yajra/DataTable : server-side
     */
    public function getlist()
    {
      $datas = DB::table('m_tunjangan')
        ->get();

      return DataTables::of($datas)
        ->addIndexColumn()
        ->addColumn('nominal', function($datas) {
          return '<td><span class="float-left">Rp </span><span class="float-right">'. number_format($datas->tj_nominal, 2, ',', '.') .'</span></td>';
        })
        ->addColumn('action', function($datas) {
          return '<div class="btn-group btn-group-sm">
          <button class="btn btn-warning btn-edit" onclick="EditTunjangan('.$datas->tj_id.')" rel="tooltip" data-placement="top"><i class="fa fa-pencil"></i></button>
          <button class="btn btn-danger btn-disable" onclick="DisableTunjangan('.$datas->tj_id.')" rel="tooltip" data-placement="top"><i class="fa fa-times-circle"></i></button>
          </div>';
        })
        ->rawColumns(['nominal', 'action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('master/datatunjangan/tambah_datatunjangan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validate request
      $isValidRequest = $this->validate_req($request);
      if ($isValidRequest != '1') {
        $errors = $isValidRequest;
        return response()->json([
          'status' => 'invalid',
          'message' => $errors
        ]);
      }
      // start: execute insert data to db 'm_tunjangan'
      DB::beginTransaction();
      try {
        $id = DB::table('m_tunjangan')->max('tj_id') + 1;
        $nominal = $this->convert_nominal($request->tunjangan_nominal);
        DB::table('m_tunjangan')
          ->insert([
            'tj_id' => $id,
            'tj_name' => $request->tunjangan_name,
            'tj_nominal' => $nominal
          ]);
        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal',
          'message' => $e
        ]);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['tunjangan'] = DB::table('m_tunjangan')
        ->where('tj_id', $id)
        ->first();
      return view('master/datatunjangan/edit_datatunjangan', compact('data'));
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
      // validate request
      $isValidRequest = $this->validate_req($request);
      if ($isValidRequest != '1') {
        $errors = $isValidRequest;
        return response()->json([
          'status' => 'invalid',
          'message' => $errors
        ]);
      }
      // start: execute update data to db 'm_tunjangan'
      DB::beginTransaction();
      try {
        $nominal = $this->convert_nominal($request->tunjangan_nominal);
        DB::table('m_tunjangan')
          ->where('tj_id', $id)
          ->update([
            'tj_name' => $request->tunjangan_name,
            'tj_nominal' => $nominal
          ]);
        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal',
          'message' => $e
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      // start: execute delete data to db 'm_tunjangan'
      DB::beginTransaction();
      try {
        DB::table('m_tunjangan')
          ->where('tj_id', $id)
          ->delete();
        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal',
          'message' => $e
        ]);
      }
    }
}
