@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Pencatatan Produksi Tanpa Rencana </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Produksi</span> 
        / <a href="{{route('produksitanparencana')}}">Pencatatan Produksi Tanpa Rencana</a>
        / <span class="text-primary font-weight-bold">Tambah Pencatatan Produksi Tanpa Rencana</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
            <div class="card-header bordered p-2">
              <div class="header-block">
                  <h3 class="title"> Tambah Pencatatan Produksi Tanpa Rencana </h3>
              </div>
              <div class="header-block pull-right">
                <a class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-block">
                <section>
                  <form>
                    <div class="row">

                      <div class="col-md-3 col-sm-4 col-12">
                        <label>Kode Produksi Tanpa Rencana</label>
                      </div>

                      <div class="col-md-3 col-sm-8 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm" readonly="" name="">
                        </div>
                      </div>

                      <div class="col-md-3 col-sm-4 col-12">
                        <label>Tanggal Rencana Produksi</label>
                      </div>

                      <div class="col-md-3 col-sm-8 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y')}}" name="">
                        </div>
                      </div>

                      <div class="col-md-3 col-sm-4 col-12">
                        <label>Nama Barang</label>
                      </div>

                      <div class="col-md-9 col-sm-8 col-12">
                        <div class="form-group">
                          <select class="select2 form-control form-control-sm" id="barang_produksi" name="barang_produksi">
                            <option>--Pilih--</option>
                            <option>Paving</option>
                            <option>Paving Abu</option>
                            <option>Paving Merah</option>
                          </select>
                        </div>
                      </div>


                      <div class="col-md-3 col-sm-4 col-12">
                        <label>Jumlah Produksi</label>
                      </div>

                      <div class="col-md-3 col-sm-8 col-12">
                        <div class="form-group">
                          <input type="number" min="0" class="form-control form-control-sm" name="">
                        </div>
                      </div>

                      <div class="col-md-3 col-sm-6 col-12">
                        <label>Jenis Adonan</label>
                      </div>

                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                          <select class="form-control form-control-sm select2">
                            <option value="" selected="" disabled="">--Pilih--</option>
                          </select>
                        </div>
                      </div>        


                      <div class="col-md-3 col-sm-4 col-12">
                        <label>Satuan</label>
                      </div>

                      <div class="col-md-9 col-sm-8 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm" name="" readonly=""> 
                        </div>
                      </div>              

                      <div class="col-md-3 col-sm-6 col-12">
                        <label>Mesin</label>
                      </div>

                      <div class="col-md-9 col-sm-6 col-12">
                        <div class="form-group">
                          <select class="form-control form-control-sm select2">
                            <option value="" selected="" disabled="">--Pilih--</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-3 col-sm-4 col-12">
                        <label>Jumlah Semen di Sistem</label>
                      </div>

                      <div class="col-md-9 col-sm-8 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm" name="" readonly=""> 
                        </div>
                      </div>                      


                    </div>
                  </form>
                </section>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="button">Simpan</button>
              <a href="{{route('produksitanparencana')}}" class="btn btn-secondary">Kembali</a>
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

    $('#barang_produksi').focus();

  });

</script>
@endsection