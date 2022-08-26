@extends('auth.Cover')
@section('content')
<style type="text/css"></style>
    <div class="row" style="margin-top:-30px;">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        @if(session('fail'))
            <div class="alert alert_error" style="margin-left:20px;text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
              <strong>{{session('fail')}}</strong>
            </div><br>
        @endif
      <div class="container" style="margin-top:-20px;">
        <div class="row">
          <div class="col-md-5 mx-auto">
            <div id="first">
              <div class="myform_login form ">
                 <div class="logo mb-3" style="background-color:teal;">
                   <div class="col-md-12 text-center">
                    <h2 style="color: white;">Login here</h2>
                   </div>
                </div>
                    <form action="{{route('LoginPost')}}" method="POST">
                      {!! csrf_field() !!}

                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                              </div>
                              <span class="text-danger"> @error('email') {{ $message }}@enderror</span>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">  
                              </div>
                              <span class="text-danger"> @error('password') {{ $message }}@enderror</span>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn_login btn-primary tx-tfm_login"><i class="fa fa-sign-in"></i>&nbsp; Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or_login">
                                 <span class="span-or_login">or</span>
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                              <p class="text-center">
                                 <a href="#"><i class="fa fa-key">
                                 </i> Forgot password
                                 </a>
                              </p>
                           </div>
                        </form>
                 
                    </div>
                  </div>
                </div>
              </div> 
            </div>  
               
      </div>
      <div class="col-md-4"></div>
    </div>
@endsection