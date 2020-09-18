<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller{
    function tampilDashboard(){
        $variabelOpen = DB::table("tiket")->where("status", '=', 'Open')->count();
        $variabelInProgress = 20;
        return view('dashboard', compact("variabelOpen", "variabelInProgres"));
    }

    function tampilDataUser()
    {
        //Ambil data dari database dengan table yang bernama table (user)
        $variabelData = DB::table("user")->get();

        //untuk memunculkan tampilan view yang bernama view (user-list)
        return view("setting-user", compact('variabelData'));

    }

    function tampilFormAdd() {
        return view("user-form");

    }

    function FormEditData(){
        //ambil dari id user
        $variabelKodeUser = request()->input("id");

        //ambil data pada tabel user berdasarkan variabel yang sudah ada
        $variabelUserData = DB::table("user")->where("id", $variabelKodeUser)->first();

        return view("user-data-update", compact("variabelUserData"));


    }

    function simpanData() {
        //simpan data ke table user
        $variabelUsername       = request()->input("username");
        $variabelName           = request()->input("name");
        $variabelPassword       = request()->input("password");
        $variabelLocation       = request()->input("location");
        $variabelUserPrivilege  = request()->input('userprivilege');


        DB::table('user')->insert([
            'username'      => $variabelUsername,
            'name'          => $variabelName,
            'password'      => Hash::make($variabelPassword),
            'location'      => $variabelLocation,
            'userprivilege' => $variabelUserPrivilege,


        ]);
        //setelah simpan diarahkan ke halamam user
        return redirect()->route("setting-user");
    }

    function hapusData() {
        //mengambil inputan id
        $variabelKodeUser = request()-> input("id");

        //eksekusi hapus
        DB::table("user")->where("id", $variabelKodeUser)->delete();

        //apa yang dikembalikan ke pengguna/tampilan
        return redirect()->route("setting-user");


        //akses database
        //cari data yang dihapus
        //arahahkan ke list


    }

    function simpanDataUpdate(){

      //ambil data yang yang dikirim form
     $variabelKodeUser       = request()->input("id");
     $variabelUsername       = request()->input("username");
     $variabelName           = request()->input("name");
     $variabelPassword       = request()->input("password");
     $variabelLocation       = request()->input("location");
     $variabelUserPrivilege  = request()->input('userprivilege');



         DB::table("user")->where("id", $variabelKodeUser)->update([
        'username'      => $variabelUsername,
        'name'          => $variabelName,
        'password'      => Hash::make($variabelPassword),
        'location'      => $variabelLocation,
        'userprivilege' => $variabelUserPrivilege,

         ]);
    //setelah simpan diarahkan ke halamam user
    return redirect()->route("setting-user");
}
    }

