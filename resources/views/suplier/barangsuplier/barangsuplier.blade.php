@extends('main')

@section('content')

@include('suplier.barangsuplier.modal_list_barang')
@include('suplier.barangsuplier.modal_list_suplier')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Item Barang Suplier </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> / <span>Suplier</span> / <span class="text-primary" style="font-weight: bold;">Item Barang Suplier</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">

                <ul class="nav nav-pills mb-3">
                    <li class="nav-item">
                        <a href="" class="nav-link active" data-target="#list_barang" aria-controls="list_barang" data-toggle="tab" role="tab">Data Barang</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-target="#list_suplier" aria-controls="list_suplier" data-toggle="tab" role="tab">Data Suplier</a>
                    </li>
                </ul>

                <div class="tab-content">

                	@include('suplier.barangsuplier.tab_barang')
                	@include('suplier.barangsuplier.tab_suplier')

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
			window.location.href = baseUrl + '/suplier/barangsuplier/edit_barang';
		});

		$(document).on('click', '.btn-hapus-barang', function(){
			var ini = $(this);
			$.confirm({
			    title: 'Hapus!',
			    content: 'Apa anda yakin mau menghapus data ini?',
			    buttons: {
			        confirm: {
			        	text:'Ya',
			        	action : function(){
					        table_hapus(ini, table_bar);
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

		$(document).on('click','.btn-edit-suplier',function(){
			window.location.href = baseUrl + '/suplier/barangsuplier/edit_suplier';
		});

		$(document).on('click', '.btn-hapus-suplier', function(){
			var ini = $(this);
			$.confirm({
			    title: 'Hapus!',
			    content: 'Apa anda yakin mau menghapus data ini?',
			    buttons: {
			        confirm: {
			        	text:'Ya',
			        	action : function(){
					        table_hapus(ini, table_sup);
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

		function table_hapus(a,b){
			b.row($(a).parents('tr')).remove().draw();
		}
	});
</script>
@endsection