<!-- Modal -->
<div id="buat_spk" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form SPK</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <fieldset class="mb-3">
          <div class="row">
            
            
            <div class="col-md-4 col-sm-5 col-12">
              <label>Tanggal Rencana</label>
            </div>
            <div class="col-md-8 col-sm-7 col-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" readonly="" name="">
              </div>
            </div>
            <div class="col-md-4 col-sm-5 col-12">
              <label>Nama Barang</label>
            </div>
            <div class="col-md-8 col-sm-7 col-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" readonly="" name="">
              </div>
            </div>
            <div class="col-md-4 col-sm-5 col-12">
              <label>Jumlah Produksi</label>
            </div>
            <div class="col-md-8 col-sm-7 col-12">
              <div class="form-group">
                <input type="number" min="1" class="form-control form-control-sm" readonly="" name="">
              </div>
            </div>
            <div class="col-md-4 col-sm-5 col-12">
              <label>No SPK</label>
            </div>
            <div class="col-md-8 col-sm-7 col-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" readonly="" name="">
              </div>
            </div>
              
              
            

          </div> <!-- End div row -->
        </fieldset>

        <button class="btn btn-secondary mb-3 pull-right" id="hitung-stok" type="button"><i class="fa fa-plus"></i> Hitung Stok</button>

        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped" id="tabel_modal_spk" cellspacing="0">
            <thead class="bg-primary">
              <tr>
                <th>Bahan Baku</th>
                <th>Kebutuhan</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Sisa</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" readonly="" class="form-control form-control-sm bahanbaku" name="bahanbaku[]" value="Air"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm text-right kebutuhan" name="kebutuhan[]" value="50000"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm satuan" name="satuan[]" value="ML"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm text-right stok" name="stok[]" value="10000"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm text-right sisa" name="sisa[]" value=""></td>
                
              </tr>
              <tr>
                <td><input type="text" readonly="" class="form-control form-control-sm bahanbaku" name="bahanbaku[]" value="Semen"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm text-right kebutuhan" name="kebutuhan[]" value="100"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm satuan" name="satuan[]" value="KG"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm text-right stok" name="stok[]" value="400"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm text-right sisa" name="sisa[]" value=""></td>
                
              </tr>
              <tr>
                <td><input type="text" readonly="" class="form-control form-control-sm bahanbaku" name="bahanbaku[]" value="Pasir"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm text-right kebutuhan" name="kebutuhan[]" value="2000"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm satuan" name="satuan[]" value="KG"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm text-right stok" name="stok[]" value="100"></td>
                <td><input type="text" readonly="" class="form-control form-control-sm text-right sisa" name="sisa[]" value=""></td>
                
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        {{-- <button class="btn btn-secondary d-none" id="btn-rencanabahanbaku">Buat Rencana Bahan Baku</button> --}}
        <button class="btn btn-primary" id="btn-final" type="button">Final</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>