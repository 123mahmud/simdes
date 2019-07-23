@extends('main')

@section('content')

@include('master.Penduduk_Masuk.detail')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Penduduk Masuk </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
	    	 / <span>Master Data</span>
	    	 / <span class="text-primary" style="font-weight: bold;">Data Penduduk Masuk</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">

				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
                            <h3 class="title"> Data Penduduk Masuk </h3>
                        </div>
                        <div class="header-block pull-right">

                			<a class="btn btn-primary" href="{{route('add-pmasuk')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-block">
                        <section>

                        	<div class="table-responsive">
	                            <table class="table table-striped table-hover" cellspacing="0" id="table-penduduk">
	                                <thead class="bg-primary">
	                                    <tr>
		                                		<th>Nik</th>
		                                		<th>Nama</th>
		                                		<th>Tempat Tanggal Lahir</th>
		                                		<th>Pekerjaan</th>
		                                		<th>Aksi</th>
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
	$(document).ready(function() {
		//get penduduk
		$('#table-penduduk').dataTable().fnDestroy();
		tb_barang = $('#table-penduduk').DataTable({
			responsive: true,
			serverSide: true,
			ajax: {
				url: "{{ route('get-pmasuk') }}",
				type: "get",
				data: {
					"_token": "{{ csrf_token() }}"
				}
			},
			columns: [
				{data: 'nik', "width": "15%"},
				{data: 'nama', "width": "25%"},
				{data: 'tempat_tgl_lahir', "width": "30%"},
				{data: 'pekerjaan_nama', "width": "15%"},
				{data: 'action', "width": "15%"}
			],
			pageLength: 10,
			lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
		});
		
	});

	function detail(id) {
       $.ajax({
           url: baseUrl + "/pmasuk/detail/" + id,
           type: "GET",
           dataType: "JSON",
           success: function(data) {
               $('#nik').text(data.nik);
               $("#nama").text(data.nama);
               $('#urut_kk').text(data.urut_kk);
               if (data.kelamin == 'L'){
                  var kelamin = 'Laki-laki'
               }else{
                  var kelamin = 'Perempuan'
               }
               $('#kelamin').text(kelamin);
               $('#tempat_lahir').text(data.tempat_lahir);
               $('#tgl_lahir').text(data.tgl_lahir);
               $("#gol_darah").text(data.gol_darah);
               if (data.agama == 'IL'){
                  var agama = 'Islam'
               }else if(data.agama == 'HD'){
                  var agama = 'Hindu'
               }else if(data.agama == 'BD'){
                  var agama = 'Budha'
               }else if(data.agama == 'KP'){
                  var agama = 'Kristen Prostetan'
               }else if(data.agama == 'KL'){
                  var agama = 'Katolik'
               }else if(data.agama == 'KC'){
                  var agama = 'Kong Hu Cu'
               }
               $('#agama').text(agama);
               if (data.status_nikah == 'KW'){
                  var status_nikah = 'Kawin'
               }else if(data.status_nikah == 'BK'){
                  var status_nikah = 'Belum Kawin'
               }else if(data.status_nikah == 'CH'){
                  var status_nikah = 'Cerai Hidup'
               }else if(data.status_nikah == 'CM'){
                  var status_nikah = 'Cerai Mati'
               }
               $('#status_nikah').text(status_nikah);
               if (data.status_keluarga == 'SM'){
                  var status_keluarga = 'Suami'
               }else if(data.status_keluarga == 'IS'){
                  var status_keluarga = 'Istri'
               }else if(data.status_keluarga == 'AN'){
                  var status_keluarga = 'Anak'
               }else if(data.status_keluarga == 'CU'){
                  var status_keluarga = 'Cucu'
               }else if(data.status_keluarga == 'OT'){
                  var status_keluarga = 'Orang Tua'
               }else if(data.status_keluarga == 'ME'){
                  var status_keluarga = 'Mertua'
               }else if(data.status_keluarga == 'FL'){
                  var status_keluarga = 'Family Lain'
               }else if(data.status_keluarga == 'LA'){
                  var status_keluarga = 'Lainnya'
               }
               $('#status_keluarga').text(status_keluarga);
               if (data.pendidikan == 'TBS'){
                  var pendidikan = 'TIDAK / BELUM SEKOLAH'
               }else if(data.pendidikan == 'BTS'){
                  var pendidikan = 'BELUM TAMAT SD/SEDERAJAT'
               }else if(data.pendidikan == 'TSS'){
                  var pendidikan = 'TAMAT SD / SEDERAJAT'
               }else if(data.pendidikan == 'SMP'){
                  var pendidikan = 'SLTP/SEDERAJAT'
               }else if(data.pendidikan == 'SMA'){
                  var pendidikan = 'SLTA / SEDERAJAT'
               }else if(data.pendidikan == 'D1'){
                  var pendidikan = 'DIPLOMA I / II'
               }else if(data.pendidikan == 'D2'){
                  var pendidikan = 'AKADEMI/ DIPLOMA III/S. MUDA'
               }else if(data.pendidikan == 'S1'){
                  var pendidikan = 'DIPLOMA IV/ STRATA I'
               }else if(data.pendidikan == 'S2'){
                  var pendidikan = 'STRATA II'
               }else if(data.pendidikan == 'S3'){
                  var pendidikan = 'STRATA III'
               }
               $('#pendidikan').text(pendidikan);
               $("#pekerjaan").text(data.pekerjaan);
               $('#nama_ibu').text(data.nama_ibu);
               $('#nama_ayah').text(data.nama_ayah);
               $('#no_kk').text(data.no_kk);
               $('#rt').text(data.rt);
               $('#rw').text(data.rw);
               $('#warga_negara').text(data.warga_negara);
               $('#tempat_meninggal').text(data.tempat_meninggal);
               $('#sebab_meninggal').text(data.sebab_meninggal);
               $('#tanggal_meninggal').text(data.tanggal_meninggal);
               $('#alamat_asal').text(data.alamat_asal);
               $('#rt_asal').text(data.rt_asal);
               $('#rw_asal').text(data.rw_asal);
               $('#kecamatan_asal').text(data.kecamatan_asal);
               $('#kabupaten_asal').text(data.kabupaten_asal);
               $('#provinsi_asal').text(data.provinsi_asal);
               $('#tgl_pindah').text(data.tgl_pindah);
               $('#keterangan').text(data.keterangan);

               $('#append-footer-detail').html('<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>');
               $('#modal-detail').modal('show');
           },
           error: function(jqXHR, textStatus, errorThrown) {
               alert('Error get data from ajax');
           }
       });
   }

   function destroy(id)
   {
      $.confirm({
         title: 'Ehem!',
         content: 'Apakah anda yakin?',
         type: 'red',
         typeAnimated: true,
         buttons: {
           tryAgain: {
               text: 'Ya',
               btnClass: 'btn-red',
               action: function(){
                  $.ajax({
                     url: "{{ route('delete-pmasuk') }}",
                     type: "GET",
                     dataType: "JSON",
                     data: {id:id},
                     success: function(response)
                     {
                        if(response.status == "sukses")
                        {
                           $('#table-penduduk').DataTable().ajax.reload();
                           $.toast({
                              heading: '',
                              text: 'Berhasil Hapus Data',
                              bgColor: '#00b894',
                              textColor: 'white',
                              loaderBg: '#55efc4',
                              icon: 'success'
                           });
                        }
                        else
                        {
                           $.toast({
                               heading: '',
                               text: 'Gagal Hapus Data',
                               showHideTransition: 'plain',
                               icon: 'warning'
                           })
                        }
                     }
                     
                  })
               }
           },
           close: function () {
           }
         }
      });
   }

   function edit(id)
   {
      $.ajax({
         type: "GET",
         url: "{{ route('edit-pmasuk') }}",
         data: {id:id},
         success: function(response){
            window.location=(this.url)
         },
         complete:function (argument) {
            
         },
         error: function(){
            alert('Error get data from ajax');
         },
         // async: false
      });
   }


</script>
@endsection
