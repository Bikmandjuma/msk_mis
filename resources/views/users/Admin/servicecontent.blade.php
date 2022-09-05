@extends('users.Admin.Cover')
@section('content')

@php
	use App\Models\servicecontent;
	use App\Models\servicetitle;
@endphp

<?php
	$id=$service_id;
	$servicescontent=servicetitle::all()->where('id',$id);
?>
<br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
			@if(session('service_added'))
		            <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		              <strong>{{session('service_added')}}</strong>
		            </div><br>
		    @endif
		<br>
		<div class="card">
			@foreach($servicescontent as $title)
			<div class="card-header text-center bg-success">{{$title->name}}</div>
			@endforeach
			<div class="card-body" style="overflow:auto;">
				<form action="{{route('createServiceContent',$id)}}" method="POST">
				@csrf
					<label>Enter Content</label>
					<input name="content" placeholder="enter content" class="form-control" value="{{old('content')}}">
					<span style="color: red;">@error('content') {{$message}} @enderror</span>
					<br>
					<button class="btn btn-primary float-right" type="submit" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

	<?php
		$ids=$service_id;
		$servicesdata=servicecontent::all()->where('service_id',$ids);
		$counts=collect($servicesdata)->count();
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
		@if($counts == 0)
		<div class="card">
			<div class="card-header text-center bg-success">Services contents</div>
			<div class="card-body text-center" style="overflow:auto;">
				<h3>No data found !</h3>
			</div>
		</div>
		@else
		
		<div class="card">
			@foreach($servicescontent as $title)
			<div class="card-header text-center bg-secondary"><span class="badge" style="background-color:blue;">{{$counts}}</span> contents of {{$title->name}}</div>
			@endforeach
			<div class="card-body" style="overflow:auto;">
				<ul class="list-group">
				@foreach($servicesdata as $key => $data)
					  <li class="list-group-item"><!-- <span style="background-color:gray;color:white;padding:7px;">{{$key}} --></span>&nbsp;&nbsp;{{$data->content}}</li>&nbsp;
				@endforeach
				</ul>
			</div>
		</div>
		@endif
	</div>
	<div class="col-md-2"></div>
</div>

@endsection

