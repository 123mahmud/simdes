<script>
  $(document).ready(function(){
    table_purchase_plan_dt = $('#table_purchase_plan_dt').DataTable({
      "createdRow": function( row, data, dataIndex ) {
            // Function untuk mengkalkulasi subtotal dan grand total
                var ppdt_item = $(row).find('[name="ppdt_item[]"]');
                console.log(ppdt_item);
                ppdt_item.select2({
                  width : '100%',
                  placeholder: "Pilih Barang",
                  ajax: {
                    url: '{{ url("/purchasing/rencanapembelian/find_m_item") }}',
                    dataType: 'json',
                    data: function (params) {
                      return {
                          keyword: $.trim(params.term)
                      }
                  },
                  processResults: function (res) {
                        for(x in res.data) {
                          res.data[x].id = res.data[x].i_id; 
                          res.data[x].text = res.data[x].i_code + ' | ' + res.data[x].i_name; 
                        }
                        return {
                            results: res.data
                        };
                  },
                  cache: true
                 } 
                });



              ppdt_item.change(function(){
                // Memproses daftar satuan
                var idkey, textkey, option;
                var item_data = $(this).select2('data')[0];
                var tr = $(this).parents('tr');
                var ppdt_satuan = tr.find('[name="ppdt_satuan[]"]');
                ppdt_satuan.html('<option value="">-- Pilih Satuan --</option>')
                for(x = 1;x < 4;x++) {
                  idkey = 'i_sat' + x;
                  textkey = 'i_sat' + x + '_label';
                  option = $('<option value="' + item_data[idkey] + '">' + item_data[textkey] + '</option>');
                  ppdt_satuan.append(option);
                }

                // Memproses harga barang sebelumnya
                var ppdt_prev_price = tr.find('[name="ppdt_prev_price[]"]');
                var prev_price = 'Rp. ' + accounting.formatMoney(item_data.prev_price,"",0,'.',',')
                ppdt_prev_price.val( prev_price );
                

                // Memproses stok
                var stock = tr.find('[name="stock[]"]');
                stock.val( item_data.stock );
              });
        }
    });

    $('#pp_supplier').select2({
      placeholder: "Pilih Supplier",
      ajax: {
        url: '{{ url("/purchasing/rencanapembelian/find_m_supplier") }}',
        dataType: 'json',
        data: function (params) {
          return {
              keyword: $.trim(params.term)
          }
        },
        processResults: function (res) {
            for(x in res.data) {
              res.data[x].id = res.data[x].s_id; 
              res.data[x].text = res.data[x].s_name; 
            }
            return {
                results: res.data
            };
        }
     }, 
    });
  });
</script>