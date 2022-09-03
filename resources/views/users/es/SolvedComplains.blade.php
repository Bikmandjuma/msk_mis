@extends('users.es.Cover')
@section('content')
@php
	use Illuminate\Support\Facades\DB;
	use App\Models\CitizenComplain;
@endphp
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<?php  
		$data_counts=CitizenComplain::all()->where('complains_reply','solved')->where('decision','done');
		$counts=collect($data_counts)->count();
	?>
		<div class="card">
			<div class="card-header text-center bg-info">Solved complains</div>
			<div class="card-body" style="overflow:auto;">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Names</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Time</th>
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
							?>

							<tr>
								<td>{{$content->names}}</td>
								<td>{{$content->phone}}</td>
								<td>{{$emails}}</td>
								<td>{{$content->replied_date}}</td>
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

