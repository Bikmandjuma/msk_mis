@extends('users.citizen.Cover')
@section('content')
@php
	use App\Models\Es;
	use App\Models\Tasker;
	use Illuminate\Support\Facades\DB;
@endphp
<?php  
	$es_data=Es::all();
	$tasker_data= DB::table('taskers')
            ->join('tasker_roles', 'tasker_roles.id', '=', 'taskers.role_id')
            ->select('taskers.*','taskers.firstname','taskers.lastname','taskers.phone','taskers.image','tasker_roles.name')->paginate(12);
    
    $data_counts=Tasker::all();
	$counts=collect($data_counts)->count();
?>
<br>

<div class="row">
	<div class="col-md-12 text-center"><b>Abakozi bakora mumurenge wa Masaka</b></div>
	
	@foreach($es_data as $data)
	<div class="col-md-3">
		<div class="card" style="border:2px solid skyblue;">
			<div class="card-header text-white text-center bg-info">E/S (Executive)</div>
			<div class="card-body text-center" style="overflow:auto;">
				<img src="{{asset('assets/images/'.$data->image)}}" style="width:140px;height:150px;border:2px solid black;"> 
				<p><b>{{$data->firstname}}&nbsp;{{$data->lastname}}</b></p>
				<p>{{$data->phone}}</p>
			</div>
		</div>
	</div>
	@endforeach	

	@foreach($tasker_data as $data)
	<div class="col-md-3">
		<div class="card" style="border:2px solid skyblue;">
			<div class="card-header text-white text-center bg-info">{{$data->name}}</div>
			<div class="card-body text-center" style="overflow:auto;">
				<img src="{{asset('assets/images/'.$data->image)}}" style="width:140px;height:150px;border:2px solid black;"> 
				<p><b>{{$data->firstname}}&nbsp;{{$data->lastname}}</b></p>
				<p>{{$data->phone}}</p>
			</div>
		</div><br>
	</div>
	@endforeach

	@if($counts == 0)
		<div class="col-md-9">
			<div class="card">
				<div class="card-header text-white bg-info">Abakozi bakora mumurenge</div>
				<div class="card-body" style="overflow:auto;">
				<h2>Nta yandi makuru mububiko !</h2>
				</div>
			</div>
		</div>
	@endif

</div>

<div class="row">
	<div class="col-md-12 text-center">{{$tasker_data->links()}}</div>
</div>
<br>
@endsection