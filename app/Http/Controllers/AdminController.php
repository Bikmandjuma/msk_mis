<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskerRole;
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
        	'role_name.unique' => 'This role name already registered !',
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
}
