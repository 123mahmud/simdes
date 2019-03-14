@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Laporan Keuangan </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Keuangan</span> 
	    	/ <span class="text-primary font-weight-bold">Laporan Keuangan</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('jurnal')}}" class="text-none-underline text-blue">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-clipboard"></i>	<br>	
								<span>Jurnal Umum</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('buku_besar')}}" class="text-none-underline text-warning">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-book"></i>	<br>	
								<span>Buku Besar</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('neraca_saldo')}}" class="text-none-underline text-danger">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-random"></i>	<br>	
								<span>Neraca Saldo</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('neraca')}}" class="text-none-underline text-success">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-columns"></i>	<br>	
								<span>Neraca</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('laba_rugi')}}" class="text-none-underline text-purple">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-line-chart"></i>	<br>	
								<span>Laba Rugi</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('arus_kas')}}" class="text-none-underline text-teal">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-refresh"></i>	<br>	
								<span>Arus Kas</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>



		</div>


	</section>

</article>

@endsection