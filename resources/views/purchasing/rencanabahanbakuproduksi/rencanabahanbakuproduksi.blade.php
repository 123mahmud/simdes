@extends('main')

@section('content')


<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Bahan Baku Produksi </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Purchasing</span> 
	    	/ <span class="text-primary font-weight-bold">Bahan Baku Produksi</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Bahan Baku Produksi </h3>
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        	<div class="row">

			                    <div class="col-md-3 col-sm-12">
			                      <label class="font-weight-bold">Tanggal SPK</label>
			                    </div>

			                    <div class="col-md-6 col-sm-12">
			                      <div class="form-group">
			                        <div class="input-group input-group-sm input-daterange">
			                          <input type="text" class="form-control" name="">
			                          <span class="input-group-addon">-</span>
			                          <input type="text" class="form-control" name="">
			                          <div class="input-group-append">
			                          	<button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
			                          	<button class="btn btn-secondary" type="button"><i class="fa fa-refresh"></i></button>
			                          </div>
			                        </div>

			                      </div>
			                    </div>
			                	

			            	</div>
                        	
                        	<div class="table-responsive">
	                            <table class="table table-bordered table-striped table-hover" cellspacing="0" id="tabel_bahan">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th>Nama</th>
							                <th>Qty SPK</th>
							                <th>Stok</th>
							                <th>Kekurangan</th>
							                <th>Rencana PO</th>
							                <th width="15%;">Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	<tr>
	                                		<td>Air</td>
	                                		<td>34000</td>
	                                		<td>0</td>
	                                		<td>-34000</td>
	                                		<td>0</td>
	                                		<td align="center">
	                                			<button class="btn btn-success" type="button" title="Proses Rencana Pembelian"><i class="fa fa-check"></i></button>
	                                		</td>
	                                	</tr>
	                                	<tr>
	                                		<td>Semen</td>
	                                		<td>100</td>
	                                		<td>30</td>
	                                		<td>-70</td>
	                                		<td>0</td>
	                                		<td align="center">
	                                			<button class="btn btn-success" type="button" title="Proses Rencana Pembelian"><i class="fa fa-check"></i></button>
	                                		</td>
	                                	</tr>
	                                	<tr>
	                                		<td>Pasir</td>
	                                		<td>4000</td>
	                                		<td>1000</td>
	                                		<td>-3000</td>
	                                		<td>0</td>
	                                		<td align="center">
	                                			<button class="btn btn-success" type="button" title="Proses Rencana Pembelian"><i class="fa fa-check"></i></button>
	                                		</td>
	                                	</tr>
							        </tbody>
	                            </table>
	                        </div>
                        </section>
                    </div>
                </div>

			</div>

		</div>

	</section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">
	$(document).ready(function(){

		var table = $('#tabel_bahan').DataTable();

	});
</script>
@endsection