<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TaskerRole;
use App\Models\Tasker;
use App\Models\aboutus;
use App\Models\Admin;
use App\Models\Es;
use App\Models\Servicetb;
use App\Models\servicetitle;
use App\Models\servicecontent;

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
            'name' => 'required|string',
        ]);

            $datas=new servicetitle;
            $datas->name = $request->name;                
            $datas->save();

        return redirect()->back()->with('added','New Service content added successfully !');
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

    function EditRole($id){
        $role_data =TaskerRole::find($id);
        return view('users.Admin.EditRole',compact('role_data'));
    }

    function UpdateRoles(Request $request,$id){
        $data =TaskerRole::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect(route('staffroles'))->with('status','data Updated Successfully');
    }

    public function FormService(){
        return view('users.Admin.Services');
    }

    public function CreateService(Request $request){
         $request->validate([
                'title' => 'required',
                'content' => 'required|max:255',
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);


            // if($request->hasFile('image')){
            //     $file= $request->file('image');
            //     $filename= date('YmdHi').$file->getClientOriginalName();
            //     $extenstion = $file->getClientOriginalExtension();
            //     $file-> move(public_path('images/citizen/service'), $filename);
            //     $datas['image']= $filename;
            // }

             if($request->hasfile('filename'))
             {

                foreach($request->file('filename') as $image)
                {
                    $extenstion = $image->getClientOriginalExtension();
                    $name=date('YmdHi').'.'.$image->getClientOriginalName();
                    $image-> move(public_path('assets/images/'), $name); 
                    $data[] = $name;  
                }
             }

            $form= new Servicetb();
            $form->title = $request->title;
            $form->image=json_encode($data);
            $form->content = $request->content;
            $form->save();

            return redirect()->back()->with('service_added','Service content added successfully !');

    }

    public function ViewService(){
        $servicedata=Servicetb::orderBy('id','desc')->paginate(5);
        return view('users.Admin.ViewService',compact('servicedata'));
    }

    public function DeleteService($id){
        $DeleteService=Servicetb::find($id)->delete();
        return redirect()->back()->with('service_deleted','Service deleted !');
    }

    public function EditService($id){
        $ServiceData=Servicetb::find($id);
        return view('users.Admin.EditService',compact('ServiceData'));
    }

    public function UpdateServices(Request $request,$id){
            $request->validate([
                'title' => 'required',
                'content' => 'required|max:255',
                'filename'=>'required',
                'filename.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);

            $form=Servicetb::find($id);
             if($request->hasfile('filename'))
             {

                foreach($request->file('filename') as $image)
                {
                    $extenstion = $image->getClientOriginalExtension();
                    $name=date('YmdHi').'.'.$image->getClientOriginalName();
                    $image-> move(public_path('assets/images/'), $name); 
                    $data[] = $name;  
                }
             }

            $form->title = $request->title;
            $form->image=json_encode($data);
            $form->content = $request->content;
            $form->save();

        return redirect(route('ViewServices'))->with('status','Service updated !');
    }

    public function ServiveContent($id){
        $service_id=$id;
        return view('users.Admin.servicecontent',compact('service_id'));
    }

    public function CreateServiveContent(Request $request,$id){
        $request->validate([
            'content' => 'required|string',
        ]);

        servicecontent::create([
            'content'=>$request->content,
            'service_id'=>$id,
        ]);

        return redirect()->back()->with('service_added','New service content is added !');
    }

    public function ManagePassword(){
        return view('users.Admin.Password');
    }


    public function CreatePassword(Request $request){
           # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8|max:100',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->guard('admin')->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        Admin::whereId(auth()->guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }

    public function ManageProfile(){
        return view('users.Admin.profile');
    }

    public function CreateProfile(Request $request){
        $id=auth()->guard('admin')->user()->id;
        $request->validate([
            'profile_picture' => 'mimes:jpg,jpeg,png,pdf',
        ],[
            'profile_picture.mimes'=>'profile picture must be in format of jpg,jpeg,png or pdf',
        ]);


        $file= $request->file('profile_picture');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $extenstion = $file->getClientOriginalExtension();
        $file-> move(public_path('assets/images/'), $filename);
        $profile=Admin::find($id)->update(['image'=>$filename]);

        if ($profile) {
            return redirect()->back()->with('profile_changed','profile changed  successfully !');
        }else{
            return redirect()->back()->with('profile_error','profile picture must be in format of jpg,jpeg,png or pdf');
        }   
    } 

    public function Myinformation(){
        $info=Admin::all();
        return view('users.Admin.myinformation',compact('info'));
    }

    public function EditAdminInfo($id){
        $staffdata=Admin::find($id);
        return view('users.Admin.EditInfo',compact('staffdata'));
    }

    function UpdateAdminInfo(Request $request,$id){
        $data =Admin::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->nat_id = $request->nat_id;
        $data->save();
        return redirect(route('AdminInformation'))->with('status','data Updated Successfully');
    }

    public function EditServiceTitle($id){
        $data=servicetitle::find($id);
        return view('users.Admin.EditServiceTitle',compact('data'));
    }

    public function UpdateServiceTitle(Request $request,$id){
        $data =servicetitle::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect(route('servicetitle'))->with('status','data Updated Successfully');
    }

    public function EditServiceContent($ids,$id){
        $service_title_id=$ids;
        $data=servicecontent::find($id);
        return view('users.Admin.EditServiceContent',compact('data','service_title_id'));
    }

    public function UpdateServiceContent(Request $request,$ids,$id){
        $service_id=$ids;
        $data =servicecontent::find($id);
        $data->content = $request->content;
        $data->save();
        return redirect(route('ServiceContents',$service_id))->with('status','data Updated Successfully');
    }
}

