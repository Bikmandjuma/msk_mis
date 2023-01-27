@extends('auth.Cover')
@section('content')

<br>
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-6"></div>
      <div class="col-xl-4 col-lg-4 col-md-6">

        @if(session('fail'))
            <div class="alert alert_error" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
              <strong>{{session('fail')}}</strong>
            </div>
        @endif

        @if(Session::has('message'))
            <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
              <strong>{{Session::get('message')}}</strong>
            </div><br>
        @endif
        
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-6 mx-auto">
              <div style="background-color:#295684;font-size:20px;color:white;border-radius:10px 10px 0px 0px;" class="text-center">Login here</div>
            <div id="first">
              <div class="myform_login form">
                
                    <form action="{{route('LoginPost')}}" method="POST">
                      {!! csrf_field() !!}

                           <div class="form-group">
                              <label for="exampleInputEmail1"><i class="fa fa-envelope"></i>&nbsp;Email address</label>
                              <div class="input-group">
                                <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                              </div>
                              <span class="text-danger"> @error('email') {{ $message }}@enderror</span>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1"><i class="fa fa-lock"></i>&nbsp;Password</label>
                              <div class="input-group">
                                <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">  
                              </div>
                              <span class="text-danger"> @error('password') {{$message}}@enderror</span>
                           </div>
                          <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                               <button type="submit" id="btn-login"><i class="fa fa-lock-open"></i>&nbsp;Login</button>
                           </div>
                           <div class="col-xl-12 col-lg-12 col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or_login">
                                 <span class="span-or_login">or</span>
                              </div>
                           </div>
                           <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                              <p class="text-center">
                                 <a href="{{route('forget.password.get')}}" style="color:black;"><i class="fa fa-key" style="color:black;">
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
      <div class="col-xl-4 col-lg-4 col-md-6"></div>
    </div>
    <br>
@endsection