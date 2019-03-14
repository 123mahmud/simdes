@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Tunjangan </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
	    	/ <span>Master</span>
	    	/ <span class="text-primary font-weight-bold">Data Tunjangan</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">

				<div class="card">
                    <div class="card-header bordered p-3">
                    	<div class="header-block">
	                        <h3 class="title"> Data Tunjangan </h3>
	                    </div>
	                    <div class="header-block pull-right">

                			<a href="{{route('tambah_datatunjangan')}}" class="btn btn-primary" ><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        	<div class="table-responsive">
	                            <table class="table data-table table-hover table-striped table-bordered" id="table_tunjangan" cellspacing="0">
	                                <thead class="bg-primary">
	                                    <tr>
		                                    	<th width="1%">No</th>
													                <th>Nama Tunjangan</th>
													                <th>Jumlah Tunjangan</th>
													                <th width="10%">Aksi</th>
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

	// set header token for ajax request
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	var tb_tunjangan;
	setTimeout(function() {
		TableTunjangan();
	}, 1500);
	// function to retrieve DataTable server side
	function TableTunjangan()
	{
		$('#table_tunjangan').dataTable().fnDestroy();
		tb_tunjangan = $('#table_tunjangan').DataTable({
			responsive: true,
			// language: dataTableLanguage,
			// processing: true,
			serverSide: true,
			ajax: {
				url: "{{ route('getlist_datatunjangan') }}",
				type: "get",
				data: {
					"_token": "{{ csrf_token() }}"
				}
			},
			columns: [
				{data: 'DT_RowIndex'},
				{data: 'tj_name'},
				{data: 'nominal'},
				{data: 'action', name: 'action'}
			],
			pageLength: 10,
			lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
		});
	}


	// function to redirect page to edit page
	function EditTunjangan(idx)
	{
		window.location.href = baseUrl + "/master/datatunjangan/edit/" + idx;
	}
	// function to execute delete request
	function DisableTunjangan(idx)
	{
		var url_hapus = baseUrl + "/master/datatunjangan/disable/" + idx;

		$.confirm({
			animation: 'RotateY',
			closeAnimation: 'scale',
			animationBounce: 1.5,
			icon: 'fa fa-exclamation-triangle',
			title: 'Peringatan!',
			content: 'Apakah anda yakin ingin menonaktifkan data ini ?',
			theme: 'disable',
			buttons: {
				info: {
					btnClass: 'btn-blue',
					text:'Ya',
					action : function(){
						return $.ajax({
							type : "post",
							url : url_hapus,
							success : function (response){
								if(response.status == 'berhasil'){
									$.toast({
										heading: 'Success',
										text: 'Data berhasil dinonaktifkan !',
										bgColor: '#00b894',
										textColor: 'white',
										loaderBg: '#55efc4',
										icon: 'success',
										stack: false
									});
									tb_tunjangan.ajax.reload();
								}
							},
							error : function(e){
								$.toast({
									heading: 'Warning',
									text: e.message,
									bgColor: '#00b894',
									textColor: 'white',
									loaderBg: '#55efc4',
									icon: 'warning',
									stack: false
								});
							}
						});

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

	// start: unused -> confirmed and deleted soon
	// $(document).ready(function(){
	// 	var eueue = $('#table_tunjangan').DataTable();
	//
	// 	$('#table_tunjangan tbody').on('click', '.btn-disable', function(){
	// 		var ini = $(this);
	// 		$.confirm({
	// 			animation: 'RotateY',
	// 			closeAnimation: 'scale',
	// 			animationBounce: 1.5,
	// 			icon: 'fa fa-exclamation-triangle',
	// 		    title: 'Nonaktifkan',
	// 			content: 'Apa anda yakin mau menonaktifkan data ini?',
	// 			theme: 'disable',
	// 		    buttons: {
	// 		        info: {
	// 					btnClass: 'btn-blue',
	// 		        	text:'Ya',
	// 		        	action : function(){
	// 						$.toast({
	// 							heading: 'Information',
	// 							text: 'Data Berhasil di dinonaktifkan.',
	// 							bgColor: '#0984e3',
	// 							textColor: 'white',
	// 							loaderBg: '#fdcb6e',
	// 							icon: 'info'
	// 						})
	// 				        ini.parents('.btn-group').html('<button class="btn btn-primary btn-enable" type="button" title="Enable"><i class="fa fa-check-circle"></i></button>');
	// 			        }
	// 		        },
	// 		        cancel:{
	// 		        	text: 'Tidak',
	// 				    action: function () {
  //   			            // tutup confirm
  //   			        }
  //   			    }
	// 		    }
	// 		});
	// 	});
	//
	// 	$('#table_tunjangan tbody').on('click', '.btn-enable', function(){
	// 		$.toast({
	// 			heading: 'Information',
	// 			text: 'Data Berhasil diaktifkan.',
	// 			bgColor: '#0984e3',
	// 			textColor: 'white',
	// 			loaderBg: '#fdcb6e',
	// 			icon: 'info'
	// 		})
	// 		$(this).parents('.btn-group').html('<button class="btn btn-warning btn-edit" type="button" title="Edit"><i class="fa fa-pencil"></i></button>'+
	//                                 		'<button class="btn btn-danger btn-disable" type="button" title="Disable"><i class="fa fa-times-circle"></i></button>')
	// 	})
	// });
</script>
@endsection
