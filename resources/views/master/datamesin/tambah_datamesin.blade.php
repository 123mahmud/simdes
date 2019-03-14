@extends('main')

@section('content')

<article class="content">

<div class="title-block text-primary">
   <h1 class="title"> Tambah Data Mesin </h1>
   <p class="title-description">
      <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
      / <span>Master Data</span>
      / <a href="{{route('datamesin')}}"><span>Data Satuan</span></a>
      / <span class="text-primary" style="font-weight: bold;">Tambah Data Mesin</span>
   </p>
</div>
<section class="section">
   <div class="row">
      <div class="col-12">
         
         <div class="card">
            <div class="card-header bordered p-2">
               <div class="header-block">
                  <h3 class="title">Tambah Data Mesin</h3>
               </div>
               <div class="header-block pull-right">
                  <a href="{{route('datamesin')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
               </div>
            </div>
            <div class="card-block">
               <section>
                  <form id="data-mesin">
                  <div class="row">
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <label>Nama Mesin</label>
                     </div>
                     <div class="col-md-9 col-sm-6 col-xs-12">
                        <div class="form-group">
                           <input type="text" class="form-control form-control-sm" name="m_nama">
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <label>Mandor</label>
                     </div>
                     <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <select type="text" class="form-control form-control-sm select2" name="m_pegawai">
                              <option value="">- Pilih pegawai</option>
                           @foreach ($pegawai as $data)
                              <option value="{{ $data->c_id }}"> {{ $data->c_nama }}</option>
                           @endforeach
                        </select>
                        </div>
                     </div>
                  </div>
                  </form>
            </section>
         </div>
         <div class="card-footer text-right">
            <button class="btn btn-primary btn-submit" id="button-simpan" onclick="simpanDataMesin()" type="button">Simpan</button>
            <a href="{{route('datamesin')}}" class="btn btn-secondary">Kembali</a>
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

   function simpanDataMesin()
   {
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $('.simpanPeg').attr('disabled', 'disabled');
      $.ajax({
         url: baseUrl + "/master/datamesin/simpan",
         type: 'GET',
         data: $('#data-mesin').serialize(),
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
                 window.location.href = baseUrl + "/master/datacustomer/index";
             } else {
                  $.toast({
                      heading: 'Ada yang salah',
                      text: 'Periksa data anda.',
                      showHideTransition: 'plain',
                      icon: 'warning'
                  })
                 $('#button-simpan').removeAttr('disabled', 'disabled');
             }
         }
      })
   }
</script>
@endsection