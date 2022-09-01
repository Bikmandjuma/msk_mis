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
                    <h4>Edit & Update service</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('UpdateService',$ServiceData->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" value="{{$ServiceData->id}}" hidden>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$ServiceData->title}}" class="form-control" style="border:2px solid skyblue;">
                            <span style="color: red;">@error('title') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Content</label>
                            <input type="text" name="content" value="{{$ServiceData->content}}" class="form-control" style="border:2px solid skyblue;">
                            <span style="color: red;">@error('content') {{$message}} @enderror</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <img id="serv_img" src="{{URL::to('/')}}/images/citizen/service/{{$ServiceData->image}}" style="width: 200px; height: 200px;border:1px solid skyblue;"><br>
                            <input type="file" name="image" value="{{$ServiceData->image}}" class="form-control" style="border:2px solid skyblue;" accept="image/*" id="imgInp" value="{{$ServiceData->image}}">
                            <span style="color: red;">@error('image') {{$message}} @enderror</span>
                        </div>
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save change</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    serv_img.src = URL.createObjectURL(file)
  }
}
</script>
@endsection