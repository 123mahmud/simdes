					<div class="tab-pane fade in active show" id="opname">
						<div class="card">
	                        <div class="card-header bordered p-2">
	                        	<div class="header-block">
		                            <h3 class="title"> Opname Bahan Baku </h3>
		                        </div>
	                        </div>
		                    <div class="card-block">
		                        <section>
		                        	
		                        	<fieldset class="mb-3">
		                        		<div class="row">

		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <label>Pemilik Item</label>
		                              </div>

		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <div class="form-group">
		                                  <select class="form-control form-control-sm select2">
		                                  	<option value="">--Pilih--</option>
		                                  </select>
		                                </div>
		                              </div>

		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <label>Posisi Item</label>
		                              </div>

		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <div class="form-group">
		                                  <select class="form-control form-control-sm select2">
		                                  	<option value="">--Pilih--</option>
		                                  </select>
		                                </div>
		                              </div>

		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <label>Tanggal Opname</label>
		                              </div>

		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <div class="form-group">
		                                  <input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y')}}" name="">
		                                </div>
		                              </div>

		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <label>Nama Staff</label>
		                              </div>

		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <div class="form-group">
		                                  <input type="text" class="form-control form-control-sm" readonly="" name="">
		                                </div>
		                              </div>


		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <label>Tipe Barang</label>
		                              </div>

		                              <div class="col-md-3 col-sm-6 col-xs-12">
		                                <div class="form-group">
		                                  	<select class="form-control form-control-sm tipe_barang data" name="tipe_barang" required="">
			                                  	<option value="" selected="">--Pilih Type Barang--</option>
			                                  	<option value="BB">Bahan Baku</option>
			                                  	<option value="SP">Spare Part</option>
			                                  	<option value="BJ">Barang Jual</option>
			                                  	<option value="LL">Lain-lain</option>
			                                </select>
		                                </div>
		                              </div>

		                        		</div>
		                        	</fieldset>

		                        	<fieldset class="mb-3">
		                        		<div class="row">
		                        			
		                              <div class="col-md-6 col-sm-8 col-xs-12">
		                                <label>Barang</label>
		                                <div class="form-group">
		                                  <select class="form-control form-control-sm select2" id="barang">
		                                  	<option value="" disabled="" selected="">--Pilih--</option>
		                                  	<option value="1">Tensla 1x2</option>
		                                  	<option value="2">Paving Abu</option>
		                                  	<option value="3">Paving Merah</option>
		                                  	<option value="4">Paving 8T</option>
		                                  	<option value="5">Tensla 1x1</option>

		                                  </select>
		                                </div>
		                              </div>

		                              <div class="col-md-3 col-sm-2 col-xs-12">
		                              	<label>Qty Real</label>
		                              	<div class="form-group">
		                              		<div class="input-group">
				                                <input type="number" min="0" class="form-control-sm form-control" id="qty_real" name="">
				                                <div class="input-group-append">
				                                	<button class="btn btn-sm btn-primary" title="Tambah" type="button" id="btn-tambah-barang"><i class="fa fa-plus"></i></button>
				                                </div>
				                            </div>
		                                </div>
		                              </div>

		                              <div class="col-md-3 col-sm-2 col-xs-12">
		                              	<label>Qty Sistem</label>
		                              	<div class="form-group">
		                                  <input type="number" readonly="" class="form-control-sm form-control" name="">
		                                </div>
		                              </div>
		                        		</div>
		                        	</fieldset>

		                        	<div class="table-responsive">
			                            <table class="table table-striped table-bordered table-hover" id="table_opname" cellspacing="0">
			                                <thead class="bg-primary">
			                                    <tr>
									                <th>Kode | Item</th>
									                <th>Qty Sistem</th>
									                <th>Satuan</th>
									                <th>Qty Real</th>
									                <th>Opname</th>
									                <th>Keterangan</th>
									                <th>Aksi</th>
									            </tr>
			                                </thead>
			                                <tbody>

									        </tbody>
			                            </table>
			                        </div>
		                        </section>
		                    </div>
		                    <div class="card-footer text-right">
		                    	<button class="btn btn-primary" type="button">Simpan</button>
		                    </div>
		                </div>

		            </div>