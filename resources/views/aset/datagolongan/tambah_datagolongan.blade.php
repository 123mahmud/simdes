@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Data Golongan Aset </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Aset</span> 
        / <a href="{{route('datagolongan')}}">Data Golongan Aset</a>
        / <span class="text-primary font-weight-bold">Tambah Data Golongan Aset</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
            <div class="card-header bordered p-2">
              <div class="header-block">
                
                  <h3 class="title"> Tambah Data Golongan Aset </h3>
              </div>
              
              <div class="header-block pull-right">
                <a class="btn btn-secondary btn-sm" href="{{route('datagolongan')}}" title="Kembali"><i class="fa fa-arrow-left"></i></a>
              </div>

            </div>
            <div class="card-block">
                <section>
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      
                      <div class="row">
                        
                        <div class="col-md-4 col-sm-5 col-12">
                          <label>Nama Group Aset</label>
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
                          <label>Golongan Group <span class="text-danger">*</span></label>
                        </div>

                        <div class="col-md-8 col-sm-7 col-12">
                          <div class="form-group">
                            <div class="input-group">
                              <select class="form-control form-control-sm select2" name="">
                                <option value="" selected="" disabled="">--Pilih--</option>
                              </select>
                              <div class="input-group-addon" title="Parameter golongan digunakan untuk pencarian data">
                                <i class="fa fa-question-circle"></i>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-4 col-sm-5 col-12">
                          <label>Nama Group Aset <span class="text-danger">*</span></label>
                        </div>

                        <div class="col-md-8 col-sm-7 col-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="contoh: Inventaris Kantor" name="">
                          </div>
                        </div>



                        <div class="col-md-4 col-sm-5 col-12">
                          <label>Keterangan Group</label>
                        </div>

                        <div class="col-md-8 col-sm-7 col-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="contoh: Kumpulan Aset Inventaris Kantor" name="">
                          </div>
                        </div>

                        <div class="col-12">
                          <hr>
                        </div>
                        
                        <div class="col-md-6 col-sm-12">
                          <label>Akun Harta <label class="text-danger">*</label></label>
                        </div>

                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <select class="form-control form-control-sm">
                              <option value="" selected="" disabled="">--Pilih--</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                          <label>Akun Akm. Penyusutan <label class="text-danger">*</label></label>
                        </div>

                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <select class="form-control form-control-sm">
                              <option value="" selected="" disabled="">--Pilih--</option>
                            </select>
                          </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                          <label>Akun Beban Penyusutan <label class="text-danger">*</label></label>
                        </div>

                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <select class="form-control form-control-sm">
                              <option value="" selected="" disabled="">--Pilih--</option>
                            </select>
                          </div>
                        </div>


                      </div>

                    </div>

                    <div class="col-md-6 col-sm-12">
                      <h6 class="font-weight-bold">Detail Terkait Golongan yang dipilih</h6>
                      <table class="table table-bordered">
                        <thead>
                          
                          <tr align="center">
                            <th>Metode</th>
                            <th>Masa Manfaat</th>
                            <th>Persentase Penyusutan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr align="center">
                            <td>Garis Lurus</td>
                            <td>4 Tahun</td>
                            <td>25%</td>
                          </tr>
                          <tr align="center">
                            <td>Saldo Menurun</td>
                            <td>4 Tahun</td>
                            <td>50%</td>
                          </tr>
                        </tbody>
                      </table>
                      <ul>
                        <li>
                          <small class="font-weight-bold">Dua Metode Diatas Akan Anda Pilih Saat Membuat Aset Baru.</small>
                        </li>
                        <li>
                          <small class="font-weight-bold">Penentuan Nilai Masa Manfaat Dan Persentase Penyusutan, Sesuai Dengan <a href="https://www.google.co.id/search?q=psak+no+17&amp;oq=&amp;sourceid=chrome&amp;ie=UTF-8" target="_blank">PSAK Nomor 17.</a></small>
                        </li>
                      </ul>
                    </div>
                  </div>
                </section>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="button">Simpan</button>
              <a href="{{route('datagolongan')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

      </div>

    </div>

  </section>

</article>

@endsection