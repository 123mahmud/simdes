@extends('main')

@section('content')


<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Upah Borongan Produksi </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Produksi</span> 
        / <a href="{{route('upahboronganproduksi')}}"><span>Upah Borongan Produksi</span> </a>
        / <span class="text-primary font-weight-bold">Tambah Upah Borongan Produksi</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
            <div class="card-header bordered p-2">
              <div class="header-block">
                <h3 class="title"> Tambah Upah Borongan Produksi </h3>
              </div>
              <div class="header-block pull-right">
                <a href="{{route('upahboronganproduksi')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-block">
                <section>

                  <fieldset class="mb-3">
                    <div class="row">
                      <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="form-group top-totalprice">
                          <label>Total Bonus</label>
                          <input type="text" class="form-control text-center" readonly="" name="">
                        </div>
                      </div>
                      <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="form-group top-totalprice">
                          <label>Total Upah</label>
                          <input type="text" class="form-control text-right" readonly="" name="">
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="mb-3">
                    <div class="row">

                      <div class="col-md-3 col-sm-4 col-12">
                        <label>Pilih Periode Produksi</label>
                      </div>

                      <div class="col-md-9 col-sm-8 col-12">
                        <div class="form-group">
                          <div class="input-group input-daterange">
                            <input type="text" class="form-control form-control-sm" name="" id="date_start">
                            <span class="input-group-addon">-</span>
                            <input type="text" class="form-control form-control-sm" name="" value="" id="date_end">

                          </div>
                        </div>
                      </div>


                      
                    </div>
                  </fieldset>

                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="table_produksi" cellspacing="0">
                      <thead class="bg-primary">
                        <tr>
                          <th width="1%">No</th>
                          <th>Kode Produksi</th>
                          <th width="25%">Nama Barang</th>
                          <th>Jumlah Produksi</th>
                          <th width="10%">Reject</th>
                          <th>Nett Produksi</th>
                          <th width="15%">Upah</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>


                  <div class="row">

                    <div class="offset-lg-7 col-lg-5 offset-md-6 col-md-6 col-sm-7 offset-sm-5 col-12">

                      <fieldset>
                        <div class="row">

                            <div class="col-md-4 col-sm-5 col-12">
                              <label>Jumlah Produksi</label>
                            </div>

                            <div class="col-md-8 col-sm-7 col-12">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-sm" readonly="" name="">
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-5 col-12">
                              <label>Reject</label>
                            </div>

                            <div class="col-md-8 col-sm-7 col-12">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-sm" readonly="" name="">
                              </div>
                            </div>

                            <div class="col-md-4 col-sm-5 col-12">
                              <label>Nett Produksi</label>
                            </div>

                            <div class="col-md-8 col-sm-7 col-12">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-sm" readonly="" name="">
                              </div>
                            </div>
                                
                            <div class="col-md-4 col-sm-5 col-12">                            
                              <label>Total Upah</label>
                            </div>

                            <div class="col-md-8 col-sm-7 col-12">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-sm" readonly="" name="">
                              </div>
                            </div>

                        </div>
                      </fieldset>

                    </div>
                    
                  </div>

                  <h3>Tambahan Bonus</h3>

                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" cellspacing="0" id="table_tunjangan">
                      <thead class="bg-primary">
                        <tr>
                          <th>Jumlah Orang</th>
                          <th>Tunjangan</th>
                          <th>Jumlah</th>
                          <th>Total</th>
                          <th width="1%"><button class="btn btn-sm btn-success" id="btn-tambah-tunjangan" type="button" title="Tambah"><i class="fa fa-plus"></i></button></th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                  



                </section>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="button">Simpan</button>
              <a href="{{route('upahboronganproduksi')}}" class="btn btn-secondary">Kembali</a>
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

    var asw, eueue, date_end, date_start, counter_strike__battlefield, trash_singing_slasher;
    counter_strike__battlefield = 0;
    trash_singing_slasher = 0;

    $('.input-daterange input').trigger('change');

    eueue = $('#table_produksi').DataTable({
      paging:false,
      searching:false
    });

    asw   = $('#table_tunjangan').DataTable({
      paging:false,
      searching:false,
      "columnDefs": [
        { "orderable": false, "targets": 4 }
      ]
    });

    $('#date_start').datepicker().on('changeDate', function(){
        datatable_append_produksi();
      // console.log('start');
    });

    $('#date_start').datepicker().on('changeDate', function(){
        datatable_append_produksi();
      // console.log('end');
    });

    function datatable_append_produksi(){
      eueue.clear().draw();
        eueue.row.add([
          '1',
          '<input type="text" readonly="" class="form-control form-control-sm" value="H/PTR/20190217/1">',
          '<input type="text" readonly="" class="form-control form-control-sm" value="Paving Abu">',
          '<input type="text" readonly="" class="form-control form-control-sm" value="500">',
          '<div class="input-group">'+
            '<span class="input-group-addon">2.5%</span>'+
            '<input type="text" readonly="" class="form-control form-control-sm" value="10">'+
          '</div>',
          '<input type="text" readonly="" class="form-control form-control-sm" value="450">',
          '<input type="text" readonly="" class="form-control form-control-sm text-right" value="1.000  ">',
          '<input type="text" readonly="" class="form-control form-control-sm text-right" value="500.000">',
          ]).draw(false);

        eueue.row.add([
          '2',
          '<input type="text" readonly="" class="form-control form-control-sm" value="H/PR/20190217/1">',
          '<input type="text" readonly="" class="form-control form-control-sm" value="Paving Merah">',
          '<input type="text" readonly="" class="form-control form-control-sm" value="500">',
          '<div class="input-group">'+
            '<span class="input-group-addon">10%</span>'+
            '<input type="text" readonly="" class="form-control form-control-sm" value="50">'+
          '</div>',
          '<input type="text" readonly="" class="form-control form-control-sm" value="450">',
          '<input type="text" readonly="" class="form-control form-control-sm text-right" value="1.000  ">',
          '<input type="text" readonly="" class="form-control form-control-sm text-right" value="500.000">',
          ]).draw(false);

        counter_strike__battlefield++;
      }
    // date_start = $('#date_start').datepicker({
    //   onSelect: function(dateText, inst) {
    //       $( "#date_end" ).datepicker("defaultViewDate", dateText );
    // }})
    // .on('changeDate', function(){
    //   var ini   = $(this).datepicker('getDate');
    //   var end  = $('#date_end').datepicker('getDate');


    //   var date1_ms = ini.getTime();
    //   var date2_ms = end.getTime();

    //   var diff = date2_ms-date1_ms;

    //     // get days
    //   var days = diff/1000/60/60/24;



    //   // console.log(days);
    //   datatable_append_produksi(days,ini);

    // });

    // date_end = $('#date_end').datepicker()
    // .on('changeDate', function(){
    //   var ini  = $(this).datepicker('getDate');
    //   var start  = $('#date_start').datepicker('getDate');


    //   var date1_ms = start.getTime();
    //   var date2_ms = ini.getTime();

    //   var diff = date2_ms-date1_ms;

    //     // get days
    //   var days = diff/1000/60/60/24;



    //   // console.log(days);
    //   datatable_append_produksi(days,start);
    // });


    // function datatable_append_produksi(angka,tgl_awal){

    //   eueue.clear().draw();

    //   var get_tanggal, tanggal, bulan, tahun, cov_date,parse_date;

    //   for (var i = 0; i <= angka; i++) {
    //     get_tanggal = tgl_awal.setDate(tgl_awal.getDate() + i);
    //     console.log(get_tanggal);
    //     parse_date  = new Date(get_tanggal);
    //     tanggal   = parse_date.getDate();
    //     bulan     = parse_date.getMonth();
    //     tahun     = parse_date.getFullYear();
    //     cov_date  = tanggal+'-'+bulan+'-'+tahun;

    //     eueue.row.add([
    //       '#',
    //       '<input type="hidden" value="'+ cov_date +'" name="">'+cov_date
    //       ,
    //       '<input type="number" class="form-control form-control-sm" name="">'
    //       ]).draw(false);


    //     counter_strike__battlefield++;

    //   }

    // }

    $('#btn-tambah-tunjangan').click(function(){
      datatable_append_tunjangan();
    });

    function datatable_append_tunjangan(){
      asw.row.add([
        '<input type="number" min="0" class="form-control form-control-sm orang" name="">',
        '<select class="form-control form-control-sm">'+
          '<option value="" disabled="" selected="">--Pilih--</option>'+
          '<option value="1">Transport</option>'+
          '<option value="2">Makan</option>'+
        '</select>'
        ,
        '<input type="text" class="form-control form-control-sm upah" readonly="" name="">',
        '<input type="text" class="form-control form-control-sm total_upah" readonly="" name="">',
        '<button class="btn btn-danger btn-sm btn-hapus-tunjangan" type="button"><i class="fa fa-trash-o"></i></button>'

        ]).draw();

      trash_singing_slasher++;
    }

    $('#table_tunjangan tbody').on('keyup blur', '.orang,.upah', function(){

      var tuwek, wong, bayaran, total_bayaran, totalan;

      tuwek   = $(this).parents('tr');
      wong    = tuwek.find('.orang');
      bayaran = tuwek.find('.upah');
      total_bayaran = tuwek.find('.total_upah');

      totalan = parseInt(wong.val()) * parseInt(bayaran.val());
      console.log(totalan);

      if (wong.val().length !== 0 && bayaran.val().length !== 0) {
        total_bayaran.val(totalan);
      }


    });

    $('#table_tunjangan tbody').on('click', '.btn-hapus-tunjangan', function(){
      asw.row($(this).parents('tr')).remove().draw();
    });

  });

</script>
@endsection