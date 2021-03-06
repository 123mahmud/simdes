@extends('main')
@section('content')
   <style type="text/css">
        .ui-autocomplete {
            z-index: 2147483647;
        }
   </style>
<article class="content">
   <div class="title-block text-primary">
      <h1 class="title"> Tambah Data Penduduk Masuk </h1>
      <p class="title-description">
         <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Master Data</span>
         / <a href="{{route('penduduk')}}"><span>Data Penduduk Masuk</span></a>
         / <span class="text-primary" style="font-weight: bold;">Tambah Data Penduduk Masuk</span>
      </p>
   </div>
   <form id="data">
      <section class="section">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header bordered p-2">
                     <div class="header-block">
                        <h3 class="title">Tambah Data Penduduk Masuk </h3>
                     </div>
                     <div class="header-block pull-right">
                        <a href="{{route('pmasuk')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                     </div>
                  </div>
                  <div class="card-block">
                     <section>
                        <div class="row" id="myRow">
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>NIK<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="nik">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="nama">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>No. Urut Kartu Keluarga<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="urut_kk">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Jenis Kelamin<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="kelamin">
                                    <option value="L" selected="">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tempat Lahir<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm select2" name="tempat_lahir">
                                    @foreach ($kabupaten as $data)
                                       <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tanggal Lahir<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control datepicker" name="tgl_lahir">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Golongan Darah</label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="gol_darah">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Agama<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="agama">
                                    <option value="IL" selected="">Islam</option>
                                    <option value="HD">Hindu</option>
                                    <option value="BD">Budha</option>
                                    <option value="KP">Kristen Prostestan</option>
                                    <option value="KL">Katolik</option>
                                    <option value="KC">Kong Hu Cu</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Status Nikah<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="status_nikah">
                                    <option value="KW" selected="">Kawin</option>
                                    <option value="BK">Belum Kawin</option>
                                    <option value="CH">Cerai Hidup</option>
                                    <option value="CM">Cerai Mati</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Status Keluarga<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="status_keluarga">
                                    <option value="SM" selected="">Suami</option>
                                    <option value="IS">Istri</option>
                                    <option value="AN">Anak</option>
                                    <option value="CU">Cucu</option>
                                    <option value="OT">Orang Tua</option>
                                    <option value="ME">Mertua</option>
                                    <option value="FL">Famili Lain</option>
                                    <option value="LA">Lainnya</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Pendidikan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="pendidikan">
                                    <option value="TBS" selected="">TIDAK / BELUM SEKOLAH</option>
                                    <option value="BTS">BELUM TAMAT SD/SEDERAJAT</option>
                                    <option value="TSS">TAMAT SD / SEDERAJAT</option>
                                    <option value="SMP">SLTP/SEDERAJAT</option>
                                    <option value="SMA">SLTA / SEDERAJAT</option>
                                    <option value="D1">DIPLOMA I / II</option>
                                    <option value="D2">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                    <option value="S1">DIPLOMA IV/ STRATA I</option>
                                    <option value="S2">STRATA II</option>
                                    <option value="S3">STRATA III</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Pekerjaan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="pekerjaan">
                                    @foreach ($pekerjaan as $data)
                                       <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama Ibu<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="nama_ibu">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama Ayah<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="nama_ayah">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nomor Kartu Keluarga<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="no_kk">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RT<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="rt">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RW<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="rw">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Warga Negara<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" value="INDONESIA" readonly name="warga_negara">
                              </div>
                           </div>
                           {{-- garis --}}
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Alamat Asal<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="alamat_asal">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RT Asal<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="rt_asal">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RW Asal<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="rw_asal">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Kecamatan Asal<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="hidden" class="form-control-sm form-control ui-autocomplete" name="kecamatan_asal">
                                 <input type="text" class="form-control-sm form-control ui-autocomplete" id="kecamatan" name="nama_kecamatan">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Kabupaten Asal<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="hidden" class="form-control-sm form-control" readonly="" name="kabupaten_asal">
                                 <input type="text" class="form-control-sm form-control" readonly="" name="nama_kabupaten">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Provinsi Asal<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="hidden" class="form-control-sm form-control" readonly="" name="provinsi_asal">
                                 <input type="text" class="form-control-sm form-control" readonly="" name="nama_provinsi">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tanggal Pindah<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control datepicker" name="tgl_pindah">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Keterangan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="keterangan">
                              </div>
                           </div>

                        </div>
                     </section>
                  </div>
                  <div class="card-footer text-right">
                     <button class="btn btn-primary btn-submit simpan" type="button" onclick="simpan()">Simpan</button>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </form>
</article>

@endsection
@section('extra_script')
<script type="text/javascript">
   $(document).ready(function() {
      $('#kecamatan').on('click', function() {
         clear();
      });

      $('#kecamatan').autocomplete({
         source: "{{ route('autocomplete-kecamatan') }}",
         minLength: 2,
         select: function(event, data){
            $("input[name=kecamatan_asal]").val(data.item.id);
            $("input[name=kabupaten_asal]").val(data.item.id_kabupaten);
            $("input[name=nama_kabupaten]").val(data.item.nama_kabupaten);
            $("input[name=provinsi_asal]").val(data.item.id_provinsi);
            $("input[name=nama_provinsi]").val(data.item.nama_provinsi);
         }
      });

      function clear()
      {
         $("input[name=kecamatan_asal]").val('');
         $("input[name=nama_kecamatan]").val('');
         $("input[name=kabupaten_asal]").val('');
         $("input[name=nama_kabupaten]").val('');
         $("input[name=provinsi_asal]").val('');
         $("input[name=nama_provinsi]").val('');
      }


   });

   function simpan()
   {
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $('.simpan').attr('disabled', 'disabled');
      $.ajax({
         url: "{{ route('create-pmasuk') }}",
         type: 'POST',
         data: $('#data').serialize(),
         success: function (response) {
             if (response.status == 'sukses') {
                 $.toast({
                     heading: response.code,
                     text: 'Berhasil di Simpan',
                     bgColor: '#00b894',
                     textColor: 'white',
                     loaderBg: '#55efc4',
                     icon: 'success'
                  });
                 window.location.href = "{{ route('pmasuk') }}";
             } else {
                  $.toast({
                      heading: 'Ada yang salah',
                      text: 'Periksa data anda.',
                      showHideTransition: 'plain',
                      icon: 'warning'
                  })
                 $('.simpan').removeAttr('disabled', 'disabled');
             }
         }
      })
   }

   
</script>
@endsection
