@extends('main')

@section('extra_style')
<style type="text/css">
	.h-15px{
		height: 15px;
	}
</style>
@endsection

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Upah Harian </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Biaya dan Beban</span> 
	    	/ <span class="text-primary font-weight-bold">Upah Harian</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
                            <h3 class="title"> Upah Harian </h3>
                        </div>
                		<div class="header-block pull-right">
                			<a class="btn btn-primary" href="{{route('tambah_upahharian')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                		</div>
                    </div>
                    <div class="card-block">
                    	
                        <section>
                        	
                        	<div class="table-responsive">
	                            <table class="table table-striped table-bordered table-hover" cellspacing="0" id="table_upahharian">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th width="1%">No</th>
							                <th>Nama Pegawai</th>
							                <th>Total Hari Masuk</th>
							                <th>Nilai Upah</th>
							                <th>Total Upah</th>
							                <th>Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	<tr>
	                                		<td align="center">1</td>
	                                		<td>Alpha</td>
	                                		<td align="center">3</td>
	                                		<td>
	                                			<div class="w-100 h-15px">
	                                				<div class="pull-left">Rp. </div><div class="pull-right">100.000,00</div>
	                                			</div>

	                                		</td>
	                                		<td>
	                                			<div class="w-100 h-15px">
	                                				<div class="pull-left">Rp. </div><div class="pull-right">300.000,00</div>
	                                			</div>
	                                		</td>
	                                		<td align="center">
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

	</section>

</article>

@endsection

@section('extra_script')
<script type="text/javascript">
	
	$(document).ready(function(){

		var table = $('#table_upahharian').DataTable();



	});

</script>
@endsection