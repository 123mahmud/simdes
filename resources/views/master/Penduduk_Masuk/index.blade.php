@extends('main')

@section('content')



<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Penduduk Masuk </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
	    	 / <span>Master Data</span>
	    	 / <span class="text-primary" style="font-weight: bold;">Data Penduduk Masuk</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">

				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
                            <h3 class="title"> Data Penduduk Masuk </h3>
                        </div>
                        <div class="header-block pull-right">

                			<a class="btn btn-primary" href="{{route('create-pmasuk')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-block">
                        <section>

                        	<div class="table-responsive">
	                            <table class="table table-striped table-hover" cellspacing="0" id="table-penduduk">
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
	$(document).ready(function() {
		//get penduduk
		$('#table-penduduk').dataTable().fnDestroy();
		tb_barang = $('#table-penduduk').DataTable({
			responsive: true,
			serverSide: true,
			ajax: {
				url: "{{ route('get-penduduk') }}",
				type: "get",
				data: {
					"_token": "{{ csrf_token() }}"
				}
			},
			columns: [
				{data: 'nik', "width": "20%"},
				{data: 'nama', "width": "25%"},
				{data: 'tempat_tgl_lahir', "width": "20%"},
				{data: 'p_pekerjaan', "width": "20%"},
				{data: 'action', "width": "15%"}
			],
			pageLength: 10,
			lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
		});
		
	});

	function status(id, x){
		console.log(id, x);
		split = id.split(",");
		data_id = split[0];
		active = split[1];
		if(active == 'Y'){
			$status = 'Disable';
		}
		else {
			$status = 'Enable';
		}
		$.confirm({
                animation: 'RotateY',
				closeAnimation: 'scale',
				icon: 'fa fa-exclamation-triangle',
			    title: $status,
				content: 'Apa anda yakin mau '+$status+' data ini?',
				theme: 'disable',
			    buttons: {
			        info: {
						btnClass: 'btn-blue',
			        	text:'Ya',
			        	action : function(){
							$.ajax({
								data : {data_id},
								type : "get",
								url : baseUrl + '/master/databarang/disabled',
								dataType : "json",
								success : function(response){
									$.toast({
										heading: 'Information',
										text: 'Data Berhasil di Enable.',
										bgColor: '#0984e3',
										textColor: 'white',
										loaderBg: '#fdcb6e',
										icon: 'info'
									});
									tb_barang.ajax.reload();
								}
							})
				        }
			        },
			        cancel:{
			        	text: 'Tidak',
					    action: function () {
    			            // tutup confirm
    			        }
    			    }
			    }
			});
	}


</script>
@endsection
