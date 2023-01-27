@extends('users.citizen.Cover')
@section('content')

@php
	use App\Models\servicecontent;
	use App\Models\servicetitle;
@endphp

<br>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<?php  
		$data_counts=servicecontent::all();
		$counts=collect($data_counts)->count();

		$service_title=servicetitle::all();
		
	?>

	@foreach($service_title as $title)
		@php
			$service_content=servicecontent::all()->where('service_id',$title->id);
			$countss=collect($service_content)->count()
		@endphp
		
		@if($countss == 0)
		@else
			<ul class="list-group" style="overflow: auto;">
				<li class="list-group-item active">{{$title->name}}</li>
				@foreach($service_content as $content)
					<li class="list-group-item">{{$content->content}}</li>
				@endforeach
			</ul><br>
		@endif

	@endforeach

		@if($counts == 0)
			<div class="card">
				<div class="card-header text-white bg-info">Ibijyanye natwe</div>
				<div class="card-body" style="overflow:auto;">
				<h2>Ntamakuru ari mububiko !</h2>
				</div>
			</div>
		@endif	
	</div>
	<div class="col-md-2"></div>
</div>

<br>

@endsection