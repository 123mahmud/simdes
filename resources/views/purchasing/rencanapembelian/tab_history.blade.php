<div class="tab-pane fade in" id="history_rencana">
	<div class="card">
		<div class="card-header bordered p-3">
			<div class="header-block">
				<h3 class="title">History Rencana Pembelian</h3>
			</div>
		</div>
		<div class="card-block">
			<section>

            	<div class="row">

                    <div class="col-md-3 col-sm-12">
                      <label class="font-weight-bold">Tanggal Rencana</label>
                    </div>

                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <div class="input-group input-group-sm input-daterange">
                          <input type="text" class="form-control" name="tgl_awal_history" id="tgl_awal_history">
                          <span class="input-group-addon">-</span>
                          <input type="text" class="form-control" name="tgl_akhir_history" id="tgl_akhir_history">
                          <div class="input-group-append">
                          	<button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                          	<button class="btn btn-secondary" type="button"><i class="fa fa-refresh"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>



            	</div>
			
            	<div class="table-responsive">
            		
            		<table class="table table-hover table-striped" cellspacing="0" id="tabel_history_purchase_plan">
            			<thead class="bg-primary">
            				<tr>
            					<th>Tgl Dibuat</th>
            					<th>Kode Rencana</th>
            					<th>Staff</th>
            					<th>Suplier</th>
            					<th>Tgl Disetujui</th>
            					<th>Status</th>
            					
            				</tr>
            			</thead>

            			<tbody>
            				
            			</tbody>
            		</table>

            	</div>
			</section>
		</div>
	</div>
</div>