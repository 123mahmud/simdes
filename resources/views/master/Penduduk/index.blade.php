@extends('main')

@section('content')



<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Penduduk </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
	    	 / <span>Master Data</span>
	    	 / <span class="text-primary" style="font-weight: bold;">Data Penduduk</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">

				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
                            <h3 class="title"> Data Penduduk </h3>
                        </div>
                        <div class="header-block pull-right">

                			<a class="btn btn-primary" href="{{route('add-penduduk')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
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
				url: "{{ route('get-penduduk') }}",
				type: "get",
				data: {
					"_token": "{{ csrf_token() }}"
				}
			},
			columns: [
				{data: 'nik', "width": "20%"},
				{data: 'nama', "width": "20%"},
				{data: 'tempat_tgl_lahir', "width": "20%"},
				{data: 'pekerjaan_nama', "width": "20%"},
				{data: 'action', "width": "20%"}
			],
			pageLength: 10,
			lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
		});
		
	});

	function status(id)
   {
   	$.confirm({
         title: 'Ehem!',
         content: 'Apakah anda yakin?',
         type: 'blue',
         typeAnimated: true,
         buttons: {
           tryAgain: {
               text: 'Ya',
               btnClass: 'btn-red',
               action: function(){
                  $.ajax({
                     url: "{{ route('change-penduduk') }}",
                     type: "PUT",
                     dataType: "JSON",
                     data: {id:id},
                     success: function(response)
                     {
                        if(response.status == "sukses")
                        {
                           $('#table-penduduk').DataTable().ajax.reload();
                           $.toast({
                              heading: '',
                              text: 'Status berhasil di update',
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
                               text: 'Status gagal di update',
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
                     url: "{{ route('delete-penduduk') }}",
                     type: "DELETE",
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


</script>
@endsection
