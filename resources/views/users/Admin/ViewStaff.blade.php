@extends('users.Admin.Cover')
@section('content')
@php
	use Illuminate\Support\Facades\DB;
	use App\Models\CitizenComplain;
	use App\Models\Tasker;
	use App\Models\Es;
@endphp
<br>
<div class="row">
	<div class="col-md-12">
	<?php  
		$data_counts=Tasker::all();
		$counts=collect($data_counts)->count();

		$data_es=Es::all();
	?>
		<div class="card">
			<div class="card-header text-center bg-info">Staff information</div>
			<div class="card-body" style="overflow:auto;">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>profile</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Gender</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($data_es as $datas)
							<tr>
								<td>
									<img src="{{URL::to('/')}}/images/{{$datas->image}}" style="width:40px;height:40px;border-radius:50%;border:1px solid skyblue;">
								</td>
								<td>{{$datas->firstname}}</td>
								<td>{{$datas->lastname}}</td>
								<td>{{$datas->gender}}</td>
								<td>{{$datas->phone}}</td>
								<td>{{$datas->email}}</td>
								<td><b>E/s</b></td>
								<td><a href="{{route('AdminEditEs',$datas->id)}}"><i class="fa fa-edit"></i> Edit</a></td>

							</tr>
						@endforeach
						@foreach($staffdata as $data)
							<tr>
								<td>
									<img src="{{URL::to('/')}}/images/{{$data->image}}" style="width:40px;height:40px;border-radius:50%;border:1px solid skyblue;">
								</td>
								<td>{{$data->firstname}}</td>
								<td>{{$data->lastname}}</td>
								<td>{{$data->gender}}</td>
								<td>{{$data->phone}}</td>
								<td>{{$data->email}}</td>
								<?php
								$roles_id=$data->role_id;
								$roler=DB::table('taskers')
								        ->join('tasker_roles', 'tasker_roles.id', '=', 'taskers.role_id')
								        ->select('taskers.*','tasker_roles.name')
								        ->where(['tasker_roles.id'=>$roles_id])->get();

								foreach ($roler as $role) {
									?>
										<td><b>{{$role->name}}</b></td>
									<?php
									break;
								}
								?>
								<td><a href="{{route('AdminEditStaffMembes',$data->id)}}"><i class="fa fa-edit"></i> Edit</a></td>
							</tr>
						   

							
						@endforeach
						<tr class="text-center">
							@if($counts == 0)
								<td colspan="8">No data found !</td>
							@endif
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12 text-center">{{$staffdata->links()}}</div>
		</div>	

	</div>
</div>

@endsection

