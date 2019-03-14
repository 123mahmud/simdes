@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Biaya Pengeluaran Kecil </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Biaya dan Beban</span> 
	    	/ <span class="text-primary font-weight-bold">Biaya Pengeluaran Kecil</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Biaya Pengeluaran Kecil </h3>
	                    </div>
                		<div class="header-block pull-right">
                			<a class="btn btn-primary" href="{{route('tambah_pengeluarankecil')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                		</div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	
                        	<div class="table-responsive">
	                            <table class="table table-striped table-bordered table-hover" cellspacing="0" id="table_pengeluaran">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th width="1%">No</th>
							                <th>Nama Pengeluaran</th>
							                <th>Tipe Pengeluaran</th>
							                <th>Jumlah Pengeluaran</th>
							                <th>Tanggal Pengeluaran</th>
							                <th>Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	<tr>
	                                		<td align="center">1</td>
	                                		<td>Pulpen Hitam</td>
	                                		<td>Alat Tulis Kantor</td>
	                                		<td>
	                                			<div class="w-100" style="height: 20px;">
	                                				<div class="pull-left">Rp. </div><div class="pull-right">50.000,00</div>
	                                			</div>
	                                		</td>
	                                		<td>7 Feb 2019</td>
	                                		<td align="center">
	                                			<div class="btn-group btn-group-sm">
	                                				<button class="btn btn-warning" title="Edit" type="button"><i class="fa fa-pencil"></i></button>
	                                				<button class="btn btn-danger" title="Delete" type="button"><i class="fa fa-trash-o"></i></button>
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

	</section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">
	
	$(document).ready(function(){
		var table = $('#table_pengeluaran').DataTable();
	});

</script>
@endsection