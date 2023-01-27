<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CitizenComplain;
use App\Models\Tasker;
use App\Models\Es;
use App\Models\esfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EsController extends Controller
{
    public function dashboard(){
    	return view('users.es.Es');
    }

    //fetch data of allcomplains toi e/s
    public function CitizenComplains(){
    	$data=CitizenComplain::where('forward',null)->paginate(5);
        $counts=collect($data)->count();
    	return view('users.es.forwardComplains', compact('data','counts'));
    }

    public function forwardComplains($id){
        $comp_id=$id;
        $yes='forwarded';
        date_default_timezone_set('Africa/Kigali');
        $date_fwd=date('d-m-Y');
        $time_fwd=date('H:i:s');
        $forwarding=DB::table('citizen_complains')->where('id',$comp_id)
                ->update(['forward' =>$yes,'date_co' =>$date_fwd,'time_co' =>$time_fwd,]);

        return redirect()->back()->with('forwarded','Complain forwarded successfully !');
    } 

    public function SolvedComplains(){
        $data=CitizenComplain::where('complains_reply','solved')->where('decision','done')->paginate(5);
        return view('users.es.SolvedComplains', compact('data'));
    }

    public function UnsolvedComplains(){
        $data=CitizenComplain::where('forward','forwarded')->where('complains_reply','pending')->where('decision',null)->paginate(5);
        return view('users.es.UnsolvedComplains', compact('data'));
    }

    public function ViewStaff(){
        $staffdata=Tasker::paginate(4);
        return view('users.es.ViewStaff', compact('staffdata'));
    }

    public function Myinformation(){
        $info=Es::all();
        return view('users.es.myinformation',compact('info'));
    }


    public function formdocument(){
        return view('users.es.CreateDocument');
    }

    public function CreateDocument(Request $request){
            $request->validate([
                'name' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,pdf,zip,gif,docs,docx,csv,pptx',
                'content' => 'required|max:200',
            ]);

            $datas=new esfile;
            $datas->name = $request->name;

            if($request->hasFile('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $extenstion = $file->getClientOriginalExtension();
                $file-> move(public_path('assets/images/'), $filename);
                $datas['image']= $filename;
            }
            $datas->content = $request->content;
            $datas->save();
        return redirect()->back()->with('file_added','New file added successfully !');
    }

    public function ViewDocument(){
        $filedata=esfile::paginate(5);
        return view('users.es.ViewDocument', compact('filedata'));
    }

    public function ManagePassword(){
        return view('users.es.password');
    }

    public function CreatePassword(Request $request){
           # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8|max:100',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->guard('es')->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        Es::whereId(auth()->guard('es')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }

    function ManageProfile(){
        return view('users.es.profile');
    }

    public function CreateProfile(Request $request){
        $id=auth()->guard('es')->user()->id;
        
        $request->validate([
            'profile_picture' => 'mimes:jpg,jpeg,png,pdf',
        ],[
            'profile_picture.mimes'=>'profile picture must be in format of jpg,jpeg,png or pdf',
        ]);


        $file= $request->file('profile_picture');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $extenstion = $file->getClientOriginalExtension();
        $file-> move(public_path('assets/images/'), $filename);
        $profile=Es::find($id)->update(['image'=>$filename]);

        if ($profile) {
            return redirect()->back()->with('profile_changed','profile changed  successfully !');
        }else{
            return redirect()->back()->with('profile_error','profile picture must be in format of jpg,jpeg,png or pdf');
        }   
    }

    public function EditEsInfo($id){
        $staffdata=Es::find($id);
        return view('users.es.EditInfo',compact('staffdata'));
    }

    function UpdateInfo(Request $request,$id){
        $data =Es::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->nat_id = $request->nat_id;
        $data->save();
        return redirect(route('EsInformation'))->with('status','data Updated Successfully');
    }

    public function EsViewComplains($id){
        $complains=CitizenComplain::all()->where('id',$id);
        return view('users.es.ViewSingleComplains',compact('complains'));
    }

    public function AllComplains(){
        $data=CitizenComplain::paginate(10);
        return view('users.es.AllComplains',compact('data'));
    }

    public function SearchComplain(Request $request,$search){
        $advance_qry = trim($request->query('search'));
         $requestData = ['names', 'complains'];
          $complains = CitizenComplain::where(function($q) use($requestData, $advance_qry) {
                                foreach ($requestData as $field)
                                   $q->orWhere($field, 'like', "%{$advance_qry}%");
                        })->get();
        return view('users.es.SearchComplains',compact('complains'));
    }
}

