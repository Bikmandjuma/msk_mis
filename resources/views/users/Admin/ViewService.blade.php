@extends('users.Admin.Cover')
@section('content')
@php
	use App\Models\Servicetb;
@endphp
	<style type="text/css">
		.image-gallery {
		  display: flex;
		  flex-wrap: wrap;
		  gap: 10px;
		}

		.image-gallery > li {
		  height: 300px;
		  list-style-type:none;
		  cursor: pointer;
		  position: relative;
		}

		.image-gallery li img {
		  object-fit: cover;
		  width: 100%;
		  height: 100%;
		  vertical-align: middle;
		  border-radius: 5px;
		}
		.image-gallery::after {
		  content: "";
		  flex-basis: 350px;
		}

		.image-gallery > li {
		  /* ... */
		  flex-grow: 1;
		  position: relative;
		  cursor: pointer;
		}
				
		.overlay {
		  position: absolute;
		  width: 100%;
		  height: 100%;
		  background:rgba(57, 57, 57, 0.502);
		  top: 0;
		  left: 0;
		  transform: scale(0);
		  transition: all 0.2s 0.1s ease-in-out;
		  color: #fff;
		  border-radius: 5px;
		  /* center overlay text */
		  display: flex;
		  align-items: center;
		  justify-content: center;
		}

		/* hover */
		.image-gallery li:hover .overlay {
		  transform: scale(1);
		}
	</style>
</style>
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
			@if(session('service_deleted'))
		            <div class="alert alert_error" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		              <strong>{{session('service_deleted')}}</strong>
		            </div><br>
		    @endif
		<div class="col-md-4"></div>
		</div>
	</div>
	<?php  
		$data_counts=Servicetb::all();
		$counts=collect($data_counts)->count();
	?>
		@foreach($servicedata as $datas)
		<div class="card">
			<div class="card-header text-center bg-info">{{$datas->title}}</div>
			<div class="card-body text-center" style="overflow:auto;">
				<p>{{$datas->content}}</p>
				<span class="float-right text-primary">Posted date : {{$datas->created_at}}</span>
			</div>
			<hr>
			<div class="card-body">
					<ul class="image-gallery">
						<?php
							$images=$datas->image;
							$test=json_decode($datas['image']);
							foreach ($test as $key => $value) {
								?>
								
									<li>	
										<img src="{{asset('assets/images/'.$value)}}">
									</li>
								
								<?php
							}
						?>
									
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

					</ul>

				<div class="col-md-12 text-center">
					<button class="btn btn-primary"><a href="{{route('EditService',$datas->id)}}" style="color: white;"><i class="fa fa-edit"></i> Edit</a></button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger" onclick="return confirm('Do you want to delete this service content ?');"><a href="{{route('DeleteService',$datas->id)}}" style="color: white;"><i class="fa fa-trash"></i> Delete</a></button>
				</div>
								
			</div>
		</div>
		<br>
		@endforeach
		
		<div class="row">
			<div class="col-md-12 text-center">{{$servicedata->links()}}</div>
		</div>	
	<div class="col-md-1"></div>
	</div>
</div>

@if($counts == 0)
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8 text-center">
		
		<div class="card">
			<div class="card-header text-center bg-info">Service title</div>
			<div class="card-body" style="overflow:auto;">
				No data found !
			</div>
		</div>

	</div>
	<div class="col-md-2"></div>
</div>
@endif

@endsection

