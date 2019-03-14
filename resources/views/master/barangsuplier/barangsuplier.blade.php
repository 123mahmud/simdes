@extends('main')

@section('content')

@include('master.barangsuplier.modal_list_barang')
@include('master.barangsuplier.modal_list_suplier')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Item Barang Suplier </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> / <span>Suplier</span> / <span class="text-primary" style="font-weight: bold;">Item Barang Suplier</span>
	     </p>
	</div>

	<section class="section">

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="" class="nav-link active" data-target="#list_barang" aria-controls="list_barang" data-toggle="tab" role="tab">Data Barang</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link" data-target="#list_suplier" aria-controls="list_suplier" data-toggle="tab" role="tab">Data Suplier</a>
            </li>
        </ul>

		<div class="row">

			<div class="col-12">



                <div class="tab-content">

                	@include('master.barangsuplier.tab_barang')
                	@include('master.barangsuplier.tab_suplier')

	            </div>

			</div>

		</div>

	</section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">

	$(document).ready(function(){
		var table_sup = $('#table_suplier').DataTable();
		var table_bar= $('#table_barang').DataTable();


		$(document).on('click','.btn-edit-barang',function(){
			window.location.href = baseUrl + '/master/barangsuplier/edit_barang';
		});

		$(document).on('click', '.btn-disable', function(){
			var ini = $(this);
			$.confirm({
				animation: 'RotateY',
				closeAnimation: 'scale',
				animationBounce: 1.5,
				icon: 'fa fa-exclamation-triangle',
			    title: 'Disable',
				content: 'Apa anda yakin mau disable data ini?',
				theme: 'disable',
			    buttons: {
			        info: {
						btnClass: 'btn-blue',
			        	text:'Ya',
			        	action : function(){
							$.toast({
								heading: 'Information',
								text: 'Data Berhasil di Disable.',
								bgColor: '#0984e3',
								textColor: 'white',
								loaderBg: '#fdcb6e',
								icon: 'info'
							})
					        ini.parents('.btn-group').html('<button class="btn btn-danger btn-enable" type="button" title="Enable"><i class="fa fa-eye"></i></button>');
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
		});

		$(document).on('click', '.btn-enable', function(){
			$.toast({
				heading: 'Information',
				text: 'Data Berhasil di Enable.',
				bgColor: '#0984e3',
				textColor: 'white',
				loaderBg: '#fdcb6e',
				icon: 'info'
			})
			$(this).parents('.btn-group').html('<button class="btn btn-primary" data-toggle="modal" data-target="#list_suplier_membawa" type="button" title="List Suplier yang membawa"><i class="fa fa-list"></i></button>'+
											'<button class="btn btn-warning btn-edit-barang" type="button" title="Edit"><i class="fa fa-pencil"></i></button>'+
	                                		'<button class="btn btn-danger btn-disable" type="button" title="Delete"><i class="fa fa-eye-slash"></i></button>')
		})


		$(document).on('click','.btn-edit-suplier',function(){
			window.location.href = baseUrl + '/master/barangsuplier/edit_suplier';
		});

		$(document).on('click', '.btn-disable-suplier', function(){
			var ini = $(this);
			$.confirm({
				animation: 'RotateY',
				closeAnimation: 'scale',
				animationBounce: 1.5,
				icon: 'fa fa-exclamation-triangle',
			    title: 'Disable',
				content: 'Apa anda yakin mau disable data ini?',
				theme: 'disable',
			    buttons: {
			        info: {
						btnClass: 'btn-blue',
			        	text:'Ya',
			        	action : function(){
							$.toast({
								heading: 'Information',
								text: 'Data Berhasil di Disable.',
								bgColor: '#0984e3',
								textColor: 'white',
								loaderBg: '#fdcb6e',
								icon: 'info'
							})
					        ini.parents('.btn-group').html('<button class="btn btn-danger btn-enable-suplier" type="button" title="Enable"><i class="fa fa-eye"></i></button>');
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
		});

		$(document).on('click', '.btn-enable-suplier', function(){
			$.toast({
				heading: 'Information',
				text: 'Data Berhasil di Enable.',
				bgColor: '#0984e3',
				textColor: 'white',
				loaderBg: '#fdcb6e',
				icon: 'info'
			})
			$(this).parents('.btn-group').html('<button class="btn btn-primary" data-toggle="modal" data-target="#list_barang_dibawa" type="button" title="List Barang yang dibawa"><i class="fa fa-list"></i></button>'+
											'<button class="btn btn-warning btn-edit-suplier" type="button" title="Edit"><i class="fa fa-pencil"></i></button>'+
	                                		'<button class="btn btn-danger btn-disable" type="button" title="Delete"><i class="fa fa-eye-slash"></i></button>')
		})
	});
</script>
@endsection