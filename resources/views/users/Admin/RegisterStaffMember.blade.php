@extends('users.admin.Cover')
@section('content')
@php
use App\Models\TaskerRole;
@endphp
<br>
<?php
$role_name=TaskerRole::all();
?>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if(session('create_tasker'))
              <span style="color:blue;">{{session('create_tasker')}}</span>
            @endif

            @if(session('error_create_tasker'))
              <span style="color:red;">{{session('error_create_tasker')}}</span>
            @endif

            <div class="card">
              <div class="card-header text-center bg-info">Register staff member</div>
              <div class="card-body">
                <form action="{{route('CreateStaffMember')}}" method="POST">
                @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <label><strong>Firstname</strong></label>
                      <input type="text" name="firstname" placeholder="Enter firstname" value="{{old('firstname')}}" class="form-control">
                      <span style="color:red;">@error('firstname') {{$message}}<br> @enderror</span>
                      <label><strong>Lastname</strong></label>
                      <input type="text" name="lastname" placeholder="Enter lastname" value="{{old('lastname')}}" class="form-control">
                      <span style="color:red;">@error('lastname') {{$message}}<br> @enderror</span>
                      <label><strong>Gender</strong></label>
                      <select class="form-control" name="gender">
                        <option value="">select . . . </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      <span style="color:red;">@error('gender') {{$message}}<br> @enderror</span>
                      <label><strong>Phone</strong></label>
                      <input type="text" name="phone" placeholder="Enter phone number" value="{{old('phone')}}" class="form-control">
                      <span style="color:red;">@error('phone') {{$message}}<br> @enderror</span>
                    </div>
                    <div class="col-md-6">
                      <label><strong>Email</strong></label>
                      <input type="email" name="email" placeholder="Enter email" value="{{old('email')}}" class="form-control">
                      <span style="color:red;">@error('email') {{$message}}<br> @enderror</span>
                      <label><strong>National id</strong></label>
                      <input type="text" name="national_id" placeholder="Enter national id" value="{{old('national_id')}}" class="form-control">
                      <span style="color:red;">@error('national_id') {{$message}}<br> @enderror</span>
                      <label><strong>Role (Task)</strong></label>
                      <select class="form-control" name="role">
                        <option value="">select . . .</option>
                        @foreach($role_name as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      <span style="color:red;">@error('role') {{$message}}<br> @enderror</span>
                      </select><br>
                      <button class="btn btn-primary" type="submit">Register</button>&nbsp;&nbsp;
                      <button class="btn btn-danger" type="reset">Reset</button>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection
