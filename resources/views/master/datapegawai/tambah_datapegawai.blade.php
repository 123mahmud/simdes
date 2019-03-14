@extends('main')

@section('content')

<article class="content">
   <div class="title-block text-primary">
      <h1 class="title"> Tambah Data Pegawai </h1>
      <p class="title-description">
         <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Master Data</span>
         / <a href="{{route('datapegawai')}}"><span>Data Pegawai</span></a>
         / <span class="text-primary" style="font-weight: bold;">Tambah Data Pegawai</span>
      </p>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-12">
            
            <div class="card">
               <div class="card-header bordered p-2">
                  <div class="header-block">
                     <h3 class="title">Tambah Data Pegawai</h3>
                  </div>
                  <div class="header-block pull-right">
                     <a href="{{route('datapegawai')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                  </div>
               </div>
               <div class="card-block">
                  <section>
                     <form method="POST" id="simpanPegawai">
                     <div class="row">
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Tanggal Masuk</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" id="tgl_masuk" autocomplete="off" name="c_tahun_masuk" data-date-format="dd-mm-yyyy" class="datepicker form-control form-control-sm"
                            placeholder="dd-mm-yyyy">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Jabatan<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="jabatan" name="c_jabatan_id" class="form-control form-control-sm">
                            <option value="">--pilih jabatan--</option>
                            @foreach ($jabatan as $data)
                              <option value="{{ $data->c_id }}">{{ $data->c_posisi }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                     <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Hari Kerja</label>
                      </div>
                      <div class="col-md-2 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_hari_awal" class="form-control form-control-sm">
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                              <option value="Sabtu">Sabtu</option>
                              <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                      </div>
                       <div class="col-md-2 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_hari_akhir" class="form-control form-control-sm">
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                              <option value="Sabtu">Sabtu</option>
                              <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Nama Pegawai<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_nama" id="c_nama" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">KTP<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_ktp" id="c_ktp" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Alamat KTP<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_ktp_alamat" id="c_ktp_alamat" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">domisili sekarang<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_alamat" id="c_alamat" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Tempat, tanggal lahir</label>
                      </div>
                      <div class="col-md-2 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_tempat" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" id="tgl_lahir" name="c_tanggal" data-date-format="dd-mm-yyyy" class="datepicker form-control form-control-sm"
                            placeholder="dd-mm-yyyy" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">pendidikan<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_pendidikan" class="form-control form-control-sm">
                            <option>--pilih pendidikan--</option>
                            <option value="S2">S2</option>
                            <option value="S1">S1</option>
                            <option value="D3">D3</option>
                            <option value="D2">D2</option>
                            <option value="D1">D1</option>
                            <option value="SMA">SMA</option>
                            <option value="SMP">SMP</option>
                            <option value="SD">SD</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">email<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_email" id="c_name" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">no. handphone<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_hp" id="c_name" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Agama<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_agama" class="form-control form-control-sm">
                            <option>--pilih agama--</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Status pernikahan</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_nikah" class="form-control form-control-sm">
                            <option>--pilih status pernikahan--</option>
                            <option value="menikah">Menikah</option>
                            <option value="belum menikah">Belum menikah</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">nama suami/istri</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_pasangan" id="c_name" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">anak</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="number" name="c_anak" id="c_name" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">bank</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_bank" id="c_name" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">no. rekening</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_rekening" id="c_name" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Sertifikasi keahlian</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_sertification" id="c_name" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">tahun</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_sertif_tahun" id="c_name" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">tempat</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_sertif_tempat" id="c_name" class="form-control form-control-sm">
                        </div>
                      </div>
                     </div>
                  </form>
                  </section>
               </div>
               <div class="card-footer text-right">
                  <button class="btn btn-primary btn-submit simpanPeg" type="button" onclick="simpanPegawai()">Simpan</button>
                  <a href="{{route('datapegawai')}}" class="btn btn-secondary">Kembali</a>
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
    $('#btn-show').click(function(){
      var input = $(this).parents('.input-group').find('input');

      input.attr('type', function(index, attr){
        return attr === 'password' ? 'text' : 'password';
      });

      $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    });
  });

   function simpanPegawai(){
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $('.simpanPeg').attr('disabled', 'disabled');
      $.ajax({
         url: baseUrl + "/master/datapegawai/simpan-pegawai",
         type: 'GET',
         data: $('#simpanPegawai').serialize(),
         success: function (response,) {
             if (response.status == 'sukses') {
                 $.toast({
                     heading: response.code,
                     text: 'Berhasil di Simpan',
                     bgColor: '#00b894',
                     textColor: 'white',
                     loaderBg: '#55efc4',
                     icon: 'success'
                  });
                 window.location.href = baseUrl + "/master/datapegawai/index";
             } else {
                  $.toast({
                      heading: 'Ada yang salah',
                      text: 'Periksa data anda.',
                      showHideTransition: 'plain',
                      icon: 'warning'
                  })
                 $('.simpanPeg').removeAttr('disabled', 'disabled');
             }
         }
      })
   }

</script>
@endsection