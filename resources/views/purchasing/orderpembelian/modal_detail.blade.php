<!-- Modal -->
<div id="modal_detail_order" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Detail Order Pembelian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
        <label>Status : </label> <span class="badge badge-pill po_status_label">Barang sudah diterima</span>
        
        <fieldset>
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold">No Order Pembelian</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="po_code">PO/201901/1</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold">Cara Pembayaran</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="po_method">CASH</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold">Tanggal Order Pembelian</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="po_tanggal_label">2 Jan 2019</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold">Tanggal Pengiriman</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="po_tanggal_kirim_label">3 Jan 2019</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold">Suplier</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="s_name">Alpha</label>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold">Petugas</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="name">Alpha</label>
            </div>
          </div>
        </fieldset>
        <hr>

        <div class="table-responsive">
          <table class="table table-striped table-hover" cellspacing="0" id="tabel_detail">
            <thead class="bg-primary">
              <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Qty</th>
                <th>Stock Gudang</th>
                <th>Harga Prev</th>
                <th>Harga</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
             
            </tbody>
          </table>
        </div>

          <div class="row mt-3">
            <div class="offset-md-6 col-md-6 col-sm-12">
              <fieldset>
                <div class="row">
                  <div class="col-lg-12">
                    <label>Total Harga :</label>
                    <input type="text" readonly="" class="text-right po_total_gross form-control form-control-sm" name="" >
                  </div>

                  <div class="col-lg-12">
                    <label>Potongan Harga :</label>
                    <input type="text" readonly="" class="text-right form-control form-control-sm po_disc_value" name="" >
                  </div>

                  <div class="col-lg-12">
                    <label>Total Diskon(%):</label>
                    <input type="text" readonly="" class="text-right po_disc_percent form-control form-control-sm" name="" >
                  </div>

                  <div class="col-lg-12">
                    <label>PPN(%) :</label>
                    <input type="text" readonly="" class="text-right po_tax_percent form-control form-control-sm" name="">
                  </div>

                  <div class="col-lg-12">
                    <label>Total :</label>
                    <input type="text" readonly="" class="text-right po_total_net form-control form-control-sm" name="">
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>