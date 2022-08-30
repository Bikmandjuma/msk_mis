@extends('users.Admin.Cover')
@section('content')
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
			@if(session('added'))
		            <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		              <strong>{{session('added')}}</strong>
		            </div><br>
		    @endif
		<div class="card">
			<div class="card-header text-center bg-info">Add About Us content (on homepage)</div>
			<div class="card-body" style="overflow:auto;">
				<form action="{{route('createAbout')}}" method="POST">
				@csrf
					<label>Title</label>
					<input name="title" placeholder="enter title" class="form-control" value="{{old('title')}}">
					<span style="color: red;">@error('title') {{$message}} @enderror</span>
					<br>
					<label>Content</label>
					<textarea name="description" rows="3" placeholder="Content . . . . " class="form-control"></textarea>
					<span style="color: red;">@error('description') {{$message}} @enderror</span>
					<br>
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>&nbsp;&nbsp;<button class="btn btn-danger" type="reset" name="submit">Reset</button>
				</form>
			</div>
	</div>
	<div class="col-md-2"></div>
</div>
@endsection

