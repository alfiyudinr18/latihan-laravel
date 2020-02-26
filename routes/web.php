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
    return view('welcome');
});

use App\Mahasiswa;
use App\Dosen;
use App\Wali;
use App\Hobi;

Route::get('relasi-1', function()
{
    //memilih data mahasiswa yg memiliki nim '10101'
    $mhs = Mahasiswa::where('nim','=','10101')->first();
    //menampilkan data wali dari mhs yang dipilih
    return $mhs->wali->nama;
});

Route::get('relasi-2', function()
{
    //memilih data mahasiswa yg memiliki nim '10101'
    $mhs = Mahasiswa::where('nim','=','10101')->first();
    //menampilkan data dosen dari mhs yang dipilih
    return $mhs->dosen->nama;
});

Route::get('relasi-3', function()
{
    //memilih data dosen yg memiliki nama 'Abdulloh'
    $dosen = Dosen::where('nama','=','Abdulloh')->first();
    //menampilkan data mhs dari dosen yang dipilih
    foreach($dosen->mahasiswa as $temp)
        echo '<li> Nama : ' . $temp->nama .
              ' <strong>' . $temp->nim . '</strong></li>';
});

Route::get('relasi-4', function()
{
    //memilih mahasiswa yg memiliki nama 'Dadang'
    $dadang = Mahasiswa::where('nama','=','Dadang Peloy')->first();
    //menampilkan data hobi dari dadang
    foreach($dadang->hobi as $temp)
        echo '<li> ' . $temp->hobi .'</li>';
});

Route::get('relasi-5', function()
{
    //memilih data mahasiswa yg memiliki hobi 'Game Mobile'
    $data = Hobi::where('hobi','=','Game Mobile')->first();
    //menampilkan semua data mahasiswa yang mempunyai data hobi 'Game Mobile'
    foreach($data->mahasiswa as $temp)
        echo '<li> Nama : ' . $temp->nama .
              ' <strong>' . $temp->nim . '</strong></li>';
});

Route::get('relasi-join',function(){
    // $sql = Mahasiswa::with('wali')->get();
    $sql = DB::table('mahasiswas')
    ->select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
    ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')->get();
    dd($sql);
});

Route::get('eloquent',function(){
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
    return view('eloquent',compact('mahasiswa'));
});

Route::get('relasi-join1',function(){
    // $sql = Mahasiswa::with('wali')->get();
    $sql = DB::table('mahasiswas')
    ->select('mahasiswas.nama','walis.nama as nama_wali','dosens.nama as nama_dosen','dosens.nipd','mahasiswa_hobi.id_hobi')
    ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')
    ->join('dosens','dosens.id','=','mahasiswas.id_dosen')
    ->join('mahasiswa_hobi','mahasiswa_hobi.id_mahasiswa','=','mahasiswas.id')->get();
    dd($sql);
});

Route::get('latihan-eloquent',function(){
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->take(1)->get();
    return view('latihan-eloquent',compact('mahasiswa'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('beranda', function()
{
    return view('beranda');
});

Route::get('tentang', function()
{
    return view('tentang');
});

Route::get('kontak', function()
{
    return view('kontak');
});

Route::resource('dosen','DosenController');
