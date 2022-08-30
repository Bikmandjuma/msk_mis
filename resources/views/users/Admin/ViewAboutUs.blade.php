@extends('users.Admin.Cover')
@section('content')
@php
	use App\Models\aboutus;
@endphp
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<?php  
		$data_counts=aboutus::all();
		$counts=collect($data_counts)->count();
	?>
		@foreach($aboutdata as $data)
			<div class="card">
				<div class="card-header text-center bg-info">{{$data->title}}</div>
				<div class="card-body text-center" style="overflow:auto;">
					{{$data->description}}
				<br>
				<hr>
				<br>
					<a href="{{url('admin/edit/about')}}/{{$data->id}}"><button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
				</div>
			</div>
		@endforeach

		@if($counts == 0)
			<div class="card">
				<div class="card-header text-center bg-info">Homepage about us contents</div>
				<div class="card-body" style="overflow:auto;">
				<h2>No data found !</h2>
				</div>
			</div>
		@endif	
	</div>
	<div class="col-md-2"></div>
</div>

@endsection

