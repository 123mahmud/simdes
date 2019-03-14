@extends('main')

@section('content')

<article class="content">
   <div class="title-block text-primary">
      <h1 class="title"> Edit Data Pegawai </h1>
      <p class="title-description">
         <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Master Data</span>
         / <a href="{{route('datapegawai')}}"><span>Data Pegawai</span></a>
         / <span class="text-primary" style="font-weight: bold;">Edit Data Pegawai</span>
      </p>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-12">
            
            <div class="card">
               <div class="card-header bordered p-2">
                  <div class="header-block">
                     <h3 class="title">Edit Data Pegawai</h3>
                  </div>
                  <div class="header-block pull-right">
                     <a href="{{route('datapegawai')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                  </div>
               </div>
               <div class="card-block">
                  <form method="POST" id="updatePeg">
                    {{ csrf_field() }}
                  <section>
                     <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Tanggal Masuk</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" id="tgl_masuk" name="c_tahun_masuk" data-date-format="dd-mm-yyyy" class="datepicker form-control input-sm"
                            placeholder="dd-mm-yyyy" value="{{$data->c_tahun_masuk}}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Jabatan<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                              <select id="jabatan" name="c_jabatan_id" class="form-control input-sm">
                              @foreach ($jabatan as $posisi)
                                 @if ($posisi->c_id == $data->c_jabatan_id)
                                    <option value="{{ $posisi->c_id }}" selected>{{ $posisi->c_posisi }}</option>
                                 @else
                                    <option value="{{ $posisi->c_id }}">{{ $posisi->c_posisi }}</option>
                                 @endif
                              @endforeach                            </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Hari Kerja</label>
                      </div>
                      <div class="col-md-2 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_hari_awal" class="form-control input-sm">
                              <option value="Senin" <?php if($data->c_hari_awal == "Senin"){ echo "selected"; }?>>Senin</option>
                              <option value="Selasa" <?php if($data->c_hari_awal == "Selasa"){ echo "selected"; }?>>Selasa</option>
                              <option value="Rabu" <?php if($data->c_hari_awal == "Rabu"){ echo "selected"; }?>>Rabu</option>
                              <option value="Kamis" <?php if($data->c_hari_awal == "Kamis"){ echo "selected"; }?>>Kamis</option>
                              <option value="Jumat" <?php if($data->c_hari_awal == "Jumat"){ echo "selected"; }?>>Jumat</option>
                              <option value="Sabtu" <?php if($data->c_hari_awal == "Sabtu"){ echo "selected"; }?>>Sabtu</option>
                              <option value="Minggu" <?php if($data->c_hari_awal == "Minggu"){ echo "selected"; }?>>Minggu</option>
                            </select>
                        </div>
                      </div>
                       <div class="col-md-2 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_hari_akhir" class="form-control input-sm">
                              <option value="Senin" <?php if($data->c_hari_akhir == "Senin"){ echo "selected"; }?>>Senin</option>
                              <option value="Selasa" <?php if($data->c_hari_akhir == "Selasa"){ echo "selected"; }?>>Selasa</option>
                              <option value="Rabu" <?php if($data->c_hari_akhir == "Rabu"){ echo "selected"; }?>>Rabu</option>
                              <option value="Kamis" <?php if($data->c_hari_akhir == "Kamis"){ echo "selected"; }?>>Kamis</option>
                              <option value="Jumat" <?php if($data->c_hari_akhir == "Jumat"){ echo "selected"; }?>>Jumat</option>
                              <option value="Sabtu" <?php if($data->c_hari_akhir == "Sabtu"){ echo "selected"; }?>>Sabtu</option>
                              <option value="Minggu" <?php if($data->c_hari_akhir == "Minggu"){ echo "selected"; }?>>Minggu</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Nama Pegawai<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_nama" id="c_nama" class="form-control input-sm" value="{{ $data->c_nama }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">KTP<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_ktp" id="c_ktp" class="form-control input-sm" value="{{ $data->c_ktp }}" >
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Alamat KTP<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_ktp_alamat" id="c_ktp_alamat" class="form-control input-sm" value="{{ $data->c_ktp_alamat }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">domisili sekarang<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_alamat" id="c_alamat" class="form-control input-sm" value="{{ $data->c_alamat }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Tempat, tanggal lahir</label>
                      </div>
                      <div class="col-md-2 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_tempat" class="form-control input-sm" value="{{ $data->c_tempat }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" id="tgl_lahir" name="c_tanggal" data-date-format="dd-mm-yyyy" class="datepicker form-control input-sm"
                            placeholder="dd-mm-yyyy" value="{{ $data->tgl_lahir }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">pendidikan<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_pendidikan" class="form-control input-sm">
                            <option>--pilih pendidikan--</option>
                            <option value="S2" <?php if($data->c_pendidikan == "S2"){ echo "selected"; }?>>S2</option>
                            <option value="S1" <?php if($data->c_pendidikan == "S1"){ echo "selected"; }?>>S1</option>
                            <option value="D3" <?php if($data->c_pendidikan == "D3"){ echo "selected"; }?>>D3</option>
                            <option value="D2" <?php if($data->c_pendidikan == "D2"){ echo "selected"; }?>>D2</option>
                            <option value="D1" <?php if($data->c_pendidikan == "D1"){ echo "selected"; }?>>S1</option>
                            <option value="SMA" <?php if($data->c_pendidikan == "SMA"){ echo "selected"; }?>>SMA</option>
                            <option value="SMP" <?php if($data->c_pendidikan == "SMP"){ echo "selected"; }?>>SMP</option>
                            <option value="SD" <?php if($data->c_pendidikan == "SD"){ echo "selected"; }?>>SD</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">email<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_email" id="c_name" class="form-control input-sm" value="{{ $data->c_email }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">no. handphone<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_hp" id="c_name" class="form-control input-sm" value="{{ $data->c_hp }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Agama<font color="red">*</font></label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_agama" class="form-control input-sm">
                            <option>--pilih agama--</option>
                            <option <?php if($data->c_agama == "islam"){ echo "selected"; }?> value="islam">Islam</option>
                            <option <?php if($data->c_agama == "kristen"){ echo "selected"; }?> value="kristen">Kristen</option>
                            <option <?php if($data->c_agama == "katolik"){ echo "selected"; }?> value="katolik">Katolik</option>
                            <option <?php if($data->c_agama == "hindu"){ echo "selected"; }?> value="hindu">Hindu</option>
                            <option <?php if($data->c_agama == "budha"){ echo "selected"; }?> value="budha">Budha</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Status pernikahan</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <select id="" name="c_nikah" class="form-control input-sm">
                            <option>--pilih status pernikahan--</option>
                            <option <?php if($data->c_nikah == "menikah"){ echo "selected"; }?> value="menikah">Menikah</option>
                            <option <?php if($data->c_nikah == "belum menikah"){ echo "selected"; }?> value="belum menikah">Belum menikah</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">nama suami/istri</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_pasangan" id="c_name" class="form-control input-sm" value="{{ $data->c_pasangan }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">anak</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="number" name="c_anak" id="c_name" class="form-control input-sm" value="{{ $data->c_anak }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">bank</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_bank" id="c_name" class="form-control input-sm" value="{{ $data->c_bank }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">no. rekening</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_rekening" id="c_name" class="form-control input-sm" value="{{ $data->c_rekening }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">Sertifikasi keahlian</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_sertification" id="c_name" class="form-control input-sm" value="{{ $data->c_sertification }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">tahun</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_sertif_tahun" id="c_name" class="form-control input-sm" value="{{ $data->c_sertif_tahun }}">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label class="tebal">tempat</label>
                      </div>
                      <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="form-group">
                          <input type="text" name="c_sertif_tempat" id="c_name" class="form-control input-sm" value="{{ $data->c_sertif_tempat }}">
                        </div>
                      </div>  
                     </div>
                     
                  </section>
               </form>
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
    $(document).on('click', '.btn-submit', function(){
			$.toast({
				heading: 'Success',
				text: 'Data Berhasil di Edit',
				bgColor: '#00b894',
				textColor: 'white',
				loaderBg: '#55efc4',
				icon: 'success'
			});

		});


    $('#btn-show').click(function(){
      var input = $(this).parents('.input-group').find('input');

      input.attr('type', function(index, attr){
        return attr === 'password' ? 'text' : 'password';
      });

      $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    });
  });

   function simpanPegawai()
   {
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $('.simpanPeg').attr('disabled', 'disabled');
      $.ajax({
         url: baseUrl + "/master/datapegawai/update-pegawai/{{$data->c_id}}",
         type: 'GET',
         data: $('#updatePeg').serialize(),
         success: function (response,) {
             if (response.status == 'sukses') {
                 $.toast({
                     heading: 'Data',
                     text: 'Berhasil di update.',
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