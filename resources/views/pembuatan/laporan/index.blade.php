@extends('main')

@section('content')

<article class="content">

   <div class="title-block text-primary">
      <h1 class="title"> Pembuatan Laporan </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Master Data</span>
         / <a href="{{route('laporan')}}"><span>Data Satuan</span></a>
         / <span class="text-primary" style="font-weight: bold;">Pembuatan Laporan</span>
       </p>
   </div>

   <section class="section">
      <div class="row">
         <div class="col-12">
            
            <div class="card">
               <div class="card-header bordered p-2">
                  <div class="header-block">
                     <h3 class="title">Pembuatan Laporan</h3>
                  </div>
                  <div class="header-block pull-right">
                     <a href="{{route('laporan')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                  </div>
               </div>
               <div class="card-block">

                  <section>
                     <form id="form">
                     <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <label>Dari Tanggal</label>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <div class="form-group">
                              <input type="text" class="form-control form-control-sm datepicker" name="dari_tanggal">
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <label>Sampai Tanggal</label>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <div class="form-group">
                              <input type="text" class="form-control form-control-sm datepicker" name="sampai_tanggal">
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <label>Jenis Laporan</label>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                           <div class="form-group">
                              <select class="form-control form-control-sm" name="laporan">
                                 <option value="d_kelahiran" selected="">Kelahiran</option>
                                 <option value="d_kematian">Kematian</option>
                                 <option value="d_penduduk_masuk">Penduduk Masuk</option>
                                 <option value="d_penduduk_keluar">Penduduk Keluar</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <label>Pendanda Tangan</label>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                           <div class="form-group">
                              <select class="form-control form-control-sm" name="pegawai">
                                 @foreach ($pegawai as $data)
                                    <option value="{{ $data->c_nama }}">{{ $data->c_posisi }} - {{ $data->c_nama }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                     </form>
                  </section>
               </div>
               <div class="card-footer text-right">
                  <button class="btn btn-primary btn-submit" type="button" id="button-simpan" onclick="simpan()">Cetak</button>
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

   function simpan()
   {
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $('.button-simpan').attr('disabled', 'disabled');
      $.ajax({
         url: "{{ route('store-rpekerjaan') }}",
         type: 'POST',
         data: $('#form').serialize(),
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
                 window.location.href = "{{ route('rpekerjaan') }}";
             } else {
                  $.toast({
                      heading: 'Ada yang salah',
                      text: 'Periksa data anda.',
                      showHideTransition: 'plain',
                      icon: 'warning'
                  })
                 $('.button-simpan').removeAttr('disabled', 'disabled');
             }
         }
      })
   }
</script>
@endsection