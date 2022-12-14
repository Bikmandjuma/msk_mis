@extends('users.es.Cover')
@section('content')
@php
	use Illuminate\Support\Facades\DB;
	use App\Models\CitizenComplain;
@endphp
<br>
<div class="row">
	<div class="col-md-12">
	<?php  
		$data_counts=CitizenComplain::all()->where('forward','forwarded')->where('complains_reply','pending')->where('decision',null);
		$counts=collect($data_counts)->count();
	?>
		<div class="card">
			<div class="card-header text-center bg-info">Pending</div>
			<div class="card-body" style="overflow:auto;">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Names</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Complained&nbsp;date</th>
							<th>Forwarded&nbsp;date</th>
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
								<td>{{$content->created_at}}</td>
								<td>{{$content->date_co}}&nbsp;&nbsp;{{$content->time_co}}</td>
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
	
</div>

@endsection

