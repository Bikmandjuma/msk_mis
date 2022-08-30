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
					</tbody>
				</table>

			</div>
		</div>		
	</div>
	<div class="col-md-1"></div>	
</div>

		<?php
			$data_counts=Tasker::all();
			$counts=collect($data_counts)->count();
		?>

		@if($counts == 0)
			<div class="card">
				<div class="card-header text-white bg-info">Duhamagare</div>
				<div class="card-body" style="overflow:auto;">
				<h2>Nta makuru mububiko !</h2>
				</div>
			</div>
		@endif
<br>
@endsection