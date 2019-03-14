@extends('main')

@section('content')

@include('biayadanbeban.maintenance.tambah_maintenance')
@include('biayadanbeban.maintenance.tambah_maintenancemesin')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Maintenance </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Biaya dan Beban</span> 
	    	/ <span class="text-primary font-weight-bold">Maintenance</span>
	     </p>
	</div>

	<section class="section">

		<ul class="nav nav-pills">
            <li class="nav-item">
                <a href="" class="nav-link active" data-target="#kendaraan" aria-controls="kendaraan" data-toggle="tab" role="tab">Kendaraan</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link" data-target="#mesin_produksi" aria-controls="mesin_produksi" data-toggle="tab" role="tab">Mesin Produksi</a>
            </li>
        </ul>
		

		<div class="row">


			<div class="col-12">
				<div class="tab-content">
					<div class="tab-pane fade in show active" id="kendaraan">
						<div class="card">
		                    <div class="card-header bordered p-2">
		                    	<div class="header-block">
			                        <h3 class="title"> Kendaraan </h3>
			                    </div>
		                		<div class="header-block pull-right">
		                			<button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
		                		</div>
		                    </div>
			                <div class="card-block">
			                    <section>
			                    	
			                    	
			                    	<div class="table-responsive">
			                            <table class="table table-bordered table-striped table-hover" id="table_kendaraan" cellspacing="0">
			                                <thead class="bg-primary">
			                                    <tr>
			                                    	<th width="1%">No</th>
									                <th>Nopol Kendaraan</th>
									                <th>Sopir</th>
									                <th>Tanggal Maintenance</th>
									                <th>Jumlah Maintenance</th>
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

			        <div class="tab-pane fade in" id="mesin_produksi">
						<div class="card">
		                    <div class="card-header bordered p-2">
		                    	<div class="header-block">
			                        <h3 class="title"> Mesin Produksi </h3>
			                    </div>
			                    <div class="header-block pull-right">
			                    	<button class="btn btn-tambah btn-primary" type="button" data-target="#tambah_mesin" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</button>
			                    </div>
		                    </div>
			                <div class="card-block">
			                    <section>

			                    	<div class="table-responsive">
			                            <table class="table table-bordered table-striped table-hover" id="tabel_mesin" cellspacing="0">
			                                <thead class="bg-primary">
			                                    <tr>
			                                    	<th width="1%">No</th>
									                <th>Nama Mesin Produksi</th>
									                <th>Tanggal Maintenance</th>
									                <th>Jumlah Maintenance</th>
									                <th>Aksi</th>
									            </tr>
			                                </thead>
			                                <tbody>
			                                	<tr>
			                                		<td>1</td>
			                                		<td>Mesin 1</td>
			                                		<td>07 Feb 2019</td>
			                                		<td>
			                                			<div class="row">
			                                				<div class="col-5">Rp. </div><div class="col-7 text-right">20.000,00</div>
			                                			</div>
			                                		</td>
			                                		<td>
			                                			<div class="btn-group btn-group-sm">
			                                				<button class="btn btn-warning" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
			                                				<button class="btn btn-danger" type="button" title="Delete"><i class="fa fa-trash-o"></i></button>
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
		        </div>
			</div>

		</div>

	</section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">
	$(document).ready(function(){
		var tabel = $('#tabel_mesin').DataTable();
		var table = $('#table_kendaraan').DataTable();
	});
</script>
@endsection