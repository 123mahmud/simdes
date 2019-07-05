@extends('main')
@section('content')
   <style type="text/css">
        .ui-autocomplete {
            z-index: 2147483647;
        }
    </style>
<article class="content">
   <div class="title-block text-primary">
      <h1 class="title"> Tambah Data Kematian </h1>
      <p class="title-description">
         <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Master Data</span>
         / <a href="{{route('kematian')}}"><span>Data Kematian</span></a>
         / <span class="text-primary" style="font-weight: bold;">Tambah Data Kematian</span>
      </p>
   </div>
   <form id="formsukses">
      <section class="section">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header bordered p-2">
                     <div class="header-block">
                        <h3 class="title">Tambah Data Kematian </h3>
                     </div>
                     <div class="header-block pull-right">
                        <a href="{{route('kematian')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
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
                                 <input type="text" class="form-control-sm form-control currency-x ui-autocomplete" id="nik" name="nik">
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
                              <label>Tempat Meninggal<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="tempat_meinggal">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Sebab Meninggal<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="sebab_meninggal">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tanggal Meninggal<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control datepicker" name="tanggal_meninggal">
                              </div>
                           </div>

                        </div>
                     </section>
                  </div>
                  <div class="card-footer text-right">
                     <button class="btn btn-primary btn-submit simpan" type="button">Simpan</button>
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
      $('#nik').on('click', function() {
         clear();
      });
      $('#nik').autocomplete({
         source: "{{ route('autocomplete-kematian') }}",
         minLength: 2,
         select: function(event, data){
            $("input[name=nik]").val(data.item.nik);
            $("input[name=nama]").val(data.item.nama);
            $("input[name=urut_kk]").val(data.item.urut_kk);
            $("input[name=kelamin]").val(data.item.kelamin);
            $("input[name=tempat_lahir]").val(data.item.tempat_lahir);
            $("input[name=tgl_lahir]").val(data.item.tgl_lahir);
            $("input[name=gol_darah]").val(data.item.gol_darah);
            $("input[name=agama]").val(data.item.agama);
            $("input[name=status_nikah]").val(data.item.status_nikah);
            $("input[name=status_keluarga]").val(data.item.status_keluarga);
            $("input[name=pendidikan]").val(data.item.pendidikan);
            $("input[name=pekerjaan]").val(data.item.pekerjaan);
            $("input[name=nama_ibu]").val(data.item.nama_ibu);
            $("input[name=nama_ayah]").val(data.item.nama_ayah);
            $("input[name=no_kk]").val(data.item.no_kk);
            $("input[name=rt]").val(data.item.rt);
            $("input[name=rw]").val(data.item.rw);
         }
      });

      function clear()
      {
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
   });
   

</script>
@endsection
