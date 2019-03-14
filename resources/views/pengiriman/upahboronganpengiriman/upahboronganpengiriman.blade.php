@extends('main')

@section('content')

@include('pengiriman.upahboronganpengiriman.status_upahboronganpengiriman')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Upah Borongan Pengiriman </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> / <span>Pengiriman</span> / <span class="text-primary" style="font-weight: bold;">Upah Borongan Pengiriman</span>
	     </p>
	</div>

	<section class="section">

		<ul class="nav nav-pills">
            <li class="nav-item">
                <a href="" class="nav-link active" data-target="#pengiriman" aria-controls="pengiriman" data-toggle="tab" role="tab">Operasional Jalan</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link" data-target="#upah" aria-controls="upah" data-toggle="tab" role="tab">Upah Borongan Pengiriman</a>
            </li>
        </ul>
		
		<div class="row">

			<div class="col-12">

				<div class="tab-content">
					<div class="tab-pane active fade in show" id="pengiriman">
						<div class="card">
		                    <div class="card-block">
		                        <section>
		                        	
		                        	<div class="table-responsive">
			                            <table class="table table-hover table-striped table-bordered" cellspacing="0" id="table-operasional">
			                                <thead class="bg-primary">
			                                    <tr>
									                <th>Nota</th>
									                <th>Sopir</th>
									                <th>Jadwal</th>
									                <th>Status</th>
									                <th>Aksi</th>
									            </tr>
			                                </thead>
			                                <tbody>
			                                	<tr>
			                                		<td>PP/20190207/3</td>
			                                		<td>Delta</td>
			                                		
			                                		<td>07-02-2019 22:22:22</td>
			                                		<td><span class="badge badge-secondary badge-pill">Sedang diproses</span></td>
			                                		<td align="center">
			                                			<div class="btn-group">
			                                				<button class="btn btn-primary btn-sm btn-operasional-proses" type="button">Proses</button>
			                                			</div>
			                                		</td>
			                                	</tr>
			                                	<tr>
			                                		<td>PP/20190207/2</td>
			                                		<td>Echo</td>
			                                		
			                                		<td>07-02-2019 22:22:22</td>
			                                		<td><span class="badge badge-secondary badge-pill">Sedang diproses</span></td>
			                                		<td align="center">
			                                			<div class="btn-group">
			                                				<button class="btn btn-primary btn-sm btn-operasional-proses" type="button">Proses</button>
			                                			</div>
			                                		</td>
			                                	</tr>
			                                	<tr>
			                                		<td>PP/20190207/1</td>
			                                		<td>Foxtrot</td>
			                                		
			                                		<td>07-02-2019 22:22:22</td>
			                                		<td><span class="badge badge-secondary badge-pill">Sedang diproses</span></td>
			                                		<td align="center">
			                                			<div class="btn-group">
			                                				<button class="btn btn-primary btn-sm btn-operasional-proses" type="button">Proses</button>
			                                			</div>
			                                		</td>
			                                	</tr>

			                                	<tr>
			                                		<td>PP/20181123/1</td>
			                                		<td>Alpha</td>
			                                		
			                                		<td>24-11-2018 22:22:22</td>
			                                		<td><span class="badge badge-secondary badge-pill">Sedang diproses</span></td>
			                                		<td align="center">
			                                			<div class="btn-group">
			                                				<button class="btn btn-primary btn-sm btn-operasional-proses" type="button">Proses</button>
			                                			</div>
			                                		</td>
			                                	</tr>
			                                	<tr>
			                                		<td>PP/20181123/2</td>
			                                		<td>Bravo</td>
			                                		
			                                		<td>24-11-2018 22:22:22</td>
			                                		<td><span class="badge badge-info badge-pill">Proses Pengiriman</span></td>
			                                		<td align="center">
			                                			<div class="btn-group">
			                                				<button class="btn btn-primary btn-sm btn-operasional-proses" type="button">Proses</button>
			                                			</div>
			                                		</td>
			                                	</tr>
			                                	<tr>
			                                		<td>PP/20181123/3</td>
			                                		<td>Charlie</td>
			                                		
			                                		<td>24-11-2018 22:22:22</td>
			                                		<td><span class="badge badge-success badge-pill">Sudah diterima</span></td>
			                                		<td align="center">
			                                			-
			                                		</td>
			                                	</tr>

									        </tbody>
			                            </table>
			                        </div>
		                        </section>
		                    </div>
		                </div>
		            </div>
		            <div class="tab-pane fade in" id="upah">
		            	<div class="card">
		            		<div class="card-block">
		            			
		            			<section>

		            				<div class="table-responsive">
		            					<table class="table table-bordered table-hover table-striped" id="table-upah" cellspacing="0">
		            						<thead class="bg-primary">
		            							<tr>
		            								<th width="1%">No</th>
		            								<th>Nota</th>
		            								<th>Status</th>
		            								<th width="15%">Aksi</th>
		            							</tr>
		            						</thead>
		            						<tbody>
		            							<tr>
		            								<th align="center">1</th>
		            								<td>PP/20181123/3</td>
		            								<td><span class="badge badge-pill badge-secondary">Belum dibayar</span></td>
		            								<td align="center">
		            									<a class="btn btn-primary btn-sm" href="{{route('proses_upahboronganpengiriman')}}" title="Proses">Proses</a>
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

			</div>

		</div>

	</section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">
	$(document).ready(function(){
		var table1, table2;

		table1	= $('#table-operasional').DataTable({
			order : [[3,'asc']]
		});
		table2	= $('#table-upah').DataTable();

		$('#status_pilih').on('change', function(){
			if($(this).val() != ''){
				console.log('a');
				$('#example_badge').text($('#status_pilih option:selected').text());
				$('#example_badge').removeClass('d-none');
				if ($(this).val() === '1') {
					$('#example_badge').addClass('badge-secondary');
					$('#example_badge').removeClass('badge-info');
					$('#example_badge').removeClass('badge-success');
				} else if($(this).val() === '2'){
					$('#example_badge').removeClass('badge-secondary');
					$('#example_badge').addClass('badge-info');
					$('#example_badge').removeClass('badge-success');
				} else if($(this).val() === '3'){
					$('#example_badge').removeClass('badge-secondary');
					$('#example_badge').removeClass('badge-info');
					$('#example_badge').addClass('badge-success');
				}
			} else {
				console.log('b');
				$('#example_badge').addClass('d-none');
				$('#example_badge').text('');
			}
		});

		$('#table-operasional tbody').on('click', '.btn-operasional-proses', function(){
			window.location.href	= '{{route('proses_operasionaljalan')}}';
		});	
	});
</script>
@endsection