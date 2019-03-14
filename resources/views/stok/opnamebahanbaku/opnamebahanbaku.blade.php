@extends('main')

@section('content')

@include('stok.opnamebahanbaku.detail_opnamebahanbaku')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Opname Stock </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Stok</span> 
	    	/ <span class="text-primary font-weight-bold">Opname Stock</span>
	     </p>
	</div>

	<section class="section">

		<ul class="nav nav-pills">
            <li class="nav-item">
                <a href="" class="nav-link active" data-target="#opname" aria-controls="opname" data-toggle="tab" role="tab">Opname Stock</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link" data-target="#list" aria-controls="list" data-toggle="tab" role="tab">List Opname Stock</a>
            </li>
        </ul>

		<div class="row">

			<div class="col-lg-12">



					
				<div class="tab-content">

@include('stok.opnamebahanbaku.tab_opname')
@include('stok.opnamebahanbaku.tab_list_opname')

			</div>

		</div>

	</section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">
	$(document).ready(function(){
		var tablle, table1, counter_strike__battlefield, barang, qty_real;

		tablle = $('#table_opname').DataTable();
		table1 = $('#table_list').DataTable();
		counter_strike__battlefield = 0;
		barang = $('#barang');
		qty_real = $('#qty_real');

		barang.select2({

		}).on('select2:select', function(){
			qty_real.focus();
		});

		function datatable_append(){
			tablle.row.add([
				'<input type="text" class="form-control form-control-sm" readonly value="'+ barang.val() +' - '+$('#barang option:selected').text()+'">',
				'<input type="text" class="form-control form-control-sm" readonly="">',
				'<input type="text" class="form-control form-control-sm" readonly="">',
				'<input type="number" min="0" class="form-control form-control-sm" value="'+qty_real.val()+'">',
				'<input type="text" class="form-control form-control-sm" readonly="">',
				'<input type="text" class="form-control form-control-sm">',
				'<button class="btn btn-primary btn-sm btn-delete" type="button"><i class="fa fa-trash-o"></i></button>'
				]).draw();

			barang.prop('selectedIndex',0).trigger('change');
			qty_real.val('');
			counter_strike__battlefield++;
			barang.select2('open');
		}

		qty_real.on('keypress', function(e){
			if(e.which === 13 || e.keyCode === 13){
				datatable_append();
			}
		});

		$('#btn-tambah-barang').click(function(){
			datatable_append();
		});

		$('#table_opname tbody').on('click', '.btn-delete', function(){
			tablle.row($(this).parents('tr')).remove().draw();

		});
	});	
</script>
@endsection