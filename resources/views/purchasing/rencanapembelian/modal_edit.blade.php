<!-- Modal -->
<div id="detail_rencana_edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Detail Rencana Pembelian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
        <label>Status : </label> <span class="pp_status_label badge badge-pill">Disetujui</span>
        
        <fieldset>
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold">Kode Rencana</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="pp_code">ReP/201812/1</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold" >Tanggal Rencana</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="pp_tanggal_label">29 Des 2018</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold">Staff</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="name">Administrator</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="font-weight-bold" class="s_name">Suplier</label>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <label class="s_name">Alpha</label>
            </div>
          </div>
        </fieldset>
        <hr>

        <div class="table-responsive">
          <form id="form_update_purchase_plan">
            <input type="hidden" id="pp_id" name="pp_id">
            <table class="table table-striped table-hover" cellspacing="0" id="tabel_detail_edit">
              <thead class="bg-primary">
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th width="35%">Qty</th>
                  <th>Satuan</th>
                  <th width="10%">Stock Gudang</th>
                </tr>
              </thead>
              <tbody>
                
                 
              </tbody>
            </table>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="update_purchase_plan()">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>