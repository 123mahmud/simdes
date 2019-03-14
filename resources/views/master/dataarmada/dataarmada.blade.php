@extends('main')

@section('content')

@include('master.dataarmada.modal_dataarmada')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Armada </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> / <span>Master Data</span> / <span class="text-primary" style="font-weight: bold;">Data Armada</span>
	     </p>
	</div>

	<section class="section">

		<ul class="nav nav-pills">
			<li class="nav-item">
				<a href="" class="nav-link active" data-toggle="tab" data-target="#tab-1">Data Armada (Own)</a>
			</li>
			<li class="nav-item">
				<a href="" class="nav-link" data-toggle="tab" data-target="#tab-2">Data Armada Suplier</a>
			</li>
			<li class="nav-item">
				<a href="" class="nav-link" data-toggle="tab" data-target="#tab-3">Data Armada Customer</a>
			</li>
		</ul>

		<div class="row">

			<div class="col-12">
					
				<div class="tab-content">	


					@include('master.dataarmada.tab_armadaown')
					@include('master.dataarmada.tab_armadasuplier')
					@include('master.dataarmada.tab_armadacustomer')


			</div>

		</div>

	</section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">

	$(document).ready(function(){
		var table = $('#table_armada').DataTable();
		var table1 = $('#table_armada_sup').DataTable();
		var table2 = $('#table_armada_cus').DataTable();

		$('#table_armada_sup tbody').on('click', '.btn-disable', function(){
			var ini = $(this);
			$.confirm({
				animation: 'RotateY',
				closeAnimation: 'scale',
				animationBounce: 1.5,
				icon: 'fa fa-exclamation-triangle',
			    title: 'Nonakktifan',
				content: 'Apa anda yakin mau Menonaktifkan data ini?',
				theme: 'disable',
			    buttons: {
			        info: {
						btnClass: 'btn-blue',
			        	text:'Ya',
			        	action : function(){
							$.toast({
								heading: 'Information',
								text: 'Data Berhasil di Nonakktifan.',
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

		$('#table_armada_sup tbody').on('click', '.btn-enable', function(){
			$.toast({
				heading: 'Information',
				text: 'Data Berhasil di Aktifkan.',
				bgColor: '#0984e3',
				textColor: 'white',
				loaderBg: '#fdcb6e',
				icon: 'info'
			})
			$(this).parents('.btn-group').html('<button class="btn btn-warning btn-edit" type="button" title="Edit"><i class="fa fa-pencil"></i></button>'+
	                                		'<button class="btn btn-danger btn-disable" type="button" title="Delete"><i class="fa fa-eye-slash"></i></button>')
		})

		$('#table_armada_sup tbody').on('click', '.btn-edit', function(){

			window.location.href = '{{route('edit_dataarmada')}}';

		});

		// function table_hapus(a){
		// 	table.row($(a).parents('tr')).remove().draw();
		// }
	});
</script>
@endsection
