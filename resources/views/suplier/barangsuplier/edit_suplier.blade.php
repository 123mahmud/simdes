@extends('main')

@section('content')


<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Edit Barang untuk Suplier </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Suplier</span>
         / <a href="{{route('barangsuplier')}}"><span>Item Barang Suplier</span></a>
         / <span class="text-primary" style="font-weight: bold;">Edit Barang untuk Suplier</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                        <h3 class="title">Edit Barang untuk Suplier </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('barangsuplier')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                      </div>
                    </div>
                    <div class="card-block">
                        <section>

                          <div class="row">

                            <div class="col-md-12">
                              <label>Suplier</label>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <select class="form-control form-control-sm select2" id="suplier" name="suplier">
                                  <option value="" selected="" disabled="">-Pilih-</option>
                                  <option value="1">Alpha</option>
                                  <option value="2">Bravo</option>
                                  <option value="3">Charlie</option>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <label>Daftar Barang (Input nama barang terkait)</label>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <select class="form-control form-control-sm select2" name="" id="barang">
                                    <option value="" selected="" disabled="">-Pilih-</option>
                                    <option value="1">Semen</option>
                                    <option value="2">Cat</option>
                                    <option value="3">Pasir</option>
                                  </select>
                                  <div class="input-group-append">
                                    <button class="btn btn-primary btn-tambah btn-sm" title="Tambah" type="button"><i class="fa fa-plus"></i></button>
                                  </div>
                                </div>
                              </div>
                            </div>



                          </div>

                          <div class="row">

                            <div class="table-responsive">
                              <table class="table table-hover data-table table-striped" cellspacing="0" id="tabel_barang">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>Nama Barang</th>
                                    <th width="15%">Aksi</th>
                                  </tr>
                                </thead>
                              </table>
                            </div>

                          </div>

                        </section>
                    </div>

                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="button">Update</button>
                      <a href="{{route('barangsuplier')}}" class="btn btn-secondary">Kembali</a>
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
    var tabel = $('#tabel_barang').DataTable();

    function tabel_barang(){

      tabel.row.add([
          $('#barang option:selected').text() +
          '<input type="hidden" class=".barang" name="barang[]" value="'+ $('#barang').val() +'">',
          '<button class="btn btn-danger btn-hapus" type="button" title="Delete"><i class="fa fa-trash-o"></i></button>'
        ]).draw(false).node();

      $('#barang').prop('selectedIndex', 0).trigger('change');

    }

    $('.btn-tambah').click(function(){
      tabel_barang();
    });

    $('#tabel_barang tbody').on( 'click', '.btn-hapus', function () {
          tabel
              .row($(this).parents('tr'))
              .remove()
              .draw();

      });
  });
</script>
@endsection