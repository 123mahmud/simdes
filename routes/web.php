<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest', 'web']], function() {
Route::get('/', function () {
	return view('auth.login');
})->name('login');
	Route::post('login', 'loginController@authenticate');
	Route::get('recruitment', 'RecruitmentController@recruitment');
	Route::post('recruitment/save', 'RecruitmentController@save');
	Route::get('recruitment/cek-email', 'RecruitmentController@cekEmail');
	Route::get('recruitment/cek-wa', 'RecruitmentController@cekWa');
});

Route::group(['middleware' => ['auth', 'web']], function() {
	Route::get('/session-set-comp/{id}','mMemberController@setComp');
	Route::get('not-allowed', 'mMemberController@notAllowed');
	Route::post('logout', 'mMemberController@logout')->middleware('auth');;
	Route::get('/home', 'HomeController@index')->name('home');
// Penduduk
	Route::get('master/penduduk/index', 'Master\pendudukController@index')->name('penduduk');
	Route::get('penduduk/list', 'Master\pendudukController@get')->name('get-penduduk');
	Route::get('penduduk/create', 'Master\pendudukController@create')->name('create-penduduk');
	Route::get('penduduk/edit/{id}', 'Master\pendudukController@edit_databarang');
	Route::get('penduduk/tipe_barang', 'Master\pendudukController@tipe_barang');
	Route::post('penduduk/save', 'Master\pendudukController@save_barang');
	Route::post('penduduk/update', 'Master\pendudukController@update');
	Route::get('penduduk/disabled', 'Master\pendudukController@disabled');
// Kelahiran
	Route::get('master/kelahiran/index', 'Master\kelahiranController@index')->name('kelahiran');
	Route::get('kelahiran/get', 'Master\kelahiranController@get')->name('get-kelahiran');
	Route::get('kelahiran/create', 'Master\kelahiranController@create')->name('create-kelahiran');
	Route::get('kelahiran/edit', 'Master\kelahiranController@edit')->name('edit_kelahiran');
	Route::get('kelahiran/save', 'Master\kelahiranController@save_datasupplier')->name('edit_kelahiran');
	Route::get('kelahiran/disabled', 'Master\kelahiranController@disabled');
	Route::get('kelahiran/update', 'Master\kelahiranController@update');
// Kematian
	Route::get('master/kematian/index', 'Master\kematianController@index')->name('kematian');
	Route::get('kematian/get', 'Master\kematianController@get')->name('get-kematian');
	Route::get('kematian/create', 'Master\kematianController@create')->name('create-kematian');
	Route::get('kematian/save', 'Master\kematianController@store')->name('simpan-kematian');
	Route::get('kematian/update', 'Master\kematianController@update');
	Route::get('kematian/ubahstatus', 'Master\kematianController@ubahStatus');
	Route::get('kematian/edit', 'Master\kematianController@editCustomer');
	
// Penduduk Masuk
	Route::get('master/pmasuk/index', 'Master\pendudukMasukController@index')->name('pmasuk');
	Route::get('pmasuk/create', 'Master\pendudukMasukController@create')->name('create-pmasuk');

// Penduduk Keluar
	Route::get('/master/pkeluar/index', 'Master\pendudukKeluarController@index')->name('pkeluar');
	Route::get('pkeluar/get', 'Master\pendudukKeluarController@get')->name('get-pkeluar');
	Route::get('pkeluar/create', 'Master\pendudukKeluarController@create')->name('create-pkeluar');

// Master Pegawai
	Route::get('/master/datapegawai/datapegawai', 'MasterController@datapegawai')->name('datapegawai');
	Route::get('/master/datapegawai/tambah_datapegawai', 'MasterController@tambah_datapegawai')->name('tambah_datapegawai');
	Route::get('/master/datapegawai/edit_datapegawai', 'MasterController@edit_datapegawai')->name('edit_datapegawai');
	
//pindah Rt
	Route::get('/master/datamesin/datamesin', 'Master\pindahRtController@index')->name('datamesin');
	Route::get('/master/datamesin/tambah_datamesin', 'Master\pindahRtController@tambah_datamesin')->name('tambah_datamesin');
	Route::get('/master/datamesin/edit_datamesin', 'Master\pindahRtController@edit_datamesin')->name('edit_datamesin');
	Route::get('/master/datamesin/table', 'Master\pindahRtController@table');
	Route::get('/master/datamesin/simpan', 'Master\pindahRtController@simpanMesin');
	Route::get('/master/datamesin/edit/{id}', 'Master\pindahRtController@editDataMesin');
	Route::get('/master/datamesin/update/{id}', 'Master\pindahRtController@updateDataMesin');
	Route::get('/master/datamesin/status', 'Master\pindahRtController@ubahStatus');

//mahmud pegawai
	Route::get('/master/datapegawai/index', 'Master\PegawaiController@pegawai')->name('datapegawai');
	Route::get('/master/datapegawai/tambah-pegawai', 'Master\PegawaiController@tambahPegawai');
	Route::get('/master/datapegawai/simpan-pegawai', 'Master\PegawaiController@simpanPegawai');
	Route::get('/master/datapegawai/datatable-pegawai', 'Master\PegawaiController@pegawaiData');
	Route::get('/master/datapegawai/edit-pegawai/{id}', 'Master\PegawaiController@editPegawai');
	Route::get('/master/datapegawai/update-pegawai/{id}', 'Master\PegawaiController@updatePegawai');
	Route::get('/master/datapegawai/ubahstatus', 'Master\PegawaiController@ubahStatusMan');
//mahmud jabatan
	Route::get('/master/datajabatan/index', 'Master\JabatanController@index')->name('datajabatan');
	Route::get('/master/datajabatan/create', 'Master\JabatanController@tambahJabatan')->name('tambah_datajabatan');
	Route::get('/master/datajabatan/simpan-jabatan', 'Master\JabatanController@simpanJabatan');
	Route::get('/master/datajabatan/edit-jabatan/{id}', 'Master\JabatanController@editJabatan');
	Route::get('/master/datajabatan/update-jabatan/{id}', 'Master\JabatanController@updateJabatan');
	Route::get('/master/datajabatan/data-jabatan', 'Master\JabatanController@jabatanData');
	Route::get('/master/datajabatanman/ubahstatus', 'Master\JabatanController@ubahStatusMan');


	// Purchasing

	// Rencana pembelian 'mahmud'
	Route::get('/purchasing/rencanapembelian/rencanapembelian', 'Purchasing\purchasePlanController@planIndex')->name('rencanapembelian');
	Route::get('/purcahse-plan/data-plan', 'Purchasing\purchasePlanController@dataPlan');
	Route::get('/purchasing/rencanapembelian/get-detail-plan/{id}/{type}', 'Purchasing\purchasePlanController@getDetailPlan');
	Route::get('/purchasing/rencanapembelian/tambah_rencanapembelian', 'Purchasing\purchasePlanController@tambah_rencanapembelian')->name('tambah_rencanapembelian');
	Route::get('/seach-item-purchase', 'Purchasing\purchasePlanController@seachItemPurchase');
	Route::get('/purcahse-plan/store-plan', 'Purchasing\purchasePlanController@storePlan');
	Route::get('/purcahse-plan/get-edit-plan', 'Purchasing\purchasePlanController@getEditPlan')->middleware('auth');
	Route::get('/purcahse-plan/update', 'Purchasing\purchasePlanController@updatePlan');
	Route::get('/purcahse-plan/get-delete-plan/{id}', 'Purchasing\purchasePlanController@deletePlan')->middleware('auth');
	Route::get('/purchasing/rencanapembelian/get-data-tabel-history/{tgl1}/{tgl2}/{tampil}', 'Purchasing\purchasePlanController@getDataTabelHistory');
	//end
	// Order pembelian
	Route::get('/purchasing/orderpembelian/orderpembelian', 'Purchasing\purchaseOrderController@orderpembelian')->name('orderpembelian');
	// Route::get('/purchasing/orderpembelian/tambah_orderpembelian', 'Purchasing\OrderPembelianController@tambah_orderpembelian')->name('tambah_orderpembelian');
	// Route::get('/purchasing/orderpembelian/edit_orderpembelian/{id}', 'Purchasing\OrderPembelianController@edit_orderpembelian')->name('edit_orderpembelian');
	// Route::get('/purchasing/orderpembelian/preview_orderpembelian/{id}', 'Purchasing\OrderPembelianController@preview_orderpembelian')->name('preview_orderpembelian');
	// Route::get('/purchasing/orderpembelian/edit_orderpembelian/{id}', 'Purchasing\OrderPembelianController@edit_orderpembelian')->name('edit_orderpembelian');
	// Route::get('/purchasing/orderpembelian/find_d_purchase_order', 'Purchasing\OrderPembelianController@find_d_purchase_order')->middleware('auth');
	// Route::get('/purchasing/orderpembelian/find_d_purchase_order_dt', 'Purchasing\OrderPembelianController@find_d_purchase_order_dt')->middleware('auth')->name('find_d_purchase_order_dt');
	// Route::get('/purchasing/orderpembelian/delete_d_purchase_order/{id}', 'Purchasing\OrderPembelianController@delete_d_purchase_order')->middleware('auth');
	// Route::get('/purchasing/orderpembelian/find_m_item', 'Purchasing\OrderPembelianController@find_m_item')->middleware('auth');
	// Route::post('/purchasing/orderpembelian/insert_d_purchase_order', 'Purchasing\OrderPembelianController@insert_d_purchase_order')->middleware('auth')->name('insert_d_purchase_order');
	// Route::post('/purchasing/orderpembelian/update_d_purchase_order', 'Purchasing\OrderPembelianController@update_d_purchase_order')->middleware('auth')->name('update_d_purchase_order');
	// Route::get('/purchasing/orderpembelian/approve_d_purchase_order', 'Purchasing\OrderPembelianController@approve_d_purchase_order')->middleware('auth')->name('approve_d_purchase_order');
	// Route::get('/purchasing/orderpembelian/find_m_supplier', 'Purchasing\OrderPembelianController@find_m_supplier')->middleware('auth');

	// Route::get('/purchasing/orderpembelian/tambah_orderpembelian_tanparencana', 'Purchasing\OrderPembelianController@tambah_orderpembelian_tanparencana')->name('tambah_orderpembelian_tanparencana');
	//Mahmud
	Route::get('/purchasing/orderpembelian/get-data-rencana-beli', 'Purchasing\purchaseOrderController@getDataRencanaBeli');
	Route::get('/purchasing/rencanapembelian/get-supplierorder', 'Purchasing\purchaseOrderController@getDataSupplier');
	Route::get('/purchasing/orderpembelian/get-data-form/{id}', 'Purchasing\purchaseOrderController@getDataForm');
	Route::get('/purchasing/orderpembelian/get-order-by-tgl/{tgl1}/{tgl2}', 'Purchasing\purchaseOrderController@getOrderByTgl');
	Route::get('/purchasing/orderpembelian/get-data-tabel-history/{tgl1}/{tgl2}/{tampil}', 'Purchasing\purchaseOrderController@getDataTabelHistory');
	Route::get('/purchasing/orderpembelian/get-data-detail/{id}', 'Purchasing\purchaseOrderController@getDataDetail');
	Route::get('/purchasing/orderpembelian/get-edit-order/{id}', 'Purchasing\purchaseOrderController@getEditOrder');
	Route::post('/purchasing/orderpembelian/delete-data-order', 'Purchasing\purchaseOrderController@deleteDataOrder');
	/*Purchasing order*/
	Route::get('/purcahse-order/order-index', 'Purchasing\purchaseOrderController@orderIndex')->middleware('auth');
	Route::get('/purcahse-order/data-order', 'Purchasing\purchaseOrderController@dataOrder')->middleware('auth');
	Route::get('/purcahse-order/form-order', 'Purchasing\purchaseOrderController@formOrder')->middleware('auth');
	Route::get('/purcahse-order/get-data-form/{id}', 'Purchasing\purchaseOrderController@getDataForm')->middleware('auth');
	Route::get('/purcahse-order/get-data-detail/{id}', 'Purchasing\purchaseOrderController@getDataDetail')->middleware('auth');
	Route::get('/purcahse-order/get-data-edit/{id}', 'Purchasing\purchaseOrderController@getDataEdit')->middleware('auth');
	Route::get('/purcahse-order/get-data-code-plan', 'Purchasing\purchaseOrderController@getDataCodePlan')->middleware('auth');
	Route::get('/purcahse-order/seach-supplier', 'Purchasing\purchaseOrderController@seachSupplier')->middleware('auth');
	Route::get('/purcahse-order/delete-data-order', 'Purchasing\purchaseOrderController@deleteDataOrder')->middleware('auth');
	Route::get('/purcahse-order/save-po', 'Purchasing\purchaseOrderController@savePo')->middleware('auth');
	Route::get('/purchasing/orderpembelian/print/{id}', 'Purchasing\purchaseOrderController@print');

	// Return pembelian
	Route::get('/purchasing/returnpembelian/returnpembelian', 'Purchasing\ReturnPembelianController@returnpembelian')->name('returnpembelian');
		Route::get('/purchasing/returnpembelian/tambah_returnpembelian', 'Purchasing\ReturnPembelianController@tambah_returnpembelian')->name('tambah_returnpembelian');
	Route::get('/purchasing/returnpembelian/preview_returnpembelian/{id}', 'Purchasing\ReturnPembelianController@preview_returnpembelian')->name('preview_returnpembelian');
	Route::get('/purchasing/returnpembelian/edit_returnpembelian/{id}', 'Purchasing\ReturnPembelianController@edit_returnpembelian')->name('edit_returnpembelian');
	Route::get('/purchasing/returnpembelian/find_d_purchase_return', 'Purchasing\ReturnPembelianController@find_d_purchase_return')->middleware('auth');
	Route::get('/purchasing/returnpembelian/delete_d_purchase_return/{id}', 'Purchasing\ReturnPembelianController@delete_d_purchase_return')->middleware('auth');
	Route::get('/purchasing/returnpembelian/find_m_item', 'Purchasing\ReturnPembelianController@find_m_item')->middleware('auth');
	Route::post('/purchasing/returnpembelian/insert_d_purchase_return', 'Purchasing\ReturnPembelianController@insert_d_purchase_return')->middleware('auth')->name('insert_d_purchase_return');
	Route::post('/purchasing/returnpembelian/update_d_purchase_return', 'Purchasing\ReturnPembelianController@update_d_purchase_return')->middleware('auth')->name('update_d_purchase_return');
	Route::get('/purchasing/returnpembelian/approve_d_purchase_return', 'Purchasing\ReturnPembelianController@approve_d_purchase_return')->middleware('auth')->name('approve_d_purchase_return');
	Route::get('/purchasing/returnpembelian/find_m_supplier', 'Purchasing\ReturnPembelianController@find_m_supplier')->middleware('auth');
	Route::get('/purchasing/returnpembelian/find_d_purchase_order', 'Purchasing\ReturnPembelianController@find_d_purchase_order')->middleware('auth');
	Route::get('/purchasing/returnpembelian/preview_orderpembelian/{id}', 'Purchasing\ReturnPembelianController@preview_orderpembelian')->middleware('auth');

	// Rencana bahan baku
	Route::get('/purchasing/rencanabahanbaku/rencanabahanbaku', 'PurchaseController@rencanabahanbaku')->name('rencanabahanbaku');


	// Stok
	Route::get('/stok/dataadonan/index', 'StokController@dataadonan')->name('dataadonan');
	Route::get('/stok/dataadonan/create', 'StokController@tambah_dataadonan')->name('tambah_dataadonan');
	Route::get('/stok/dataadonan/edit', 'StokController@edit_dataadonan')->name('edit_dataadonan');
	Route::get('/stok/pencatatanbarangmasuk/index', 'StokController@pencatatanbarangmasuk')->name('pencatatanbarangmasuk');
	Route::match(['get', 'post'],'/stok/pencatatanbarangmasuk/create', 'StokController@tambah_pencatatanbarangmasuk')->name('tambah_pencatatanbarangmasuk');
	Route::get('/stok/pencatatanbarangmasuk/getinfopo', 'StokController@getinfopo')->name('getinfopo');
	Route::get('/stok/pencatatanbarangmasuk/getpbdt', 'StokController@getpbdt')->name('getpbdt');
	Route::get('/stok/penggunaanbahanbaku/index', 'StokController@penggunaanbahanbaku')->name('penggunaanbahanbaku');
	Route::get('/stok/penggunaanbahanbaku/create', 'StokController@tambah_penggunaanbahanbaku')->name('tambah_penggunaanbahanbaku');
	Route::get('/stok/tipemenghitunghpp/index', 'StokController@tipemenghitunghpp')->name('tipemenghitunghpp');
	Route::get('/stok/stockgudang/index', 'StokController@stockgudang')->name('stockgudang.index');
	//opname
	Route::get('/stok/opnamebahanbaku/index', 'Stok\stockOpnameController@index')->name('opnamebahanbaku');
	Route::get('/inventory/stockopname/opname', 'Stok\stockOpnameController@index');
    Route::get('/inventory/namaitem/autocomplite/{x}/{y}', 'Stok\stockOpnameController@tableOpname');
    Route::get('/inventory/namaitem/simpanopname', 'Stok\stockOpnameController@saveOpname');
    Route::get('/inventory/namaitem/simpanopname/laporan', 'Stok\stockOpnameController@saveOpnameLaporan');
    Route::get('/inventory/namaitem/updateLap/{id}', 'Stok\stockOpnameController@updateOpname');
    Route::get('/inventory/namaitem/history/{tgl1}/{tgl2}/{jenis}/{gudang}', 'Stok\stockOpnameController@history');
    Route::get('/inventory/namaitem/detail', 'Stok\stockOpnameController@getOPname');
    Route::get('/inventory/stockopname/hapusLaporan/{id}', 'Stok\stockOpnameController@hapusLapOpname');
    Route::get('/inventory/stockopname/editopname/{id}', 'Stok\stockOpnameController@editLaporan');
    Route::get('/inventory/namaitem/simpanopname/pengajuan', 'Stok\stockOpnameController@simpanPengajuan');
    Route::get('/inventory/namaitem/confirm/{tgl1}/{tgl2}/{gudang}', 'Stok\stockOpnameController@tableConfirm');
    Route::get('/inventory/namaitem/detail/confirm', 'Stok\stockOpnameController@getConfirm');
    Route::get('/inventory/simpanopname/update/status/{id}', 'Stok\stockOpnameController@updateStatusConfirm');
    Route::get('/inventory/namaitem/ubahstok/{id}', 'Stok\stockOpnameController@updateStock');

	// Produksi
	Route::get('/produksi/pencatatanhasil/index', 'ProduksiController@pencatatanhasil')->name('pencatatanhasil');
	Route::get('/produksi/pencatatanhasil/denganrencana/process', 'ProduksiController@proses_pencatatanhasil')->name('proses_pencatatanhasil');
	Route::get('/produksi/pencatatanhasil/tanparencana/process', 'ProduksiController@proses_pencatatanhasiltanparencana')->name('proses_pencatatanhasiltanparencana');
	Route::get('/produksi/perencanaanproduksi/perencanaanproduksi', 'ProduksiController@perencanaanproduksi')->name('perencanaanproduksi');
	Route::get('/produksi/produksirencana/index', 'ProduksiController@produksirencana')->name('produksirencana');
	Route::get('/produksi/produksirencana/create', 'ProduksiController@tambah_produksirencana')->name('tambah_produksirencana');
	Route::get('/produksi/produksitanparencana/index', 'ProduksiController@produksitanparencana')->name('produksitanparencana');
	Route::get('/produksi/produksitanparencana/create', 'ProduksiController@tambah_produksitanparencana')->name('tambah_produksitanparencana');
	Route::get('/produksi/upahboronganproduksi/upahboronganproduksi', 'ProduksiController@upahboronganproduksi')->name('upahboronganproduksi');
	Route::get('/produksi/upahboronganproduksi/tambah_upahboronganproduksi', 'ProduksiController@tambah_upahboronganproduksi')->name('tambah_upahboronganproduksi');
	Route::get('/produksi/spk/spk', 'ProduksiController@spk')->name('spk_produksi');

	// Customer
	Route::get('/customer/historitransaksi/index', 'CustomerController@historitransaksi')->name('historitransaksi');

	// Penjualan
  Route::get('/penjualan/penjualanorder/index', 'Penjualan\PenjualanOrderController@index')->name('penjualanorder');
  Route::get('/penjualan/penjualanorder/getListPenjualan', 'Penjualan\PenjualanOrderController@getListPenjualan')->name('penjualanorder.getlistpenjualan');
  Route::get('/penjualan/penjualanorder/getLaporanPenjualan', 'Penjualan\PenjualanOrderController@getLaporanPenjualan')->name('penjualanorder.getlaporanpenjualan');
  Route::get('/penjualan/penjualanorder/getCustomers', 'Penjualan\PenjualanOrderController@getCustomers')->name('penjualanorder.getcustomers');
  Route::get('/penjualan/penjualanorder/getItems', 'Penjualan\PenjualanOrderController@getItems')->name('penjualanorder.getitems');
  Route::get('/penjualan/penjualanorder/getStock', 'Penjualan\PenjualanOrderController@getStock')->name('penjualanorder.getstock');
  Route::get('/penjualan/penjualanorder/getPrice', 'Penjualan\PenjualanOrderController@getPrice')->name('penjualanorder.getprice');
	Route::post('/penjualan/penjualanorder/store', 'Penjualan\PenjualanOrderController@store')->name('penjualanorder.store');
	Route::get('/penjualan/penjualanorder/getDetailPenjualan/{id}', 'Penjualan\PenjualanOrderController@getDetailPenjualan')->name('penjualanorder.getdetailpenjualan');
	Route::get('/penjualan/penjualanorder/edit/{id}', 'Penjualan\PenjualanOrderController@edit')->name('penjualanorder.edit');
	Route::post('/penjualan/penjualanorder/update/{id}', 'Penjualan\PenjualanOrderController@update')->name('penjualanorder.update');
	Route::post('/penjualan/penjualanorder/printLaporan', 'Penjualan\PenjualanOrderController@printLaporan')->name('penjualanorder.printlaporan');
	Route::post('/penjualan/penjualanorder/exportToExcel', 'Penjualan\PenjualanOrderController@exportToExcel')->name('penjualanorder.exporttoexcel');
	Route::post('/penjualan/penjualanorder/exportToPdf', 'Penjualan\PenjualanOrderController@exportToPdf')->name('penjualanorder.exporttopdf');

	Route::get('/penjualan/penjualantanpaorder/index', 'Penjualan\PenjualanTOController@index')->name('penjualantanpaorder');
	Route::get('/penjualan/penjualantanpaorder/getListPenjualan', 'Penjualan\PenjualanTOController@getListPenjualan')->name('penjualantanpaorder.getlistpenjualan');
  Route::get('/penjualan/penjualantanpaorder/getLaporanPenjualan', 'Penjualan\PenjualanTOController@getLaporanPenjualan')->name('penjualantanpaorder.getlaporanpenjualan');
  Route::get('/penjualan/penjualantanpaorder/getCustomers', 'Penjualan\PenjualanTOController@getCustomers')->name('penjualantanpaorder.getcustomers');
  Route::get('/penjualan/penjualantanpaorder/getItems', 'Penjualan\PenjualanTOController@getItems')->name('penjualantanpaorder.getitems');
  Route::get('/penjualan/penjualantanpaorder/getStock', 'Penjualan\PenjualanTOController@getStock')->name('penjualantanpaorder.getstock');
  Route::get('/penjualan/penjualantanpaorder/getPrice', 'Penjualan\PenjualanTOController@getPrice')->name('penjualantanpaorder.getprice');
	Route::get('/penjualan/penjualantanpaorder/create', 'Penjualan\PenjualanTOController@create')->name('penjualantanpaorder.create');
	Route::post('/penjualan/penjualantanpaorder/store', 'Penjualan\PenjualanTOController@store')->name('penjualantanpaorder.store');
	Route::get('/penjualan/penjualantanpaorder/getDetailPenjualan/{id}', 'Penjualan\PenjualanTOController@getDetailPenjualan')->name('penjualantanpaorder.getdetailpenjualan');
	Route::post('/penjualan/penjualantanpaorder/printLaporan', 'Penjualan\PenjualanTOController@printLaporan')->name('penjualantanpaorder.printlaporan');
	Route::post('/penjualan/penjualantanpaorder/exportToExcel', 'Penjualan\PenjualanTOController@exportToExcel')->name('penjualantanpaorder.exporttoexcel');
	Route::post('/penjualan/penjualantanpaorder/exportToPdf', 'Penjualan\PenjualanTOController@exportToPdf')->name('penjualantanpaorder.exporttopdf');

	Route::get('/penjualan/diskonpenjualan/index', 'PenjualanController@diskonpenjualan')->name('diskonpenjualan');
	Route::get('/penjualan/diskonpenjualan/create', 'PenjualanController@tambah_diskonpenjualan')->name('tambah_diskonpenjualan');
	Route::get('/penjualan/penjualanproject/index', 'PenjualanController@penjualanproject')->name('penjualanproject');

	Route::get('/penjualan/returnpenjualan/index', 'Penjualan\PenjualanReturnController@index')->name('returnpenjualan');
	Route::get('/penjualan/returnpenjualan/create', 'Penjualan\PenjualanReturnController@create')->name('returnpenjualan.create');
	Route::get('/penjualan/returnpenjualan/getSales', 'Penjualan\PenjualanReturnController@getSales')->name('returnpenjualan.getsales');
	Route::post('/penjualan/returnpenjualan/store', 'Penjualan\PenjualanReturnController@store')->name('returnpenjualan.store');


	// Pengiriman
	Route::get('/pengiriman/perencanaanpengiriman/index', 'PengirimanController@perencanaanpengiriman')->name('perencanaanpengiriman');
	Route::get('/pengiriman/perencanaanpengiriman/create', 'PengirimanController@tambah_perencanaanpengiriman')->name('tambah_perencanaanpengiriman');
	Route::get('/pengiriman/suratjalan/index', 'PengirimanController@suratjalan')->name('suratjalan');
	Route::get('/pengiriman/suratjalan/create', 'PengirimanController@tambah_suratjalan')->name('tambah_suratjalan');
	Route::get('/pengiriman/suratjalan/print', 'PengirimanController@print_suratjalan')->name('print_suratjalan');
	Route::get('/pengiriman/upahboronganpengiriman/index', 'PengirimanController@upahboronganpengiriman')->name('upahboronganpengiriman');
	Route::get('/pengiriman/upahboronganpengiriman/upah/process', 'PengirimanController@proses_upahboronganpengiriman')->name('proses_upahboronganpengiriman');
	Route::get('/pengiriman/upahboronganpengiriman/operasional/process', 'PengirimanController@proses_operasionaljalan')->name('proses_operasionaljalan');

	// Biaya dan Beban
	Route::get('/biayadanbeban/alattuliskantor/alattuliskantor', 'BiayaController@alattuliskantor')->name('alattuliskantor');
	Route::get('/biayadanbeban/biayabahanbakar/biayabahanbakar', 'BiayaController@biayabahanbakar')->name('biayabahanbakar');
	Route::get('/biayadanbeban/biayakesehatan/biayakesehatan', 'BiayaController@biayakesehatan')->name('biayakesehatan');
	Route::get('/biayadanbeban/biayakonsumsi/biayakonsumsi', 'BiayaController@biayakonsumsi')->name('biayakonsumsi');
	Route::get('/biayadanbeban/biayaoperasional/biayaoperasional', 'BiayaController@biayaoperasional')->name('biayaoperasional');
	Route::get('/biayadanbeban/maintenance/maintenance', 'BiayaController@maintenance')->name('maintenance');
	Route::get('/biayadanbeban/sewalahan/sewalahan', 'BiayaController@sewalahan')->name('sewalahan');
	Route::get('/biayadanbeban/upahborongan/upahborongan', 'BiayaController@upahborongan')->name('upahborongan');
	Route::get('/biayadanbeban/upahborongan/tambah_upahborongan', 'BiayaController@tambah_upahborongan')->name('tambah_upahborongan');
	Route::get('/biayadanbeban/upahbulanan/index', 'BiayaController@upahbulanan')->name('upahbulanan');
	Route::get('/biayadanbeban/upahbulanan/create', 'BiayaController@tambah_upahbulanan')->name('tambah_upahbulanan');
	Route::get('/biayadanbeban/upahharian/index', 'BiayaController@upahharian')->name('upahharian');
	Route::get('/biayadanbeban/upahharian/create', 'BiayaController@tambah_upahharian')->name('tambah_upahharian');
	Route::get('/biayadanbeban/pengeluarankecil/index', 'BiayaController@pengeluarankecil')->name('pengeluarankecil');
	Route::get('/biayadanbeban/pengeluarankecil/create', 'BiayaController@tambah_pengeluarankecil')->name('tambah_pengeluarankecil');


	// Dana Sosial

	Route::get('/danasosial/index', 'DanaController@danasosial')->name('danasosial');

	// Aset
	Route::get('/aset/datagolongan/index', 'AsetController@datagolongan')->name('datagolongan');
	Route::get('/aset/datagolongan/create', 'AsetController@tambah_datagolongan')->name('tambah_datagolongan');
	Route::get('/aset/dataaset/index', 'AsetController@dataaset')->name('dataaset');
	Route::get('/aset/dataaset/create', 'AsetController@tambah_dataaset')->name('tambah_dataaset');

	// Keuangan
	Route::get('/keuangan/laporaninputtransaksi/laporaninputtransaksi', 'KeuanganController@laporaninputtransaksi');
	Route::get('/keuangan/laporankeuangan/select', 'KeuanganController@laporankeuangan')->name('laporankeuangan');
	Route::get('/keuangan/laporankeuangan/jurnal', 'KeuanganController@jurnal')->name('jurnal');
	Route::get('/keuangan/laporankeuangan/buku_besar', 'KeuanganController@buku_besar')->name('buku_besar');
	Route::get('/keuangan/laporankeuangan/neraca_saldo', 'KeuanganController@neraca_saldo')->name('neraca_saldo');
	Route::get('/keuangan/laporankeuangan/neraca', 'KeuanganController@neraca')->name('neraca');
	Route::get('/keuangan/laporankeuangan/laba_rugi', 'KeuanganController@laba_rugi')->name('laba_rugi');
	Route::get('/keuangan/laporankeuangan/arus_kas', 'KeuanganController@arus_kas')->name('arus_kas');
	Route::get('/keuangan/prosesinputtransaksi/select', 'KeuanganController@pilih_prosesinputtransaksi')->name('pilih_prosesinputtransaksi');
	Route::get('/keuangan/prosesinputtransaksi/inputransaksikas/create', 'KeuanganController@inputtransaksikas')->name('inputtransaksikas');
	Route::get('/keuangan/prosesinputtransaksi/inputransaksibank/create', 'KeuanganController@inputtransaksibank')->name('inputtransaksibank');
	Route::get('/keuangan/prosesinputtransaksi/inputransaksimemorial/create', 'KeuanganController@inputtransaksimemorial')->name('inputtransaksimemorial');
	Route::get('/keuangan/analisa/select', 'KeuanganController@analisa')->name('analisa');
	Route::get('/keuangan/analisa/net_profit_ocf', 'KeuanganController@net_profit_ocf')->name('net_profit_ocf');
	Route::get('/keuangan/analisa/hutang_piutang', 'KeuanganController@hutang_piutang')->name('hutang_piutang');
	Route::get('/keuangan/analisa/pertumbuhan_aset', 'KeuanganController@pertumbuhan_aset')->name('pertumbuhan_aset');
	Route::get('/keuangan/analisa/aset_ekuitas', 'KeuanganController@aset_ekuitas')->name('aset_ekuitas');

	// Admin System
	Route::get('/system/manajemenhakakses/index', 'SystemController@manajemenhakakses')->name('manajemenhakakses');
	Route::get('/system/profilperusahaan/index', 'SystemController@profilperusahaan')->name('profilperusahaan');
	Route::get('/system/tahunfinansial/index', 'SystemController@tahunfinansial')->name('tahunfinansial');
	Route::get('/system/manajemenuser/index', 'System\hakuserController@manajemenuser')->name('manajemenuser');
	Route::get('/system/manajemenhakakses/create', 'System\hakuserController@tambah')->name('tambah_manajemenhakakses');
	Route::post('/system/hakuser/simpan', 'System\hakuserController@simpan');
	Route::get('/system/hakuser/edit-user-akses/{id}/edit', 'System\hakuserController@editUserAkses');
	Route::get('/system/hakuser/tableuser', 'System\hakuserController@tableUser');
	Route::get('/system/hakuser/autocomplete-pegawai', 'System\hakuserController@autocompletePegawai');
	Route::get('/system/hakuser/perbarui-user/{id}', 'System\hakuserController@perbaruiUser');
	Route::post('/system/hakuser/hapus-user', 'System\hakuserController@hapusUser');

// Konfirmasi Pembelian
	Route::get('/konfirmasi-purchase/index', 'Keuangan\purchaseConfirmController@confirmIndex')->name('pembelian');
	Route::get('/keuangan/konfirmasipembelian/get-data-tabel-daftar', 'Keuangan\purchaseConfirmController@getDataRencanaPembelian');
	Route::get('/keuangan/konfirmasipembelian/confirm-plan/{id}/{type}', 'Keuangan\purchaseConfirmController@confirmRencanaPembelian');
	Route::get('/keuangan/konfirmasipembelian/confirm-plan-submit', 'Keuangan\purchaseConfirmController@submitRencanaPembelian');
	Route::get('keuangan/konfirmasipembelian/get-data-tabel-order','Keuangan\purchaseConfirmController@getDataOrderPembelian')->middleware('auth');
	Route::get('keuangan/konfirmasipembelian/confirm-order/{id}/{type}','Keuangan\purchaseConfirmController@confirmOrderPembelian')->middleware('auth');
	Route::get('/keuangan/konfirmasipembelian/confirm-order-submit', 'Keuangan\purchaseConfirmController@submitOrderPembelian');
	Route::get('/keuangan/konfirmasipembelian/get-data-tabel-return', 'Keuangan\purchaseConfirmController@getDataReturnPembelian');
	Route::get('/keuangan/konfirmasipembelian/confirm-return/{id}/{type}', 'Keuangan\purchaseConfirmController@confirmReturnPembelian');
	Route::post('/keuangan/konfirmasipembelian/confirm-return-submit', 'Keuangan\purchaseConfirmController@submitReturnPembelian');

//penerimaan supplier
	Route::get('/stok/p_suplier/suplier', 'Stok\PenerimaanBrgSupController@index')->name('p_suplier');
	Route::get('/inventory/p_suplier/get-penerimaan-by-tgl/{tgl1}/{tgl2}', 'Stok\PenerimaanBrgSupController@getPenerimaanByTgl');
	Route::get('/inventory/p_suplier/lookup-data-pembelian', 'Stok\PenerimaanBrgSupController@lookupDataPembelian');
	Route::get('/inventory/p_suplier/get-data-form/{id}', 'Stok\PenerimaanBrgSupController@getdataform');
	Route::get('/inventory/p_suplier/get-data-detail/{id}', 'Stok\PenerimaanBrgSupController@getdatadetail');
	Route::get('/inventory/p_suplier/simpan-penerimaan', 'Stok\PenerimaanBrgSupController@simpan_penerimaan');
	Route::get('/inventory/p_suplier/get-list-waiting-bytgl/{tgl1}/{tgl2}', 'Stok\PenerimaanBrgSupController@getListWaitingByTgl');
	Route::get('/inventory/p_suplier/get-list-received-bytgl/{tgl1}/{tgl2}', 'Stok\PenerimaanBrgSupController@getListReceivedByTgl');
	Route::get('/inventory/p_suplier/get-detail-penerimaan/{id}', 'Stok\PenerimaanBrgSupController@getDataDetail');
	Route::get('/inventory/p_suplier/print/{id}', 'Stok\PenerimaanBrgSupController@print');
//Barang Rusak
    Route::get('/inventory/b_rusak/index', 'Stok\BarangRusakController@index')->name('b_rusak');
    Route::get('/inventory/b_rusak/get-brg-rusak-by-tgl/{tgl1}/{tgl2}', 'Stok\BarangRusakController@getBrgRusakByTgl');
    Route::get('/inventory/b_rusak/lookup-data-gudang', 'Stok\BarangRusakController@lookupDataGudang');
    Route::get('/inventory/b_rusak/lookup-gudang', 'Stok\BarangRusakController@DataGudangAll');
    Route::get('/inventory/b_rusak/autocomplete-barang', 'Stok\BarangRusakController@autocompleteBarang');
    Route::get('/inventory/b_rusak/simpan-data-rusak', 'Stok\BarangRusakController@simpanDataRusak');
    Route::get('/inventory/b_rusak/get-detail/{id}', 'Stok\BarangRusakController@detailBrgRusak');
    Route::get('/inventory/b_rusak/print/{id}', 'Stok\BarangRusakController@printTandaTerimaRusak');
    Route::post('/inventory/b_rusak/musnahkan-barang-rusak', 'Stok\BarangRusakController@musnahkanBrgRusak');
    Route::get('/inventory/b_rusak/kembalikan-barang-rusak', 'Stok\BarangRusakController@kembalikanBrgRusak');
    Route::get('/inventory/b_rusak/get-brg-musnah-by-tgl/{tgl1}/{tgl2}', 'Stok\BarangRusakController@getBrgMusnahByTgl');
    Route::post('/inventory/b_rusak/simpan-ubah-jenis', 'Stok\BarangRusakController@simpanUbahJenis');
    Route::get('/inventory/b_rusak/proses-ubah-jenis', 'Stok\BarangRusakController@prosesUbahJenis');
    Route::get('/inventory/b_rusak/get-brg-ubahjenis-by-tgl/{tgl1}/{tgl2}', 'Stok\BarangRusakController@getBrgUbahJenisByTgl');
    Route::get('/inventory/b_rusak/get-detail-ubahjenis/{id}', 'Stok\BarangRusakController@detailBrgUbahJenis');
    Route::post('/inventory/b_rusak/hapus-data-ubahjenis', 'Stok\BarangRusakController@hapusDataUbah');
//End Barang Rusak
//p_returnsupplier
    Route::get('/stok/p_returnsupplier/index', 'Stok\PenerimaanRtrSupController@index')->name('p_returnsupplier');
    Route::get('/inventory/p_returnsupplier/lookup-data-return', 'Stok\PenerimaanRtrSupController@lookupDataReturn');
    Route::get('/inventory/p_returnsupplier/get-data-form/{id}', 'Stok\PenerimaanRtrSupController@getDataForm');
    Route::get('/inventory/p_returnsupplier/simpan-penerimaan', 'Stok\PenerimaanRtrSupController@simpanPenerimaan');
    Route::get('/inventory/p_returnsupplier/get-datatable-index', 'Stok\PenerimaanRtrSupController@getDatatableIndex');
    Route::get('/inventory/p_returnsupplier/get-detail-penerimaan/{id}', 'Stok\PenerimaanRtrSupController@getDataDetail');
    Route::post('/inventory/p_returnsupplier/delete-data-penerimaan', 'Stok\PenerimaanRtrSupController@deletePenerimaan');
    Route::get('/inventory/p_returnsupplier/get-list-waiting-bytgl/{tgl1}/{tgl2}', 'Stok\PenerimaanRtrSupController@getListWaitingByTgl');
    Route::get('/inventory/p_returnsupplier/get-list-received-bytgl/{tgl1}/{tgl2}', 'Stok\PenerimaanRtrSupController@getListReceivedByTgl');
    Route::get('/inventory/p_returnsupplier/get-penerimaan-peritem/{id}', 'Stok\PenerimaanRtrSupController@getPenerimaanPeritem');
    Route::get('/inventory/p_returnsupplier/print/{id}', 'Stok\PenerimaanRtrSupController@printTandaTerima');
    Route::get('/inventory/p_returnsupplier/get-terimaretur-by-tgl/{tgl1}/{tgl2}', 'Stok\PenerimaanRtrSupController@getTerimaRtrByTgl');

}); // End Route Group




























































































































































































// 1 + 1 = 322
