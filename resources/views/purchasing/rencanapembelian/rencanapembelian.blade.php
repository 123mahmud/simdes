@extends('main')

@section('content')

@include('purchasing.rencanapembelian.modal_detail')
@include('purchasing.rencanapembelian.modal_edit')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Rencana Pembelian </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Purchasing</span> 
	    	/ <span class="text-primary font-weight-bold">Rencana Pembelian</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">
			
			<div class="col-12">
				
				<div class="row">
					
					<div class="col-md-6 col-sm-6 col-12">
						
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<span class="badge badge-pill badge-light">{{ $amount_disetujui }}</span> Rencana Pembelian <strong>Disetujui</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

					</div>

					<div class="col-md-6 col-sm-6 col-12">
						
						<div class="alert alert-info alert-dismissible fade show" role="alert">
							<span class="badge badge-pill badge-light">{{ $amount_waiting }}</span> Rencana Pembelian <strong>Waiting</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

					</div>					

				</div>

			</div>
			
		</div>



		<ul class="nav nav-pills">
            <li class="nav-item">
                <a href="" class="nav-link active" data-target="#daftar_rencana" aria-controls="daftar_rencana" data-toggle="tab" role="tab">Daftar Rencana Pembelian</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link" data-target="#history_rencana" aria-controls="history_rencana" data-toggle="tab" role="tab">History Rencana Pembelian</a>
            </li>
        </ul>

		<div class="row">


			<div class="col-12">

                <div class="tab-content">

                	@include('purchasing.rencanapembelian.tab_daftar')
                	@include('purchasing.rencanapembelian.tab_history')



	            </div>

			</div>

		</div>

	</section>

</article>

@endsection
@section('extra_script')

@include('purchasing/rencanapembelian/includes/modal_update_status')
<script type="text/javascript">
	$('.rencana_detail').click(function(){
		$('#detail_rencana').modal('show');
	});
	$('.rencana_edit').click(function(){
		$('#detail_rencana_edit').modal('show');
	});
</script>
@include('purchasing/rencanapembelian/js/commander')
  @include('purchasing/rencanapembelian/js/functions')
@endsection