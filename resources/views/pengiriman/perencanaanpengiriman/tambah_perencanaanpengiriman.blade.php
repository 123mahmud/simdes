@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Perencanaan Pengiriman </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Pengiriman</span> 
        / <a href="{{route('perencanaanpengiriman')}}"> Perencanaan perencanaanpengiriman</a>
        / <span class="text-primary font-weight-bold" >Tambah Perencanaan Pengiriman</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
            <div class="card-header bordered p-2">
              <div class="header-block">
                  <h3 class="title"> Tambah Perencanaan Pengiriman </h3>
              </div>
              <div class="header-block pull-right">
                <a href="{{route('perencanaanpengiriman')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-block">
                <section>
                  <fieldset>
                      <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                          <label>Nota</label>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="form-group">
                            <select class="form-control form-control-sm select2" id="nota" name="nota">
                              <option value="" selected="" disabled="">--Pilih--</option>
                              <option value="1">POS-TO/20190207/1</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                          <label>Nama Customer</label>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="form-group">
                            <input type="text " class="form-control form-control-sm" readonly="" value="Alpha" id="customer" name="customer">
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                          <label>Alamat</label>
                        </div>

                        <div class="col-md-9 col-sm-6 col-12">
                          <div class="form-group">
                            <textarea class="form-control" readonly="" name=""></textarea>
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                          <label>Jadwal</label>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="form-group">
                            <input type="text " class="form-control form-control-sm datetimepicker" id="jadwal" name="jadwal">
                          </div>
                        </div>

                      </div>
                  </fieldset>
                  <div class="mt-3 table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="table_listbarang" cellspacing="0">
                      <thead class="bg-primary">
                        <tr>
                          <th>Barang</th>
                          <th width="1%">Satuan</th>
                          <th width="1%">Qty</th>
                          <th width="10%">Pemilik Kendaraan</th>
                          <th width="15%">Nama Pemilik</th>
                          <th width="15%">Nopol</th>
                          <th>Sopir</th>
                          <th width="20%">Ongkos Kirim per Jumlah Barang</th>

                        </tr>
                      </thead>
                    </table>
                  </div>
                </section>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="button">Simpan</button>
              <a href="{{route('perencanaanpengiriman')}}" class="btn btn-secondary">Kembali</a>
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
    var eueue = $('#table_listbarang').DataTable();

    var counter = 0;

    $('#nota').change(function(){

      var ini = $(this).val();

      eueue.row.add([
        'Paving Abu',
        'PCS',
        '100',
        '<select class="form-control form-control-sm pemilik_kendaraan">'+
          '<option value="">--Pilih--</option>'+
          '<option value="1">Alexis</option>'+
          '<option value="2">Customer</option>'+
        '</select>',
        '<input type="text" class="form-control form-control-sm nama_pemilik" readonly="">',
        '<select class="form-control form-control-sm pilih_nopol" readonly="">'+          
        '</select>',
        '<input type="text" class="form-control form-control-sm nama_sopir" readonly="">',
        '<input type="text" readonly="" class="form-control form-control-sm" value="Rp. 20.000,00/100">'


      ]).draw();

      eueue.row.add([
        'Paving Merah',
        'PCS',
        '120',
        '<select class="form-control form-control-sm pemilik_kendaraan">'+
          '<option value="">--Pilih--</option>'+
          '<option value="1">Alexis</option>'+
          '<option value="2">Customer</option>'+
        '</select>',
        '<input type="text" class="form-control form-control-sm nama_pemilik" readonly="">',
        '<select class="form-control form-control-sm pilih_nopol" readonly="">'+          
        '</select>',
        '<input type="text" class="form-control form-control-sm nama_sopir" readonly="">',
        '<input type="text" readonly="" class="form-control form-control-sm" value="Rp. 21.000,00/100">'


      ]).draw();

      eueue.row.add([
        'Paving 8T',
        'PCS',
        '50',
        '<select class="form-control form-control-sm pemilik_kendaraan">'+
          '<option value="">--Pilih--</option>'+
          '<option value="1">Alexis</option>'+
          '<option value="2">Customer</option>'+
        '</select>',
        '<input type="text" class="form-control form-control-sm nama_pemilik" readonly="">',
        '<select class="form-control form-control-sm pilih_nopol" readonly="">'+          
        '</select>',
        '<input type="text" class="form-control form-control-sm nama_sopir" readonly="">',
        '<input type="text" readonly="" class="form-control form-control-sm" value="Rp. 22.000,00/100">'


      ]).draw();      


      counter++;
    });


    $('#table_listbarang tbody').on('change', '.pemilik_kendaraan', function(){

      var ini, pemilik_kendaraan, nama_pemilik, pilih_nopol, tuwek, nama_sopir;

      ini = $(this);
      tuwek = ini.parents('tr');
      
      nama_pemilik = tuwek.find('.nama_pemilik');
      pilih_nopol = tuwek.find('.pilih_nopol');
      nama_sopir = tuwek.find('.nama_sopir');
      

      if (ini.val() === '1') {
        nama_pemilik.val('CV. Alexis');
        pilih_nopol.attr('readonly', false);
        pilih_nopol.html(
          '<option value="">--Pilih--</option>'+
          '<option value="1">L 1234 UD</option>'+
          '<option value="2">L 4321 BV</option>');
        nama_sopir.val('');
      } else if(ini.val() === '2'){
        nama_pemilik.val('Alpha');
        pilih_nopol.attr('readonly', false);
        pilih_nopol.html(
          '<option value="">--Pilih--</option>'+
          '<option value="1">L 6789 UD</option>'+
          '<option value="2">L 9876 BV</option>');
        nama_sopir.val('');
      } else {
        nama_pemilik.val('');
        pilih_nopol.attr('readonly', true);
        pilih_nopol.html('');
        nama_sopir.val('');

      }

    });

    $('#table_listbarang tbody').on('change', '.pilih_nopol', function(){

      var ini, tuwek, nama_sopir, pemilik_kendaraan;

      ini = $(this);
      tuwek = ini.parents('tr');

      nama_sopir  = tuwek.find('.nama_sopir');
      pemilik_kendaraan  = tuwek.find('.pemilik_kendaraan');

      if (pemilik_kendaraan.val() === '1') {
        if (ini.val() === '1') {
          nama_sopir.val('Su Ep');
        } else if(ini.val() === '2'){
          nama_sopir.val('Tole');
        } else {
          nama_sopir.val('');
        }
      } else if(pemilik_kendaraan.val() === '2'){
        if (ini.val() === '1') {
          nama_sopir.val('Paijo');
        } else if(ini.val() === '2'){
          nama_sopir.val('Wawan');
        } else {
          nama_sopir.val('');
        }
      }
    });
  });
</script>
@endsection