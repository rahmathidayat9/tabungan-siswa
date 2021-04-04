<?php

use Illuminate\Support\Facades\Route;

// Auth namespace
use App\Http\Controllers\Auth\LoginController;

// Admin namespace
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\TruncateController;

// Operator namespace
use App\Http\Controllers\Operator\OperatorController;

// Nasabah namespace
use App\Http\Controllers\Nasabah\NasabahController;
use App\Http\Controllers\Nasabah\TransferController as NasabahTransferController;
use App\Http\Controllers\Nasabah\LaporanController as NasabahLaporanController;

// User namespace
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ChangePasswordController;

//Transaksi namespace
use App\Http\Controllers\Transaksi\TransaksiController;
use App\Http\Controllers\Transaksi\TransferController;
use App\Http\Controllers\Transaksi\TarikController;
use App\Http\Controllers\Transaksi\SetorController;

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

//Route Group Auth
Route::group(['namespace' => 'Auth'],function(){
	Route::view('/','auth.login')->middleware('guest');
	Route::view('/login','auth.login')->name('login')->middleware('guest');
	Route::post('/login',[LoginController::class,'authenticated'])->name('login.post');

	Route::post('/logout',function(){
		Auth::logout();
		return redirect()->to('login');
	})->name('logout');

	Route::view('/forgot-password','auth.forgot-password');
});

// Route Group Admin
Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => ['auth','can:admin']],function(){
	Route::name('admin.')->group(function(){
	
		Route::get('/dashboard',[AdminController::class,'index'])->name('index');
		Route::get('/',[AdminController::class,'index']);

		Route::get('/laporan',[LaporanController::class,'index'])->name('laporan.index');
		Route::post('/laporan/transaksi',[LaporanController::class,'transaksi'])->name('laporan.transaksi');

		Route::delete('truncate/transaksi',[TruncateController::class,'transaksi'])->name('truncate.transaksi');
		
		//User Resource
		Route::resource('user','UserController');
		Route::resource('pegawai','PegawaiController');
		Route::resource('nasabah','NasabahController');
		Route::resource('rekening','RekeningController');
				
		//Generate PDF 
		Route::get('/pdf/user/export-pdf','PdfController@exportPdfUser')->name('pdf.export-pdf-user');
		Route::get('/pdf/user/print-pdf','PdfController@printPdfUser')->name('pdf.print-pdf-user');

		//Generate Excel 
		Route::get('/excel/user/export-excel','ExcelController@exportExcelUser')->name('excel.export-excel-user');
		Route::post('/excel/user/import-excel','ExcelController@importExcelUser')->name('excel.import-excel-user');
	});
});

Route::group(['middleware' => 'can:operator','prefix' => 'operator'],function(){
	Route::name('operator.')->group(function(){
		Route::resource('nasabah','Admin\NasabahController');
		Route::resource('rekening','Admin\RekeningController');
	});
});

// Route Group Operator
Route::group(['namespace' => 'Operator','prefix' => 'operator','middleware' => ['can:operator']],function(){
	Route::name('operator.')->group(function(){

		Route::get('/',[OperatorController::class,'index'])->name('index');

	});
});

// Route Group Nasabah
Route::group(['namespace' => 'Nasabah','prefix' => 'nasabah','middleware' => ['can:nasabah']],function(){
	Route::name('nasabah.')->group(function(){

		Route::get('/',[NasabahController::class,'index'])->name('index');

		Route::get('/transfer',[NasabahTransferController::class,'index'])->name('transfer.index');
		Route::post('/transfer',[NasabahTransferController::class,'store'])->name('transfer.store');
		Route::get('/histori-transfer',[NasabahTransferController::class,'historiTransfer'])->name('transfer.histori');

		Route::post('/laporan/transfer-keluar',[NasabahLaporanController::class,'transferKeluar'])->name('laporan.transfer-keluar');
	});
});

//Route Group User
Route::group(['namespace' => 'User','prefix' => 'user','middleware' => 'auth'],function(){
	Route::name('user.')->group(function(){
		//Home
		Route::get('/home',[HomeController::class,'index'])->name('home');

		//Profile	
		Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
		Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');
		
		//Ubah Password
		Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change-password.index');
		Route::patch('/change-password',[ChangePasswordController::class,'update'])->name('change-password.update');
	});
});

//Route Group Transaksi 
Route::group(['prefix' => 'transaksi','middleware' => ['auth','can:operator']],function(){
	Route::namespace('Transaksi')->group(function(){

		Route::get('/',[TransaksiController::class,'index'])->name('transaksi.index');
		Route::post('/',[TransaksiController::class,'store'])->name('transaksi.store');
		Route::post('/generate-pdf',[LaporanController::class,'transaksi'])->name('transaksi.generate-pdf');

		//Transfer
		Route::get('/transfer',[TransferController::class,'index'])->name('transfer.index');
		Route::post('/transfer',[TransferController::class,'store'])->name('transfer.store');

		//Setor
		Route::get('/setor',[SetorController::class,'index'])->name('setor.index');
		Route::post('/setor',[SetorController::class,'store'])->name('setor.store');

		//Setor
		Route::get('/tarik',[TarikController::class,'index'])->name('tarik.index');
		Route::post('/tarik',[TarikController::class,'store'])->name('tarik.store');

	});
});