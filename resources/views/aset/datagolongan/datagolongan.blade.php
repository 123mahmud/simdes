@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Golongan Aset </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Aset</span> 
	    	/ <span class="text-primary font-weight-bold">Data Golongan Aset</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
                    		
	                        <h3 class="title"> Data Golongan Aset </h3>
                    	</div>
                    	
                		<div class="header-block pull-right">
                			<a class="btn btn-primary" href="{{route('tambah_datagolongan')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                		</div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	<div class="table-responsive">
	                            <table class="table table-striped table-bordered table-hover" id="table_datagolongan" cellspacing="0">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th>No</th>
							                <th>Nama Group</th>
							                <th>Golongan</th>
							                <th>Akun Harta</th>
							                <th>Akun Akumulasi</th>
							                <th>Akun Beban</th>
							                <th>Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody></tbody>
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
		var uvuvwevwevwe_onyetenyevwe_ugwemuhwem_osas = $('#table_datagolongan').DataTable();
	});
</script>
@endsection