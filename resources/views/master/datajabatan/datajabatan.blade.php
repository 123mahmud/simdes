@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Jabatan </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
	    	/ <span>Master Data</span> 
	    	/ <span class="text-primary font-weight-bold">Data Jabatan</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Data Jabatan </h3>
	                    </div>
	                    <div class="header-block pull-right">
	                    	
                    			<a class="btn btn-primary" href="{{ route('tambah_datajabatan') }}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	<div class="table-responsive">
	                            <table class="table table-striped table-hover table-bordered" cellspacing="0" id="tbl_jabatan">
	                                	<thead class="bg-primary">
	                                    <tr>
														<th>Kode</th>
														<th>Nama</th>
														<th>Action</th>
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

	$(document).ready(function(){

		$('#tbl_jabatan').DataTable({
	      processing: true,
	      responsive:true,
	      serverSide: true,
	      ajax: {
	        url: '{{ url("master/datajabatan/data-jabatan") }}',
	      },
	      columnDefs: [
	        {
	          targets: 0,
	          className: 'center d_id'
	        },
	      ],
	      "columns": [
	        { "data": "c_code", "width":"10%" },
	        { "data": "c_posisi", "width":"75%" },
	        { "data": "action", "width":"15%" },
	      ],
	      "responsive": true,
	      "pageLength": 10,
	      "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
	      "language": {
	        "searchPlaceholder": "Cari Data",
	        "emptyTable": "Tidak ada data",
	        "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
	        "sSearch": '<i class="fa fa-search"></i>',
	        "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
	        "infoEmpty": "",
	        "paginate": {
	          "previous": "Sebelumnya",
	          "next": "Selanjutnya",
	        }
	      }
	   });

	});

	function edit(a) 
	{
      var parent = $(a).parents('tr');
      var id = $(parent).find('.d_id').text();
      console.log(id);
      $.ajax({
        type: "PUT",
        url: '{{ url("master/datajabatan/edit-jabatan") }}' + '/' + a,
        data: { id },
        success: function (data) {
        },
        complete: function (argument) {
          window.location = (this.url)
        },
        error: function () {

        },
        async: false
      });
   }

   function ubahStatusMan(id)
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
                     url: baseUrl +'/master/datajabatanman/ubahstatus',
                     type: "get",
                     dataType: "JSON",
                     data: {id:id},
                     success: function(response)
                     {
                        if(response.status == "sukses")
                        {
                           $('#tbl_jabatan').DataTable().ajax.reload();
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

</script>
@endsection
