<div class="tab-pane fade in active show" id="list_barang">
	<div class="card">
        <div class="card-header bordered p-2">
        	<div class="header-block">
                <h3 class="title"> Order Pembelian Dengan Rencana</h3>
            </div>
            <div class="header-block pull-right">
            	
    			<a class="btn btn-primary" href="{{route('tambah_orderpembelian')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
            </div>
        </div>
        <div class="card-block">
            <section>
            	
            	<div class="row">

                    <div class="col-md-3 col-sm-12">
                      <label class="font-weight-bold">Tanggal Order</label>
                    </div>

                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <div class="input-group input-group-sm input-daterange">
                          <input type="text" class="form-control" name="" id="tgl_awal">
                          <span class="input-group-addon">-</span>
                          <input type="text" class="form-control" name=""  id="tgl_akhir">
                          <div class="input-group-append">
                          	<button class="btn btn-primary" type="button" onclick="search_purchase_order()"><i class="fa fa-search"></i></button>
                          	<button onclick="refresh_purchase_order()" class="btn btn-secondary" type="button"><i class="fa fa-refresh"></i></button>
                          </div>
                        </div>

                      </div>
                    </div>
                	

            	</div>

            	
                	<div class="table-responsive">
                		
                		<table class="table table-hover table-striped" cellspacing="0" id="tabel_purchase_order">
                			<thead class="bg-primary">
                				<tr>
                					<th>Tgl Order</th>
                					<th>No Order</th>
                					<th>Staff</th>
                					<th>Suplier</th>
                					<th>Cara Bayar</th>
                					<th>Total</th>
                					<th>Tgl Kirim</th>
                                    <th>Status</th>
                					<th>Ubah Status</th>
                					<th>Aksi</th>
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