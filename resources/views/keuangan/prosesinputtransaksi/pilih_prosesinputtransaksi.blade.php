@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Pilih Transaksi </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Keuangan</span> 
	    	/ <span>Proses Input Transaksi</span>
	    	/ <span class="text-primary font-weight-bold">Pilih Transaksi</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('inputtransaksikas')}}" class="text-none-underline text-success">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-usd"></i>	<br>	
								<span>Transaksi Kas</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('inputtransaksibank')}}" class="text-none-underline text-warning">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-bank"></i>	<br>	
								<span>Transaksi Bank</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

			<div class="col-md-4 col-sm-6 col-12">

				<a href="{{route('inputtransaksimemorial')}}" class="text-none-underline text-danger">
					<div class="card keuangan-card">

						<div class="card-block text-center">
							<fieldset>
								<i class="fa fa-suitcase"></i>	<br>	
								<span>Transaksi Memorial</span>
							</fieldset>
						</div>
						
					</div>
				</a>

			</div>

		</div>

	</section>

</article>

@endsection