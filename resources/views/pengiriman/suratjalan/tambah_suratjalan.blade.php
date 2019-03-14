@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Surat Jalan </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Pengiriman</span> 
        / <a href="{{route('suratjalan')}}">Surat Jalan</a>
        / <span class="text-primary font-weight-bold">Tambah Surat Jalan</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                          <h3 class="title"> Tambah Surat Jalan </h3>
                      </div>

                    <div class="header-block pull-right">
                      <a class="btn btn-secondary btn-sm" href="{{route('tambah_suratjalan')}}"><i class="fa fa-arrow-left"></i></a>
                    </div>
                    </div>
                    <div class="card-block">
                      <section>

                          <div class="row">
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nota</label>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <select class="form-control form-control-sm select2" name="nota" id="nota">
                                  <option value="" selected="" disabled="">--Pilih--</option>
                                  <option value="1">ini-nota-pos-123</option>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>No Surat Jalan</label>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input type="text" readonly="" class="form-control form-control-sm" id="suratjalan" value="00001" name="suratjalan">
                              </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama Customer</label>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input type="text" readonly="" class="form-control form-control-sm" value="" id="customer" name="">
                              </div>
                            </div>


                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Jadwal</label>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input type="text" readonly="" class="form-control form-control-sm" value="" name="" id="jadwal">
                              </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Alamat</label>
                            </div>

                            <div class="col-md-9 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <textarea class="form-control" readonly="" name="" id="alamat"></textarea>
                              </div>
                            </div>


                          </div>

                          <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="table_barang" cellspacing="0">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Barang</th>
                                            <th width="10%">Qty</th>
                                            <th>Nama Pemilik</th>
                                            <th>Nopol</th>
                                            <th>Sopir</th>
                                            <th>Ongkos Kirim per Jumlah Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                        </section>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="button">Simpan</button>
                      <a href="{{route('suratjalan')}}" class="btn btn-secondary">Kembali</a>
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
    var table, counter_strike__battlefield;
    table = $('#table_barang').DataTable();
    counter_strike__battlefield   = 0;

    $('#nota').change(function(){
      var ini, customer, jadwal, alamat;

      table.clear().draw();

      ini = $(this);
      customer  = $('#customer');
      jadwal    = $('#jadwal');
      alamat    = $('#alamat');

      if (ini.val() !== '') {
        customer.val('Alpha');
        jadwal.val('07-02-2019 23:59:59');
        alamat.val('Jl. Alpha Sbby');

        table.row.add([
          'Paving Abu',
          '10',
          'Alpha',
          'L 123 U',
          'Su Ep',
          'Rp. 20.000,00'
          ]).draw();

        table.row.add([
          'Paving Merah',
          '10',
          'Alpha',
          'L 789 BV',
          'Paijo',
          'Rp. 22.000,00'
          ]).draw();
        
        table.row.add([
          'Paving Abu',
          '10',
          'Alpha',
          'L 456 UD',
          'Wawan',
          'Rp. 23.000,00'
          ]).draw();
       counter_strike__battlefield++;  
      } else {
        table.clear().draw();
        customer.val('');
        jadwal.val('');
        alamat.val('');
      }
    });
  });

</script>
@endsection