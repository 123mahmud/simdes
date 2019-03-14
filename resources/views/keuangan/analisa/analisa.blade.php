@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Analisa </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Keuangan</span> 
	    	/ <span class="text-primary font-weight-bold">Analisa</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('net_profit_ocf')}}" class="text-none-underline text-blue">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-clipboard"></i>	<br>	
								<span>Analisa Net Profit/OCF</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('hutang_piutang')}}" class="text-none-underline text-warning">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-clipboard"></i>	<br>	
								<span>Analisa Hutang Piutang</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('pertumbuhan_aset')}}" class="text-none-underline text-danger">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-clipboard"></i>	<br>	
								<span>Analisa Pertumbuhan Aset</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('aset_ekuitas')}}" class="text-none-underline text-success">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-clipboard"></i>	<br>	
								<span>Analisa Aset Terhadap Ekuitas</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>



		</div>


	</section>

</article>

@endsection