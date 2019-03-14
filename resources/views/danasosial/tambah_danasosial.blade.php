<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Dana Sosial</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          
          
            <div class="col-md-4 col-sm-5 col-12">
              <label>Nama Dana Sosial</label>
            </div>
            <div class="col-md-8 col-sm-7 col-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" name="">
              </div>
            </div>
            <div class="col-md-4 col-sm-5 col-12">
              <label>Tanggal Pengeluaran</label>
            </div>
            <div class="col-md-8 col-sm-7 col-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y')}}" name="">
              </div>
            </div>
            <div class="col-md-4 col-sm-5 col-12">
              <label>Jumlah Pengeluaran</label>
            </div>
            <div class="col-md-8 col-sm-7 col-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm text-right input-rupiah" name="">
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