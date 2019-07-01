@extends('main')

@section('content')

<article class="content">
  <div class="title-block text-primary">
    <h1 class="title"> Edit Data Mesin </h1>
    <p class="title-description">
      <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
      / <span>Master Data</span>
      / <a href="{{route('datamesin')}}"><span>Data Satuan</span></a>
      / <span class="text-primary" style="font-weight: bold;">Edit Data Mesin</span>
    </p>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-12">
        
        <div class="card">
          <div class="card-header bordered p-2">
            <div class="header-block">
              <h3 class="title">Edit Data Mesin</h3>
            </div>
            <div class="header-block pull-right">
              <a href="{{route('datamesin')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
            </div>
          </div>
          <div class="card-block">
            <section>
              <form id="updatePeg">
              <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <label>Code Mesin</label>
                </div>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm" name="" readonly="" value="{{ $mesin->m_code }}">
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <label>Nama Mesin</label>
                </div>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm" name="m_nama" value="{{ $mesin->m_nama }}">
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <label>Mandor</label>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <select type="text" class="form-control form-control-sm select2" name="m_pegawai">
                    @foreach ($pegawai as $data)
                      @if ($mesin->m_pegawai == $data->c_id)
                        <option value="{{ $data->c_id }}" selected> {{ $data->c_nama }}</option>
                      @else
                        <option value="{{ $data->c_id }}"> {{ $data->c_nama }}</option>
                      @endif

                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            </form>
          </section>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary btn-submit" type="button" onclick="simpanMesin()">Simpan</button>
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

   function simpanMesin()
   {
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $('.simpanPeg').attr('disabled', 'disabled');
      $.ajax({
         url: baseUrl + "/master/datamesin/update/{{$mesin->m_id}}",
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
                 window.location.href = baseUrl + "/master/datamesin/datamesin";
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