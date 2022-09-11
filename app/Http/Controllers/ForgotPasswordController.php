<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon; 
use App\Models\Admin; 
use App\Models\Es; 
use App\Models\Tasker; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
  
class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {

      	$admin=Admin::all();
      	foreach ($admin as $value) {
      		$admin_email=$value->email;
      	}

      	$es=Es::all();
      	foreach ($es as $value) {
      		$es_email=$value->email;
      	}

      	$tasker_email=DB::Table('taskers')->select('email')->where('email',$request->email)->get();

      	if ($admin_email == $request->email) {
      		 $request->validate([
              'email' => 'required|email|exists:admins',
	          ]);
	  
	          $token = Str::random(64);
	  
	          DB::table('password_resets')->insert([
	              'email' => $request->email, 
	              'token' => $token, 
	              'created_at' => Carbon::now()
	            ]);
	  
	          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
	              $message->to($request->email);
	              $message->subject('Reset Password');
	          });
	  
	          return back()->with('message', 'We e-mailed your password reset link on your email !');

      	}elseif ($es_email == $request->email) {

      		 $request->validate([
              'email' => 'required|email|exists:es',
	          ]);
	  
	          $token = Str::random(64);
	  
	          DB::table('password_resets')->insert([
	              'email' => $request->email, 
	              'token' => $token, 
	              'created_at' => Carbon::now()
	            ]);
	  
	          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
	              $message->to($request->email);
	              $message->subject('Reset Password');
	          });
	  
	          return back()->with('message', 'We e-mailed your password reset link on your email !');

      	}elseif ($tasker_email) {

      		 $request->validate([
              'email' => 'required|email|exists:taskers',
	          ]);
	  
	          $token = Str::random(64);
	  
	          DB::table('password_resets')->insert([
	              'email' => $request->email, 
	              'token' => $token, 
	              'created_at' => Carbon::now()
	            ]);
	  
	          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
	              $message->to($request->email);
	              $message->subject('Reset Password');
	          });
	  
	          return back()->with('message', 'We e-mailed your password reset link on your email !');

      	}




          $request->validate([
              'email' => 'required|email|exists:admins',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:password_resets',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->get();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user1 = Admin::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          $user2= Es::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          $use3 = Tasker::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}
