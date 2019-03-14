@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Suplier </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> / <span>Master Data</span> / <span class="text-primary" style="font-weight: bold;">Data Suplier</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Data Suplier </h3>
	                    </div>
	                    <div class="header-block pull-right">
                			<button class="btn btn-primary" data-toggle="modal" data-target="#tambah" onclick="window.location.href='{{route('tambah_datasuplier')}}'"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	<div class="table-responsive">
	                            <table class="table table-striped table-hover" cellspacing="0" id="table_suplier">
	                                <thead class="bg-primary">
	                                    <tr align="center">
							                <th width="1%">No</th>
							                <th width="10%">Perusahaan</th>
							                <th width="10%">Nama Suplier</th>
							                <th width="10%">Alamat</th>
							                <th width="17%">No Hp</th>
							                <th width="5%">Fax</th>
											<th width="5%">Keterangan</th>
											
							                <th width="5%">Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	@foreach($data['supplier'] as $index=>$supplier)
	                                	<tr>
	                                		<td> {{$index + 1}} </td>
	                                		<td> {{$supplier->c_name}} </td>
	                                		<td> {{$supplier->s_name}} </td>
	                                		<td> {{$supplier->s_address}} </td>
	                                		<td> {{$supplier->s_phone}} </td>
	                                		<td> {{$supplier->s_fax}} </td>
	                                		<td> {{$supplier->s_note}} </td>
	                                		<td> 
	                                			<div class="btn-group btn-group-sm">
	                                				@if($supplier->s_isactive == 'Y')
	                                				<a class="btn btn-warning btn-edit" href="{{url('/master/datasuplier/edit/'.$supplier->s_id.'')}}" type="button" title="Edit"><i class="fa fa-pencil"></i></a>
	                                				@endif

	                                				<button class="btn btn-danger btn-disable" type="button" title="Delete" onclick="status('{{$supplier->s_id}},{{$supplier->s_isactive}}')"><i class="fa fa-eye-slash"></i></button>
	                                			</div>
	                                		</td>
	                                	</tr>
	                                	@endforeach

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
	var table = $('#table_suplier').DataTable();

	function status(a){
		split = a.split(",");
		id = split[0];
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
				animationBounce: 1.5,
				icon: 'fa fa-exclamation-triangle',
			    title: $status,
				content: 'Apa anda yakin mau ' + $status +' data ini?',
				theme: 'disable',
			    buttons: {
			        info: {
						btnClass: 'btn-blue',
			        	text:'Ya',
			        	action : function(){
			        		$.ajax({
								data : {id,active},
								type : "get",
								url : baseUrl + '/master/datasuplier/disabled',
								dataType : "json",
								success : function(response){
									$.toast({
										heading: 'Information',
										text: 'Data Berhasil di Disable.',
										bgColor: '#0984e3',
										textColor: 'white',
										loaderBg: '#fdcb6e',
										icon: 'info'
									})
							       
							      setTimeout(function(){
			                         location.reload();	                            
			                            },200);
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