<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tasker;
use App\Models\CitizenComplain;
use Illuminate\Support\Facades\Hash;
use App\Models\taskerfile;

class TaskerController extends Controller
{
    public function dashboard(){
    	return view('users.tasker.Tasker');
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

    public function CreateFile(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,pdf,zip,gif,docs,docx,csv,pptx',
            'content' => 'required|max:200',
        ]);

            $datas=new taskerfile;
            $datas->name = $request->name;

            if($request->hasFile('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $extenstion = $file->getClientOriginalExtension();
                $file-> move(public_path('images/tasker/document/'), $filename);
                $datas['image']= $filename;
            }
                
            $datas->content = $request->content;
            $datas->save();

        return redirect()->back()->with('file_added','New file added successfully !');


    }

    public function formFile(){
        return view('users.tasker.CreateFiles');
    }

    public function ViewDocument(){
        $filedata=taskerfile::paginate(5);
        return view('users.tasker.ViewFiles', compact('filedata'));
    }

    public function CreateProfile(Request $request){
         $id=auth()->guard('tasker')->user()->id;
        
        $request->validate([
            'profile_picture' => 'mimes:jpg,jpeg,png,pdf',
        ],[
            'profile_picture.mimes'=>'profile picture must be in format of jpg,jpeg,png or pdf',
        ]);


        $file= $request->file('profile_picture');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $extenstion = $file->getClientOriginalExtension();
        $file-> move(public_path('images/'), $filename);
        $profile=Tasker::find($id)->update(['image'=>$filename]);

        if ($profile) {
            return redirect()->back()->with('profile_changed','profile changed  successfully !');
        }else{
            return redirect()->back()->with('profile_error','profile picture must be in format of jpg,jpeg,png or pdf');

        }
    }

    function ManageProfiles(){
        return view('users.tasker.profile');
    }

    public function ManagePassword(){
        return view('users.tasker.password');
    }

    public function CreatePassword(Request $request){
           # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8|max:100',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->guard('tasker')->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        Tasker::whereId(auth()->guard('tasker')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

}
