@extends('users.Admin.Cover')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="">
            @if(session('status'))
                    <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                      <strong>{{session('status')}}</strong>
                    </div><br>
            @endif

            <div class="card" style="border:2px solid skyblue;">
                <div class="card-header bg-info text-white text-center">
                    <h4>Edit & Update your info</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('UpdateInfos',$staffdata->id)}}" method="POST">
                        @csrf
                        <input type="text" name="id" value="{{$staffdata->id}}" hidden>

                        <div class="form-group mb-3">
                            <label for="">Firstname</label>
                            <input type="text" name="firstname" value="{{$staffdata->firstname}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Laststname</label>
                            <input type="text" name="lastname" value="{{$staffdata->lastname}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Gender</label>
                            @if($staffdata->gender == "male")
                            <select name="gender" class="form-control">
                                <option value="{{$staffdata->gender}}">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @else
                             <select name="gender" class="form-control">
                                <option value="{{$staffdata->gender}}">Female</option>
                                <option value="male">Male</option>
                            </select>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{$staffdata->phone}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">email</label>
                            <input type="text" name="email" value="{{$staffdata->email}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">National id</label>
                            <input type="text" name="nat_id" value="{{$staffdata->nat_id}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary float-center"><i class="fa fa-save"></i> Save change</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection