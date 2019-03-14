@extends('main')

@section('content')

<article class="content">

	<div class="title-block text-primary">
	    <h1 class="title"> Edit Data Tunjangan </h1>
	    <p class="title-description">
	    	<i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
	    	/ <span>Master</span>
	    	/ <a href="{{route('datatunjangan')}}">Data Tunjangan</a>
	    	/ <span class="text-primary font-weight-bold">Edit Data Tunjangan</span>
	     </p>
	</div>

	<section class="section">

		<div class="row">

			<div class="col-12">

				<div class="card">
                    <div class="card-header bordered p-3">
                    	<div class="header-block">
	                        <h3 class="title"> Edit Data Tunjangan </h3>
	                    </div>
	                    <div class="header-block pull-right">

                			<a href="{{route('datatunjangan')}}" class="btn btn-secondary btn-sm" ><i class="fa fa-arrow-left"></i></a>
	                    </div>
                    </div>
										<form action="{{ route('update_datatunjangan', [$data['tunjangan']->tj_id]) }}" method="post" id="myForm" autocomplete="off">
											<div class="card-block">
												<section>
													<div class="row">
														<div class="col-md-3 col-sm-4 col-12">
															<label>Nama Tunjangan</label>
														</div>
														<div class="col-md-9 col-md-8 col-12">
															<div class="form-group">
																<input type="text" class="form-control form-control-sm" name="tunjangan_name" value="{{ $data['tunjangan']->tj_name }}">
															</div>
														</div>


														<div class="col-md-3 col-sm-4 col-12">
															<label>Jumlah Tunjangan</label>
														</div>
														<div class="col-md-9 col-md-8 col-12">
															<div class="form-group">
																<input type="text" class="form-control form-control-sm text-right input-rupiah" name="tunjangan_nominal" value="{{ $data['tunjangan']->tj_nominal }}">
															</div>
														</div>
													</div>
												</section>
											</div>
											<div class="card-footer text-right">
												<button type="button" class="btn btn-primary" id="btn_simpan">Simpan</button>
												<a href="{{route('datatunjangan')}}" class="btn btn-secondary" >Kembali</i></a>
											</div>
										</form>
                </div>

			</div>

		</div>

	</section>

</article>

@endsection

@section('extra_script')
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#btn_simpan').on('click', function() {
    SubmitForm(event);
  });

  // submit form to store data in db
  function SubmitForm(event)
  {
    event.preventDefault();
    form_data = $('#myForm').serialize();

    $.ajax({
      data : form_data,
      type : "post",
      url : $("#myForm").attr('action'),
      dataType : 'json',
      success : function (response){
        if(response.status == 'berhasil'){
          $.toast({
            heading: 'Success',
            text: 'Data berhasil disimpan !',
            bgColor: '#00b894',
            textColor: 'white',
            loaderBg: '#55efc4',
            icon: 'success',
            stack: false,
            hideAfter: 1500
          });
        } else if (response.status == 'invalid') {
          $.toast({
            heading: 'Perhatian',
            text: response.message,
            bgColor: '#00b894',
            textColor: 'white',
            loaderBg: '#55efc4',
            icon: 'warning',
            stack: false,
            hideAfter: 2000
          });
        }
      },
      error : function(e){
        $.toast({
          heading: 'Warning',
          text: e.message,
          bgColor: '#00b894',
          textColor: 'white',
          loaderBg: '#55efc4',
          icon: 'warning',
          stack: false
        });
      }
    })
  }

</script>
@endsection
