@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Data Aset </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Aset</span> 
        / <a href="{{route('dataaset')}}">Data Aset</a>
        / <span class="text-primary font-weight-bold">Tambah Data Aset</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
            <div class="card-header bordered p-2">
              <div class="header-block">
                  <h3 class="title"> Tambah Data Aset </h3>
              </div>
            <div class="header-block pull-right">
              <a class="btn btn-secondary btn-sm" href="{{route('dataaset')}}"><i class="fa fa-arrow-left"></i></a>
            </div>
            </div>
            <div class="card-block">
                <section>
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      
                      <div class="row">
                        
                        <div class="col-md-4 col-sm-5 col-12">
                          <label>No Aset</label>
                        </div>

                        <div class="col-md-8 col-sm-7 col-12">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control form-control-sm" readonly="" placeholder="Di isi oleh Admin" name="">
                              <div class="input-group-append">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-4 col-sm-5 col-12">
                          <label>Nama Aset <span class="text-danger">*</span></label>
                        </div>

                        <div class="col-md-8 col-sm-7 col-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="contoh: Komputer Admin" name="">
                          </div>
                        </div>


                        <div class="col-md-4 col-sm-5 col-12">
                          <label>Tanggal Pembelian <span class="text-danger">*</span></label>
                        </div>

                        <div class="col-md-8 col-sm-7 col-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y')}}" name="">
                          </div>
                        </div>



                        <div class="col-md-4 col-sm-5 col-12">
                          <label>Kelompok Aset</label>
                        </div>

                        <div class="col-md-8 col-sm-7 col-12">
                          <div class="form-group">
                            <select class="form-control form-control-sm">
                              <option value="" selected="" disabled="">--Pilih--</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-5 col-12">
                          <label>Metode Penyusutan</label>
                        </div>

                        <div class="col-md-8 col-sm-7 col-12">
                          <div class="form-group">
                            <select class="form-control form-control-sm" id="metode_penyusutan">
                              <option value="GL" selected="">GL - Garis Lurus</option>
                              <option value="SM">SM - Saldo Menurun</option>
                            </select>
                          </div>
                        </div>


                        <div class="col-12">
                          <hr>
                        </div>
                        


                        <div class="col-md-4 col-sm-5 col-12">
                          <label>Harga Pembelian <span class="text-danger">*</span></label>
                        </div>

                        <div class="col-md-8 col-sm-7 col-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-control-sm input-number text-right" name="">
                          </div>
                        </div>

                      </div>

                    </div>

                    <div class="col-md-6 col-sm-12">
                      <h6 class="font-weight-bold">Detail Terkait Kelompok dan Metode Penyusutan yang dipilih</h6>
                      <table class="table table-bordered">
                        <thead>
                          
                          <tr align="center">
                            <th>Metode</th>
                            <th>Masa Manfaat</th>
                            <th>Persentase Penyusutan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="gl" class="" align="center">
                            <td>GL - Garis Lurus</td>
                            <td> Tahun</td>
                            <td>%</td>
                          </tr>
                          <tr id="sm" class="d-none" align="center">
                            <td>SM - Saldo Menurun</td>
                            <td> Tahun</td>
                            <td>%</td>
                          </tr>
                        </tbody>
                      </table>
                      <h6 class="font-weight-bold">Detail Akun Keuangan terkait Kelompok yang dipilih</h6>

                      <ul>
                        <li>Akun Harta</li>
                        <li>Akun Akumulasi Penyusutan</li>
                        <li>Akun Beban</li>
                      </ul>
                    </div>
                  </div>
                </section>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="button">Simpan</button>
              <a href="{{route('dataaset')}}" class="btn btn-secondary">Kembali</a>
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
    $('#metode_penyusutan').change(function(){
      var ini, gl, sm;
      ini = $(this);
      gl  = $('#gl');
      sm  = $('#sm');

      if (ini.val() === 'GL') {
        gl.removeClass('d-none');
        sm.addClass('d-none');
      } else if(ini.val() == 'SM'){
        gl.addClass('d-none');
        sm.removeClass('d-none');
      } else {
        gl.addClass('d-none');
        sm.addClass('d-none');
      }

      
    });
  });
</script>
@endsection