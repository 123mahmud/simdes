@extends('main')

@section('content')

@include('customer.historitransaksi.tambah_historitransaksi')
@include('customer.historitransaksi.modal_listbarang')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Histori Transaksi </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Customer</span> 
	    	/ <span class="text-primary font-weight-bold">Histori Transaksi</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Histori Transaksi </h3>
	                    </div>
	                    
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	<div class="table-responsive">
	                            <table class="table table-hover table-striped table-bordered" id="table_historitransaksi" cellspacing="0">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th>Kode - Nama Customer</th>
							                <th>Jumlah Nota</th>
							                <th>Total Pembelian</th>
							                <th width="15%">Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	<tr>
	                                		<td>CUS/1 - Alpha</td>
	                                		<td>1</td>
	                                		<td>
	                                			<div class="row">
	                                				<div class="col-5">Rp. </div><div class="col-7 text-right">20.000,00</div>
	                                			</div>
	                                		</td>
	                                		<td align="center">
	                                			<div class="btn-group">
	                                				<button class="btn btn-primary" type="button" data-target="#list_history" data-toggle="modal"><i class="fa fa-history"></i></button>
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
		var table1, table2, table3;

		table1 = $('#table_historitransaksi').DataTable();
		table2 = $('#table_histori').DataTable();
		table3 = $('#table_barang').DataTable();

		$('#table_histori tbody').on('click', '.btn-detail-barang', function(){
			$('#list_barang').modal('show');
		});
	});

</script>
@endsection