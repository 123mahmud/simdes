@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Pencatatan Hasil Produksi </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Produksi</span> 
	    	/ <span class="text-primary font-weight-bold">Pencatatan Hasil Produksi</span>
	     </p>
	</div>


	<ul class="nav nav-pills">
		<li class="nav-item">
			<a href="" class="nav-link active" data-toggle="tab" data-target="#tab-1">Pencatatan Produksi Dengan Rencana</a>
		</li>
		<li class="nav-item">
			<a href="" class="nav-link" data-toggle="tab" data-target="#tab-2">Pencatatan Produksi Tanpa Rencana</a>
		</li>
		<li class="nav-item">
			<a href="" class="nav-link" data-toggle="tab" data-target="#tab-3">History Produksi</a>
		</li>
	</ul>


	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="tab-content">


					@include('produksi.pencatatanhasil.tab_produksidenganrencana')
					@include('produksi.pencatatanhasil.tab_produksitanparencana')
					@include('produksi.pencatatanhasil.tab_history')




		        </div>

			</div>

		</div>

	</section>

</article>

@endsection