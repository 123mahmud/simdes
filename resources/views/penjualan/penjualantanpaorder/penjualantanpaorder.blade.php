@extends('main')

@section('content')


<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Pencatatan Penjualan Tanpa Order </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Penjualan</span> 
	    	/ <span class="text-primary font-weight-bold">Pencatatan Penjualan Tanpa Order</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Pencatatan Penjualan Tanpa Order </h3>
	                    </div>
	                    <div class="header-block pull-right">
                			<button class="btn btn-primary" id="btn-tambah-mantan"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
	                    	
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                    		
                        	<div class="table-responsive">
	                            <table class="table data-table table-hover" cellspacing="0">
	                                <thead class="bg-primary">
	                                    <tr>
	                                    	<th width="1%">No</th>
							                <th>Nota</th>
							                <th>Customer</th>
							                <th>Staff</th>
							                <th>Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	<tr>
	                                		<td>1</td>
	                                		<td>POS-TO/20190130/1</td>
	                                		<td>Alpha</td>
	                                		<td>Administrator</td>	
	                                		<td align="center" width="15%">
	                                			<div class="btn btn-group">
	                                				<button class="btn btn-warning btn-sm" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
	                                				<button class="btn btn-danger btn-sm" type="button" title="Hapus"><i class="fa fa-trash-o"></i></button>
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

		$('#btn-tambah-mantan').click(function(){

			window.location.href = '{{route('tambah_penjualantanpaorder')}}';

		})

	});

</script>

@endsection