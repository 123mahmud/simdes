		            <div class="tab-pane fade in" id="list_suplier">
		                <div class="card">
	                		<div class="card-header bordered p-2">
	                			<div class="header-block">
		                			<h3>Data Suplier</h3>
		                		</div>
		                		<div class="header-block pull-right">
		                			
										<a class="btn btn-primary" href="{{route('tambah_suplier')}}"><i class="fa fa-plus"></i> Tambah Data</a>
		                		</div>
	                		</div>
		                	<div class="card-block">
		                		<section>

									<div class="table-responsive">
										<table class="table table-hover table-striped" cellspacing="0" id="table_suplier">
											<thead class="bg-primary">
												<tr>
													<th width="1%">No</th>
													<th>Nama Suplier</th>
													<th>Alamat</th>
													<th>Qty Barang</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Alpha</td>
													<td>Jl. APlha</td>
													<td>3</td>
													<td>
														<div class="btn-group btn-group-sm">
															<button class="btn btn-primary" data-toggle="modal" data-target="#list_barang_dibawa" type="button" title="List Barang yang dibawa"><i class="fa fa-list"></i></button>
															<button class="btn btn-warning btn-edit-suplier" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
															<button class="btn btn-danger btn-hapus-suplier" type="button" title="Delete"><i class="fa fa-trash-o"></i></button>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>

		                		</section>
		                	</div>
		                </div>
		            </div>