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
			  ->select('taskers.*','taskers.firstname','taskers.email','taskers.lastname','taskers.phone','taskers.image','tasker_roles.name')->get();

	$data_counts=Tasker::all();
	$counts=collect($data_counts)->count();
?>
<br>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="card" style="border:2px solid skyblue;">
			<div class="card-header text-white text-center bg-info">Duhamagare</div>
			<div class="card-body text-center" style="overflow:auto;">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Amazina</th>
							<th>Terefone</th>
							<th>Emeri</th>
							<th>Icyobashinzwe</th>
						</tr>
					</thead>
					<tbody>
						@foreach($es_data as $data)
							<tr>
								<td>{{$data->firstname}}&nbsp;{{$data->lastname}}</td>
								<td>{{$data->phone}}</td>
								<td>{{$data->email}}</td>
								<td>E/s (Executive)</td>
							</tr>
						@endforeach

						@foreach($tasker_data as $data)
							<tr>
								<td>{{$data->firstname}}&nbsp;{{$data->lastname}}</td>
								<td>{{$data->phone}}</td>
								<td>{{$data->email}}</td>
								<td>{{$data->name}}</td>
							</tr>
						@endforeach

						@if($counts == 0)
							<tr>
								<td colspan="4">Ntayandi makuru mububiko !</td>
							</tr>
						@endif
					</tbody>
				</table>

			</div>
		</div>		
	</div>
	<div class="col-md-1"></div>	
</div>
<br>
@endsection