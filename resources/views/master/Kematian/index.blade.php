@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Data Kematian </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
	    	 / <span>Master Data</span>
	    	 / <span class="text-primary" style="font-weight: bold;">Data Kematian</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">

				<div class="card">
                    <div class="card-header bordered p-2">
                    	<div class="header-block">
	                        <h3 class="title"> Data Kematian </h3>
	                    </div>
	                    <div class="header-block pull-right">
                    			<a class="btn btn-primary" href="{{route('add-kematian')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>

	                    </div>
                    </div>
                    <div class="card-block">
                        <section>


                        	<div class="table-responsive">
	                            <table class="table table-striped table-hover" cellspacing="0" id="table-kematian">
	                                <thead class="bg-primary">
	                                    <tr>
							                <th>Nik</th>
                                            <th>Nama</th>
							                <th>Tempat Meninggal</th>
							                <th>Tanggal Meninggal</th>
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

	$(document).ready(function(){
    // get kematian
    $('#table-kematian').dataTable().fnDestroy();
    $('#table-kematian').DataTable({
        responsive: true,
        serverSide: true,
        ajax: {
            url: "{{ route('get-kematian') }}",
            type: "get",
            data: {
                "_token": "{{ csrf_token() }}"
            }
        },
        columns: [{
            data: 'nik',
            "width": "20%"
        }, {
            data: 'nama',
            "width": "25%"
        }, {
            data: 'tempat_meninggal',
            "width": "20%"
        }, {
            data: 'tanggal_meninggal',
            "width": "20%"
        }, {
            data: 'action',
            "width": "15%"
        }],
        pageLength: 10,
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, 'All']
        ]
    });
    
   });

    function edit(id) {
        $.ajax({
            type: "GET",
            url: baseUrl + '/master/datacustomer/edit',
            data: {
                id: id
            },
            success: function(response) {

            },
            complete: function(argument) {
                window.location = (this.url)
            },
            error: function() {
                toastr["error"]("Terjadi Kesalahan", "Error");
            },
            // async: false
        });
    }

</script>
@endsection
