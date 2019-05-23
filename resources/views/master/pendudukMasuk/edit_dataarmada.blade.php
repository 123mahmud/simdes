@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Data Armada </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Master Data</span>
         / <a href="{{route('dataarmada')}}"><span>Data Armada</span></a>
         / <span class="text-primary" style="font-weight: bold;">Edit Data Armada</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                        <h3 class="title">Edit Data Armada </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('dataarmada')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                      </div>
                    </div>

                    <div class="card-block">
                        <section>
                        

                          <div class="row">

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Suplier</label>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="form-group">
                              <select class="js-example-placeholder-single js-states form-control">
                                <option></option>
                              </select>
                              </div>
                            </div>

                            <div>
                              <td align="center"><button class="btn btn-primary btn-submit" type="button">Submit</button></td>
                            </div>

                          </div>

                          <div class="table-responsive mt-3">
                            <table class="table table-hover table-striped table-bordered" id="table_rencana">
                              <thead class="bg-primary">
                                <tr align="center">
                                  <th>Suplier</th>
                                  <th>Plat Kendaraan</th>
                                  <th>Panjang</th>
                                  <th>Lebar</th>
                                  <th>Tinggi</th>
                                  <th>Kubikasi bak</th>
                                  <th>Nama Sopir</th>
                                  <th>No Telp</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                        </section>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary btn-submit1" type="button">Simpan</button>
                      <a href="{{route('dataarmada')}}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

      </div>

    </div>

  </section>

</article>

@endsection
@section('extra_script')
<script>
  $(document).ready(function() {
    $(".js-example-placeholder-single").select2({
    placeholder: "Search",
    allowClear: true
    });

    $('.btn-submit').on('click',function(){
      $('#table_rencana tbody')
      .append(
        '<tr>'+
          '<td>Isqy Jaya, UD</td>'+
          '<td>N 9626 UT</td>'+
          '<td><input type="text" class="form-control form-control-sm" name=""></td>'+
          '<td><input type="text" class="form-control form-control-sm" name=""></td>'+
          '<td><input type="text" class="form-control form-control-sm" name=""></td>'+
          '<td><input type="text" class="form-control form-control-sm" name=""></td>'+
          '<td><input type="text" class="form-control form-control-sm" name=""></td>'+
          '<td><input type="text" class="form-control form-control-sm" name=""></td>'+
        '</tr>'
        );
    });

    $(document).on('click', '.btn-submit1', function(){
			$.toast({
				heading: 'Success',
				text: 'Data Berhasil di Edit',
				bgColor: '#00b894',
				textColor: 'white',
				loaderBg: '#55efc4',
				icon: 'success'
			})
		})
  });
</script>
@endsection
