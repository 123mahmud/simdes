@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Tambah Data Adonan </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Stok</span> 
	    	/ <a href="{{route('dataadonan')}}"><span>Data Adonan</span> </a>
	    	/ <span class="text-primary font-weight-bold">Tambah Data Adonan</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

            <div class="col-md-4 col-sm-12 col-12">
                <h5>Barang yang belum ada Adonannya</h5>
                <hr>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="tabel_belum" cellspacing="0">
                    <thead class="bg-primary">
                      <tr>
                        <th>Nama Barang</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for($i=0;$i<100;$i++)
                        <tr>
                          <td>Semen</td>
                        </tr>
                        <tr>
                          <td>Sirtu</td>
                        </tr>
                        <tr>
                          <td>Abu Batu</td>
                        </tr>
                      @endfor
                    </tbody>
                  </table>
                </div>
            </div>

			<div class="col-md-8 col-sm-12 col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                        <div class="header-block">
                            <h3 class="title"> Tambah Data Adonan </h3>
                        </div>
                        <div class="header-block pull-right">
                            <a href="{{route('dataadonan')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="card-block">
                        <section>

                        	<fieldset>
                        		<div class="row">
                                    <div class="col-md-4 col-sm-5 col-12">                                    
                        				<label>Nama Barang</label>
                                    </div>

                                    <div class="col-md-8 col-sm-7 col-12">
                        				<div class="form-group">
                    					
                        					<select class="form-control form-control-sm select2">
                        						<option value="">--Pilih--</option>
                        						<option value="1">Paving</option>
                        						<option value="2">Bata</option>
                                                <option value="3">Paving Merah</option>
                        						<option value="4">Paving Abu</option>
                        					</select>	
	                        					
                        				</div>
                        			</div>

                                    <div class="col-md-4 col-sm-5 col-12">
                                        <label>Jenis Adonan</label>
                                    </div>

                                    <div class="col-md-8 col-sm-7 col-12">
                                        <div class="form-group">
                                        
                                           <input type="text" class="form-control form-control-sm" name=""> 
                                                
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-sm-5 col-12">
                                        <label>Jumlah Hasil Produksi</label>
                                    </div>

                                    <div class="col-md-8 col-sm-7 col-12">
                                        <div class="form-group">
                                        
                                           <input type="number" min="0" class="form-control form-control-sm" name=""> 
                                                
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-5 col-12">
                                        <label>Satuan</label>
                                    </div>

                                    <div class="col-md-8 col-sm-7 col-12">
                                        <div class="form-group">
                                        
                                           <input type="text" readonly="" class="form-control form-control-sm" value="Biji" name="">
                                                
                                        </div>
                                    </div>

                        		</div>
                        	</fieldset>

                            <fieldset class="mt-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <label>Nama Bahan/Barang</label>
                                        <div class="form-group">
                                            <select class="form-control form-control-sm select2" id="bahan" name="">
                                                <option value="" disabled="" selected="">--Pilih--</option>
                                                <option value="2">Pasir</option>
                                                <option value="3">Air</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-12">
                                        <label>Qty</label>
                                        <div class="form-group">
                                            <input type="number" class="form-control-sm form-control" id="qty" name="">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-12">
                                        <label>Satuan</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select class="form-control form-control-sm" id="satuan" name="">
                                                    <option value="1">Kg</option>
                                                    <option value="2">Pcs</option>
                                                    <option value="3">Ton</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary btn-sm btn-tambah"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </fieldset>

                        	<div class="table-responsive mt-3">
                        		<table class="table table-hover table-bordered table-striped data-table" cellspacing="0" id="table_adonan">
                        			<thead class="bg-primary">
                        				<tr>
                                            <th width="1%">No</th>
                        					<th>Kode</th>
                                            <th>Nama Item</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Kelompok Barang</th>
                        					<th width="1%"></th>
                        				</tr>
                        			</thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>BRG/1</td>
                                            <td>Semen</td>
                                            <td><input type="number" min="0" class="form-control-sm form-control" name=""></td>
                                            <td>Sak</td>
                                            <td>-</td>
                                            <td align="center">-</td>
                                        </tr>
                                    </tbody>
                        		</table>
                        	</div>

                        </section>
                    </div>

                    <div class="card-footer text-right">
                    	<button class="btn btn-primary" type="button">Simpan</button>
                    	<a href="{{route('dataadonan')}}" class="btn btn-secondary">Kembali</a>
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
        var eueue = $('#tabel_belum').DataTable({
          "scrollY":        "200px",
            "scrollCollapse": true,
            "paging":         false
        });
        // !important
        $('div[id^="tabel_belum"]').find('.row:first-child').find('.col-md-6:first-child').remove();
        // end !important

        var bahan = $('#bahan');
        var table = $('#table_adonan').DataTable();
        var int = 0;        


        function func_tabel_bahan(){
            table.row.add([
                '#',
                $('#bahan').val(),
                $('#bahan option:selected').text(),
                '<input type="number" class="form-control form-control-sm" value="'+ $('#qty').val() +'" min="0">',
                $('#satuan option:selected').text(),
                '-',
                '<button class="btn btn-danger btn-hapus" title="Delete"><i class="fa fa-trash-o"></i></button>'
                ]).draw(false);

            int++;

            bahan.prop('selectedIndex', 0).trigger('change');

            $('#qty').val('');
            $('#satuan').prop('selectedIndex', 0).trigger('change');
        }

        $('#qty').keypress(function(e){

            if (e.which === 13 || e.keyCode === 13) {
                if ($('#bahan').val() === '') {
                    $.toast({
                        text: 'Isi Bahan terlebih dahulu', // Text that is to be shown in the toast
                        heading: 'Gagal', // Optional heading to be shown on the toast
                        icon: 'error'// if dont set bgColor or textColor background color same as icon type (warning, info, success, error)
                    });
                } else {
                    func_tabel_bahan();
                }
            }

        });


        $('.btn-tambah').on('click', function(){


            if ($('#bahan').val() === '') {
                $.toast({
                    text: 'Isi Bahan terlebih dahulu', // Text that is to be shown in the toast
                    heading: 'Gagal', // Optional heading to be shown on the toast
                    icon: 'error'// if dont set bgColor or textColor background color same as icon type (warning, info, success, error)
                });
            } else {
                func_tabel_bahan();
            }
        });


        $('#table_adonan tbody').on('click', '.btn-hapus', function(){
            table.row($(this).parents('tr')).remove().draw();
        });
    });
</script>
@endsection