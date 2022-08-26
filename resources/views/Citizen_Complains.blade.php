@extends('users.citizen.Cover')
@section('content')
@php
use App\Models\TaskerRole;
@endphp
<?php
$roles=TaskerRole::all();
?>

                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-4">
                          @if(session('complain_sent'))
                              <div class="alert alert_success"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                              <strong>{{session('complain_sent')}}</strong>
                              </div>
                          @endif  
                      </div>
                      <div class="col-md-4"></div>
                    </div>

                    <div class="container" style="margin-top:-50px;">
                       <div class="row">
                         <div class="col-md-12 mx-auto">
                          <div style="background-color:teal;font-size:20px;color:white;padding-top:10px;padding-bottom:10px;" class="text-center">Citizen complain form</div>
                           <div id="first">
                             <div class="myform_login form ">
                                   <form action="{{route('send_complains')}}" method="POST">
                                     {!! csrf_field() !!}
                                        <div class="row">
                                        <div class="col-md-6">
                                             <label><b>Amazina</b></label>
                                             <input type="text" name="names" placeholder="Andika amazina yombi" class="form-control" value="{{old('names')}}">
                                             <span style="color:red;">@error('names') {{$message}} @enderror</span>
                                             <br>
                                             <label><b>Telephone</b></label>
                                             <input type="text" name="phone" placeholder="Andika nimero ya telephone" class="form-control" value="{{old('phone')}}">
                                             <span style="color:red;">@error('phone') {{$message}} @enderror</span>
                                             <br>
                                             <label><b>Email (niba uyifite)</b></label>
                                             <input type="email" name="email" placeholder="Andika imeri niba uyifite" class="form-control" value="{{old('email')}}">
                                             <span style="color:red;">@error('email') {{$message}} @enderror</span>
                                             <br>
                                             <label><b>Ubishinzwe</b></label>
                                             <select class="form-control" name="role_id">
                                             <option value="">hitamo ubishinzwe</option>
                                             @foreach($roles as $data)
                                                  <option value="{{$data->id}}">{{$data->name}}</option>
                                             @endforeach
                                             </select>
                                             <span style="color:red;">@error('role_id') {{$message}} @enderror</span>
                                             <br>
                                        </div>
                                        <div class="col-md-6">
                                             <label><b>Andika ikibazo</b></label>
                                             <textarea rows="5" placeholder="andika ikibazo ufite. . . . . " name="complains" class="form-control" class="form-control"></textarea>
                                             <span style="color:red;">@error('complains') {{$message}} @enderror</span>
                                             <br>
                                             <label><b>Shiraho ifoto cyangwa dokima</b></label>
                                             <input type="file" name="docs" class="form-control" multiple value="{{old('docs')}}">
                                             <span style="color:red;">@error('docs') {{$message}} @enderror</span>
                                             <br>
                                             <br>
                                             <button class="btn btn-danger" name="submit">Ohereza</button>           
                                        </div>
                                      </div>
                                    </form>
                                
                                   </div>
                                 </div>
                               </div>
                             </div> 
                           </div>  
     <!-- Citizens complains -->
          <!-- <div class="container" style="margin-top:-40px;">
               <div class="row">
                    
                    <div class="row">
                      <div class="col-sm-12 text-center"><h2>Citezens <small>Where citizens make their complains</small></h2></div>
                    </div>
                    
                     -->

                    
                    <!--Form start-->
                    <!-- <div class="card" style="background-color:#ccc;">
                         <div class="card-body text-center text-white" style="background-color:teal;">
                              <h1 style="color: white;"><b>Citizen form</b></h1>
                         </div>
                         <div class="card-body">
                              <form class="form-group" action="{{route('send_complains')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                                   <div class="row">
                                        <div class="col-md-6">
                                             <label><b>Amazina</b></label>
                                             <input type="text" name="names" placeholder="Andika amazina yombi" class="form-control" value="{{old('names')}}">
                                             <span style="color:red;">@error('names') {{$message}} @enderror</span>
                                             <br>
                                             <label><b>Telephone</b></label>
                                             <input type="text" name="phone" placeholder="Andika nimero ya telephone" class="form-control" value="{{old('phone')}}">
                                             <span style="color:red;">@error('phone') {{$message}} @enderror</span>
                                             <br>
                                             <label><b>Email (niba uyifite)</b></label>
                                             <input type="email" name="email" placeholder="Andika imeri niba uyifite" class="form-control" value="{{old('email')}}">
                                             <span style="color:red;">@error('email') {{$message}} @enderror</span>
                                             <br>
                                             <label><b>Ubishinzwe</b></label>
                                             <select class="form-control" name="role_id">
                                             <option value="">hitamo ubishinzwe</option>
                                             @foreach($roles as $data)
                                                  <option value="{{$data->id}}">{{$data->name}}</option>
                                             @endforeach
                                             </select>
                                             <span style="color:red;">@error('role_id') {{$message}} @enderror</span>
                                             <br>
                                        </div>
                                        <div class="col-md-6">
                                             <label><b>Andika ikibazo</b></label>
                                             <textarea rows="5" placeholder="andika ikibazo ufite. . . . . " name="complains" class="form-control" class="form-control"></textarea>
                                             <span style="color:red;">@error('complains') {{$message}} @enderror</span>
                                             <br>
                                             <label><b>Shiraho ifoto cyangwa dokima imwe cyangwa irenze imwe</b></label>
                                             <input type="file" name="docs" class="form-control" multiple value="{{old('docs')}}">
                                             <span style="color:red;">@error('docs') {{$message}} @enderror</span>
                                             <br>
                                             <br>
                                             <button class="btn btn-danger" name="submit">Ohereza</button>           
                                        </div>
                                   </div>
                                   
                              </form>
                         </div>
                    </ --><!-- div> -->
                    <!--Form end--> 
                    <!-- </div>

               </div>
          </div> -->

@endsection