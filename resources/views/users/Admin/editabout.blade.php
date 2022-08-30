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
                <div class="card-header bg-info text-white">
                    <h4>Edit & Update about us</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('updateabout',$about->id)}}" method="POST">
                        @csrf
                        <input type="text" name="name" value="{{$about->id}}" hidden>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$about->title}}" class="form-control" style="border:2px solid skyblue;">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Content</label>
                            <input type="text" name="description" value="{{$about->description}}" class="form-control" style="border:2px solid skyblue;">
                        </div>
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save change</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection