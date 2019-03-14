@extends('main')

@section('content')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Edit Data Satuan </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Master Data</span>
         / <a href="{{route('datasatuan')}}"><span>Data Satuan</span></a>
         / <span class="text-primary" style="font-weight: bold;">Edit Data Satuan</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        <form id="formsukses">
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                        <h3 class="title">Tambah Data Satuan</h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('datasatuan')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                      </div>
                    </div>

                    <div class="card-block">
                        <section>
                        

                          <div class="row">

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Kode Satuan</label>
                            </div>

                            <div class="col-md-9 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="kodesatuan" readonly="" value="{{$data['satuan']->s_code}}">
                              </div>
                            </div>


                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <label>Nama Satuan</label>
                            </div>

                            <div class="col-md-9 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="nama_satuan" value="{{$data['satuan']->s_name}}"> <input type="hidden" name="idtransaksi" value="{{$data['satuan']->s_id}}"> 
                              </div>
                            </div>
                          </div>

                          
                        </section>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary btn-submit" type="button">Simpan</button>
                      <a href="{{route('datasatuan')}}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
              </form>
      </div>

    </div>

  </section>

</article>

@endsection
@section('extra_script')
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '.btn-submit', function(){
       form_data = $('#formsukses').serialize();
      console.log(form_data);
     $.confirm({
        animation: 'RotateY',
        closeAnimation: 'scale',
        icon: 'fa fa-disc',
          title: 'Simpan',
        content: 'Apa anda yakin mau Update data ini?',
        theme: 'disable',
          buttons: {
              info: {
            btnClass: 'btn-blue',
                text:'Ya',
                action : function(){
                 
                    $.ajax({
                      data : form_data,
                      url : baseUrl + '/master/datasatuan/update',
                      dataType : "json",
                      type : "post",
                      success : function(response){

                        $.toast({
                            heading: 'Success',
                            text: 'Data Berhasil di Update',
                            bgColor: '#00b894',
                            textColor: 'white',
                            loaderBg: '#55efc4',
                            icon: 'success'
                          })

                          setTimeout(function(){
                          window.location.href = baseUrl + '/master/datasatuan/datasatuan';
                            
                            },500);
                      }
                    });
             
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
  });
  });


$.ajaxSetup({
     headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    });

</script>
@endsection