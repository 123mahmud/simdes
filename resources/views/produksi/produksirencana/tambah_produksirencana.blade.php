@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Pencatatan Produksi Dengan Rencana </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Produksi</span> 
        / <a href="{{route('produksirencana')}}">Pencatatan Produksi Dengan Rencana</a>
        / <span class="text-primary font-weight-bold">Tambah Pencatatan Produksi Dengan Rencana</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                          <h3 class="title"> Tambah Pencatatan Produksi Dengan Rencana </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('produksirencana')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                      </div>
                    </div>
                    <div class="card-block">
                        <section>
                          
                          <div class="row">

                            <div class="col-md-3 col-sm-6 col-12">
                              <label>Kode Rencana</label>
                            </div>

                            <div class="col-md-9 col-sm-6 col-12">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-sm" readonly="" name="">
                              </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-12">
                              <label>Nota POS Order</label>
                            </div>

                            <div class="col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                <select class="form-control form-control-sm select2" id="nota">
                                  <option disabled="" selected="" value="">--Pilih Nota POS Order--</option>
                                  <option value="1">PO/20190129/1</option>
                                </select>
                              </div>
                            </div>


                            <div class="col-md-3 col-sm-6 col-12">
                              <label>Nama Customer</label>
                            </div>

                            <div class="col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-sm" readonly="" name="">
                              </div>
                            </div>

                          </div>

                          <div class="row">

                            <div class="col-md-6 col-sm-12 col-12">

                              <div class="row">
                                
                                <div class="col-md-6 col-sm-6 col-12">
                                  <label>Tanggal Rencana Produksi</label>
                                </div>

                                <div class="col-md-6 col-sm-6 col-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" id="tanggal_rencana" name="tanggal_rencana">
                                  </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6 col-12">
                                  <label>Lama Produksi</label>
                                </div>

                                <div class="col-md-6 col-sm-6 col-12">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="number" min="0" class="form-control form-control-sm" id="jumlah_hari" name="jumlah_hari">
                                      <span class="input-group-addon">
                                        Hari
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6 col-12">
                                  <label>Target Selesai </label>
                                </div>

                                <div class="col-md-6 col-sm-6 col-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly="" id="target_selesai" name="target_selesai">
                                  </div>
                                </div>

                              </div>

                            </div>

                          </div>

                          <div class="row">
                            
                            <div class="col-md-3 col-sm-6 col-12">
                              <label>Jenis Mesin</label>
                            </div>

                            <div class="col-md-9 col-sm-6 col-12">
                              <div class="form-group">
                                <select class="form-control form-control-sm select2">
                                </select>
                              </div>
                            </div>
                            
                          </div>

                          <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" cellspacing="0" id="table_produksi">
                              
                              <thead class="bg-primary">
                                <tr>
                                  <th>Barang</th>
                                  <th>Satuan</th>
                                  <th>Jenis Adonan</th>
                                  <th>Qty</th>
                                  <th>Qty Semen Sistem</th>
                                  <th>Stok</th>
                                </tr>
                              </thead>
                              <tbody></tbody>


                            </table>
                          </div>
                          

                        </section>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" id="btn-simpan-rencana"{{--masa depanku dengannya--}} type="button">Proses</button>
                      <a class="btn btn-secondary" href="{{route('produksirencana')}}">Kembali</a>
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

    var table = $('#table_produksi').DataTable({
      searching : false,
      paging : false
    });

    var counter = 0;

    $('#tanggal_rencana').datepicker({
      enableOnReadonly:false,
      format:'dd-mm-yyyy'
    }).on('changeDate', function(){

      var ini   = $(this).datepicker('getDate');
      var hari  = parseInt($('#jumlah_hari').val());

      if($('#jumlah_hari').val() === '' || $('#jumlah_hari').val().length === 0){
        hari = parseInt(0);
      }

      ini.setDate(ini.getDate() + hari);


      $('#target_selesai').datepicker('setDate', ini);
      // console.log(ini);
    });

    $('#jumlah_hari').keyup(function(){

      if($('#tanggal_rencana').val() === '' || $('#tanggal_rencana').val().length === 0){
        $('#tanggal_rencana').datepicker('setDate', '0d');        
      }

      var tanggal_rencana = $('#tanggal_rencana').datepicker('getDate');
      var ini             = parseInt($(this).val());


      tanggal_rencana.setDate(tanggal_rencana.getDate() + ini);

      $('#target_selesai').datepicker('setDate', tanggal_rencana);
    });

    $('#target_selesai').datepicker({
      format:'dd-mm-yyyy',
      enableOnReadonly:false
    });


    function datatable_append(){
      table.row.add(
        [
        'Paving T8',
        'Pcs',
        '<select class="form-control-sm form-control select2 jenis_adonan" name="jenis_adonan[]">'+
          '<option value="" disabled="" selected="">--Pilih--</option>'+
          '<option value="1">k-150</option>'+
          '<option value="2">k-200</option>'+
          '<option value="3">k-250</option>'+
        '</select>',
        '<input type="number" min="0" class="form-control-sm form-control" value="0">',
        '<input type="text" class="form-control form-control-sm qty_semen_sistem" value="" readonly>',
        '<input type="text" class="form-control form-control-sm stok_sistem" value="" readonly>'
        ]).draw();
      table.row.add([
        'Paving Merah',
        'Pcs',
        '<select class="form-control-sm form-control select2 jenis_adonan" name="jenis_adonan[]">'+
          '<option value="" disabled="" selected="">--Pilih--</option>'+
          '<option value="1">k-150</option>'+
          '<option value="2">k-200</option>'+
          '<option value="3">k-250</option>'+
        '</select>',
        '<input type="number" min="0" class="form-control-sm form-control" value="0">',
        '<input type="text" class="form-control form-control-sm qty_semen_sistem" value="" readonly>',
        '<input type="text" class="form-control form-control-sm stok_sistem" value="" readonly>'
        ]).draw();
      table.row.add([
        'Paving Abu',
        'Pcs',
        '<select class="form-control-sm form-control select2 jenis_adonan" name="jenis_adonan[]">'+
          '<option value="" disabled="" selected="">--Pilih--</option>'+
          '<option value="1">k-150</option>'+
          '<option value="2">k-200</option>'+
          '<option value="3">k-250</option>'+
        '</select>',
        '<input type="number" min="0" class="form-control-sm form-control" value="0">',
        '<input type="text" class="form-control form-control-sm qty_semen_sistem" value="" readonly>',
        '<input type="text" class="form-control form-control-sm stok_sistem" value="" readonly>'
        ]).draw();

      counter++;

      $('.select2').select2();
    }

    $('#nota').change(function(){

      if ($(this).val() != '' && counter === 0) {
        datatable_append();
      }

    });

    $('#table_produksi tbody').on('change', '.jenis_adonan', function(){

      var parents, qty_semen_sistem, stok_sistem, ini;
      ini = $(this);

      parents = ini.parents('tr');


      qty_semen_sistem = parents.find('.qty_semen_sistem');

      stok_sistem = parents.find('.stok_sistem');

      if (ini.val() === '1') {
        qty_semen_sistem.val('150');
        stok_sistem.val('150');
      } else if(ini.val() === '2'){
        qty_semen_sistem.val('200');
        stok_sistem.val('200');
      } else if(ini.val() === '3'){
        qty_semen_sistem.val('250');
        stok_sistem.val('250');
      } else {
        // console.log('eroro');
      }


    });


  });

</script>
@endsection