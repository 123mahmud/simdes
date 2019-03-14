@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Upah Borongan </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Biaya dan Beban</span> 
        / <a href="{{route('upahborongan')}}">Upah Borongan</a>
        / <span class="text-primary font-weight-bold">Tambah Upah Borongan</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                          <h3 class="title"> Tambah Upah Borongan </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('upahborongan')}}" class="btn btn-secondary btn-sm" title="Kembali"><i class="fa fa-arrow-left"></i></a>
                        
                      </div>
                    </div>
                    <div class="card-block">
                        <section>


                            
                            <div class="row">
                              <div class="col-lg-6 col-12">
                                <div class="row">

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <label>Nama Upah</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" id="nama_upah" name="nama_upah">
                                      </div>
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-12">
                                      <label>PCS</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="number" class="form-control form-control-sm" id="pcs" name="pcs">
                                      </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <label>UM</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="number" class="form-control form-control-sm" id="um" name="um">
                                      </div>
                                    </div>

                                    

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <label>Rata-rata Produksi</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" id="rata2_produksi" name="rata2_produksi">
                                      </div>
                                    </div>

                                    

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <label>Total UM</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" id="total_um" name="total_um">
                                      </div>
                                    </div>

                                    

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <label>Jumlah Orang</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control input-sm" id="jumlah_orang" name="jumlah_orang">
                                      </div>
                                    </div>

                                    
                                </div>
                              </div>

                              <div class="col-lg-6 col-12">
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-12">
                                      <label>Total Upah</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" readonly="" id="total_upah" name="total_upah">
                                      </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <label>Hasil Produksi</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" readonly="" id="hasil_produksi" name="hasil_produksi">
                                      </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <label>Total Hasil Produksi</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" readonly="" id="total_hasilproduksi" name="total_hasilproduksi">
                                      </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <label>Rata-rata per orang</label>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" readonly="" id="rata2_perorang" name="rata2_perorang">
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>

                        </section>
                    </div>

                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="button">Simpan</button>
                      <a href="{{route('upahborongan')}}" class="btn btn-secondary">Kembali</a>
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


    $('#pcs, #um').keyup(function(){
      var pcs = $('#pcs').val();
      var um = $('#um').val();

      var total_upah = parseInt(pcs) + parseInt(um);

      if(isNaN(total_upah)){
        if(pcs === '' && um === '') {
          total_upah = parseInt(0);
          console.log('3');
        } else if(pcs === ''){
          total_upah = parseInt(um);
          console.log('1');
        } else if(um === ''){
          total_upah = parseInt(pcs);
          console.log('2');
        }
      }

      $('#total_upah').val(total_upah);
    });

    $('#rata2_produksi').keyup(function(){
      var rata2_produksi = $('#rata2_produksi').val();
      var pcs = $('#pcs').val();

      var hasil_produksi = parseInt(pcs) * parseInt(rata2_produksi);

      $('#hasil_produksi').val(hasil_produksi);
    });

    $('#total_um').keyup(function(){

      var hasil_produksi = $('#hasil_produksi').val();

      var total_um = $(this).val();

      var total_hasilproduksi = parseInt(hasil_produksi) + parseInt(total_um);

      $('#total_hasilproduksi').val(total_hasilproduksi);

    });

    $('#jumlah_orang').keyup(function(){
      var total_hasilproduksi = $('#total_hasilproduksi').val();

      var jumlah_orang = $(this).val();

      var rata2_perorang = parseInt(total_hasilproduksi) / parseInt(jumlah_orang);

      $('#rata2_perorang').val(rata2_perorang);
    });

  });

</script>
@endsection