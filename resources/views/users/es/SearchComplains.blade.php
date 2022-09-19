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

		<div class="card">
			<div class="card-header text-center bg-info">Search complains</div>
			<div class="card-body" style="overflow:auto;">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Names</th>
						</tr>
					</thead>
					<tbody>
						@foreach($complains as $content)

							<tr>
								<td>{{$content->names}}</td>
							</tr>
							
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<div class="col-md-2"></div>
</div>

@endsection

