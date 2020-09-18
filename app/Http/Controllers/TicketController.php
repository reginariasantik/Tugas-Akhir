<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TicketController extends Controller{


    function addTiket()
    {



        $variabelData = DB::table("ticket")
        ->orderBy('order_date', 'desc')
        ->whereDate('order_date', '=', \Carbon\Carbon::now())
        ->join("user as tb_sender", "ticket.sender", "=", "tb_sender.id" )
        ->select("ticket.*", "tb_sender.name as sender_name" )
        ->take(10)
        ->get();




        return view("tiket-add", compact('variabelData'));


    }

    //membuat function simpan data dahulu
    function simpanDataTiket()
    {

    //untuk input no tiket
    $variabelNomorTiket = request()->input('noticket');
    $variabelTipeOrder  = request()->input('tipeorder');
    $variabelInfoOrder  = request()->input('infoorder');

    //membuat variabelnomortiket untuk memisahkan karakter "|"
    $variabelHasilNomorTiket = explode("|", $variabelNomorTiket);

    //dd($variabelNomorTiket);
    //koneksi ke database
    DB::table("ticket")->insert([
        'order_id'      => $variabelHasilNomorTiket[0],
        'location'      => 'JKT',
        'sender'        => auth()->user()->id,
        'fallout_type'  => $variabelHasilNomorTiket[2],
        'order_type'    => $variabelTipeOrder,
        'ticket_no'     => $variabelHasilNomorTiket[3],
        'ticket_info'   => $variabelHasilNomorTiket[4],
        'status'        => 'Open',
        'info'          => $variabelInfoOrder,
    ]);

    return redirect()->route("add-tiket");
}

    function TampilDataTiket(){
        $variabelData = DB::table('ticket')
        ->join("user as tb_sender", "ticket.sender", "=", "tb_sender.id" )
        ->leftJoin("user as tb_agent", "ticket.agent", "=", "tb_agent.id" )
        ->select("ticket.*", "tb_sender.name as sender_name", "tb_agent.name as agent_name" )
        ->get();

        $variabelDaftarUrut = collect([]);

        $data1 = $variabelData
        ->where('status','!=','Closed')
        ->where('order_type', '=', '1')
        ->sortBy('order_date');


        foreach($data1 as $item) {
            $variabelDaftarUrut->push($item);
        }
        //Priority 2 (B & C)
        $data2 = $variabelData
        ->where('status','!=','Closed')
        ->where('order_type', '!=', '1')
        ->sortBy('order_date');

        foreach($data2 as $item) {
            //Cek Prioritas
            $variabelIntervalMenit = \Carbon\Carbon::now('Asia/Jakarta')->diffInMinutes(new \Carbon\Carbon($item->order_date, 'Asia/Jakarta'));
            if($variabelIntervalMenit >= 10) {
                $variabelDaftarUrut->push($item);
            }
        }
        //Non Priority 2 & 3 (B & C)
        $data3 = $variabelData
        ->where('status','!=','Closed')
        ->where('order_type', '!=', '1')
        ->sortBy('order_date');

        foreach($data3 as $item) {
            //Cek Prioritas
            $variabelIntervalMenit = \Carbon\Carbon::now('Asia/Jakarta')->diffInMinutes(new \Carbon\Carbon($item->order_date, 'Asia/Jakarta'));
            if($variabelIntervalMenit < 10) {
                $variabelDaftarUrut->push($item);
            }
        }

        //Non Priority 3 (C)
        $data3 = $variabelData
        ->where('status','!=','Closed')
        ->where('order_type', '=', '3')
        ->sortBy('order_date');

        foreach($data3 as $item) {
            //Cek Prioritas
            $variabelIntervalMenit = \Carbon\Carbon::now('Asia/Jakarta')->diffInMinutes(new \Carbon\Carbon($item->order_date, 'Asia/Jakarta'));
            if($variabelIntervalMenit > 10) {
                $variabelDaftarUrut->push($item);
            }
        }


        $dataClosed = $variabelData
        ->where('status','=','Closed')
        ->sortBy('order_date');


        foreach($dataClosed as $item) {
            $variabelDaftarUrut->push($item);
        }

        return view ("tiket-list", compact ('variabelDaftarUrut'));
    }

    function updateStatusTiket(){

        $variabelId = request()->input('id');
        $variabelStatus= request()->input('status');

        if($variabelStatus == "On Progress") {
            //On Progress
            DB::table('ticket')->where("id", $variabelId)->update([
                'status' => $variabelStatus,
                'agent' => auth()->user()->id,
                'progress_date' => \Carbon\Carbon::now('Asia/Jakarta')
            ]);
        }
        else {
            //Closed
            DB::table('ticket')->where("id", $variabelId)->update([
                'status' => $variabelStatus,
                'agent' => auth()->user()->id,
                'close_date' => \Carbon\Carbon::now('Asia/Jakarta')
            ]);
        }


        return redirect()->route("tampil-tiket");
    }

    function hapusTiket() {
        //mengambil inputan id
        $variabelKodeUser = request()-> input("id");

        //eksekusi hapus
        DB::table("ticket")->where("id", $variabelKodeUser)->delete();

        //apa yang dikembalikan ke pengguna/tampilan
        return redirect()->route("tampil-tiket");


        //akses database
        //cari data yang dihapus
        //arahahkan ke list


    }


}
