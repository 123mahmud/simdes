<script>
	// Function untuk meng-insert sales plan
  function insert_purchase_plan() {
    var data = $('#form_purchase_plan').serialize();
    $.ajax({
      url: "{{ url('/purchasing/rencanapembelian/insert_d_purchase_plan') }}",
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (response) {
        if(response.status == 'sukses') {
          
          $.toast({  
            heading: 'Sukses',
            text: 'Data berhasil disimpan',
            icon: 'success'
          });

          setTimeout(function(){
            location.reload();
          }, 3000);
        }
        else {
          $.toast({
            heading: 'Error',
            text: 'Terjadi kesalahan',
            bgColor: '#d63031',
            textColor: 'white',
            loaderBg: '#ff7675',
            icon: 'error'
          });          
        }
      }
    });
  }

  
  

  // Function untuk menghitung grand total ketika menambahkan atau mengurangi item
  function append_purchase_plan_dt() {
      // Validasi
      var last_item = $('[name="ppdt_item[]"]:last'); 
      var last_qty = $('[name="ppdt_qty[]"]:last'); 
      if(last_item.val() == '' || last_item.val() == null) {
        $.toast({
          heading: 'Error',
          text: 'Nama item harus diisi',
          bgColor: '#d63031',
          textColor: 'white',
          loaderBg: '#ff7675',
          icon: 'error'
        });
      }
      else if(last_qty.val() == '' ||last_qty.val() == null || last_qty.val() == 0){
        $.toast({
          heading: 'Error',
          text: 'Jumlah item tidak boleh kosong',
          bgColor: '#d63031',
          textColor: 'white',
          loaderBg: '#ff7675',
          icon: 'error'
        })

      }
      else {

        var ppdt_item = '<select class="form-control form-control-sm" name="ppdt_item[]"></select>';
        var ppdt_qty = '<input type="number" class="text-right form-control form-control-sm" name="ppdt_qty[]">';
        var ppdt_satuan = '<select class="form-control form-control-sm" name="ppdt_satuan[]"></select>';
        var ppdt_prev_price = '<input type="text" class="form-control form-control-sm text-right" name="ppdt_prev_price[]" readonly>';
        var stock = '<input type="text" class="text-right form-control form-control-sm" name="stock[]" readonly>';
        var btn = '<div class="btn-group"><button title="Tambah Item" class="btn btn-primary btn-tambah" onclick="append_purchase_plan_dt()" type="button"><i class="fa fa-plus"></i></button><button class="btn btn-danger" onclick="remove_purchase_plan_dt(this)" type="button" title="Hapus Item"><i class="fa fa-trash-o"></i></button></div>';

        table_purchase_plan_dt.row.add([
          ppdt_item, ppdt_qty, ppdt_satuan, ppdt_prev_price, stock, btn
        ]).draw();
      }
  }

  function remove_purchase_plan_dt(obj) {
    var tr = $(obj).parents('tr');
    table_purchase_plan_dt.row(tr).remove().draw();
  }
</script>