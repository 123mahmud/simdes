@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Data Upah </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Master</span> 
        / <span class="text-primary font-weight-bold">Data Upah</span>
       </p>
  </div>

  <section class="section">

    <div class="row">


      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                        <h3 class="title"> Data Upah </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('tambah_upah')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                      </div>
                    </div>
                    <div class="card-block">
                        <section>

                            <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped" id="table_upah" cellspacing="0">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Satuan</th>
                                    <th>Type Upah</th>
                                    <th>Jumlah Upah</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Paving Abu</td>
                                    <td>PCS</td>
                                    <td>Upah Borongan Produksi</td>
                                    <td>
                                      <div class="w-100">
                                        <div class="pull-left">Rp. </div><div class="pull-right">2.000,00</div>
                                    </td>
                                    <td>
                                      <div class="btn-group btn-group-sm">
                                        <button class="btn btn-warning"type="button" title="Edit"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger" type="button" title="Delete"><i class="fa fa-times-circle"></i></button>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Upah Operator 1</td>
                                    <td>-</td>
                                    <td>Upah Harian</td>
                                    <td>
                                      <div class="w-100">
                                        <div class="pull-left">Rp. </div><div class="pull-right">10.000,00</div>
                                    </td>
                                    <td>
                                      <div class="btn-group btn-group-sm">
                                        <button class="btn btn-warning"type="button" title="Edit"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger" type="button" title="Delete"><i class="fa fa-times-circle"></i></button>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                        </section>
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

    var table = $('#table_upah').DataTable();

  });
</script>
@endsection