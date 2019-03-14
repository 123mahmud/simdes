@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Manajemen Hak Akses </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Admin System</span> 
        / <a href="{{route('manajemenhakakses')}}">Manajemen Hak Akses</a>
        / <span class="text-primary font-weight-bold">Tambah Manajemen Hak Akses</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">

          <div class="card-header bordered p-2">
            <div class="header-block">
                <h3 class="title"> Tambah Manajemen Hak Akses </h3>
            </div>

            <div class="header-block pull-right">
              <a class="btn btn-primary" href="{{route('manajemenhakakses')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
            </div>
          </div>

          <div class="card-block">
              <section>

                <fieldset>
                  <div class="row">
                    
                    <div class="col-md-3 col-sm-4 col-12">
                      <label>Username / Nama</label>
                    </div>

                    <div class="col-md-9 col-sm-8 col-12">
                      <div class="form-group">
                        <select class="form-control form-control-sm select2">
                          <option value="" selected="" disabled="">--Pilih--</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-12">
                      <label>Hak Akses</label>
                    </div>

                    <div class="col-md-9 col-sm-8 col-12">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="">
                      </div>
                    </div>
                  </div>
                </fieldset>

                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="tabel_menu">
                    <thead class="bg-primary">
                      <tr>
                        <th>Menu</th>
                        <th>View</th>
                        <th>Create</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Print</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="bg-secondary text-white">
                        <td class="font-weight-bold" align="left">Master</td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                        <td colspan="4"></td>
                      </tr>
                      <tr>
                        <td>Master Data Barang</td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                      </tr>

                      <tr>
                        <td>Master Data Pegawai</td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                        <td align="center">
                          <label><input type="checkbox" class="checkbox" name=""><span></span></label>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
              </section>
          </div>

          <div class="card-footer text-right">
            <button class="btn btn-primary" type="button">Simpan</button>
            <a href="{{route('manajemenhakakses')}}" class="btn btn-secondary">Kembali</a>
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
    var table = $('#tabel_akses').DataTable();
  });
</script>
@endsection