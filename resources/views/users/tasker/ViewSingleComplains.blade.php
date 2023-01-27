@extends('users.tasker.Cover')
@section('content')
@php
	use App\Models\CitizenComplain;
@endphp
<style type="text/css">
	.image-gallery {
		  display: flex;
		  flex-wrap: wrap;
		  gap: 10px;
		}

		.image-gallery > span {
		  height: 300px;
		  list-style-type:none;
		  cursor: pointer;
		  position: relative;
		}

		.image-gallery span img {
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

		.image-gallery > span {
		  /* ... */
		  flex-grow: 1;
		  position: relative;
		  cursor: pointer;
		}
				
		.overlay {
		  position: absolute;
		  width: 100%;
		  height: 100%;
		  background: rgba(57, 57, 57, 0.502);
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
		.image-gallery span:hover .overlay {
		  transform: scale(1);
		}
</style>

<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	 	@if(session('care_on_complain'))
                <div class="alert alert_success"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    <strong>{{session('care_on_complain')}}</strong>
                </div><br>
        @endif 
		
		<div class="card">
			<div class="card-header text-center bg-info">Citizen complains</div>
			<div class="card-body text-center" style="overflow:auto;">
				@foreach($complains as $data)
				<h4><b><span class="text-info">Names </span>: {{$data->names}}</b></h4>
				<hr>
				<h4><b><span class="text-info">Complains</span>: {{$data->complains}}</b></h4>
				<hr>
				<?php
					if ($data->image == null){
					}else{
						?>
						<h4><b><span class="text-info">Image</span></b></h4>
						<div class="image-gallery">
							<span>
								<img src="{{asset('assets/images/'.$data->image)}}"><br>
								<a class="float-left" href="{{asset('assets/images/'.$data->image)}}" target="parent"><i class="fa fa-eye"></i>&nbsp;View</a>
							</span>
						</div>
						<?php
					}
						
				?>
				<?php
					$care=CitizenComplain::all()->where('id',$data->id)->where('complains_reply',null);
					$countss=collect($care)->count();
					
					if($countss == 1){
						?>
						<a href="{{route('CareComplains',$data->id)}}"><button class="btn btn-primary float-right">Care of it</button></a>
						<?php
					}else{
						?>
						<a href="{{url('tasker/pending/complains')}}"><button class="btn btn-info float-right">Now Complain is pending</button></a>
						<?php
					}
				?>
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

@endsection

