<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminHomeController extends Controller
{
    //

    public function index(){
        return view('administrator.admin-home');
    }



    public function loadReports(){

        $report = DB::select('select 
             a.strand_id, a.strand, a.strand_desc,
             (
                select count(*) from enrols where a.strand_id = enrols.strand_id
             ) as no_enrolee
            from strands as a
            ');

        return $report;
    }



}
