<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tasker;
use App\Models\CitizenComplain;

class TaskerController extends Controller
{
    public function dashboard(){
    	return view('users.Tasker.Tasker');
    }


    function panel_content(){
    	$tasker_id=auth()->guard('tasker')->user()->id;
    	$data= DB::table('taskers')
		    ->join('tasker_roles', 'tasker_roles.id', '=', 'taskers.role_id')
		    ->select('taskers.*','taskers.firstname','tasker_roles.name')
		    ->where(['taskers.id'=>$tasker_id])
		    ->get();

    }

    function myinfo(){
    	$tasker_id=auth()->guard('tasker')->user()->id;
      	$info= DB::table('taskers')
            ->join('tasker_roles', 'tasker_roles.id', '=', 'taskers.role_id')
            ->select('taskers.*','taskers.firstname','taskers.lastname','taskers.gender','taskers.phone','taskers.email','taskers.nat_id','taskers.image','tasker_roles.name')
            ->where(['taskers.role_id'=>$tasker_id])->get();

    	return view('users.tasker.MyInformation',compact('info'));
    }

    public function PendingComplain(){
        $rol_id=auth()->guard('tasker')->user()->role_id;
        $pendingcomplain=CitizenComplain::where('complains_reply','pending')->where('decision',null)->where('role_id',$rol_id)->paginate(5);

        return view('users.tasker.UnsolvedComplain',compact('pendingcomplain'));
    }

    public function SolvedComplain(){
        $rol_id=auth()->guard('tasker')->user()->role_id;
        $solvedcomplain=CitizenComplain::where('complains_reply','solved')->where('decision','done')->where('role_id',$rol_id)->paginate(1);

        return view('users.tasker.SolvedComplain',compact('solvedcomplain'));
    }

    
}
