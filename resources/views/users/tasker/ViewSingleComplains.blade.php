@extends('users.tasker.Cover')
@section('content')
@php
	use App\Models\taskerfile;
@endphp
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">

		<div class="card">
			<div class="card-header text-center bg-info">Citizen complains</div>
			<div class="card-body" style="overflow:auto;">
				@foreach($complains as $data)
				<h4><b><span class="text-info">Names </span>: {{$data->names}}</b></h4>
				<hr>
				<h4><b><span class="text-info">Complains</span>: {{$data->complains}}</b></h4>
				<hr>
				<?php
					if ($data->image == null){
					}else{
						?>
						<a href="{{URL::to('/')}}/images/citizen/{{$data->image}}" target="parent" ></a> <img src="{{URL::to('/')}}/images/citizen/{{$data->image}}" style="width:100px;height:150px;"></a>
						<?php
					}
						
				?>
				
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

@endsection

