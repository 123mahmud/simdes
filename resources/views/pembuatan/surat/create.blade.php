<!DOCTYPE html>
<html>
   <head>
      <title>Pembuatan Surat</title>
      <style type="text/css">
      *:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6):not(small):not(label){
      font-size: 14px;
      }
      .s16{
      font-size: 16px !important;
      }
      .div-width{
      width: 900px;
      padding: 0 15px 15px 15px;
      background: transparent;
      position: relative;
      }
      .div-width-background{
      content: "";
      background-repeat: no-repeat;
      background-position: center;
      background-size: 700px 700px;
      position: absolute;
      z-index: -1;
      margin-top: 170px;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      opacity: 0.1;
      width: 900px;
      }
      .underline{
      text-decoration: underline;
      }
      .italic{
      font-style: italic;
      }
      .bold{
      font-weight: bold;
      }
      .text-center{
      text-align: center;
      }
      .text-right{
      text-align: right;
      }
      .text-left{
      text-align: left;
      }
      .border-none-right{
      border-right: hidden;
      }
      .border-none-left{
      border-left:hidden;
      }
      .border-none-bottom{
      border-bottom: hidden;
      }
      .border-none-top{
      border-top: hidden;
      }
      .float-left{
      float: left;
      }
      .float-right{
      float: right;
      }
      .top{
      vertical-align: text-top;
      }
      .vertical-baseline{
      vertical-align: baseline;
      }
      .bottom{
      vertical-align: text-bottom;
      }
      .ttd{
      width: 150px;
      }
      .relative{
      position: relative;
      }
      .absolute{
      position: absolute;
      }
      .empty{
      height: 18px;
      }
      table,td{
      border:1px solid black;
      }
      table{
      border-collapse: collapse;
      }
      table.border-none ,.border-none td{
      border:none !important;
      }
      .position-top{
      vertical-align: top;
      }
      @page {
      size: portrait;
      margin:0 0 0 0;
      }
      @media print {
      .div-width{
      margin: auto;
      padding: 120px 15px 15px 15px;
      width: 95vw;
      position: relative;
      }
      .btn-print{
      display: none;
      }
      header{
      top:0;
      left: 0;
      right: 0;
      position: absolute;
      width: 100%;
      }
      footer{
      bottom: 0;
      left: 0;
      right: 0;
      position: absolute;
      width: 100%;
      }
      .div-width-background{
      content: "";
      background-repeat: no-repeat;
      background-position: center;
      background-size: 700px 700px;
      position: absolute;
      z-index: -1;
      margin: auto;
      opacity: 0.1;
      width: 95vw;
      }
      }
      fieldset{
      border: 1px solid black;
      margin:-.5px;
      }
      header{
      top: 0;
      width: 900px;
      }
      footer{
      bottom: 0;
      width: 900px;
      }
      .border-top{
      border-top: 1px solid black;
      }
      .btn-print{
      position: fixed;
      width: 100%;
      text-align: right;
      left: 0;
      top: 0;
      background: rgba(0,0,0,.2);
      }
      .btn-print button, .btn-print a{
      margin: 10px;
      }
      .border-bottom-dotted{
      border-bottom: 1px dotted black !important;
      }
      .div-page-break-after{
      page-break-after: always;
      width: 100%;
      }
      </style>
   </head>
   <body>
      <div class="div-page-break-after">
         @php
         setlocale(LC_ALL, "id_ID");
         @endphp
         <div class="btn-print" align="right">
         </div>
         <div class="div-width-background">
         </div>
         <header>

         </header>
         
         <div class="div-width">
            <h2 class="text-center" style="margin: 30px 0 0 0;">PEMERINTAH KABUPATEN GRESIK <br>KECAMATAN WONOSALAM <br> DESA WONOKERTO </h2>
            <small class="text-center" style="display: block;">No. Kode Desa / Kelurahan : {{ $kode[0]->kode_desa }}</small>

            <h3 class="text-center underline">SURAT PENGANTAR MOHON SKCK</h3>
            <small class="text-center" style="display: block;">Nomor: {{ $kode[0]->kode_surat }}</small>
            <table class="border-none" width="100%" style="margin-top: 30px;" cellpadding="5px">
               <tr>
                  <td colspan="3">Yang bertanda tangan dibawah ini menerangkan bahwa:</td>
               </tr>
               <tr>
                  <td width="20%">Nama</td>
                  <td width="1%">:</td>
                  <td class="border-bottom-dotted">{{ $penduduk->nama }}</td>
               </tr>
               <tr>
                  <td>Tempat & Tanggal Lahir</td>
                  <td>:</td>
                  <td class="border-bottom-dotted">{{ $kabupaten->name }} , {{ date('d M Y', strtotime($penduduk->tgl_lahir)) }}</td>
               </tr>
               <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td class="border-bottom-dotted">
                  @if($penduduk->kelamin == 'L')
                     Laki - laki
                  @else
                     Perempuan
                  @endif

                  </td>
               </tr>
               <tr>
                  <td width="20%">Agama</td>
                  <td width="1%">:</td>
                  <td class="border-bottom-dotted">
                     @if ($penduduk->agama == 'IL')
                       Islam
                     @elseif($penduduk->agama == 'HD')
                       Hindu
                     @elseif($penduduk->agama == 'BD')
                       Budha
                     @elseif($penduduk->agama == 'KP')
                       Kristen Prostetan
                     @elseif($penduduk->agama == 'KL')
                       Katolik
                     @elseif($penduduk->agama == 'KC')
                       Kong Hu Cu
                     @endif
                  </td>
               </tr>
               <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td class="border-bottom-dotted">
                     @if ($penduduk->status_nikah == 'KW')
                        Kawin
                     @elseif($penduduk->status_nikah == 'BK')
                        Belum Kawin
                     @elseif($penduduk->status_nikah == 'CH')
                        Cerai Hidup
                     @elseif($penduduk->status_nikah == 'CM')
                        Cerai Mati
                     @endif
                  </td>
               </tr>
               <tr>
                  <td>No. KTP / NIK</td>
                  <td>:</td>
                  <td class="border-bottom-dotted">{{ $penduduk->nik }}</td>
               </tr>
               <tr>
                  <td>Pekerjaan</td>
                  <td>:</td>
                  <td class="border-bottom-dotted">{{ $pekerjaan->nama }}</td>
               </tr>
               <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td class="border-bottom-dotted">
                     Desa {{ $desa->name }} RT : {{ $penduduk->rt }} RW : {{ $penduduk->rw }} {{ $kabupaten->name }}, {{ $provinsi->name }}
                  </td> 
               </tr>
               <tr>
                  <td>Keperluan</td>
                  <td>:</td>
                  <td class="border-bottom-dotted">{{ $surat[0]->keperluan }}</td>
               </tr>
               <tr>
                  <td>Keterangan</td>
                  <td>:</td>
                  <td class="border-bottom-dotted">{{ $surat[0]->keterangan }}</td>
               </tr>
               <tr>
                  <td>Berlaku Mulai</td>
                  <td>:</td>
                  <td class="border-bottom-dotted">{{ date('d M Y', strtotime($surat[0]->tgl_surat)) }} s/d {{ date('d M Y', strtotime($surat[0]->tgl_berlaku)) }}</td>
               </tr>
               <tr>
                  <td colspan="3" style="padding: 30px 5px 10px 5px;">
                     Demikian Surat Keterangan ini dibuat untuk digunakan seperlunya. 
                  </td>
               </tr>
               
            </table>
            <table width="100%" class="border-none" cellpadding="5px">
               <tr>
                  <td width="49%" align="center"></td>
                  <td align="center">Jombang, .......................<br><span class="bold">{{ $pegawai->c_posisi }}</span></td>
                  
               </tr>
               <tr>
                  <td height="70px" valign="bottom" align="center"></td>
                  <td class="bold underline" valign="bottom" align="center">{{ $pegawai->nama }}</td>
                  
               </tr>
               
            </table>
         </div>
         <footer>
         </footer>
      </div>
   </body>
</html>