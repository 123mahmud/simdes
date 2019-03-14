@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Perencanaan Pengiriman </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> / <span>Pengiriman</span> / <span class="text-primary" style="font-weight: bold;">Perencanaan Pengiriman</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Perencanaan Pengiriman </h3>
	                    </div>
	                    <div class="header-block pull-right">
                			<a class="btn btn-primary" href="{{route('tambah_perencanaanpengiriman')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
	                    	
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        		
                        	<div class="table-responsive">
	                            <table class="table data-table table-hover" cellspacing="0">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th>Nota</th>
							                <th>Sopir</th>
							                <th>Jadwal</th>
							                <th>Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	<tr>
	                                		<td>PP/20190207/1</td>
	                                		<td>Alpha</td>
	                                		<td>07-02-2019 22:22:22</td>
	                                		<td>
	                                			<div class="btn-group btn-group-sm">
		                                			<button class="btn btn-warning" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
		                                			<button class="btn btn-danger" type="button" title="Hapus"><i class="fa fa-trash-o"></i></button>
		                                		</div>
	                                		</td>
	                                	</tr>
	                                	<tr>
	                                		<td>PP/20190207/2</td>
	                                		<td>Bravo</td>
	                                		<td>07-02-2019 22:22:22</td>
	                                		<td>
	                                			<div class="btn-group btn-group-sm">
		                                			<button class="btn btn-warning" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
		                                			<button class="btn btn-danger" type="button" title="Hapus"><i class="fa fa-trash-o"></i></button>
		                                		</div>
	                                		</td>
	                                	</tr>
	                                	<tr>
	                                		<td>PP/20190207/3</td>
	                                		<td>Charlie</td>
	                                		<td>07-02-2019 22:22:22</td>
	                                		<td>
	                                			<div class="btn-group btn-group-sm">
		                                			<button class="btn btn-warning" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
		                                			<button class="btn btn-danger" type="button" title="Hapus"><i class="fa fa-trash-o"></i></button>
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

		

	});
</script>
@endsection