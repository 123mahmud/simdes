<?php

namespace App\Http\Controllers\Reff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\d_pekerjaan;
use Yajra\DataTables\DataTables;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('reff.reff_pekerjaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('reff.reff_pekerjaan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $pekerjaan = new d_pekerjaan;
            $pekerjaan->nama = $request->nama;
            $pekerjaan->active = 1;
            $pekerjaan->save();
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
        $pekerjaan = d_pekerjaan::where('id',$id)->firstOrFail();

        return view('reff.reff_pekerjaan.edit', compact('pekerjaan'));
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
        DB::beginTransaction();
        try {
            $pekerjaan = d_pekerjaan::findOrFail($id);
            $pekerjaan->nama = $request->nama;
            $pekerjaan->save();
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

    public function get()
    {
        $data = d_pekerjaan::all();

      return Datatables::of($data)
        ->addIndexColumn()

        ->addColumn('action', function($data) {
            if ($data->active == '1') 
            {
                return  '<div class="text-center">'.
                            '<button class="btn btn-warning btn-edit btn-sm" 
                                    onclick="edit('.$data->id.')"
                                    type="button" 
                                    title="Edit">
                                    <i class="fa fa-pencil"></i>
                            </button>'.'
                            <button id="status'.$data->id.'" 
                                        onclick="status('.$data->id.')" 
                                        class="btn btn-primary btn-sm" 
                                        title="Aktif">
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                    </button>'.
                        '</div>';
            }else{
                return  '<div class="text-center">'.
                                    '<button id="status'.$data->id.'" 
                                        onclick="status('.$data->id.')" 
                                        class="btn btn-danger btn-sm" 
                                        title="Tidak Aktif">
                                        <i class="fa fa-minus-square" aria-hidden="true"></i>
                                    </button>'.
                                '</div>';
            }
        })
        ->rawColumns(['tempat_tgl_lahir', 'action'])
        ->make(true);
    }

    public function change(Request $request)
    {
        DB::beginTransaction();
        try {
            $pekerjaan = d_pekerjaan::findOrFail($request->id);
            $pekerjaan->active = $pekerjaan->active == 1 ? 0 : 1;
            $pekerjaan->save();
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
