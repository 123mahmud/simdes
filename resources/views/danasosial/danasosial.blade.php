@extends('main')

@section('content')

@include('danasosial.tambah_danasosial')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Dana Sosial </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span class="text-primary font-weight-bold">Dana Sosial</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Dana Sosial </h3>
	                    </div>
	                    <div class="header-block pull-right">
                			<button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
	                    </div>

                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	<div class="table-responsive">
	                            <table class="table table-striped table-bordered table-hover" id="table_dana" cellspacing="0">
	                                <thead class="bg-primary">
	                                    <tr>
	                                    	<th width="1%">No</th>
							                <th>Nama Dana Sosial</th>
							                <th>Tanggal Pengeluaran</th>
							                <th>Pengeluaran</th>
							                <th>Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	<tr>
	                                		<td align="center">1</td>
	                                		<td>Masjid Al-ikhlas</td>
	                                		<td>14 Feb 2019</td>
	                                		<td>
	                                			<div class="row">
		                                			<div class="col-5">Rp. </div><div class="col-7 text-right">2.000.000,00</div>
		                                		</div>
	                                		</td>
	                                		<td align="center">
	                                			<div class="btn-group btn-sm">
	                                				<button class="btn btn-warning btn-edit" type="button"><i class="fa fa-pencil"></i></button>
	                                				<button class="btn btn-danger btn-hapus" type="button"><i class="fa fa-trash-o"></i></button>
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
		var table = $('#table_dana').DataTable();
	});
</script>
@endsection