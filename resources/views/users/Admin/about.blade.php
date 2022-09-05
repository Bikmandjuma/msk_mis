@extends('users.Admin.Cover')
@section('content')

@php
	use App\Models\servicetitle;
@endphp
<br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
			@if(session('added'))
		            <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		              <strong>{{session('added')}}</strong>
		            </div><br>
		    @endif
		<div class="card">
			<div class="card-header text-center bg-info">Add Service title</div>
			<div class="card-body" style="overflow:auto;">
				<form action="{{route('createAbout')}}" method="POST">
				@csrf
					<label>Service title</label>
					<input name="name" placeholder="enter name" class="form-control" value="{{old('name')}}">
					<span style="color: red;">@error('name') {{$message}} @enderror</span>
					<br>
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>&nbsp;&nbsp;<button class="btn btn-danger" type="reset" name="submit">Reset</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

	<?php
		$servicesdata=servicetitle::all();
	?>

<br>
<style type="text/css">
	.list-group a:hover{
		text-decoration: none;
	}
</style>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header text-center bg-info">Services titles</div>
			<div class="card-body" style="overflow:auto;">
				<ul class="list-group">
				@foreach($servicesdata as $data)
					  <li class="list-group-item"><span style="background-color:#eee;padding:5px;">{{$data->id}}</span>&nbsp;<a href="{{url('admin/service/content')}}/{{$data->id}}">{{$data->name}}</a></li>
				@endforeach
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

@endsection

