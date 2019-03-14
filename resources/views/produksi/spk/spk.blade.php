@extends('main')

@section('content')


<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Manajemen SPK </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Purchasing</span> 
	    	/ <span class="text-primary font-weight-bold">Manajemen SPK</span>
	     </p>
	</div>

	<section class="section">

		<ul class="nav nav-pills">
			<li class="nav-item">
				<a href="#tab-1" class="nav-link active" data-toggle="tab">Manajemen SPK</a>
			</li>
			<li class="nav-item">
				<a href="#tab-2" class="nav-link" data-toggle="tab">Daftar SPK Selesai</a>
			</li>
		</ul>

		<div class="row">

			<div class="col-12">

				<div class="tab-content">
					
					<div class="tab-pane fade in active show" id="tab-1">

						<div class="card">
		                    <div class="card-header bordered p-2">
		                    	<div class="header-block">
			                        <h3 class="title"> Manajemen SPK </h3>
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
			                            <table class="table table-bordered table-striped table-hover" cellspacing="0" id="tabel_spk">
			                                <thead class="bg-primary">
			                                    <tr>
									                <th width="1%" align="center">No</th>
									                <th>Tanggal</th>
									                <th>No SPK</th>
									                <th>Item</th>
									                <th>Jumlah</th>
									                <th>Jumlah Produksi</th>
									                <th>Status</th>
									                <th width="15%;">Aksi</th>
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

		            <div class="tab-content fade in" id="tab-2">
		            							<div class="card">
		                    <div class="card-header bordered p-2">
		                    	<div class="header-block">
			                        <h3 class="title"> Daftar SPK Selesai </h3>
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
			                            <table class="table table-bordered table-striped table-hover" cellspacing="0" id="tabel_history">
			                                <thead class="bg-primary">
			                                    <tr>
									                <th width="1%" align="center">No</th>
									                <th>Tanggal</th>
									                <th>No SPK</th>
									                <th>Item</th>
									                <th>Jumlah</th>
									                <th>Jumlah Produksi</th>
									                <th>Status</th>
									                <th width="15%;">Aksi</th>
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

	            </div>

			</div>

		</div>

	</section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">
	$(document).ready(function(){

		var table = $('#tabel_spk').DataTable();
		var table1 = $('#tabel_history').DataTable();

	});
</script>
@endsection