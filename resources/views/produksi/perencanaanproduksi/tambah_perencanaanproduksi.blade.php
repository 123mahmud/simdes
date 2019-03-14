<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Perencanaan Produksi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          
          
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Nama Barang</label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <select class="form-control form-control-sm select2">
                  <option value="">--Pilih--</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Tanggal</label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" readonly="" value="{{date('d-m-Y')}}" name="">
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Jumlah Rencana Produksi</label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <input type="number" min="1" class="form-control form-control-sm" name="">
              </div>
            </div>
            
          

         </div> <!-- End div row -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button">Process</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>