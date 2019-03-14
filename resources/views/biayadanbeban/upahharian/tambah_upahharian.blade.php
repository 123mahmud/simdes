@extends('main')

@section('extra_style')
<style type="text/css">
  .h-15px{
    height: 15px;
  }
</style>
@endsection

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Upah Harian </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Biaya dan Beban</span> 
        / <a href="{{route('upahharian')}}">Upah Harian</a>
        / <span class="text-primary font-weight-bold">Tambah Upah Harian</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
            <div class="card-header bordered p-2">
              <div class="header-block">
                    <h3 class="title"> Tambah Upah Harian </h3>
                </div>
            <div class="header-block pull-right">
              <a class="btn btn-secondary btn-sm" href="{{route('upahharian')}}"><i class="fa fa-arrow-left"></i></a>
            </div>
            </div>
            <div class="card-block">
              
                <section>

                  <div class="row">

                    <div class="col-md-3 col-sm-4 col-12">
                      <label>Nama Pegawai</label>
                    </div>

                    <div class="col-md-9 col-sm-8 col-12">
                      <div class="form-group">
                        <select class="form-control form-control-sm select2" name="">
                          <option value="" selected="">--Pilih--</option>
                          <option value="1">Alpha - Direktur</option>
                          <option value="2">Bravo - Admin</option>
                          <option value="3">Charlie - Office Boy</option>
                        </select>
                      </div>
                    </div>


                    <div class="col-md-3 col-sm-4 col-12">
                      <label>Pilih Upah</label>
                    </div>

                    <div class="col-md-3 col-sm-8 col-12">
                      <div class="form-group">
                        <select class="form-control form-control-sm select2" name="">
                          <option>--Pilih--</option>
                        </select>
                      </div>
                    </div>


                    <div class="col-md-3 col-sm-4 col-12">
                      <label>Nilai Upah</label>
                    </div>

                    <div class="col-md-3 col-sm-8 col-12">
                      <div class="form-group">
                        <input type="text" readonly="" class="form-control form-control-sm" name="">
                      </div>
                    </div>


                    <div class="col-md-3 col-sm-4 col-12">
                      <label>Jumlah Hari Masuk</label>
                    </div>

                    <div class="col-md-3 col-sm-8 col-12">
                      <div class="form-group">
                        <input type="number" min="0" class="form-control form-control-sm" name="">
                      </div>
                    </div>
                    
                  </div>
                  
                </section>


            </div>

            <div class="card-footer text-right">
              <button class="btn btn-primary" type="button">Simpan</button>
              <a href="{{route('upahharian')}}" class="btn btn-secondary">Kembali</a>
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

    



  });

</script>
@endsection