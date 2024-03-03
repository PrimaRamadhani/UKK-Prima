<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Registrasi
Route::get('/registrasi', function () {
    return view('registrasi');
});

//Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/registrasi', [Usercontroller::class,'registrasi']);
Route::post('/login', [Usercontroller::class,'login']);


Route::middleware('auth')->group(function () {
    //Route Home
    Route::get('/home', function () {
        return view('home');});
    Route::get('/getDataExplore', [HomeController::class, 'getdata']);
    Route::post('/likefoto', [HomeController::class, 'likesfoto']);

    //Route Detail Foto
    Route::get('/komentar/{id}', function () {
        return view('komentar'); });
    Route::get('/komentar/{id}/getdatadetail', [HomeController::class, 'getdatadetail']);
    Route::get('/komentar/getkomentar/{id}', [HomeController::class, 'ambildatakomentar']);
    Route::post('/komentar/kirimkomentar', [HomeController::class, 'kirimkomentar']);
    Route::post('/komentar/ikuti', [HomeController::class, 'ikuti']);

    //Route Upload Foto
    Route::post('/unggah_foto', [UploadController::class,'unggah_foto']);
    Route::get('/upload_foto', [UploadController::class,'upload_foto']);

    //Route Tambah Album
    Route::get('/tambah_album', [UploadController::class,'tambah_album']);
    Route::post('/add_album', [UploadController::class,'add_album']);

    //Route Update Profile dan Password
    Route::get('/profile', [ProfileController::class,'profile']);
    Route::get('/getDataPostingan',[ProfileController::class, 'getdatapostingan']);
    Route::get('/editprofile', [ProfileController::class,'editprofile']);
    Route::post('/updateprofile', [ProfileController::class,'updateprofile']);
    Route::post('/ubahpoto',[ProfileController::class, 'fotoprofil']);
    Route::get('editpassword', [ProfileController::class, 'editpassword'])->name('editpassword');
    Route::post('updatepassword', [ProfileController::class, 'updatepassword'])->name('updatepassword');

    //Route Profile Publik
    Route::get('/lihatpublik/{id}', function () {
        return view('lihatpublik'); });
    Route::get('/lihatpublik/getDataPin/{id}', [PinController::class,'getdatapin']);
    Route::get('/getDataPin/{id}',[PinController::class, 'getdatapostinganbaru']);

    //LogOut
    Route::get('/logout',[Usercontroller::class, 'logout']);

    //Album
    Route::get('/album', [AlbumController::class,'album']);
    Route::get('/dalemalbum/{id}', [AlbumController::class,'dalemalbum'])->name('dalemalbum');

    //Hapus Postingan
    Route::delete('/deletefoto/{id}', [ProfileController::class, 'deletefoto']);
});
