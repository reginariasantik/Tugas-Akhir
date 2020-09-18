<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/menu', function () {
    return view('dashboard');
})->name("dashboard");


Route::get('/menu/tiket/myticket', function () {
    return view('myticket');
})->name("myticket");


//Login
Route::get('/', "HomeController@loginPage")->name("login");
Route::get('/signin', "HomeController@signin")->name("signin");




//signout
Route::get('/signout', "HomeController@signout")->name("signout");

Route::group(['middleware' => ['roleakses:Admin']], function () {
//User
Route::get('/menu/user/list', "UserController@tampilDataUser")->name("setting-user");
Route::get('/menu/user/add', "UserController@tampilFormAdd")->name("user-add");
Route::get('/menu/user/simpan', "UserController@simpanData")->name("user-simpan");
Route::get('/menu/user/hapus', "UserController@hapusData")->name("user-hapus");
Route::get('/menu/user/editdata', "UserController@FormEditData")->name("user-edit");
Route::get('/menu/user/updatedata', "UserController@simpanDataUpdate")->name("data-update");
});


Route::group(['middleware' => ['roleakses:Helpdesk,Technician,Admin']], function () {
//Ticket
Route::get('/menu/ticket/addtiket', "TicketController@addTiket")->name("add-tiket");
Route::get('/menu/ticket/simpantiket', "TicketController@simpanDataTiket")->name("simpan-tiket");
Route::get('/menu/ticket/tampilticket', "TicketController@tampilDataTiket")->name("tampil-tiket");
Route::get('/menu/ticket/updatestatus', "TicketController@updateStatusTiket")->name("update-tiket");
Route::get('/menu/ticket/hapustiket', "TicketController@hapusTiket")->name("hapus-tiket");

});



Route::group(['middleware' => ['roleakses:Admin']], function () {
//Report
Route::get('/menu/report/reportdaily', "ReportController@tampilReportDaily")->name("tampil-report-daily");
Route::get('/menu/report/reportmonthly', "ReportController@tampilReportMonthly")->name("tampil-report-monthly");
});


