@extends('users.tasker.Cover')
@section('content')
@php
	use App\Models\taskerfile;
@endphp
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<?php  
		$data_counts=taskerfile::all();
		$counts=collect($data_counts)->count();
	?>
		<div class="card">
			<div class="card-header text-center bg-info">My Documents (files)</div>
			<div class="card-body" style="overflow:auto;">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>name</th>
							<th>Content</th>
							<th>image</th>
							<th>Date (Time)</th>
						</tr>
					</thead>
					<tbody>
						@foreach($filedata as $data)
							<tr>
								<td>{{$data->name}}</td>
								<td>{{$data->content}}</td>
								<td><a href="#" download="{{asset('assets/images/'.$data->image)}}"><i class="fa fa-download"></i>&nbsp;Download</a>
								</td>
								
								<td>{{$data->created_at}}</td>
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
			<div class="col-md-12 text-center">{{$filedata->links()}}</div>
		</div>	
	</div>
	<div class="col-md-2"></div>
</div>

@endsection

