@extends('main')

@section('extra_style')
<style type="text/css">
	#div_kas{
		min-height: 300px;
	}
</style>
@endsection

@section('content')

@include('keuangan.prosesinputtransaksi.modal_kas')


<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title">  Input Transaksi Kas </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Keuangan</span> 
	    	/ <span>Proses Input Transaksi</span>
	    	/ <a href="{{route('pilih_prosesinputtransaksi')}}">Pilih Transaksi</a>
	    	/ <span class="text-primary font-weight-bold"> Input Transaksi Kas</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title">  Input Transaksi Kas </h3>
	                    </div>
	                    <div class="header-block pull-right">
	                    	<a href="{{route('pilih_prosesinputtransaksi')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	<div class="row">
                        		<div class="col-md-6 col-sm-12">
                        			
                        			<div class="row">

                        				<div class="col-md-5 col-sm-12">
                        					<label>Nomor Transaksi</label>
                        				</div>

                        				<div class="col-md-7 col-sm-12">
                        					<div class="form-group">
                        						<div class="input-group">
	                        						<input type="text" readonly="" class="form-control form-control-sm" placeholder="Di isi oleh sistem" name="">
	                        						<div class="input-group-btn">
	                        							<button class="btn btn-secondary" data-target="#detail" data-toggle="modal"><i class="fa fa-search"></i></button>
	                        						</div>
	                        					</div>
                        					</div>
                        				</div>

                        				<div class="col-md-5 col-sm-12">
                        					<label>Type Transaksi Kas</label>
                        				</div>

                        				<div class="col-md-7 col-sm-12">
                        					<div class="form-group">
                        						<div class="input-group">
	                        						<select class="form-control form-control-sm" name="">
	                        							<option>KM - Transaksi Kas Masuk</option>
	                        							<option>KK - Transaksi Kas Keluar</option>
	                        						</select>
	                        						<div class="input-group-addon" title="Parameter Type Group Digunakan Untuk Pencarian Data">
	                        							<i class="fa fa-info-circle"></i>
	                        						</div>
	                        					</div>
                        					</div>
                        				</div>

                        				<div class="col-md-5 col-sm-12">
                        					<label>Tanggal Transaksi <span class="text-danger">*</span></label>
                        				</div>

                        				<div class="col-md-7 col-sm-12">
                        					<div class="form-group">
                        						<div class="input-group">
                        							<input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y')}}" name="">
	                        						<div class="input-group-addon" title="Parameter Type Group Digunakan Untuk Pencarian Data">
	                        							<i class="fa fa-info-circle"></i>
	                        						</div>
	                        					</div>
                        					</div>
                        				</div>

                        				<div class="col-12">
                        					<hr>
                        				</div>


                        				<div class="col-md-5 col-sm-12">
                        					<label>Ket. Transaksi <span class="text-danger">*</span></label>
                        				</div>

                        				<div class="col-md-7 col-sm-12">
                        					<div class="form-group">
                        						<input type="text" class="form-control form-control-sm" name="" placeholder="contoh: Setoran Modal Investor">
                        					</div>
                        				</div>

                        				<div class="col-md-5 col-sm-12">
                        					<label>Pilih Akun Kas</label>
                        				</div>

                        				
                        				<div class="col-md-7 col-sm-12">
                        					<div class="form-group">
                        						<select class="form-control form-control-sm">
                        							<option>--Pilih</option>
                        						</select>
                        					</div>
                        				</div>

                        				<div class="col-md-5 col-sm-12">
                        					<label>Nominal Transaksi</label>
                        				</div>

                        				
                        				<div class="col-md-7 col-sm-12">
                        					<div class="form-group">
                        						<input type="text" class="form-control form-control-sm text-right input-rupiah" name="">
                        					</div>
                        				</div>

                        			</div>

                        		</div>

                        		<div class="col-md-6 col-sm-12" id="div_kas">
                        				<table class="table table-bordered table-striped table-hover" id="tabel_kas" cellspacing="0" cellpadding="">
                        					<thead>
                        						<tr align="center">
                    								<th>*</th>
                        							<th>Akun</th>
                        							<th>Debet</th>
                        							<th>Kredit</th>
                        						</tr>
                        					</thead>
                        					<tbody>
                        						<tr>
                        							<td align="center"><i class="fa fa-lock"></i></td>
                        							<td>
                        								<select class="form-control form-control-sm" name="">
                        									<option>--Pilih--</option>
                        								</select>
                        							</td>
                        							<td align="right">0,00</td>
                        							<td align="right">0,00</td>
                        						</tr>

                        						<tr>
                        							<td align="center"><i class="fa fa-lock"></i></td>
                        							<td>
                        								<select class="form-control form-control-sm" name="">
                        									<option>--Pilih--</option>
                        								</select>
                        							</td>
                        							<td align="right">0,00</td>
                        							<td align="right">0,00</td>
                        						</tr>
                        					</tbody>
                        					<tfoot>
                        						<tr align="center" valign="middle">
                        							<th width="1%">
                    									<button class="btn btn-secondary btn-sm" id="btn-tambah" type="button"><i class="fa fa-plus"></i></button>
                    								</th>
                    								<th>Total Debet Kredit</th>
                    								<th><input type="text" readonly="" value="0,00" class="form-control form-control-nb text-right form-control-sm" name=""></th>
                    								<th><input type="text" readonly="" value="0,00" class="form-control form-control-nb text-right form-control-sm" name=""></th>
                    							</tr>
                        					</tfoot>
                        				</table>

                        		</div>
                        	</div>

                        </section>
                    </div>
                    <div class="card-footer text-right">
                    	<button class="btn btn-primary" type="button">Simpan</button>
                    	<a href="{{route('pilih_prosesinputtransaksi')}}" class="btn btn-secondary">Kembali</a>
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

		$('#btn-tambah').click(function(){
			$('#tabel_kas tbody').append(
				'<tr>'+
					'<td align="center"><button class="btn btn-danger btn-sm btn-hapus"><i class="fa fa-trash-o"></i></button></td>'+
					'<td>'+
						'<select class="form-control form-control-sm" name="">'+
							'<option>--Pilih--</option>'+
						'</select>'+
					'</td>'+
					'<td align="right">0,00</td>'+
					'<td align="right">0,00</td>'+
				'</tr>	'
				);
		});

		$('#tabel_kas tbody').on('click', '.btn-hapus', function(){
			$(this).parents('tr').remove();
		});

	});

</script>
@endsection