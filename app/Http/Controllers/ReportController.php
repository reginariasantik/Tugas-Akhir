<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ReportController extends Controller{

        public function tampilReportDaily(){

            $data = UserModel::get();

            return view('report-daily', compact('data'));
        }


        public function tampilReportMonthly(){

            $data = UserModel::get();

            return view('report-monthly', compact('data'));
        }



    }


