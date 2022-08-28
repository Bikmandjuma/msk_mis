@extends('users.es.Cover')
@section('content')
@php
	use Illuminate\Support\Facades\DB;
	use App\Models\CitizenComplain;
@endphp
<?php  
	$data_counts=CitizenComplain::all()->where('forward','');
    $counts=collect($data_counts)->count();
?>
<br>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	
		@if(session('forwarded'))
		       <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		         <strong>{{session('forwarded')}}</strong>
		       </div><br>
		@endif
		<div class="card">
			<div class="card-header text-center bg-info">Citizen complains</div>
			<div class="card-body" style="overflow:auto;">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Names</th>
							<th>Phone</th>
							<th>email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $content)
							<?php
								if($content->email == null){
									$emails='- - - ';
								}else{
									$emails=$content->email;
								}

								$roles_id=$content->role_id;

								$roler=DB::table('citizen_complains')
								        ->join('tasker_roles', 'tasker_roles.id', '=', 'citizen_complains.role_id')
								        ->select('citizen_complains.*','tasker_roles.name')
								        ->where(['citizen_complains.role_id'=>$roles_id])->get();
							?>

							<tr>
								<td>{{$content->names}}</td>
								<td>{{$content->phone}}</td>
								<td>{{$emails}}</td>
								<td>

								<?php
									foreach($roler as $tasker){
										?>
										<a href="{{url('es/forwarding')}}/{{$content->id}}"><button class="btn btn-success" type="submit" onclick="return confirm('Forward this complain to {{$tasker->name}}')">Forward&nbsp;to&nbsp;{{$tasker->name}}</button></a>

								<?php
									break;
									}
								?>

								</td>
							</tr>
							
						@endforeach
						<tr class="text-center">
							@if($counts == 0)
								<td colspan="4">No data found !</td>
							@endif
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12 text-center">{{$data->links()}}</div>
		</div>	
	</div>
	<div class="col-md-2"></div>
</div>

@endsection

