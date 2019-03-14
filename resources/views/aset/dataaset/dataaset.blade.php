@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Aset </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Aset</span> 
	    	/ <span class="text-primary font-weight-bold">Data Aset</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Data Aset </h3>
	                    </div>
                		<div class="header-block pull-right">
                			<a class="btn btn-primary" href="{{route('tambah_dataaset')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                		</div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	
                        	<div class="table-responsive">
	                            <table class="table table-bordered table-striped table-hover" id="table_dataaset" cellspacing="0">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th>No</th>
							                <th>Nama Aset</th>
							                <th>Golongan</th>
							                <th>Harga Beli</th>
							                <th>Nilai Sisa</th>
							                <th>Tanggal Habis</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	
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
	$(document).ready(function(){
		var uvuvwevwevwe_onyetenyevwe_ugwemuhwem_osas = $('#table_dataaset').DataTable();
	});
</script>
@endsection