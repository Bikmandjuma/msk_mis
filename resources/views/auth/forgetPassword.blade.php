@extends('users.citizen.Cover')
@section('content')
<br>
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-6"></div>
      <div class="col-xl-4 col-lg-4 col-md-6">
      
        @if(Session::has('message'))
            <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
              <strong>{{Session::get('message')}}</strong>
            </div><br>
        @endif

      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-6 mx-auto">
              <div style="background-color:#295684;font-size:20px;color:white;border-radius:10px 10px 0px 0px;" class="text-center">Reset password here</div>
            <div id="first">
              <div class="myform_login form ">
                
                    <form action="{{ route('forget.password.post') }}" method="POST">
                      {!! csrf_field() !!}

                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <div class="input-group">
                                <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                              </div>
                               @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                              @endif
                           </div>
                           
                          <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                               <button type="submit" id="btn-login"><i class="fa fa-paper-plane"></i>&nbsp;Send Password Reset Link</button>
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