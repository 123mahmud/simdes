@extends('main')

@section('content')

<article class="content">

<div class="title-block text-primary">
  <h1 class="title"> Data Pekerjaan </h1>
  <p class="title-description">
    <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
    / <span>Data Referensi</span>
    / <span class="text-primary font-weight-bold">Reff Pekerjaan</span>
  </p>
</div>
<section class="section">
  <div class="row">
    <div class="col-12">
      
      <div class="card">
        <div class="card-header bordered p-2">
          <div class="header-block">
            <h3 class="title"> Data Pekerjaan </h3>
          </div>
          <div class="header-block pull-right">
            
            <a class="btn btn-primary" href="{{ route('create-rpekerjaan') }}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
          </div>
        </div>
        <div class="card-block">
          <section>
            
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered" cellspacing="0" id="table-pekerjaan">
                <thead class="bg-primary">
                  <tr>
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

		$('#table-pekerjaan').dataTable().fnDestroy();
    tb_barang = $('#table-pekerjaan').DataTable({
      responsive: true,
      serverSide: true,
      ajax: {
        url: "{{ route('get-rpekerjaan') }}",
        type: "get",
        data: {
          "_token": "{{ csrf_token() }}"
        }
      },
      columns: [
        {data: 'nama', "width": "80%"},
        {data: 'action', "width": "20%"}
      ],
      pageLength: 10,
      lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
    });

	});

	function edit(a) 
	{
      var parent = $(a).parents('tr');
      $.ajax({
        type: "GET",
        url: '{{ url("rpekerjaan/edit") }}' + '/' + a,
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

   function status(id)
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
                     url: "{{ route('change-rpekerjaan') }}",
                     type: "PUT",
                     dataType: "JSON",
                     data: {id:id},
                     success: function(response)
                     {
                        if(response.status == "sukses")
                        {
                           $('#table-pekerjaan').DataTable().ajax.reload();
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
