@extends('main')

@section('extra_style')
<style type="text/css">
  #btn-bayar{
    margin-right: 30px;
  }
  @media (max-width: 400px){
    #btn-bayar{
      margin-right: unset;
    }
  }
</style>
@endsection

@section('content')

@include('penjualan.penjualantanpaorder.modal_cust')
@include('penjualan.penjualantanpaorder.modal_bayar')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Pencatatan Penjualan Tanpa Order </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Penjualan</span> 
        / <a href="{{route('penjualantanpaorder')}}">Pencatatan Penjualan Tanpa Order</a>
        / <span class="text-primary font-weight-bold">Tambah Pencatatan Penjualan Tanpa Order</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                          <h3 class="title"> Tambah Pencatatan Penjualan Tanpa Order </h3>
                      </div>
                      <div class="header-block pull-right">
                      <a class="btn btn-secondary btn-sm" href="{{route('penjualantanpaorder')}}"><i class="fa fa-arrow-left"></i></a>
                        
                      </div>
                    </div>
                    <div class="card-block">
                        <section>

                          <div class="row">

                            <div class="offset-lg-5 col-lg-7 offset-md-4 col-md-8 offset-sm-3 col-sm-9 col-12">
                              <div class="form-group top-totalprice">
                                <label>Total Amount</label>
                                <input type="text" class="form-control form-control-lg text-right" value="0,00" readonly="" name="">
                              </div>
                            </div>
                            
                          </div>
                          
                          <fieldset class="mb-3">  
                            <div class="row">

                              <div class="col-md-3 col-sm-6 col-12">
                                <label>Nota</label>
                              </div>

                              <div class="col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" readonly="" name="">
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-6 col-12">
                                <label>Customer</label>
                              </div>

                              <div class="col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                  <div class="input-group">
                                    <select class="form-control form-control-sm select2">
                                      <option>--Pilih--</option>
                                    </select>
                                    <div class="input-group-append">
                                      <button class="btn btn-primary btn-sm" type="button" id="btn-modalcust"><i class="fa fa-plus-square"></i></button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                               <div class="col-md-3 col-sm-6 col-12">
                                <label>Alamat</label>
                              </div>

                              <div class="col-md-9 col-sm-6 col-12">
                                <div class="form-group">
                                  <textarea readonly="" class="form-control" name=""></textarea>
                                </div>
                              </div>
                              
                            </div>
                          </fieldset>

                          <fieldset class="mb-3">
                            <div class="row">


                              <div class="col-md-6 col-sm-6 col-12">
                                <label>Nama Barang</label>
                                <div class="form-group">
                                  <select class="form-control form-control-sm select2" id="barang" name="">
                                    <option>--Pilih--</option>
                                    <option>Paving</option>
                                    <option>Sirtu</option>
                                    <option>Pasir</option>
                                    <option>Koral</option>
                                    <option>Paving Abu</option>
                                  </select>
                                </div>
                              </div>

                            
                              <div class="col-md-3 col-sm-3 col-12">
                                <label>Qty</label>
                                <div class="form-group">
                                  <div class="input-group">
                                    <input type="number" min="0" class="form-control form-control-sm" name="" id="qty">
                                    <div class="input-group-append">
                                      <button class="btn btn-primary btn-sm" id="btn-tambahistri"><i class="fa fa-plus"></i></button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-3 col-12">
                                <label>Stok</label>
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" readonly="" name="">
                                </div>
                              </div>
                              
                            </div>                            
                          </fieldset>

                          <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="table-listcalonistri" cellspacing="0">
                              <thead class="bg-primary">
                                <tr>
                                  <th>Barang</th>
                                  <th>Qty</th>
                                  <th>Harga</th>
                                  <th>Disc Persen</th>
                                  <th>Disc Harga</th>
                                  <th width="1%"></th>
                                </tr>
                              </thead>
                            </table>
                          </div>

                        </section>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-info" type="button" data-target="#modal_bayar" data-toggle="modal" id="btn-bayar">Bayar</button>
                      <button class="btn btn-primary" type="button" id="btn-simpan-pacar"{{--buat istri ketiga--}}>Simpan</button>
                      <a class="btn btn-secondary" href="{{route('penjualantanpaorder')}}">Kembali</a>
                      
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
    var table     = $('#table-listcalonistri').DataTable();
    var counter   = 0;
    
    $('#barang').on('select2:close',function(){

      $(this).focus();

    });

    $('#barang').on('select2:select',function(e){
      // var cupu = e.params.data;
      // console.log(cupu);
      $('#qty').focus();

    });

    function datatable_append(){
      var barang = $('#barang');
      var qty = $('#qty');

      table.row.add([
        barang.val(),
        '<input type="number" min="0" class="form-control form-control-sm" value="'+ qty.val() +'">',
        '0,00',
        '<input type="text" readonly class="form-control form-control-sm">',
        '<input type="text" readonly class="form-control form-control-sm">',
        '<button type="button" class="btn btn-danger btn-hapuskenangan btn-sm"><i class="fa fa-trash-o"></i></button>'
        ]).draw();

      counter++

      barang.prop('selectedIndex',0).trigger('change');
      qty.val('');
      barang.select2('open');
    }

    $('#btn-tambahistri').on('click',function(){
      datatable_append();
    });

    $('#qty').keypress(function(e){

      if (e.which === 13 || e.keyCode === 13) {
        datatable_append();
      }

    });

    $('#btn-modalcust').click(function(){
      $('#tambah_cust').modal('show');
    });

      $('#table-listcalonistri tbody').on('click', '.btn-hapuskenangan', function(){

        table.row($(this).parents('tr')).remove().draw();

      });
  });




</script>
@endsection