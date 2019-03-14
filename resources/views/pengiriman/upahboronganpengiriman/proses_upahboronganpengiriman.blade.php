@extends('main')

@section('extra_style')
<style type="text/css">
    .form-group.has-error .input-group input,
    .form-group.has-error .input-group select
    {
        border-color: #a94442;
    }

</style>
@endsection

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Proses Upah Borongan Pengiriman </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Pengiriman</span> 
	    	/ <a href="{{route('upahboronganpengiriman')}}"><span>Upah Borongan Pengiriman</span> </a>
	    	/ <span class="text-primary font-weight-bold">Proses Upah Borongan Pengiriman</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                        <div class="header-block">
                            <h3 class="title"> Proses Upah Borongan Pengiriman </h3>
                        </div>
                        <div class="header-block pull-right">
                            <a href="{{route('upahboronganpengiriman')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="card-block">
                        <section>
                            <fieldset class="mb-3" id="fieldset-1">
                            	<div class="row">
                            		
                            		<div class="col-md-3 col-sm-4 col-12">
                            			<label>Pemilik/Nopol/Sopir</label>
                            		</div>

                            		<div class="col-md-9 col-sm-8 col-12">
                            			<div class="form-group">
                            				<select class="form-control form-control-sm select2" name="" id="nopol">
                                                <option value="" selected="">--Pilih--</option>
                                                <optgroup label="CV.Alexis">
                                                    <option value="1">CV.Alexis - L 123 UD - Su Ep</option>
                                                    <option value="2">CV.Alexis - L 456 BV - Paijo</option>
                                                </optgroup>
                                                <optgroup label="Alpha">
                                                    <option value="3">Alpha - L 987 BU - Tole</option>
                                                </optgroup>
                                                <optgroup label="Bravo">
                                                    <option value="4">Bravo - L 789 UM - Wawan</option>
                                                </optgroup>
                                            </select>
                            			</div>
                            		</div>


                                    <div class="col-md-3 col-sm-4 col-12">
                                        <label>Tanggal</label>
                                    </div>

                                    <div class="col-md-9 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="input-group input-daterange">
                                                <input type="text" class="form-control form-control-sm" id="" name="">
                                                <span class="input-group-addon">-</span>
                                                <input type="text" class="form-control form-control-sm" id="" name="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary" type="button" id="btn-proses">Proses</button>
                                    </div>
                            	</div>
                            </fieldset>

                        	<div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="table_barang" cellspacing="0">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Barang</th>
                                            <th width="10%">Qty</th>
                                            <th>Tanggal Pengiriman Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>

                        </section>
                    </div>
                    <div class="card-footer text-right">
                    	<button class="btn btn-primary" id="btn-simpan" type="button">Simpan</button>
                    	<a href="{{route('upahboronganpengiriman')}}" class="btn btn-secondary">Kembali</a>
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

        $('#btn-simpan').click(function(){
             $.toast({
                    heading: 'Information',
                    text: 'Data Berhasil di disimpan!',
                    bgColor: '#0984e3',
                    textColor: 'white',
                    loaderBg: '#fdcb6e',
                    icon: 'info'
            })
        });

        $('#fieldset-1 input, #fieldset-1 select').on('change keyup blur focus hover', function(){
            if($(this).val() !== ''){   
                $(this).parents('.form-group').removeClass('has-error');
            }


        });

        $('#btn-proses').click(function(){
            var nopol, tanggal;
            nopol = $('#nopol');
            tanggal = $('.input-daterange input');

            if(nopol.val() !== '' && tanggal.val() !== ''){

                datatable_append();

            } else if(nopol.val() === '' || tanggal.val() === ''){

                if (nopol.val() === '') {
                    $.toast({
                        icon:'warning',
                        text:'Nopol/Sopir tidak boleh kosong',
                        heading:'Peringatan!'
                    });
                    nopol.parents('.form-group').addClass('has-error');
                }
                if (tanggal.val() === '') {
                    $.toast({
                        icon:'warning',
                        text:'Tanggal tidak boleh kosong',
                        heading:'Peringatan!'
                    });
                    tanggal.parents('.form-group').addClass('has-error');

                }

                eueue.clear().draw();
            }
        });


        $('.input-daterange input').each(function(){
            $(this).datepicker({endDate:'0d'});
        });

        function datatable_append(){
            eueue.row.add([
                'Paving Abu',
                '12',
                '08-02-2019'
                ]).draw();
            eueue.row.add([
                'Paving Merah',
                '12',
                '09-02-2019'
                ]).draw();
        }
    });
</script>
@endsection