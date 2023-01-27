@extends('users.Admin.Cover')
@section('content')

@php
use App\Models\CitizenComplain;
@endphp

<?php
	$data_counts=CitizenComplain::all();
	$counts=collect($data_counts)->count();
?>
<br>
<div class="row">
	<div class="col-md-12">

		<div class="card">
			<div class="card-header text-center bg-info" style="font-size:20px;">All citizens complains <span class="badge badge-light float-right">{{$counts}}</span></div>
			<div class="card-body" style="overflow:auto;">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Names</th>
							<th>Phone</th>
							<th>email</th>
							<th>Complain</th>
							<th>File</th>
							<th>Tasker</th>
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

								if ($content->complains_reply == "pending") {
									$btn='<button id="primary" class="btn btn-primary">Pending</button>';
								}elseif($content->complains_reply == "solved") {
									$btn='<button class="btn btn-success">Solved</button>';
								}elseif($content->complains_reply == null and $content->forward == null) {
									$btn='<button class="btn btn-danger">Unforwarded</button>';
								}elseif($content->complains_reply == null) {
									$btn='<button class="btn btn-secondary">Forwarded</button>';
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
								<td>{{$content->complains}}</td>
								<td>
									<?php
										$images=null;
										if ($content->image == null) {
											echo '<span style="color:red;"><b>No file</b></span>';
										}else{
											?>
												<b><a href='{{asset("assets/images/".$content->image)}}' target="parent"><i class="fa fa-image"></i>&nbsp;File</a></b>
											<?php
										}
									?>
								</td>
								<td>
									@foreach($roler as $datas)
										<p>{{$datas->name}}</p>
									@endforeach
								</td>
								<td><?php echo $btn?></td>
								</td>
							</tr>
							
						@endforeach
						<tr class="text-center">
							@if($counts == 0)
								<td colspan="5">No data found !</td>
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
	
</div>

@endsection

