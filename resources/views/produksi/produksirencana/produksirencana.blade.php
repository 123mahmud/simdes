@extends('main')

@section('content')


<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Pencatatan Produksi Dengan Rencana </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> / <span>Produksi</span> / <span class="text-primary" style="font-weight: bold;">Pencatatan Produksi Dengan Rencana</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Pencatatan Produksi Dengan Rencana </h3>
	                    </div>
	                    <div class="header-block pull-right">
                			<button class="btn btn-primary" id="btn-tambah-kenangan"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
	                    	
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	
                        	<div class="table-responsive">
	                            <table class="table table-hover table-bordered table-striped" id="table-rencana"{{--masadepan yang indah--}} cellspacing="0">
	                                <thead class="bg-primary">
	                                    <tr>
	                                    	<th>Kode Produksi Dengan Rencana</th>
							                <th>Tanggal</th>
							                <th>Kode Barang</th>
							                <th>Nama Barang</th>
							                <th>Jumlah Produksi</th>
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

		</div>

	</section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">
	$(document).ready(function(){
		var table = $('#table-rencana').DataTable();
		
		$('#btn-tambah-kenangan').click(function(){
			window.location.href = '{{route('tambah_produksirencana')}}';
		});

	});
</script>
@endsection