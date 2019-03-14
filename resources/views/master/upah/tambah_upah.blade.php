@extends('main')

@section('extra_style')
<style type="text/css">
div.dataTables_wrapper div.dataTables_filter {
  text-align: left;
}
</style>
@endsection

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Data Upah </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Master</span> 
        / <a href="{{route('upah')}}">Data Upah</a>
        / <span class="text-primary font-weight-bold">Tambah Data Upah</span>
       </p>
  </div>

  <section class="section">

    <div class="row">
      <div class="col-md-4 col-sm-12 col-12" id="div_belum">
        <h5>Barang yang belum ada Upah Produksi / Upah Kirimnya</h5>
        <hr>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id="tabel_belum" cellspacing="0">
            <thead class="bg-primary">
              <tr>
                <th>Nama Barang</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-md-8 col-sm-12 col-12" id="div_form">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                        <h3 class="title"> Tambah Data Upah </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('upah')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
                      </div>
                    </div>
                    <div class="card-block">
                        <section>
                          
                            <div class="row">


                              <div class="col-md-3 col-sm-5 col-12">
                                <label>Type Upah</label>
                              </div>

                              <div class="col-md-9 col-sm-7 col-12">
                                <div class="form-group">
                                  <select class="form-control form-control-sm" name="" id="type_upah">
                                    <option value="" selected="">--Pilih--</option>
                                    <option value="UPDR">Upah Borongan Produksi</option>
                                    <option value="UPRM">Upah Borongan Pengiriman</option>
                                    <option value="UPH">Upah Harian</option>
                                    <option value="UPB">Upah Bulanan</option>
                                  </select>
                                </div>
                              </div>

                            </div>

                            <div class="row" id="div_upahmingguan">

                              
                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Nama Barang</label>
                              </div>

                              <div class="col-md-9 col-sm-6 col-12">
                                <div class="form-group">
                                  <select class="form-control form-control-sm">
                                    <option>--Pilih--</option>
                                  </select>
                                </div>
                              </div>



                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Satuan</label>
                              </div>

                              <div class="col-md-7 col-sm-6 col-12">
                                <div class="form-group">
                                  <select class="form-control form-control-sm">
                                    <option>--Pilih--</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Upah</label>
                              </div>

                              <div class="col-md-7 col-sm-6 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm text-right input-rupiah" name="">
                                </div>
                              </div>

                            </div>

                            <div class="row d-none" id="div_upahharianbulanan">
                              
                              
                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Nama Upah</label>
                              </div>

                              <div class="col-md-9 col-sm-6 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" name="">
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Upah</label>
                              </div>

                              <div class="col-md-7 col-sm-6 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm text-right input-rupiah" name="">
                                </div>
                              </div>
                            </div>

                        </section>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="button">Simpan</button>
                      <a href="{{route('upah')}}" class="btn btn-secondary">Kembali</a>
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
    var eueue = $('#tabel_belum').DataTable({
      "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false
    });
    // !important
    $('div[id^="tabel_belum"]').find('.row:first-child').find('.col-md-6:first-child').remove();
    // end !important

    $('#type_upah').change(function(){
      eueue.clear().draw();

      if ($(this).val() === 'UPRM' || $(this).val() === 'UPDR') {
        $('#div_upahmingguan').removeClass('d-none');
        $('#div_form').removeClass('col-md-12');
        $('#div_form').addClass('col-md-8');
        $('#div_upahharianbulanan').addClass('d-none');

        $('#div_belum').removeClass('d-none');
        // for ( $i = 0; $i < 10; $i++) {
          eueue.row.add([
            'Semen'
            ]).draw(false);

          eueue.row.add([
            'Sirtu'
            ]).draw(false);
          eueue.row.add([
            'Abu Batu'
            ]).draw(false);
        // }
      } else if($(this).val() === 'UPH' || $(this).val() === 'UPB'){
        $('#div_belum').addClass('d-none');
        $('#div_upahmingguan').addClass('d-none');

        $('#div_upahharianbulanan').removeClass('d-none');

        $('#div_form').removeClass('col-md-8');
        $('#div_form').addClass('col-md-12');
      }
    });
  });

</script>
@endsection