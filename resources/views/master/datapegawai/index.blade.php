@extends('main')

@section('content')
<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Pegawai </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> / <span>Master Data</span> / <span class="text-primary" style="font-weight: bold;">Data Pegawai</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">
				
				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Data Pegawai </h3>
	                    </div>
	                    <div class="header-block pull-right">
	                    <a href="{{ url('master/datapegawai/tambah-pegawai') }}">
                			<button class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
                		</a>
	                    </div>
                    </div>
                    <div class="card-block">
                        <section>
                        	
                        	<div class="table-responsive">
	                            <table class="table table-striped table-hover" cellspacing="0" id="tbl_pegawai">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th class="wd-15p">ID</th>
				                            <th class="wd-15p">Nama Pegawai</th>
				                            <th class="wd-15p">Tahun Masuk</th>
				                            <th class="wd-15p">Jabatan</th>
				                            <th class="wd-15p">Aksi</th>
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
	$('#calendar_date').click(function(){
		$('.datepicker').datepicker('show');
	});
</script>
<script type="text/javascript">

$(document).ready(function(){
	var table = $('#table_pegawai').DataTable();

	var tablePeg = $('#tbl_pegawai').DataTable({
      processing: true,
      // responsive:true,
      serverSide: true,
      ajax: {
        url: '{{ url("master/datapegawai/datatable-pegawai") }}',
      },
      columnDefs: [
        {
          targets: 0,
          className: 'center d_id'
        },
      ],
      "columns": [
        { "data": "c_code" },
        { "data": "c_nama" },
        { "data": "c_tahun_masuk" },
        { "data": "c_posisi" },
        { "data": "action" },
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
      $.ajax({
         type: "PUT",
         url: '{{ url("master/datapegawai/edit-pegawai") }}' + '/' + a,
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
                     url: baseUrl +'/master/datapegawai/ubahstatus',
                     type: "get",
                     dataType: "JSON",
                     data: {id:id},
                     success: function(response)
                     {
                        if(response.status == "sukses")
                        {
                           $('#tbl_pegawai').DataTable().ajax.reload();
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
