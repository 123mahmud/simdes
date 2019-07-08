<?php

namespace App\Http\Controllers\Reff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\surat;
use DB;

class KodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = surat::all();

        return view('reff.reff_surat.index',compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $surat = surat::where('id','1')->first();
            $surat->kode_surat = $surat->kode_surat;
            $surat->kode_desa = $surat->kode_desa;
            $surat->save();
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
