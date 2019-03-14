@extends('main')

@section('content')



<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Rencana Pembelian </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Purchasing</span> 
        / <a href="{{route('rencanapembelian')}}"><span>Rencana Pembelian</span> </a>
        / <span class="text-primary" style="font-weight: bold;">Tambah Rencana Pembelian</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                        <h3 class="title"> Tambah Rencana Pembelian </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('rencanapembelian')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
                      </div>
                    </div>
                    <div class="card-block">
                        <section>
                          <form id="form_purchase_plan">
                            <fieldset>
                              <div class="row">
                                
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Kode Rencana Pembelian</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly placeholder="( Auto )">
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Tanggal Rencana Pembelian</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y')}}" name="pp_tanggal" id="pp_tanggal">
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Staff</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input type="hidden" name="pp_officer" value="{{ Auth::user()->id }}">
                                    <input type="text" class="form-control form-control-sm" readonly="" name="" value="{{ Auth::user()->name }}">
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Suplier</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <select class="form-control form-control-sm " name="pp_supplier" id="pp_supplier">
                                    </select>
                                </div>
                              </div>
                            </fieldset>

                            <div class="table-responsive mt-3">
                              <table class="table table-hover table-striped table-bordered" id="table_purchase_plan_dt">
                                <thead class="bg-primary">
                                  <tr>
                                    <th width="35%">Kode | Barang</th>
                                    <th width="10%">Qty</th>
                                    <th width="10%">Satuan</th>
                                    <th>Harga Prev / Satuan Utama</th>
                                    <th width="10%">Stok Gudang</th>
                                    <th width="10%">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><select class="form-control form-control-sm" name="ppdt_item[]"></select></td>
                                    <td><input type="number" min="1" class="form-control form-control-sm text-right" name="ppdt_qty[]"></td>
                                    <td>
                                      <select class="form-control-sm form-control" name="ppdt_satuan[]">
                                      </select>
                                    </td>
                                    <td>
                                      <input type="text" class="text-right form-control form-control-sm" readonly="" name="ppdt_prev_price[]">
                                    </td>
                                    <td>
                                      <input type="text" class="text-right form-control form-control-sm" readonly="" name="stock[]">
                                    </td>
                                    <td align="center">
                                      <div class="btn-group">
                                          <button title="Tambah Item" class="btn btn-primary btn-tambah" type="button" onclick="append_purchase_plan_dt()"><i class="fa fa-plus"></i></button>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </form>
                        </section>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="button" onclick="insert_purchase_plan()" title="Simpan">Simpan</button>
                      <a href="{{route('rencanapembelian')}}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

      </div>

    </div>

  </section>

</article>

@endsection

@section('extra_script')
<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click', '.btn-hapus', function(){
      $(this).parents('tr').remove();
    });

    $('.btn-tambah').on('click',function(){
      $('#table_rencana tbody')
      .append(
        '<tr>'+
          '<td align="center">#</td>'+
          '<td><input type="text" class="form-control form-control-sm" name=""></td>'+
          '<td><input type="number" min="1" class="form-control form-control-sm" name=""></td>'+
          '<td><select class="form-control-sm form-control"></select></td>'+
          '<td><input type="text" class="form-control form-control-sm" readonly="" name=""></td>'+
          '<td><input type="text" class="form-control form-control-sm" readonly="" name=""></td>'+
          '<td align="center"><button class="btn btn-danger btn-hapus" type="button"><i class="fa fa-trash-o"></i></button></td>'+
        '</tr>'
        );
    });


  });

</script>
  @include('purchasing/rencanapembelian/js/form_commander')
  @include('purchasing/rencanapembelian/js/form_functions')
@endsection