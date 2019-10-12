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

Route::get('/', function () {
    return view('client.pages.index');
});


Auth::routes();

Route::prefix('home')->group(function () {
//get
Route::get('/', 'HomeController@index')->name('home');
Route::get('/periode', 'HomeController@getperiode');
Route::get('/editor', 'HomeController@getEditor');
Route::get('/mata/ujian', 'HomeController@getmataujian');
Route::get('/input/siswa', 'HomeController@getsiswa');
Route::get('/input', 'HomeController@getinput');
Route::get('/daftar/peserta', 'HomeController@getdaftarpeserta');
Route::get('/ujian', 'HomeController@getujian');
Route::get('/soal', 'HomeController@getsoal');
Route::get('/token', 'HomeController@gettoken');
Route::get('/aktifkan/test', 'HomeController@getaktifkantest');
Route::get('/report/test', 'HomeController@getreporttest');
Route::get('/beckup/data', 'HomeController@getbeckupdata');
Route::get('/hapus/data', 'HomeController@gethapusdata');
Route::get('/restore/data', 'HomeController@getrestoredata');
Route::get('/dash', 'HomeController@dash');
Route::get('/{id}/ujian/soal', 'HomeController@getinputsoal');
Route::get('/tambah/{id}/siswa', 'HomeController@gettamsiswa');
Route::get('/cetak', 'HomeController@getcetak');
Route::get('/cetak/kartu', 'HomeController@cetak_kartu');
Route::get('/cetak/kartu/peserta', 'HomeController@store_cetak_kartu');
Route::get('/profil/sekolah','HomeController@profilsekolah');
Route::get('/cetak/semester', 'HomeController@cetaksemester');
Route::get('/aktifkan/nilai', 'HomeController@getActiveNilai');
//export
Route::get('/export/siswa', 'HomeController@export_excel_siswa'); 
Route::get('/export/siswa/beckup', 'HomeController@export_restore_siswa');
Route::get('/export/{id}/soal', 'HomeController@export_excel_soal');
Route::get('/export/ujian', 'HomeController@export_excel_ujian');
Route::get('/export/soal/all', 'HomeController@export_excel_soal_all');
Route::get('/export/paket/all', 'HomeController@export_excel_paket');

//post
Route::post('/', 'HomeController@index');
Route::post('/input', 'HomeController@svinput');
Route::post('/periode', 'HomeController@svperiode');
Route::post('/mata/ujian', 'HomeController@svmataujian');
Route::post('/input/siswa', 'HomeController@svsiswa');
Route::post('/{id}/akun', 'HomeController@addaccount');
Route::post('/ujian', 'HomeController@svujian');
Route::post('/{id}/ujian/soal', 'HomeController@svinputsoal');
Route::post('/{id}/soal', 'HomeController@svinputsoal');
Route::post('/input/token', 'HomeController@svtoken');
Route::post('/pilih/{id_ujian}/kelas/{id_siswa}', 'HomeController@svpilihsiswa');
Route::post('/save/data', 'HomeController@actionprofilsekolah');
Route::post('/pilih/mataujian/', 'HomeController@pilihujian');
Route::match(['put', 'post'], '/aktifkan/nilai', 'HomeController@setActiveNilai');
//import
Route::post('/import/siswa', 'HomeController@import_excel_siswa');
Route::post('/import/{id}/soal', 'HomeController@import_excel_soal');
Route::post('/import/ujian', 'HomeController@import_excel_ujian');
Route::post('/import/restore/siswa', 'HomeController@import_restore_siswa');
Route::post('/import/restore/paket', 'HomeController@import_restore_paket');

//update
Route::put('/input/{id}/update/{kondisi}', 'HomeController@upinput');
Route::put('/{id}/periode', 'HomeController@upperiode');
Route::put('/mata/{id}/ujian', 'HomeController@upmataujian');
Route::put('/input/{id}/siswa', 'HomeController@upsiswa');
Route::put('/{id}/ujian', 'HomeController@upujian');
Route::put('/{id}/update/ujian/soal', 'HomeController@upinputsoal');
Route::put('/{id}/token', 'HomeController@uptoken');
Route::put('/{id}/ujian/aktifkan', 'HomeController@upaksoal');
Route::put('/update/data/sekolah', 'HomeController@actionprofilsekolah');
Route::put('/update/accunt', 'HomeController@accunt');

//delete
Route::delete('/input/{id}/delete/{kondisi}', 'HomeController@delinput');
Route::delete('/{id}/periode', 'HomeController@delperiode');
Route::delete('/mata/{id}/ujian', 'HomeController@delmataujian');
Route::delete('/input/{id}/siswa', 'HomeController@delsiswa');
Route::delete('/{id}/ujian', 'HomeController@delujian');
Route::delete('/{id}/soal', 'HomeController@delsoal');
Route::delete('/{id}/delete/ujian/soal', 'HomeController@delinputsoal');
Route::delete('/{id}/token', 'HomeController@deltoken');
Route::delete('/delete/ujian/data', 'HomeController@deldataujian');
Route::delete('/delete/siswa/data', 'HomeController@deldatasiswa');

});
//client
Route::post('/client/login', 'AuthClientController@login');


Route::post('/client/cektoken', 'ClientController@cektoken');
Route::post('/ujian/{id_ujian}/matpel/{id_matpel}/siswa/{id_siswa}/kelas/{id_kelas}', 'ClientController@mulaiujian');
Route::get('/konfirmasi/data/peserta','ClientController@kdp');
Route::get('/konfirmasi/tes/{id_siswa}/siswa/{id_kelas}/kelas/{id_matpel}/matapelajaran','ClientController@kt');
Route::get('/mulai/ujian/{id_ujian}/siswa/{id_siswa}/kelas/{id_kelas}/nosoal/{nosoal}', 'ClientController@ujian');
Route::post('/mulai/ujian/{id_ujian}/siswa/{id_siswa}/kelas/{id_kelas}/nosoal/{nosoal}', 'ClientController@ujianreact');
Route::put('/mulai/ujian/{id_ujian}/siswa/{id_siswa}/kelas/{id_kelas}/nosoal/{nosoal}', 'ClientController@ujianreact');
Route::get('/selesai/ujian/{id_ujian}/siswa/{id_siswa}/kelas/{id_kelas}','ClientController@selesai');
Route::post('/selesai/ujian/{id_ujian}/siswa/{id_siswa}/kelas/{id_kelas}', 'ClientController@logout');

Route::get('/client/logout', 'ClientController@logout1');