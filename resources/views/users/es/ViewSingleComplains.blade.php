@extends('users.es.Cover')
@section('content')
@php
	use App\Models\CitizenComplain;
@endphp
<br>
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

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	 	@if(session('forwarded'))
                <div class="alert alert_success"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    <strong>{{session('forwarded')}}</strong>
                </div><br>
        @endif 
		
		<div class="card">
			<div class="card-header text-center bg-info">Citizen complains</div>
			<div class="card-body" style="overflow:auto;">
				@foreach($complains as $data)
				<h4><b><span class="text-info">Names </span>: {{$data->names}}</b></h4>
				<hr>
				<h4><b><span class="text-info">Complains</span>: {{$data->complains}}</b></h4>
				<hr>
				<?php
					if ($data->image == null){
					}else{
						?>
						<h4><b><span class="text-info">File :</span></b></h4></a> 
						<div class="image-gallery">
							<span>
								<img src="{{asset('assets/images/'.$data->image)}}"><br>
							<a href="{{asset('assets/images/'.$data->image)}}" target="parent"><i class="fa fa-eye"></i> View</a>
							</span>
						</div>
						<?php
					}
						
				?>

				<?php

					$roles_id=$data->role_id;
					$roler=DB::table('citizen_complains')
						   ->join('tasker_roles', 'tasker_roles.id', '=', 'citizen_complains.role_id')
						    ->select('citizen_complains.*','tasker_roles.name')
						    ->where(['citizen_complains.role_id'=>$roles_id])->get();
				?>

				<?php
					
				?>

				<?php
					$care=CitizenComplain::all()->where('id',$data->id)->where('forward','forwarded')->where('complains_reply',null);
					$countss=collect($care)->count();

					if($countss == 0){
						foreach($roler as $tasker){
				?>
							<a href="{{url('es/forwarding')}}/{{$data->id}}" class="float-right"><button class="btn btn-info" type="submit" onclick="return confirm('Forward this complain to {{$tasker->name}}')">Forward&nbsp;to&nbsp;{{$tasker->name}}</button></a>
							<?php
							break;
						}
					}else{
						?>
						<a href="{{url('es/All/Citizen/Complain')}}"><button class="btn btn-info float-right">Now Complain is pending not solved yet !</button></a>
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

