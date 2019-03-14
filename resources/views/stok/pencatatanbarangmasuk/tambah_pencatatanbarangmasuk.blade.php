@extends('main')

@section('content')

@include('stok.pencatatanbarangmasuk.modal_muatan')

<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Pencatatan Barang Masuk </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a> 
        / <span>Stok</span> 
        / <a class="{{route('pencatatanbarangmasuk')}}"><span>Pencatatan Barang Masuk</span> </a>
        / <span class="text-primary font-weight-bold">Tambah Pencatatan Barang Masuk</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                        <h3 class="title"> Tambah Pencatatan Barang Masuk </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('pencatatanbarangmasuk')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
                      </div>
                    </div>
                    <div class="card-block">
                        <section>

                          <fieldset>
                            <div class="row">

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Kode Penerimaan</label>
                              </div>

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" readonly="">
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Nota Order Pembelian</label>
                              </div>

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <select class="form-control form-control-sm select2" id="nota_order" name="nota_order" onchange="showInfoPO()">
                                    <option value="">--Pilih--</option>
                                    @foreach ($getNota as $nota)
                                      <option value="{{ $nota->po_id }}">{{ $nota->po_code }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Tanggal Order Pembelian</label>
                              </div>

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" readonly="" id="tgl_order">
                                </div>
                              </div>
                              
                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Staff</label>
                              </div>

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" readonly="">
                                </div>
                              </div>
                              
                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Suplier</label>
                              </div>

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" readonly="" id="supplier">
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Cara Bayar</label>
                              </div>

                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" readonly="" id="method">
                                </div>
                              </div>

                              <div class="col-12">
                                <button class="btn btn-primary btn-block btn-proses" type="button">Tampilkan</button>
                              </div>
                            </div>
                          </fieldset>

                          <div class="d-none" id="front-end-show">

                            <fieldset class="mt-3">

                              <h4><b>Pasir</b></h4> 
                              <span class="badge badge-pill badge-secondary">3 Rit</span>
                              <hr>

                              <div class="table-responsive mt-3">
                                
                                <table class="table table-bordered table-striped table-hover data-table" id="table_barangmasuk" cellspacing="0">
                                  <thead class="bg-primary">
                                    <tr>
                                      <th>Kode | Barang</th>
                                      <th>Tanggal Datang</th>
                                      <th>Jam Datang</th>
                                      <th>Surat Jalan</th>
                                      <th>Plat Nomor</th>
                                      <th>Detail Kendaraan</th>
                                      <th>Kubikasi Muatan Bak (m<sup>3</sup>)</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @for($j=0;$j<3;$j++)
                                      <tr>
                                        <td>BRG/1</td>
                                        <td><input type="text" class="form-control-sm form-control datepicker" name=""></td>
                                        <td><input type="text" class="form-control-sm form-control input-jam" name=""></td>
                                        <td><input type="text" class="form-control-sm form-control" name=""></td>
                                        <td>
                                          <select class="select2 form-control form-control-sm plat_no">
                                            <option value="" selected="" disabled="">--Pilih--</option>
                                            <option value="1">N 9626 UT</option>
                                          </select>
                                        </td>
                                        <td align="center">
                                          <button type="button" class="btn btn-info btn-xs btn-detail-muatan" disabled="" data-toggle="modal" data-target="#detail_muatan">Detail</button>
                                        </td>
                                        <td><input type="text" class="form-control-sm form-control muatan_bak" readonly="" name=""></td>

                                      </tr>
                                    @endfor
                                  </tbody>
                                </table>

                              </div>
                            </fieldset>


                            <fieldset class="mt-3">

                              <h4><b>Koral</b></h4> 
                              <span class="badge badge-pill badge-secondary">5 Rit</span>
                              <hr>

                              <div class="table-responsive mt-3">
                                
                                <table class="table table-bordered table-striped table-hover data-table" id="table_barangmasuk" cellspacing="0">
                                  <thead class="bg-primary">
                                    <tr>
                                      <th>Kode | Barang</th>
                                      <th>Tanggal Datang</th>
                                      <th>Jam Datang</th>
                                      <th>Surat Jalan</th>
                                      <th>Plat Nomor</th>
                                      <th>Detail Kendaraan</th>
                                      <th>Kubikasi Muatan Bak (m<sup>3</sup>)</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @for($i=0;$i<5;$i++)
                                      <tr>
                                        <td>BRG/2</td>
                                        <td><input type="text" class="form-control-sm form-control datepicker" name=""></td>
                                        <td><input type="text" class="form-control-sm form-control input-jam" name=""></td>
                                        <td><input type="text" class="form-control-sm form-control" name=""></td>
                                        <td>
                                          <select class="select2 form-control form-control-sm plat_no">
                                            <option value="" selected="" disabled="">--Pilih--</option>
                                            <option value="1">N 9626 UT</option>
                                          </select>
                                        </td>
                                        <td align="center">
                                          <button type="button" class="btn btn-info btn-xs btn-detail-muatan" disabled="" data-toggle="modal" data-target="#detail_muatan">Detail</button>
                                        </td>
                                        <td><input type="text" class="form-control-sm form-control muatan_bak" readonly="" name=""></td>

                                      </tr>

                                    @endfor
                                  </tbody>
                                </table>

                              </div>
                            </fieldset>
                          </div>

                        </section>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-warning mr-5" type="button">Close</button>
                      <button class="btn btn-primary" type="button">Simpan</button>
                      <a href="{{route('pencatatanbarangmasuk')}}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

      </div>

    </div>

  </section>

</article>

@endsection
@section('extra_script')
<script src="{{asset('modul_keuangan/js/vendor/axios_0_18_0/axios.js')}}"></script>
<script type="text/javascript">
  
  $(document).ready(function(){

    // var table = $('#table_barangmasuk').DataTable();
    var tabel_muatan = $('#tabel_muatan').DataTable({
                                          searching:false,
                                          paging:false
                                        });

    $('.btn-proses').click(function(){
      if($('#nota_order').val() === ''){
        $.toast({
          text:'Pilih Nota Terlebih Dahulu!',
          icon:'error'

        });
        $('#front-end-show').addClass('d-none');
      } else {
        $('#front-end-show').removeClass('d-none');
      }
    });

    $('.data-table tbody').on('change', '.plat_no', function(){

      var plat_no = $(this).val();

      var btn_modal = $(this).parents('tr').find('.btn-detail-muatan');

      if(plat_no != ''){
        btn_modal.attr('disabled', false);
        $(this).parents('tr').find('.muatan_bak').attr('readonly', false);
      } else {
        btn_modal.attr('disabled', true);
        $(this).parents('tr').find('.muatan_bak').val('').attr('readonly', true);
      }

    });

  });

  function showInfoPO(){

    var id = $('#nota_order').val();
    axios.get('{{ url("/stok/pencatatanbarangmasuk/getinfopo") }}'+'?id='+id).then((response) => {

      $('#tgl_order').val(response.data.info.date);
      $('#supplier').val(response.data.info.supplier);
      $('#method').val(response.data.info.method);

    })

  }

</script>
@endsection