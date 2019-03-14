@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Biaya Pengeluaran Kecil </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Biaya dan Beban</span> 
        / <a href="{{route('pengeluarankecil')}}">Biaya Pengeluaran Kecil</a>
        / <span class="text-primary font-weight-bold">Tambah Biaya Pengeluaran Kecil</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                          <h3 class="title"> Tambah Biaya Pengeluaran Kecil </h3>
                      </div>
                    <div class="header-block pull-right">
                      <a class="btn btn-primary btn-sm" href="{{route('pengeluarankecil')}}"><i class="fa fa-arrow-left"></i></a>
                    </div>
                    </div>
                    <div class="card-block">
                        <section>

                          <div class="row">
                            <div class="col-md-3 col-sm-4 col-12">
                              <label>Tipe Pengeluaran</label>
                            </div>

                            <div class="col-md-3 col-sm-4 col-12">
                              <div class="form-group">
                                <select class="form-control form-control-sm" name="" id="tipe_pengeluaran">
                                  <option value="" selected="" disabled="">--Pilih--</option>
                                  <optgroup label="Pengeluaran Kecil" id="optgrp1">
                                    <option value="1">Alat Tulis Kantor</option>
                                    <option value="2">Biaya Operasional</option>
                                    <option value="3">Biaya Bahan Bakar</option>
                                    <option value="4">Biaya Konsumsi</option>
                                    <option value="5">Biaya Kesehatan</option>
                                    
                                  </optgroup>
                                  <optgroup label="Dana Sosial" id="optgrp2">
                                    <option value="6">Polsek</option>
                                    <option value="7">Koramil</option>
                                    <option value="8">Kampung</option>
                                    <option value="9">Masjid</option>
                                    <option value="10">Sumbangan</option>
                                  </optgroup>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                          <fieldset class="d-none" id="biaya_kecil">
                            <div class="row">

                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Nama Pengeluaran</label>
                              </div>

                              <div class="col-md-3 col-sm-4 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" name="">
                                </div>
                              </div>


                              

                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Jumlah Pengeluaran</label>
                              </div>

                              <div class="col-md-3 col-sm-4 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm text-right input-rupiah" name="">
                                </div>
                              </div>


                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Tanggal Pengeluaran</label>
                              </div>

                              <div class="col-md-3 col-sm-4 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y')}}" name="">
                                </div>
                              </div>
                            </div>
                            
                          </fieldset>

                          <fieldset class="d-none" id="danas_osial">
                            <div class="row">

                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Nama Dana Sosial</label>
                              </div>

                              <div class="col-md-3 col-sm-4 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" name="">
                                </div>
                              </div>


                              

                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Jumlah Pengeluaran</label>
                              </div>

                              <div class="col-md-3 col-sm-4 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm text-right input-rupiah" name="">
                                </div>
                              </div>


                              <div class="col-md-3 col-sm-4 col-12">
                                <label>Tanggal Pengeluaran</label>
                              </div>

                              <div class="col-md-3 col-sm-4 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y')}}" name="">
                                </div>
                              </div>
                            </div>
                          </fieldset>

                        </section>
                    </div>
                    <div class="card-footer text-right">
                      <button type="button" class="btn btn-primary">Simpan</button>
                      <a href="{{route('pengeluarankecil')}}" class="btn btn-secondary">Kembali</a>
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
    var table = $('#table_pengeluaran').DataTable();

    $('#tipe_pengeluaran').change(function(){
      var ini, danas_osial, biaya_kecil, optgroup, option; 
      ini     = $(this);
      option  = $('option:selected', ini);
      optgroup = option.parents('optgroup').index();
      biaya_kecil = $('#biaya_kecil');
      danas_osial = $('#danas_osial');

      if (optgroup === 1) {
        // console.log('1');
        biaya_kecil.removeClass('d-none');
        danas_osial.addClass('d-none');
      } else if(optgroup === 2){
        // console.log('2');
        biaya_kecil.addClass('d-none');
        danas_osial.removeClass('d-none');
      } else {
        // console.log('error');
        danas_osial.addClass('d-none');
        biaya_kecil.addClass('d-none');
      }
    });
  });

</script>
@endsection