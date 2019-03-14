@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Proses Pencatatan Hasil Produksi Dengan Rencana </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Produksi</span> 
        / <a href="{{route('pencatatanhasil')}}"><span>Pencatatan Hasil Produksi</span> </a>
        / <span class="text-primary" style="font-weight: bold;">Proses Pencatatan Hasil Produksi Dengan Rencana</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-lg-4 col-md-5 col-sm-12 col-12">

        <hr>

            <table class="table table-striped">

              <tbody>
                <tr>
                  <td class="font-weight-bold">Kode SPK</td>
                  <td>SPK/PR/20190402/1</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Barang Produksi</td>
                  <td>Paving Abu</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Jumlah Rencana Produksi</td>
                  <td>100</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Satuan</td>
                  <td>Biji</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Jumlah Semen</td>
                  <td>100</td>
                </tr>
              </tbody>

            </table>

        <hr>

      </div>

      <div class="col-lg-8 col-md-7 col-sm-12 col-12">
        
        <div class="card">
            <div class="card-header bordered p-2">
              <div class="header-block">
                <h3 class="title"> Proses Pencatatan Hasil Produksi Dengan Rencana </h3>
              </div>
              <div class="header-block pull-right">
                <a href="{{route('pencatatanhasil')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-block">
                <section>
                  
                  <fieldset>
                    <div class="row">
                      
                      <div class="col-md-4 col-sm-5 col-12">
                        <label>Kode Hasil Produksi</label>
                      </div>

                      <div class="col-md-8 col-sm-7 col-12">
                        <div class="form-group">
                          <input type="text" readonly="" class="form-control form-control-sm" name="">
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-5 col-12">
                        <label>Tanggal Produksi</label>
                      </div>

                      <div class="col-md-5 col-sm-7 col-12">
                        <div class="form-group">
                          <input type="text" readonly="" class="form-control form-control-sm" name="">
                        </div>
                      </div>


                      <div class="col-md-4 col-sm-5 col-12">
                        <label>Jumlah Produksi</label>
                      </div>

                      <div class="col-md-5 col-sm-7 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm" name="">
                        </div>
                      </div>


                      <div class="col-md-4 col-sm-5 col-12">
                        <label>Satuan</label>
                      </div>

                      <div class="col-md-5 col-sm-7 col-12">
                        <div class="form-group">
                          <select class="form-control form-control-sm">
                            <option>--Pilih--</option>
                          </select>
                        </div>
                      </div>


                      <div class="col-md-4 col-sm-5 col-12">
                        <label>Jumlah Semen</label>
                      </div>

                      <div class="col-md-5 col-sm-7 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm" name="">
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-5 col-12">
                        <label>Satuan</label>
                      </div>

                      <div class="col-md-5 col-sm-7 col-12">
                        <div class="form-group">
                          <select class="form-control form-control-sm">
                            <option>--Pilih--</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-5 col-12">
                        <label>Jumlah Orang</label>
                      </div>

                      <div class="col-md-5 col-sm-7 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm" name="">
                        </div>
                      </div>

                    </div>
                  </fieldset>

                </section>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="button">Simpan</button>
              <a href="{{route('pencatatanhasil')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

      </div>

      <div class="col-12">
        <div class="card">
          <div class="card-header bordered p-3">
            <h1>Laporan Progress</h1>
          </div>
          <div class="card-block">
            <div class="table-responsive">
              <table cellspacing="0" class="table  table-bordered table-striped table-hover" id="tabel_laporan">
                <thead class="bg-primary">
                  <tr>
                    <th>No</th>
                    <th>Progress</th>
                    <th>Jumlah Produksi</th>
                    <th>Satuan</th>
                    <th>Jumlah Semen</th>
                    <th>Satuan</th>
                    <th>Jumlah </th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
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

    var ktl;

    ktl = $('#tabel_laporan').DataTable();

  });

</script>
@endsection