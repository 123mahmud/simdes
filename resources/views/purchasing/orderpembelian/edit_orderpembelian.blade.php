@extends('main')

@section('content')
<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Order Pembelian </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Purchasing</span> 
        / <a href="{{route('orderpembelian')}}"><span>Order Pembelian</span></a>
        / <span class="text-primary font-weight-bold">Tambah Order Pembelian</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                        <h3 class="title"> Tambah Order Pembelian </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('orderpembelian')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
                      </div>
                    </div>
                    <form id="form_purchase_order">
                      <input type="hidden" name="po_id" value="{{ $purchase_order->po_id }}">
                      <div class="card-block">
                          <section>
                            <fieldset>
                              <div class="row">

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>No Order Pembelian</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly="" name="" value="{{ $purchase_order->po_code }}">
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Staff</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input type="hidden" name="po_officer" value="{{ $purchase_order->po_officer }}">

                                    <input type="text" class="form-control form-control-sm" readonly="" value="{{ $purchase_order->name }}">
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Tanggal Order Pembelian</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y')}}" name="po_tanggal" value="{{ $purchase_order->po_tanggal_label }}" readonly>
                                  </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Tanggal Kirim</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm datepicker" name="po_tanggal_kirim" value="{{ $purchase_order->po_tanggal_kirim_label }}" readonly>
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Cara Bayar</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input class="form-control form-control-sm" name="po_method" value="{{ $purchase_order->po_method }}" readonly>
                                      
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Kode Rencana Pembelian</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="po_purchase_plan" value="{{ $purchase_order->pp_code }}" id="po_purchase_plan" readonly>
                                      
                                    
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <label>Suplier</label>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="po_supplier" value="{{ $purchase_order->s_name }}" id="po_supplier" readonly>
                                      
                                    
                                  </div>
                                </div>

                              </div>
                            </fieldset>

                            <div class="table-responsive mt-3">
                              <table class="table table-bordered table-hover table-striped" id="table_purchase_order_dt" cellspacing="0">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>Kode | Barang</th>
                                    <th width="10%">Qty</th>
                                    <th width="10%">Satuan</th>
                                    <th>Harga Prev</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                    <th width="10%">Stok Gudang</th>
                                    <th width="10%">Aksi</th>
                                  </tr>
                                </thead>
                              </table>
                            </div>

                            <div class="row">
                              <div class="col-md-4 offset-md-8 col-sm-6 offset-sm-6 col-xs-12">
                                <div class="row">

                                  <div class="col-lg-12">
                                    <label>Total Harga</label>
                                  </div>

                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <input type="text" readonly="" class="text-right form-control form-control-sm" name="po_total_gross" value="{{ $purchase_order->po_total_gross }}" id="po_total_gross">
                                    </div>
                                  </div>
                                  
                                  <div class="col-lg-12">
                                    <label>Potongan Harga</label>
                                  </div>
                                  
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <input type="text" class="text-right form-control form-control-sm" name="po_disc_value" value="{{ $purchase_order->po_disc_value }}" id="po_disc_value">
                                    </div>
                                  </div>

                                  <div class="col-lg-12">
                                    <label>Diskon(%)</label>
                                  </div>
                                  
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <input type="number" class="text-right form-control form-control-sm" name="po_disc_percent" value="{{ $purchase_order->po_disc_percent }}" id="po_disc_percent">
                                    </div>
                                  </div>

                                  <div class="col-lg-12">
                                    <label>PPn(%)</label>
                                  </div>
                                  
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <input type="number" class="text-right form-control form-control-sm" name="po_tax_percent" value="{{ $purchase_order->po_tax_percent }}" id="po_tax_percent">
                                    </div>
                                  </div>

                                  <div class="col-lg-12">
                                    <label>Total</label>
                                  </div>
                                  
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <input type="text" readonly="" class="text-right form-control form-control-sm" name="po_total_net" value="{{ $purchase_order->po_total_net }}" id="po_total_net">
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </section>
                      </div>
                    </form>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="button" onclick="update_purchase_order()">Simpan</button>
                      <a href="{{route('orderpembelian')}}" class="btn btn-secondary">Kembali</a>
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
    $('#table_order').dataTable();
  });
</script>
  @include('purchasing/orderpembelian/js/form_functions')
  @include('purchasing/orderpembelian/js/form_commander')
  <script>
    $(document).ready(function(){
      // Set currency
      var po_disc_value = $('[name="po_disc_value"]').val();
      var po_disc_value = 'Rp ' + accounting.formatMoney(po_disc_value,"",0,'.',',')
      $('[name="po_disc_value"]').val( po_disc_value );
      var po_total_gross = $('[name="po_total_gross"]').val();
      var po_total_gross = 'Rp ' + accounting.formatMoney(po_total_gross,"",0,'.',',')
      $('[name="po_total_gross"]').val( po_total_gross );
      var po_total_net = $('[name="po_total_net"]').val();
      var po_total_net = 'Rp ' + accounting.formatMoney(po_total_net,"",0,'.',',')
      $('[name="po_total_net"]').val( po_total_net );
      var purchase_order_dt = {!! $purchase_order_dt !!}
      if( purchase_order_dt.length > 0 ){
          for(x in purchase_order_dt) {
                unit = purchase_order_dt[x];
                console.log(unit);
                var podt_item = "<input name='podt_item[]' value='" + unit.i_id + "' type='hidden'>" + unit.i_name;
                var podt_qty = "<input name='podt_qty[]' value='" + unit.podt_qty + "' type='number' class='form-control form-control-sm text-right'>" ;
                var podt_satuan = "<input name='podt_satuan[]' value='" + unit.podt_satuan + "' type='hidden' class='form-control'>" + unit.s_name;
                var podt_prev_price = "<input name='podt_prev_price[]' value='" + unit.podt_prev_price + "' type='hidden'>Rp " + accounting.formatMoney(unit.podt_prev_price,"",0,'.',',');
                var podt_price = "<input name='podt_price[]' value='Rp. " + accounting.formatMoney(unit.podt_price,"",0,'.',',') + "' type='text' class='form-control form-control-sm text-right'>";
                var stock = unit.stock;
                var harga_total = unit.podt_price * unit.podt_qty;
                harga_total = 'Rp ' + accounting.formatMoney(harga_total,"",0,'.',',') + ',00';
                var aksi = '<button type="button" class="btn btn-danger btn-hapus" onclick="remove_detail(this)"><i class="fa fa-trash-o"></i></button>';

                
                table_purchase_order_dt.row.add([
                  podt_item, podt_qty, podt_satuan, podt_prev_price, podt_price, harga_total, stock, aksi
                ]);
              }

              table_purchase_order_dt.draw();
      }
    });
  </script>
<script>
  
</script>
@endsection