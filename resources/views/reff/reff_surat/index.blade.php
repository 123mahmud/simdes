@extends('main')
@section('content')
<article class="content">
   <div class="title-block text-primary">
      <h1 class="title">Reff Kode Surat </h1>
      <p class="title-description">
         <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Data Referensi</span>
         / <span class="text-primary" style="font-weight: bold;">Reff Kode Surat</span>
      </p>
   </div>
   <form id="data">
      <section class="section">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header bordered p-2">
                     <div class="header-block">
                        <h3 class="title">Reff Kode Surat </h3>
                     </div>
                  </div>
                  <div class="card-block">
                     <section>
                        <div class="row" id="myRow">
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Kode Surat<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="kode_surat" value="{{ $surat[0]->kode_surat }}">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Kode Desa<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="kode_desa" value="{{ $surat[0]->kode_desa }}">
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
         url: "{{ route('update-rkode') }}",
         type: 'PUT',
         data: $('#data').serialize(),
         success: function (response) {
             if (response.status == 'sukses') {
                 $.toast({
                     heading: response.code,
                     text: 'Berhasil di Update',
                     bgColor: '#00b894',
                     textColor: 'white',
                     loaderBg: '#55efc4',
                     icon: 'success'
                  });
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
