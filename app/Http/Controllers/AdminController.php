<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TaskerRole;
use App\Models\Tasker;
use App\Models\aboutus;
use App\Models\Es;

use Validator;

class AdminController extends Controller
{
    public function dashboard(){
    	return view('users.Admin.Admin');
    }

    public function Addstaffrolefn(Request $request){

    	$request->validate([
            'role_name' => 'required|string|unique:tasker_roles,name',
        ],
        [
        	'role_name.unique' => '* This role name already registered *',
        ]);

        TaskerRole::create([
        	'name'=>$request->role_name,
        ]);

        return redirect()->back()->with('role_added','New role name is added !');
    } 

    public function ViewStaffRoles(){
    	$role_name=TaskerRole::all();
    	$count_role=collect($role_name)->count();
    	return view('users.Admin.StaffRole',compact('role_name','count_role'));
    }

    public function FormRegisterStaffMember(){
    	return view('users.Admin.RegisterStaffMember');
    }

    public function About(){
        return view('users.Admin.about');
    }

    public function CreateAbout(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

            $datas=new aboutus;
            $datas->title = $request->title;                
            $datas->description = $request->description;
            $datas->save();

        return redirect()->back()->with('added','New content added successfully !');
    }

    public function aboutdata(){
        $aboutdata=aboutus::all();

        return view('users.Admin.ViewAboutUs',compact('aboutdata'));
    }

    public function editabout($id){
        $about =aboutus::find($id);
        return view('users.Admin.editabout',compact('about'));
    }
    public function UpdateAbout(Request $request, $id)
    {
        $post =aboutus::find($id);
        // if($request->hasFile('Upload_image')){
        //     $file= $request->file('Upload_image');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file-> move(public_path('images/blog'), $filename);
        //     $post['image']= $filename;
        // }
        
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect(route('editabout'))->with('status','data Updated Successfully');
    }

    public function FormServices(){
        return view('users.Admin.Services');
    }

    function ViewStaffMembers(){
        $staffdata=Tasker::paginate(5);
        return view('users.Admin.ViewStaff',compact('staffdata'));
    }

    function EditStaffMembers($id){
        $staffdata =Tasker::find($id);
        return view('users.Admin.EditStaffMembers',compact('staffdata'));
    }

    public function UpdateStaffMembers(Request $request,$id){
        $data =Tasker::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->nat_id = $request->nat_id;
        $data->password =hash::make($request->phone);
        $data->save();
        return redirect(route('staffmembers'))->with('status','data Updated Successfully');
    }

    function EditEs($id){
        $staffdata =Es::find($id);
        return view('users.Admin.EditEs',compact('staffdata'));
    }

    public function UpdateEs(Request $request,$id){
        $data =Es::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->nat_id = $request->nat_id;
        $data->password =hash::make($request->phone);
        $data->save();
        return redirect(route('staffmembers'))->with('status','data Updated Successfully');
    }
}

