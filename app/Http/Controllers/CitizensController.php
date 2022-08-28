<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CitizenComplain;
use App\Models\Tasker;

class CitizensController extends Controller
{
    function CitizenComplains(Request $request){
    	 $this->validate($request,[
            'names' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'max:255',
            'role_id' => 'required',
            'complains' => 'required|max:500',
            'docs[]' => 'mimes:jpg,jpeg,png,pdf',
        ],
        [
        	'names.required' => 'Uzuzamo amazina yawe yombi *',
        	'phone.required' => 'Uzuzamo nimero ya telephone yawe *',
        	'phone.numeric' => 'Nimero ya telephone igomba kuba ari imibare gusa *',
        	'phone.digits' => 'Nimero ya telephone igomba kuba ari imibare 10 *',
        	'role_id.required' => 'Hitamo ubishinzwe *',
        	'complains.required' => 'Andika ikibazo ufite *',
        	'docs[].mimes' => 'Shyiramo ifoto ya format ya jpg,jpeg,png cyangwa pdf *',
        ]);		

    	$data=new CitizenComplain;
    	$data->names = $request->names;
		$data->email = $request->email;
		$data->phone = $request->phone;
		$data->role_id = $request->role_id;
		$data->complains = $request->complains;

		if ($request->hasFile('docs')){
			$images = $request->file('docs');
		    $var = date_create();
		    $time = date_format($var, 'YmdHis');
		    $imageName = $time . '-' . $images->getClientOriginalName();
		    $images-> move(public_path('images/citizen/'), $imageName);
		    $data->image = $imageName;
		}

		$data->save();
		return redirect()->back()->with('complain_sent','Wohereje neza !');
    }

    // function StaffMememberfn(){
    //     $staffdata=Tasker::all();
    //     return view('page.homepage',compact('staffdata'));
    // }
}
