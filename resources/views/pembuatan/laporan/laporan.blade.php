<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan Alexis</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/css/nota.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
</head>
<body>
<div class="div-width page-break">

<div class="row">
  <div style="width: 45%; float: left; padding-left: 15px; padding-right: 15px;">
    <table class="border-none" width="100%">
      <tr>
        <td width="15%">Laporan</td>
        <td width="1%">:</td>
        <td>@if ($laporan[0]->laporan == 'd_kelahiran')
              Kelahiran
            @elseif($laporan[0]->laporan == 'd_kematian')
              Kematian
            @elseif($laporan[0]->laporan == 'd_penduduk_masuk')
              Penduduk Masuk
            @elseif($laporan[0]->laporan == 'd_penduduk_keluar')
              Penduduk Keluar
            @endif
        </td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td> {{ date('d M Y', strtotime($laporan[0]->tanggal1)) }} - {{ date('d M Y', strtotime($laporan[0]->tanggal2)) }} </td>
      </tr>
    </table>
  </div>

  <div style="width: 45%; float: left; padding-left: 15px; padding-right: 15px;">

    <h1 class="m-unset">DESA WONOKERTO</h1>

  </div>
</div>

  <table width="100%" class="mt-3" cellpadding="5px">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th width="15%">Nik</th>
        <th width="20%">Nama</th>
        <th width="30%">Tempat & Tanggal Lahir</th>
        <th width="20%">Kelamin</th>
        <th width="10%">RT / RW</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $index=>$val)
      <tr>
        <td><div class="text-right">{{ $index+1 }}</div></td>
        <td>{{ $val->nik }}</td>
        <td>{{ $val->nama }}</td>
        <td>{{ $val->name }}, {{ date('d M Y', strtotime($val->tgl_lahir)) }}</td>
        <td>
          @if($val->kelamin == 'L')
             Laki - laki
          @else
             Perempuan
          @endif
        </td>
        <td>RT {{$val->rt }} / RW {{ $val->rw }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
    </tfoot>
  </table>

</div>

</body>
</html>
<script src="{{asset('assets/jquery/jquery-3.1.0.min.js')}}"></script>
<script src="{{asset('assets/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script type="text/javascript">
    //mask money
    $('.currency').inputmask("currency", {
      radixPoint: ".",
      groupSeparator: ".",
      digits: 2,
      autoGroup: true,
      prefix: '', //Space after $, this will not truncate the first character.
      rightAlign: false,
      autoUnmask: true,
      // unmaskAsNumber: true,
    });
    //mask money
    $('.digits').inputmask("currency", {
      radixPoint: ".",
      groupSeparator: ".",
      digits: 0,
      autoGroup: true,
      prefix: '', //Space after $, this will not truncate the first character.
      rightAlign: false,
      autoUnmask: true,
      // unmaskAsNumber: true,
    });
    $(document).ready(function () {
        // window.print();
    })
</script>
