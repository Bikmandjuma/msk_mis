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

                    @if (count($errors) > 0)
                        <div class="alert alert_error">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                      </div>
                    @endif

                    <form action="{{route('UpdateService',$ServiceData->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" value="{{$ServiceData->id}}" hidden>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$ServiceData->title}}" class="form-control" style="border:2px solid skyblue;">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Content</label>
                            <input type="text" name="content" value="{{$ServiceData->content}}" class="form-control" style="border:2px solid skyblue;">
                        </div>

                        <label>Image</label>
                        <div class="input-group control-group increment" >
                          <input type="file" name="filename[]" class="form-control">
                          <div class="input-group-btn"> 
                            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                          </div>
                        </div>
                        <div class="clone hide">
                          <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="filename[]" class="form-control">
                            <div class="input-group-btn"> 
                              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                          </div>
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


<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>


@endsection