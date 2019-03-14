<script>
  function count_grandtotal() {
    var qty = $('[name="podt_qty[]"]');
      var price = $('[name="podt_price[]"]');
      var item_qty, item_price, total_gross = 0, total_net = 0;

      for(x = 0;x < qty.length;x++) {
        item_qty =  $( qty[x] ).val() ;
        item_qty = item_qty != '' ? parseInt(item_qty) : 0;
        item_price = $( price[x] ).val() ;
        item_price = item_price.replace(/\D/g, '') ;
        item_price = item_price != '' ? parseInt(item_price) : 0;
        total_gross += ( item_qty * item_price );
      }

      var disc_value = $('#po_disc_value').val();
      var disc_percent = $('#po_disc_percent').val();
      var tax_percent = $('#po_tax_percent').val();
      disc_value = disc_value.replace(/\D/g, '');
      disc_value = disc_value != '' ? parseInt(disc_value) : 0;
      disc_percent = disc_percent != '' ? parseInt(disc_percent) : 0;
      disc_percent = disc_percent / 100;
      tax_percent = tax_percent != '' ? parseInt(tax_percent) : 0;
      tax_percent = tax_percent / 100;

      var result_disc = (total_gross - disc_value) * disc_percent;
      var result_tax = result_disc * tax_percent;
      total_net = total_gross - disc_value - result_disc + result_tax;  

      $('#po_total_gross').val(
        'Rp. ' + accounting.formatMoney(total_gross,"",0,'.',',')
      );
      $('#po_total_net').val(
        'Rp. ' + accounting.formatMoney(total_net,"",0,'.',',')
      );
  }

  function remove_detail(obj) {
    var tr = $(obj).parents('tr');
    table_purchase_order_dt.row(tr).remove().draw();
  }

	// Function untuk meng-insert sales plan
  function insert_purchase_order() {
    var data = $('#form_purchase_order').serialize();
    $.ajax({
      url: "{{ url('/purchasing/orderpembelian/insert_d_purchase_order') }}",
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

  function update_purchase_order() {
    var data = $('#form_purchase_order').serialize();
    $.ajax({
      url: "{{ url('/purchasing/orderpembelian/update_d_purchase_order') }}",
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
            location.href = '{{ route('orderpembelian') }}';
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
  

</script>