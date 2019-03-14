@extends('main')

@section('content')


<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Upah Borongan Produksi </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Produksi</span> 
	    	/ <span class="text-primary font-weight-bold">Upah Borongan Produksi</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Upah Borongan Produksi </h3>
	                    </div>
	                    <div class="header-block pull-right">
	                        <a href="{{route('tambah_upahboronganproduksi')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	<div class="table-responsive">
	                            <table class="table table-striped table-bordered table-hover" id="table_upahproduksi" cellspacing="0">
	                                <thead class="bg-primary">
	                                    <tr>
	                                    	<th width="1%">No</th>
							                <th>Kode Upah</th>
							                <th>Nama Item</th>
							                <th>Jumlah Produksi</th>
							                <th>Tanggal Produksi</th>
							                <th>Aksi</th>
							            </tr>
	                                </thead>
	                                <tbody>
	                                	<tr>
	                                		<td align="center">1</td>
	                                		<td>H/PTR/20181115/1</td>
	                                		<td>Paving</td>
	                                		<td>150</td>
	                                		<td>15 Nov 2018</td>
	                                		<td align="center">
	                                			<button class="btn btn-info" type="button" title="Detail"><i class="fa fa-list"></i></button>
	                                		</td>
	                                	</tr>
	                                	<tr>
	                                		<td align="center">2</td>
	                                		<td>H/PR/20181113/1</td>
	                                		<td>Paving Abu</td>
	                                		<td>100</td>
	                                		<td>13 Nov 2018</td>
	                                		<td align="center">
	                                			<button class="btn btn-info" type="button" title="Detail"><i class="fa fa-list"></i></button>
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
		var table = $('#table_upahproduksi').DataTable();
	})
</script>
@endsection