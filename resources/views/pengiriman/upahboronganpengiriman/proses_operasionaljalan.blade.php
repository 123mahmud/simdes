@extends('main')

@section('extra_style')
<style type="text/css">
.div-ubah-status {
    width: 200px;
    display: inline-block;
    float: left;
    text-align: left;
    display: table-cell;
}

.card-footer{
    line-height: 2;
    display: table;
}
.card-footer-button{
    display: table-cell;
    vertical-align: middle;
}
@media (max-width: 576px){
    .div-ubah-status{
        width: 100%;
        margin-bottom: 10px;
        display: unset;
    }
    .card-footer{
        display: unset;
    }
    .card-footer-button{
        display: unset;
    }
}
</style>
@endsection

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Proses Operasional Jalan </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Pengiriman</span> 
	    	/ <a href="{{route('upahboronganpengiriman')}}"><span>Upah Borongan Pengiriman</span> </a>
	    	/ <span class="text-primary font-weight-bold">Proses Operasional Jalan</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                        <div class="header-block">
                            <h3 class="title"> Proses Operasional Jalan </h3>
                        </div>
                        <div class="header-block pull-right">
                            <a href="{{route('upahboronganpengiriman')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="card-block">
                        <section>

                        	<div class="row">
                        		
                        		<div class="col-md-3 col-sm-6 col-xs-12">
                        			<label>Nota</label>
                        		</div>

                        		<div class="col-md-3 col-sm-6 col-xs-12">
                        			<div class="form-group">
                        				<input type="text" readonly="" class="form-control form-control-sm" value="POS-TO/20190208/1" name="">
                        			</div>
                        		</div>

                        		<div class="col-md-3 col-sm-6 col-xs-12">
                        			<label>Nama Customer</label>
                        		</div>

                        		<div class="col-md-3 col-sm-6 col-xs-12">
                        			<div class="form-group">
                        				<input type="text" readonly="" class="form-control form-control-sm" value="Alpha" name="">
                        			</div>
                        		</div>

                        		<div class="col-md-3 col-sm-6 col-xs-12">
                        			<label>Alamat</label>
                        		</div>

                        		<div class="col-md-9 col-sm-6 col-xs-12">
                        			<div class="form-group">
                        				<textarea class="form-control" readonly="" name="">Jl. Alpha</textarea>
                        			</div>
                        		</div>

                        		<div class="col-md-3 col-sm-6 col-xs-12">
                        			<label>Jadwal</label>
                        		</div>

                        		<div class="col-md-3 col-sm-6 col-xs-12">
                        			<div class="form-group">
                        				<input type="text" readonly="" class="form-control form-control-sm" value="08-02-2019 23:59:59" name="">
                        			</div>
                        		</div>

                        	</div>

                        	<div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="table_barang" cellspacing="0">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Barang</th>
                                            <th width="10%">Qty</th>
                                            <th>Nama Pemilik</th>
                                            <th>Nopol</th>
                                            <th>Sopir</th>
                                            <th>Ongkos Kirim per Jumlah Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Paving 8T</td>
                                            <td>50</td>
                                            <td>Alpha</td>
                                            <td>L 1234 BV</td>
                                            <td>Su Ep</td>
                                            <td>Rp. 20.000,00/100</td>
                                        </tr>
                                        <tr>
                                            <td>Paving Abu</td>
                                            <td>100</td>
                                            <td>Alpha</td>
                                            <td>L 1234 BV</td>
                                            <td>Tole</td>
                                            <td>Rp. 21.000,00/100</td>
                                        </tr>
                                        <tr>
                                            <td>Paving Tortilla</td>
                                            <td>120</td>
                                            <td>Alpha</td>
                                            <td>L 1234 BV</td>
                                            <td>Paijo</td>
                                            <td>Rp. 22.000,00/100</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </section>
                    </div>
                    <div class="card-footer text-right">
                        <div class="div-ubah-status">
                            <small>Status</small>
                            <select class="form-control form-control-sm" id="select-status">
                                <option selected="" value="1">Sedang diproses</option>
                                <option value="2">Proses Pengiriman</option>
                                <option value="3">Sudah diterima</option>
                            </select>
                            <div id="stattus">
                                <span class="badge badge-secondary badge-pill">Sedang diproses</span>
                            </div>
                        </div>
                        <div class="card-footer-button">
                        	<button class="btn btn-primary" id="btn-simpan" type="button">Simpan</button>
                        	<a href="{{route('upahboronganpengiriman')}}" class="btn btn-secondary">Kembali</a>
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
        var eueue = $('#table_barang').DataTable();

        $('#select-status').change(function(){
            var ini, stattus;

            ini         = $(this);
            stattus     = $('#stattus');

            if (ini.val() === '1') {
                stattus.html('<span class="badge badge-secondary badge-pill">Sedang diproses</span>')
            } else if(ini.val() === '2'){
                stattus.html('<span class="badge badge-info badge-pill">Proses Pengiriman</span>')

            } else if(ini.val() === '3'){
                stattus.html('<span class="badge badge-success badge-pill">Sudah diterima</span>')
            }
        });

        $('#btn-simpan').click(function(){
            var selectstatus;
            selectstatus    = $('#select-status');

            if (selectstatus.val() === '3') {
                $.confirm({
                    animation: 'RotateY',
                    closeAnimation: 'scale',
                    animationBounce: 1.5,
                    icon: 'fa fa-exclamation-triangle',
                    title: 'Konfirmasi',
                    content: 'Apa anda yakin mengakhiri proses ini?',
                    theme: 'disable',
                    buttons: {
                        info: {
                            btnClass: 'btn-blue',
                            text:'Ya',
                            action : function(){
                                $.toast({
                                    heading: 'Information',
                                    text: 'Data Berhasil di disimpan!',
                                    bgColor: '#0984e3',
                                    textColor: 'white',
                                    loaderBg: '#fdcb6e',
                                    icon: 'info'
                                })
                                
                            }
                        },
                        cancel:{
                            text: 'Tidak',
                            action: function () {
                                // tutup confirm
                            }
                        }
                    }
                });
            } else {
                $.toast({
                    heading: 'Information',
                    text: 'Data Berhasil di disimpan!',
                    bgColor: '#0984e3',
                    textColor: 'white',
                    loaderBg: '#fdcb6e',
                    icon: 'info'
                })
            }
        });
    });
</script>
@endsection