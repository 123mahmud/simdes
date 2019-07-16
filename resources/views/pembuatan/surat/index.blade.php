@extends('main')
@section('content')
<article class="content">
   <div class="title-block text-primary">
      <h1 class="title"> Pembuatan Surat </h1>
      <p class="title-description">
         <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Master Data</span>
         / <a href="{{route('surat')}}"><span>Data Penduduk Keluar</span></a>
         / <span class="text-primary" style="font-weight: bold;">Pembuatan Surat</span>
      </p>
   </div>
   <form id="data">
      <section class="section">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header bordered p-2">
                     <div class="header-block">
                        <h3 class="title">Pembuatan Surat </h3>
                     </div>
                     <div class="header-block pull-right">
                        <a href="{{route('surat')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i></a>
                     </div>
                  </div>
                  <div class="card-block">
                     <section>
                        <div class="row" id="myRow">
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tanggal Surat<font color="red">*</font></label>
                           </div>
                           <div class="col-md-9 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="tgl_surat" value="{{ date('d-m-Y') }}" readonly>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>NIK<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x ui-autocomplete" id="nik" name="nik">
                                 <input type="hidden" class="form-control-sm form-control" id="id_penduduk" name="id_penduduk">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="nama">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>No. Urut Kartu Keluarga<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control currency-x" name="urut_kk">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Jenis Kelamin<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="kelamin">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tempat Lahir<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="tempat_lahir">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tanggal Lahir<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control datepicker" name="tgl_lahir">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Golongan Darah</label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="gol_darah">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Agama<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="agama">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Status Nikah<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="status_nikah">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Status Keluarga<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="status_keluarga">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Pendidikan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="pendidikan">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Pekerjaan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="pekerjaan">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama Ibu<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="nama_ibu">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama Ayah<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" name="nama_ayah">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nomor Kartu Keluarga<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control currency-x" name="no_kk">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RT<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control currency-x" name="rt">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RW<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control currency-x" name="rw">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Warga Negara<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control-sm form-control" value="INDONESIA" name="warga_negara">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Masa Berlaku<font color="red">*</font></label>
                           </div>
                           <div class="col-md-9 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control datepicker" name="tgl_berlaku" value="{{ date('d-m-Y') }}">
                              </div>
                           </div>
                           {{-- garis --}}
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Keperluan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-9 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <textarea class="form-control-sm form-control" name="keperluan"></textarea>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Keterangan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-9 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <textarea class="form-control-sm form-control" name="keterangan" value="">Orang tersebut di atas benar-benar warga Desa kami dan beradat istiadat baik</textarea>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-4 col-xs-12">
                              <label>Pendanda Tangan</label>
                           </div>
                           <div class="col-md-9 col-sm-8 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="id_pegawai">
                                    @foreach ($pegawai as $data)
                                    <option value="{{ $data->id_pegawai }}">{{ $data->posisi }} - {{ $data->nama }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                     </section>
                  </div>
                  <div class="card-footer text-right">
                     <button class="btn btn-primary btn-submit" id="print" type="button">Cetak Surat</button>
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
            $("input[name=kecamatan_tujuan]").val(data.item.id);
            $("input[name=kabupaten_tujuan]").val(data.item.id_kabupaten);
            $("input[name=nama_kabupaten]").val(data.item.nama_kabupaten);
            $("input[name=provinsi_tujuan]").val(data.item.id_provinsi);
            $("input[name=nama_provinsi]").val(data.item.nama_provinsi);
         }
      });

      function clear()
      {
         $("input[name=kecamatan_tujuan]").val('');
         $("input[name=nama_kecamatan]").val('');
         $("input[name=kabupaten_tujuan]").val('');
         $("input[name=nama_kabupaten]").val('');
         $("input[name=provinsi_tujuan]").val('');
         $("input[name=nama_provinsi]").val('');
      }

      $('#nik').on('click', function() {
         clear2();
      });
      $('#nik').autocomplete({
         source: "{{ route('autocomplete-kematian') }}",
         minLength: 2,
         select: function(event, data){
            $("input[name=id_penduduk]").val(data.item.id);
            $("input[name=nik]").val(data.item.nik);
            $("input[name=nama]").val(data.item.nama);
            $("input[name=urut_kk]").val(data.item.urut_kk);
            if (data.item.kelamin == 'L'){
               var kelamin = 'Laki-laki'
            }else{
               var kelamin = 'Perempuan'
            }
            $("input[name=kelamin]").val(kelamin);
            $("input[name=tempat_lahir]").val(data.item.tempat_lahir);
            $("input[name=tgl_lahir]").val(data.item.tgl_lahir);
            $("input[name=gol_darah]").val(data.item.gol_darah);
            if (data.item.agama == 'IL'){
               var agama = 'Islam'
            }else if(data.item.agama == 'HD'){
               var agama = 'Hindu'
            }else if(data.item.agama == 'BD'){
               var agama = 'Budha'
            }else if(data.item.agama == 'KP'){
               var agama = 'Kristen Prostetan'
            }else if(data.item.agama == 'KL'){
               var agama = 'Katolik'
            }else if(data.item.agama == 'KC'){
               var agama = 'Kong Hu Cu'
            }
            $("input[name=agama]").val(agama);
            if (data.item.status_nikah == 'KW'){
               var status_nikah = 'Kawin'
            }else if(data.item.status_nikah == 'BK'){
               var status_nikah = 'Belum Kawin'
            }else if(data.item.status_nikah == 'CH'){
               var status_nikah = 'Cerai Hidup'
            }else if(data.item.status_nikah == 'CM'){
               var status_nikah = 'Cerai Mati'
            }
            $("input[name=status_nikah]").val(status_nikah);
            if (data.item.status_keluarga == 'SM'){
               var status_keluarga = 'Suami'
            }else if(data.item.status_keluarga == 'IS'){
               var status_keluarga = 'Istri'
            }else if(data.item.status_keluarga == 'AN'){
               var status_keluarga = 'Anak'
            }else if(data.item.status_keluarga == 'CU'){
               var status_keluarga = 'Cucu'
            }else if(data.item.status_keluarga == 'OT'){
               var status_keluarga = 'Orang Tua'
            }else if(data.item.status_keluarga == 'ME'){
               var status_keluarga = 'Mertua'
            }else if(data.item.status_keluarga == 'FL'){
               var status_keluarga = 'Family Lain'
            }else if(data.item.status_keluarga == 'LA'){
               var status_keluarga = 'Lainnya'
            }
            $("input[name=status_keluarga]").val(status_keluarga);
            if (data.item.pendidikan == 'TBS'){
               var pendidikan = 'TIDAK / BELUM SEKOLAH'
            }else if(data.item.pendidikan == 'BTS'){
               var pendidikan = 'BELUM TAMAT SD/SEDERAJAT'
            }else if(data.item.pendidikan == 'TSS'){
               var pendidikan = 'TAMAT SD / SEDERAJAT'
            }else if(data.item.pendidikan == 'SMP'){
               var pendidikan = 'SLTP/SEDERAJAT'
            }else if(data.item.pendidikan == 'SMA'){
               var pendidikan = 'SLTA / SEDERAJAT'
            }else if(data.item.pendidikan == 'D1'){
               var pendidikan = 'DIPLOMA I / II'
            }else if(data.item.pendidikan == 'D2'){
               var pendidikan = 'AKADEMI/ DIPLOMA III/S. MUDA'
            }else if(data.item.pendidikan == 'S1'){
               var pendidikan = 'DIPLOMA IV/ STRATA I'
            }else if(data.item.pendidikan == 'S2'){
               var pendidikan = 'STRATA II'
            }else if(data.item.pendidikan == 'S3'){
               var pendidikan = 'STRATA III'
            }
            $("input[name=pendidikan]").val(pendidikan);
            $("input[name=pekerjaan]").val(data.item.pekerjaan);
            $("input[name=nama_ibu]").val(data.item.nama_ibu);
            $("input[name=nama_ayah]").val(data.item.nama_ayah);
            $("input[name=no_kk]").val(data.item.no_kk);
            $("input[name=rt]").val(data.item.rt);
            $("input[name=rw]").val(data.item.rw);
         }
      });

      function clear2(){
         $("input[name=id_penduduk]").val('');
         $("input[name=nik]").val('');
         $("input[name=nama]").val('');
         $("input[name=urut_kk]").val('');
         $("input[name=kelamin]").val('');
         $("input[name=tempat_lahir]").val('');
         $("input[name=tgl_lahir]").val('');
         $("input[name=gol_darah]").val('');
         $("input[name=agama]").val('');
         $("input[name=status_nikah]").val('');
         $("input[name=status_keluarga]").val('');
         $("input[name=pendidikan]").val('');
         $("input[name=pekerjaan]").val('');
         $("input[name=nama_ibu]").val('');
         $("input[name=nama_ayah]").val('');
         $("input[name=no_kk]").val('');
         $("input[name=rt]").val('');
         $("input[name=rw]").val('');
      }

      $('#print').on('click', function() {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
         $('.simpan').attr('disabled', 'disabled');
         $.ajax({
            url: "{{ route('store-surat') }}",
            type: 'POST',
            data: $('#data').serialize(),
            success: function (response) {
                if (response.status == 'sukses') {
                    window.open("{{ route('create-surat') }}");
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
      });

   });

</script>
@endsection
