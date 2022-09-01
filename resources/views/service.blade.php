@extends('users.citizen.Cover')
@section('content')

@php
	use App\Models\Servicetb;
@endphp

<br>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<?php  
		$data_counts=Servicetb::all();
		$counts=collect($data_counts)->count();
	?>
		@foreach($servicedata as $data)
			<div class="card">
				<div class="card-header text-center text-white bg-info">{{$data->title}}</div>
				<div class="card-body text-center" style="overflow:auto;">
					
						<div class="row">
							<div class="col-md-5">
								<a href="#" class="pop"><img src="{{URL::to('/')}}/images/citizen/service/{{$data->image}}" style="width: 200px; height: 164px;border:1px solid skyblue;"><br><p style="color:blue;">Zoom</p></a>						

								<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">              
								      <div class="modal-body">
								      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color:red;">&times;</span><span class="sr-only">Close</span></button>
								        <img src="" class="imagepreview" style="width: 100%;" >
								      </div>
								    </div>
								  </div>
								</div>
								<script>
									$(function() {
										$('.pop').on('click', function() {
											$('.imagepreview').attr('src', $(this).find('img').attr('src'));
											$('#imagemodal').modal('show');   
										});		
									});
								</script>

							</div>
							<div class="col-md-7" style="overflow: auto;">
								<p>{{$data->content}}</p>
								<br>
							</div>
						</div>

				</div>
			</div>
			<br>
			
		@endforeach

		@if($counts == 0)
			<div class="card">
				<div class="card-header text-white bg-info">Serivise</div>
				<div class="card-body" style="overflow:auto;">
				<h2>Ntamakuru ari mububiko !</h2>
				</div>
			</div>
		@endif

		<div class="row">
			<div class="col-md-12 text-center">{{$servicedata->links()}}</div>
		</div>		
	</div>
	<div class="col-md-2"></div>
</div>

<br>

@endsection