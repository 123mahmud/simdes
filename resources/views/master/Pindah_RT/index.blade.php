@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Pindah RT </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Master Data</span> 
	    	/ <span class="text-primary font-weight-bold">Data Pindah RT</span>
	     </p>
	</div>
	<section class="section">
		<div class="row">
			<div class="col-12">
				
				<div class="card">
					<div class="card-header bordered p-2">
						<div class="header-block">
							<h3 class="title"> Data Pindah RT </h3>
						</div>
						<div class="header-block pull-right">
							
							<button class="btn btn-primary" onclick="window.location.href='{{ route('add-pindahrt') }}'"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
						</div>
					</div>
					<div class="card-block">
						<section>
							
							<div class="table-responsive">
								<table class="table table-striped table-hover" cellspacing="0" id="table-pindahrt">
									<thead class="bg-primary">
										<tr>
											<th>Nik</th>
	                                		<th>Nama</th>
	                                		<th>Tempat Tanggal Lahir</th>
	                                		<th>Pekerjaan</th>
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
		//get penduduk
		$('#table-pindahrt').dataTable().fnDestroy();
		tb_barang = $('#table-pindahrt').DataTable({
			responsive: true,
			serverSide: true,
			ajax: {
				url: "{{ route('get-pindahrt') }}",
				type: "get",
				data: {
					"_token": "{{ csrf_token() }}"
				}
			},
			columns: [
				{data: 'nik', "width": "20%"},
				{data: 'nama', "width": "25%"},
				{data: 'tempat_tgl_lahir', "width": "20%"},
				{data: 'pekerjaan_nama', "width": "20%"},
				{data: 'action', "width": "15%"}
			],
			pageLength: 10,
			lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
		});

	});


</script>
@endsection
