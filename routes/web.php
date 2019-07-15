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

// Penduduk
	Route::get('master/penduduk/index', 'Master\pendudukController@index')->name('penduduk');
	Route::get('penduduk/get', 'Master\pendudukController@get')->name('get-penduduk');
	Route::get('penduduk/create', 'Master\pendudukController@add')->name('add-penduduk');
	Route::post('penduduk/save', 'Master\pendudukController@create')->name('create-penduduk');
	Route::put('penduduk/change', 'Master\pendudukController@change')->name('change-penduduk');
	Route::delete('penduduk/delete', 'Master\pendudukController@destroy')->name('delete-penduduk');
	Route::get('penduduk/detail/{id}', 'Master\pendudukController@show')->name('show-penduduk');
// Kelahiran
	Route::get('master/kelahiran/index', 'Master\kelahiranController@index')->name('kelahiran');
	Route::get('kelahiran/get', 'Master\kelahiranController@get')->name('get-kelahiran');
	Route::get('kelahiran/add', 'Master\kelahiranController@add')->name('add-kelahiran');
	Route::post('kelahiran/create', 'Master\kelahiranController@create')->name('create-kelahiran');
	Route::delete('kelahiran/delete', 'Master\kelahiranController@destroy')->name('delete-kelahiran');
	Route::get('kelahiran/detail/{id}', 'Master\kelahiranController@show')->name('detail-kelahiran');
// Kematian
	Route::get('master/kematian/index', 'Master\kematianController@index')->name('kematian');
	Route::get('kematian/get', 'Master\kematianController@get')->name('get-kematian');
	Route::get('kematian/add', 'Master\kematianController@add')->name('add-kematian');
	Route::get('kematian/autocomplete', 'Master\kematianController@autocomplete')->name('autocomplete-kematian');
	Route::post('kematian/create', 'Master\kematianController@create')->name('create-kematian');
	Route::get('kematian/detail/{id}', 'Master\kematianController@show')->name('detail-kematian');
	
// Penduduk Masuk
	Route::get('master/pmasuk/index', 'Master\pendudukMasukController@index')->name('pmasuk');
	Route::get('pmasuk/get', 'Master\pendudukMasukController@get')->name('get-pmasuk');
	Route::get('pmasuk/add', 'Master\pendudukMasukController@add')->name('add-pmasuk');
	Route::post('pmasuk/create', 'Master\pendudukMasukController@create')->name('create-pmasuk');
	Route::get('pmasuk/autocomplete', 'Master\pendudukMasukController@autocomplete')->name('autocomplete-kecamatan');
	Route::get('pmasuk/detail/{id}', 'Master\pendudukMasukController@show')->name('detail-kecamatan');

// Penduduk Keluar
	Route::get('/master/pkeluar/index', 'Master\pendudukKeluarController@index')->name('pkeluar');
	Route::get('pkeluar/get', 'Master\pendudukKeluarController@get')->name('get-pkeluar');
	Route::get('pkeluar/add', 'Master\pendudukKeluarController@add')->name('add-pkeluar');
	Route::post('pkeluar/create', 'Master\pendudukKeluarController@create')->name('create-pkeluar');
	Route::get('pkeluar/detail/{id}', 'Master\pendudukKeluarController@show')->name('detail-pkeluar');
// Master Pegawai
	Route::get('/master/datapegawai/datapegawai', 'MasterController@datapegawai')->name('datapegawai');
	Route::get('/master/datapegawai/tambah_datapegawai', 'MasterController@tambah_datapegawai')->name('tambah_datapegawai');
	Route::get('/master/datapegawai/edit_datapegawai', 'MasterController@edit_datapegawai')->name('edit_datapegawai');
	
//pindah Rt
	Route::get('/master/pindahrt/index', 'Master\pindahRtController@index')->name('pindahrt');
	Route::post('pindahrt/create', 'Master\pindahRtController@create')->name('create-pindahrt');
	Route::get('pindahrt/get', 'Master\pindahRtController@get')->name('get-pindahrt');
	Route::get('pindahrt/add', 'Master\pindahRtController@add')->name('add-pindahrt');
	Route::get('pindahrt/detail/{id}', 'Master\pindahRtController@show')->name('detail-pindahrt');

// Pembuatan Surat
	Route::get('pembuatan/surat/index', 'Pembuatan\SuratController@index')->name('surat');
	Route::get('surat/get', 'Pembuatan\SuratController@get')->name('get-surat');
	Route::get('surat/create', 'Pembuatan\SuratController@create')->name('create-surat');

// Pembuatan Laporan
	Route::get('pembuatan/laporan/index', 'Pembuatan\LaporanController@index')->name('laporan');
	Route::get('laporan/get', 'Pembuatan\LaporanController@get')->name('get-laporan');
	Route::get('laporan/create', 'Pembuatan\LaporanController@create')->name('create-laporan');

// reff kode
	Route::get('/reff/rkode/index', 'Reff\KodeController@index')->name('rkode');
	Route::put('rkode/update', 'Reff\KodeController@update')->name('update-rkode');

// reff pekerjaan
	Route::get('/reff/rpekerjaan/index', 'Reff\PekerjaanController@index')->name('rpekerjaan');
	Route::get('rpekerjaan/get', 'Reff\PekerjaanController@get')->name('get-rpekerjaan');
	Route::get('rpekerjaan/create', 'Reff\PekerjaanController@create')->name('create-rpekerjaan');
	Route::post('rpekerjaan/store', 'Reff\PekerjaanController@store')->name('store-rpekerjaan');
	Route::put('rpekerjaan/change', 'Reff\PekerjaanController@change')->name('change-rpekerjaan');
	Route::get('rpekerjaan/edit/{id}', 'Reff\PekerjaanController@edit')->name('edit-rpekerjaan');
	Route::post('rpekerjaan/update/{id}', 'Reff\PekerjaanController@update')->name('update-rpekerjaan');

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

}); // End Route Group




























































































































































































// 1 + 1 = 322
