@extends('users.Admin.Cover')
@section('content')
<br>
	<style type="text/css">
		.image-gallery {
		  display: flex;
		  flex-wrap: wrap;
		  gap: 10px;
		}

		.image-gallery > li {
		  height: 300px;
		  list-style-type:none;
		  cursor: pointer;
		  position: relative;
		}

		.image-gallery li img {
		  object-fit: cover;
		  width: 100%;
		  height: 100%;
		  vertical-align: middle;
		  border-radius: 5px;
		}
		.image-gallery::after {
		  content: "";
		  flex-basis: 350px;
		}

		.image-gallery > li {
		  /* ... */
		  flex-grow: 1;
		  position: relative;
		  cursor: pointer;
		}
				
		.overlay {
		  position: absolute;
		  width: 100%;
		  height: 100%;
		  background: rgba(57, 57, 57, 0.502);
		  top: 0;
		  left: 0;
		  transform: scale(0);
		  transition: all 0.2s 0.1s ease-in-out;
		  color: #fff;
		  border-radius: 5px;
		  /* center overlay text */
		  display: flex;
		  align-items: center;
		  justify-content: center;
		}

		/* hover */
		.image-gallery li:hover .overlay {
		  transform: scale(1);
		}
	</style>
</style>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
			@if(session('service_added'))
		            <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		              <strong>{{session('service_added')}}</strong>
		            </div><br>
		    @endif
		<div class="card">
			<div class="card-header text-center bg-info">News content</div>
			<div class="card-body" style="overflow:auto;">
				<form action="{{route('CreateServices')}}" method="POST" enctype="multipart/form-data">
				@csrf

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

					<label>title</label>
					<input name="title" placeholder="enter name" class="form-control" value="{{old('title')}}">
					<br>
					<label>Content</label>
					<textarea name="content" rows="3" placeholder="Content . . . . " class="form-control"></textarea>
					<br>
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
					<br>
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>&nbsp;&nbsp;<button class="btn btn-danger" type="reset" name="submit">Reset</button>
				</form>
			</div>
	</div>
	<div class="col-md-2"></div>
</div>

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

