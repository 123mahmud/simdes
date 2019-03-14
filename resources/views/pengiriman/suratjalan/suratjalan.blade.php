@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Surat Jalan </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> / <span>Pengiriman</span> / <span class="text-primary" style="font-weight: bold;">Surat Jalan</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Surat Jalan </h3>
	                    </div>

                		<div class="header-block pull-right">
                			<a class="btn btn-primary" href="{{route('tambah_suratjalan')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                		</div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	
                        	<div class="table-responsive">
	                            <table class="table table-hover table-bordered table-striped" cellspacing="0" id="table_suratjalan">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th width="1%">No</th>
							                <th>Surat Jalan</th>
							                <th>Nota</th>
							                <th>Sopir</th>
							                <th>Jadwal</th>
							                <th>Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	<tr>
	                                		<td align="center">1</td>
	                                		<td>00001</td>
	                                		<td>PP/20190207/1</td>
	                                		<td>Paijo</td>
	                                		<td>07-02-2019 23:59:59</td>
	                                		<td align="center">
	                                			<button class="btn btn-primary btn-sm btn-print" type="button" title="Print"><i class="fa fa-print"></i></button>
	                                		</td>
	                                	</tr>
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
		var table = $('#table_suratjalan').DataTable();

		$('#table_suratjalan tbody').on('click', '.btn-print', function(){
			window.open('{{route('print_suratjalan')}}', '_blank');
		});
	});
</script>
@endsection