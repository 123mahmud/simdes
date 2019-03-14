@extends('main')

@section('content')


<article class="content">

  <div class="title-block text-primary">
      <h1 class="title"> Tambah Item ke Suplier </h1>
      <p class="title-description">
        <i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a>
         / <span>Suplier</span>
         / <a href="{{route('barangsuplier')}}"><span>Item Barang Suplier</span></a>
         / <span class="text-primary" style="font-weight: bold;">Tambah Item ke Suplier</span>
       </p>
  </div>

  <section class="section">

    <div class="row">

      <div class="col-12">
        
        <div class="card">
                    <div class="card-header bordered p-2">
                      <div class="header-block">
                        <h3 class="title">Tambah Item ke Suplier </h3>
                      </div>
                      <div class="header-block pull-right">
                        <a href="{{route('barangsuplier')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
                      </div>
                    </div>
                    <div class="card-block">
                        <section>

                          <div class="row">

                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <label class="font-weight-bold">Nama Barang</label>
                            </div>

                            <div class="col-md-9 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <select class="form-control-sm form-control select2">
                                  <option value="">-Pilih-</option>
                                  <option value="1">Semen</option>
                                  <option value="2">Cat</option>
                                  <option value="3">Pasir</option>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                              <label class="font-weight-bold">Daftar Supplier (Ceklist pada supplier terpilih)</label>
                            </div>

                            <div class="col-md-6 col-sm-12 text-right mb-3">
                              <button class="btn btn-primary btn-checkall btn-sm" type="button">Check all</button>
                              <button class="btn btn-secondary btn-uncheckall btn-sm" type="button">Uncheck all</button>
                            </div>

                          </div>

                          <div class="row" id="daftar_suplier">

                            <div class="col-md-6 col-xs-12">
                              <label><input type="checkbox" class="checkbox" name="suplier[]" value=""><span>Alpha</span></label>
                            </div>

                            <div class="col-md-6 col-xs-12">
                              <label><input type="checkbox" class="checkbox" name="suplier[]" value=""><span>Bravo</span></label>
                            </div>

                            <div class="col-md-6 col-xs-12">
                              <label><input type="checkbox" class="checkbox" name="suplier[]" value=""><span>Charlie</span></label>
                            </div>

                            <div class="col-md-6 col-xs-12">
                              <label><input type="checkbox" class="checkbox" name="suplier[]" value=""><span>Delta</span></label>
                            </div>

                          </div>

                        </section>
                    </div>

                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="button">Simpan</button>
                      <a href="{{route('barangsuplier')}}" class="btn btn-secondary">Kembali</a>
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
    $('.btn-checkall').click(function(){
      $('#daftar_suplier').find('input[type="checkbox"]').prop('checked', true);
    });
    $('.btn-uncheckall').click(function(){
      $('#daftar_suplier').find('input[type="checkbox"]').prop('checked', false);
    });
  });
</script>
@endsection