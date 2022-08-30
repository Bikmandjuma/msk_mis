@extends('users.Admin.Cover')
@section('content')
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
			@if(session('service_added'))
		            <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		              <strong>{{session('service_added')}}</strong>
		            </div><br>
		    @endif
		<div class="card">
			<div class="card-header text-center bg-info">Add files</div>
			<div class="card-body" style="overflow:auto;">
				<form action="{{route('createservices')}}" method="POST" enctype="multipart/form-data">
				@csrf
					<label>Name</label>
					<input name="name" placeholder="enter name" class="form-control" value="{{old('name')}}">
					<span style="color: red;">@error('name') {{$message}} @enderror</span>
					<br>
					<label>Content</label>
					<textarea name="content" rows="3" placeholder="Content . . . . " class="form-control"></textarea>
					<span style="color: red;">@error('content') {{$message}} @enderror</span>
					<br>
					<label>Add file (document)</label>
					<input name="image" type="file" class="form-control"  value="{{old('image')}}">
					<span style="color: red;">@error('image') {{$message}} @enderror</span><br>
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>&nbsp;&nbsp;<button class="btn btn-danger" type="reset" name="submit">Reset</button>
				</form>
			</div>
	</div>
	<div class="col-md-2"></div>
</div>
@endsection

