@extends('users.citizen.Cover')
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
				<div class="card-header text-white bg-info">{{$data->title}}</div>
				<div class="card-body text-center" style="overflow:auto;">
					{{$data->description}}
				</div>
			</div>
			<br>
			
		@endforeach

		@if($counts == 0)
			<div class="card">
				<div class="card-header text-white bg-info">Ibijyanye natwe</div>
				<div class="card-body" style="overflow:auto;">
				<h2>Nta makuru mububiko !</h2>
				</div>
			</div>
		@endif	
	</div>
	<div class="col-md-2"></div>
</div>

<br>

@endsection