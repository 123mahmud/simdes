@extends('main')
@section('content')
<article class="content">
   <div class="title-block text-primary">
      <h1 class="title"> Edit Data Penduduk Keluar </h1>
      <p class="title-description">
         <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Master Data</span>
         / <a href="{{route('pkeluar')}}"><span>Data Penduduk Keluar</span></a>
         / <span class="text-primary" style="font-weight: bold;">Edit Data Penduduk Keluar</span>
      </p>
   </div>
   <form id="data">
      <section class="section">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header bordered p-2">
                     <div class="header-block">
                        <h3 class="title">Edit Data Penduduk Keluar </h3>
                     </div>
                     <div class="header-block pull-right">
                        <a href="{{route('pkeluar')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
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
                                 <input type="text" class="form-control-sm form-control currency-x" name="nik" value="{{ $penduduk->nik }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="nama" value="{{ $penduduk->nama }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>No. Urut Kartu Keluarga<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="urut_kk" value="{{ $penduduk->urut_kk }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Jenis Kelamin<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="kelamin" disabled="">
                                    @if ($penduduk->kelamin == 'L')
                                       <option value="L" selected="">Laki-laki</option>
                                       <option value="P">Perempuan</option>
                                    @else
                                       <option value="L">Laki-laki</option>
                                       <option value="P" selected="">Perempuan</option>
                                    @endif
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tempat Lahir<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm select2" name="tempat_lahir" disabled>
                                    @foreach ($kabupaten as $data)
                                       @if ($penduduk->tempat_lahir == $data->id)
                                          <option value="{{ $data->id }}" selected="">{{ $data->name }}</option>
                                       @else
                                          <option value="{{ $data->id }}">{{ $data->name }}</option>
                                       @endif
                                       
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tanggal Lahir<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control datepicker" name="tgl_lahir" value="{{ $penduduk->tgl_lahir }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Golongan Darah</label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="gol_darah" value="{{ $penduduk->gol_darah }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Agama<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="agama" disabled="">
                                    @if ($penduduk->agama == 'IL')
                                       <option value="IL" selected="">Islam</option>
                                       <option value="HD">Hindu</option>
                                       <option value="BD">Budha</option>
                                       <option value="KP">Kristen Prostestan</option>
                                       <option value="KL">Katolik</option>
                                       <option value="KC">Kong Hu Cu</option>
                                    @elseif($penduduk->agama == 'HD')
                                       <option value="IL">Islam</option>
                                       <option value="HD" selected="">Hindu</option>
                                       <option value="BD">Budha</option>
                                       <option value="KP">Kristen Prostestan</option>
                                       <option value="KL">Katolik</option>
                                       <option value="KC">Kong Hu Cu</option>
                                    @elseif($penduduk->agama == 'BD')
                                       <option value="IL">Islam</option>
                                       <option value="HD">Hindu</option>
                                       <option value="BD" selected="">Budha</option>
                                       <option value="KP">Kristen Prostestan</option>
                                       <option value="KL">Katolik</option>
                                       <option value="KC">Kong Hu Cu</option>
                                    @elseif($penduduk->agama == 'KP')
                                       <option value="IL">Islam</option>
                                       <option value="HD">Hindu</option>
                                       <option value="BD">Budha</option>
                                       <option value="KP" selected="">Kristen Prostestan</option>
                                       <option value="KL">Katolik</option>
                                       <option value="KC">Kong Hu Cu</option>
                                    @elseif($penduduk->agama == 'KL')
                                       <option value="IL">Islam</option>
                                       <option value="HD">Hindu</option>
                                       <option value="BD">Budha</option>
                                       <option value="KP">Kristen Prostestan</option>
                                       <option value="KL" selected="">Katolik</option>
                                       <option value="KC">Kong Hu Cu</option>
                                    @elseif($penduduk->agama == 'KC')
                                       <option value="IL">Islam</option>
                                       <option value="HD">Hindu</option>
                                       <option value="BD">Budha</option>
                                       <option value="KP">Kristen Prostestan</option>
                                       <option value="KL">Katolik</option>
                                       <option value="KC" selected="">Kong Hu Cu</option>
                                    @endif
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Status Nikah<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="status_nikah" disabled="">
                                    @if ($penduduk->status_nikah == 'KW')
                                       <option value="KW" selected="">Kawin</option>
                                       <option value="BK">Belum Kawin</option>
                                       <option value="CH">Cerai Hidup</option>
                                       <option value="CM">Cerai Mati</option>
                                    @elseif($penduduk->status_nikah == 'BK')
                                       <option value="KW">Kawin</option>
                                       <option value="BK" selected="">Belum Kawin</option>
                                       <option value="CH">Cerai Hidup</option>
                                       <option value="CM">Cerai Mati</option>
                                    @elseif($penduduk->status_nikah == 'CH')
                                       <option value="KW">Kawin</option>
                                       <option value="BK">Belum Kawin</option>
                                       <option value="CH" selected="">Cerai Hidup</option>
                                       <option value="CM">Cerai Mati</option>
                                    @elseif($penduduk->status_nikah == 'CM')
                                       <option value="KW">Kawin</option>
                                       <option value="BK">Belum Kawin</option>
                                       <option value="CH">Cerai Hidup</option>
                                       <option value="CM" selected="">Cerai Mati</option>
                                    @endif
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Status Keluarga<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="status_keluarga" disabled="">
                                    @if ($penduduk->status_keluarga == 'SM')
                                       <option value="SM" selected="">Suami</option>
                                       <option value="IS">Istri</option>
                                       <option value="AN">Anak</option>
                                       <option value="CU">Cucu</option>
                                       <option value="OT">Orang Tua</option>
                                       <option value="ME">Mertua</option>
                                       <option value="FL">Famili Lain</option>
                                       <option value="LA">Lainnya</option>
                                    @elseif ($penduduk->status_keluarga == 'IS')
                                       <option value="SM">Suami</option>
                                       <option value="IS" selected="">Istri</option>
                                       <option value="AN">Anak</option>
                                       <option value="CU">Cucu</option>
                                       <option value="OT">Orang Tua</option>
                                       <option value="ME">Mertua</option>
                                       <option value="FL">Famili Lain</option>
                                       <option value="LA">Lainnya</option>
                                    @elseif ($penduduk->status_keluarga == 'AN')
                                       <option value="SM">Suami</option>
                                       <option value="IS">Istri</option>
                                       <option value="AN" selected="">Anak</option>
                                       <option value="CU">Cucu</option>
                                       <option value="OT">Orang Tua</option>
                                       <option value="ME">Mertua</option>
                                       <option value="FL">Famili Lain</option>
                                       <option value="LA">Lainnya</option>
                                    @elseif ($penduduk->status_keluarga == 'CU')
                                       <option value="SM">Suami</option>
                                       <option value="IS">Istri</option>
                                       <option value="AN">Anak</option>
                                       <option value="CU" selected="">Cucu</option>
                                       <option value="OT">Orang Tua</option>
                                       <option value="ME">Mertua</option>
                                       <option value="FL">Famili Lain</option>
                                       <option value="LA">Lainnya</option>
                                    @elseif ($penduduk->status_keluarga == 'OT')
                                       <option value="SM">Suami</option>
                                       <option value="IS">Istri</option>
                                       <option value="AN">Anak</option>
                                       <option value="CU">Cucu</option>
                                       <option value="OT" selected="">Orang Tua</option>
                                       <option value="ME">Mertua</option>
                                       <option value="FL">Famili Lain</option>
                                       <option value="LA">Lainnya</option>
                                    @elseif ($penduduk->status_keluarga == 'ME')
                                       <option value="SM">Suami</option>
                                       <option value="IS">Istri</option>
                                       <option value="AN">Anak</option>
                                       <option value="CU">Cucu</option>
                                       <option value="OT">Orang Tua</option>
                                       <option value="ME" selected="">Mertua</option>
                                       <option value="FL">Famili Lain</option>
                                       <option value="LA">Lainnya</option>
                                    @elseif ($penduduk->status_keluarga == 'FL')
                                       <option value="SM">Suami</option>
                                       <option value="IS">Istri</option>
                                       <option value="AN">Anak</option>
                                       <option value="CU">Cucu</option>
                                       <option value="OT">Orang Tua</option>
                                       <option value="ME">Mertua</option>
                                       <option value="FL" selected="">Famili Lain</option>
                                       <option value="LA">Lainnya</option>
                                    @elseif ($penduduk->status_keluarga == 'LA')
                                       <option value="SM">Suami</option>
                                       <option value="IS">Istri</option>
                                       <option value="AN">Anak</option>
                                       <option value="CU">Cucu</option>
                                       <option value="OT">Orang Tua</option>
                                       <option value="ME">Mertua</option>
                                       <option value="FL">Famili Lain</option>
                                       <option value="LA" selected="">Lainnya</option>
                                    @endif
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Pendidikan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="pendidikan" disabled="">
                                    @if ($penduduk->pendidikan == 'TBS')
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
                                    @elseif ($penduduk->pendidikan == 'BTS')
                                       <option value="TBS">TIDAK / BELUM SEKOLAH</option>
                                       <option value="BTS" selected="">BELUM TAMAT SD/SEDERAJAT</option>
                                       <option value="TSS">TAMAT SD / SEDERAJAT</option>
                                       <option value="SMP">SLTP/SEDERAJAT</option>
                                       <option value="SMA">SLTA / SEDERAJAT</option>
                                       <option value="D1">DIPLOMA I / II</option>
                                       <option value="D2">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                       <option value="S1">DIPLOMA IV/ STRATA I</option>
                                       <option value="S2">STRATA II</option>
                                       <option value="S3">STRATA III</option>
                                    @elseif ($penduduk->pendidikan == 'TSS')
                                       <option value="TBS">TIDAK / BELUM SEKOLAH</option>
                                       <option value="BTS">BELUM TAMAT SD/SEDERAJAT</option>
                                       <option value="TSS" selected="">TAMAT SD / SEDERAJAT</option>
                                       <option value="SMP">SLTP/SEDERAJAT</option>
                                       <option value="SMA">SLTA / SEDERAJAT</option>
                                       <option value="D1">DIPLOMA I / II</option>
                                       <option value="D2">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                       <option value="S1">DIPLOMA IV/ STRATA I</option>
                                       <option value="S2">STRATA II</option>
                                       <option value="S3">STRATA III</option>
                                    @elseif ($penduduk->pendidikan == 'SMP')
                                       <option value="TBS">TIDAK / BELUM SEKOLAH</option>
                                       <option value="BTS">BELUM TAMAT SD/SEDERAJAT</option>
                                       <option value="TSS">TAMAT SD / SEDERAJAT</option>
                                       <option value="SMP" selected="">SLTP/SEDERAJAT</option>
                                       <option value="SMA">SLTA / SEDERAJAT</option>
                                       <option value="D1">DIPLOMA I / II</option>
                                       <option value="D2">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                       <option value="S1">DIPLOMA IV/ STRATA I</option>
                                       <option value="S2">STRATA II</option>
                                       <option value="S3">STRATA III</option>
                                    @elseif ($penduduk->pendidikan == 'SMA')
                                       <option value="TBS">TIDAK / BELUM SEKOLAH</option>
                                       <option value="BTS">BELUM TAMAT SD/SEDERAJAT</option>
                                       <option value="TSS">TAMAT SD / SEDERAJAT</option>
                                       <option value="SMP">SLTP/SEDERAJAT</option>
                                       <option value="SMA"  selected="">SLTA / SEDERAJAT</option>
                                       <option value="D1">DIPLOMA I / II</option>
                                       <option value="D2">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                       <option value="S1">DIPLOMA IV/ STRATA I</option>
                                       <option value="S2">STRATA II</option>
                                       <option value="S3">STRATA III</option>
                                    @elseif ($penduduk->pendidikan == 'D1')
                                       <option value="TBS">TIDAK / BELUM SEKOLAH</option>
                                       <option value="BTS">BELUM TAMAT SD/SEDERAJAT</option>
                                       <option value="TSS">TAMAT SD / SEDERAJAT</option>
                                       <option value="SMP">SLTP/SEDERAJAT</option>
                                       <option value="SMA">SLTA / SEDERAJAT</option>
                                       <option value="D1" selected="">DIPLOMA I / II</option>
                                       <option value="D2">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                       <option value="S1">DIPLOMA IV/ STRATA I</option>
                                       <option value="S2">STRATA II</option>
                                       <option value="S3">STRATA III</option>
                                    @elseif ($penduduk->pendidikan == 'D2')
                                       <option value="TBS">TIDAK / BELUM SEKOLAH</option>
                                       <option value="BTS">BELUM TAMAT SD/SEDERAJAT</option>
                                       <option value="TSS">TAMAT SD / SEDERAJAT</option>
                                       <option value="SMP">SLTP/SEDERAJAT</option>
                                       <option value="SMA">SLTA / SEDERAJAT</option>
                                       <option value="D1">DIPLOMA I / II</option>
                                       <option value="D2" selected="">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                       <option value="S1">DIPLOMA IV/ STRATA I</option>
                                       <option value="S2">STRATA II</option>
                                       <option value="S3">STRATA III</option>
                                    @elseif ($penduduk->pendidikan == 'S1')
                                       <option value="TBS">TIDAK / BELUM SEKOLAH</option>
                                       <option value="BTS">BELUM TAMAT SD/SEDERAJAT</option>
                                       <option value="TSS">TAMAT SD / SEDERAJAT</option>
                                       <option value="SMP">SLTP/SEDERAJAT</option>
                                       <option value="SMA">SLTA / SEDERAJAT</option>
                                       <option value="D1">DIPLOMA I / II</option>
                                       <option value="D2">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                       <option value="S1"  selected="">DIPLOMA IV/ STRATA I</option>
                                       <option value="S2">STRATA II</option>
                                       <option value="S3">STRATA III</option>
                                    @elseif ($penduduk->pendidikan == 'S2')
                                       <option value="TBS">TIDAK / BELUM SEKOLAH</option>
                                       <option value="BTS">BELUM TAMAT SD/SEDERAJAT</option>
                                       <option value="TSS">TAMAT SD / SEDERAJAT</option>
                                       <option value="SMP">SLTP/SEDERAJAT</option>
                                       <option value="SMA">SLTA / SEDERAJAT</option>
                                       <option value="D1">DIPLOMA I / II</option>
                                       <option value="D2">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                       <option value="S1">DIPLOMA IV/ STRATA I</option>
                                       <option value="S2" selected="">STRATA II</option>
                                       <option value="S3">STRATA III</option>
                                    @elseif ($penduduk->pendidikan == 'S3')
                                       <option value="TBS">TIDAK / BELUM SEKOLAH</option>
                                       <option value="BTS">BELUM TAMAT SD/SEDERAJAT</option>
                                       <option value="TSS">TAMAT SD / SEDERAJAT</option>
                                       <option value="SMP">SLTP/SEDERAJAT</option>
                                       <option value="SMA">SLTA / SEDERAJAT</option>
                                       <option value="D1">DIPLOMA I / II</option>
                                       <option value="D2">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                       <option value="S1">DIPLOMA IV/ STRATA I</option>
                                       <option value="S2">STRATA II</option>
                                       <option value="S3" selected="">STRATA III</option>
                                    @endif
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Pekerjaan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <select class="form-control form-control-sm" name="pekerjaan" disabled="">
                                    @foreach ($pekerjaan as $data)
                                       @if ($penduduk->pekerjaan == $data->id)
                                          <option value="{{ $data->id }}" selected="">{{ $data->nama }}</option>
                                       @else
                                          <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                       @endif
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama Ibu<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="nama_ibu" value="{{ $penduduk->nama_ibu }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama Ayah<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="nama_ayah" value="{{ $penduduk->nama_ayah }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nomor Kartu Keluarga<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="no_kk" value="{{ $penduduk->no_kk }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RT<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="rt" value="{{ $penduduk->rt }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RW<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="rw" value="{{ $penduduk->rw }}" readonly="">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Warga Negara<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" value="INDONESIA" readonly name="warga_negara" value="{{ $penduduk->warga_negara }}">
                              </div>
                           </div>
                           {{-- garis --}}
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Alamat Tujuan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="alamat_tujuan" value="{{ $penduduk_keluar->alamat_tujuan }}">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RT Tujuan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="rt_tujuan" value="{{ $penduduk_keluar->rt_tujuan }}">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>RW Tujuan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control currency-x" name="rw_tujuan" value="{{ $penduduk_keluar->rw_tujuan }}">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Kecamatan Tujuan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="hidden" class="form-control-sm form-control ui-autocomplete" name="kecamatan_tujuan" value="{{ $kec->id }}">
                                 <input type="text" class="form-control-sm form-control ui-autocomplete" id="kecamatan" name="nama_kecamatan" value="{{ $kec->name }}">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Kabupaten Tujuan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="hidden" class="form-control-sm form-control" readonly="" name="kabupaten_tujuan" value="{{ $kab->id }}">
                                 <input type="text" class="form-control-sm form-control" readonly="" name="nama_kabupaten" value="{{ $kab->name }}">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Provinsi Tujuan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="hidden" class="form-control-sm form-control" readonly="" name="provinsi_tujuan" value="{{ $pro->id }}">
                                 <input type="text" class="form-control-sm form-control" readonly="" name="nama_provinsi" value="{{ $pro->name }}">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Tanggal Pindah<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control datepicker" name="tgl_pindah" value="{{ date('d-m-Y', strtotime($penduduk_keluar->tgl_pindah)) }}">
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Keterangan<font color="red">*</font></label>
                           </div>
                           <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" class="form-control-sm form-control" name="keterangan" value="{{ $penduduk_keluar->keterangan }}">
                              </div>
                           </div>

                        </div>
                     </section>
                  </div>
                  <div class="card-footer text-right">
                     <button class="btn btn-primary btn-submit simpan" type="button" onclick="simpan('{{ Crypt::encrypt($penduduk_keluar->id) }}')">Update</button>
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
   });
   function simpan(id)
   {
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $('.simpan').attr('disabled', 'disabled');
      $.ajax({
         url: "{{ route('update-pkeluar') }}",
         type: 'POST',
         data: $('#data').serialize() + '&id=' + id,
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
                 window.location.href = "{{ route('pkeluar') }}";
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
