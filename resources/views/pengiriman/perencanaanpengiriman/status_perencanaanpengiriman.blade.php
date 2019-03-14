<!-- Modal -->
<div id="status" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Status Perencanaan Pengiriman</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            
            
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Status</label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <select class="form-control form-control-sm select2" id="status_pilih">
                  <option value="">--Pilih--</option>
                  <option value="1">Packing</option>
                  <option value="2">Proses Pengiriman</option>
                  <option value="3">Sudah diterima</option>
                </select>
                <span id="example_badge" class="badge badge-pill d-none"></span>
              </div>
            </div>          

         </div> <!-- End div row -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button">Simpan</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>