                	<div class="tab-pane fade in active show" id="list_barang">
		                <div class="card">
	                		<div class="card-header bordered p-2">
	                			<div class="header-block">
		                			<h3>Data Barang</h3>
		                		</div>
		                		<div class="header-block pull-right">
										<a class="btn btn-primary" href="{{route('tambah_barang')}}"><i class="fa fa-plus"></i> Tambah Data</a>
		                			
		                		</div>
	                		</div>
		                	<div class="card-block">
		                		<section>

									<div class="table-responsive">
										<table class="table table-hover table-striped" cellspacing="0" id="table_barang">
											<thead class="bg-primary">
												<tr>
													<th width="1%">No</th>
													<th>Nama Barang</th>
													<th>Kode Barang</th>
													<th>Qty Suplier</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Semen</td>
													<td>BRG/001</td>
													<td>3</td>
													<td>
														<div class="btn-group btn-group-sm">
															<button class="btn btn-primary" data-toggle="modal" data-target="#list_suplier_membawa" type="button" title="List Suplier yang membawa"><i class="fa fa-list"></i></button>
															<button class="btn btn-warning btn-edit-barang" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
															<button class="btn btn-danger btn-hapus-barang" type="button" title="Delete"><i class="fa fa-trash-o"></i></button>
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