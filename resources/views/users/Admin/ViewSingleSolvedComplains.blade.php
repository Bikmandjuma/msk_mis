@extends('users.Admin.Cover')
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
		
		<div class="card">
			<div class="card-header text-center bg-info">Citizen complains</div>
			<div class="card-body" style="overflow:auto;">
				@foreach($complains as $data)
				<h4><b><span class="text-info">Names </span>: {{$data->names}}</b></h4>
				<hr>
				<h4><b><span class="text-info">Complains</span>: {{$data->complains}}</b></h4>
				<hr>
				
				<?php

					$roles_id=$data->role_id;
					$roler=DB::table('citizen_complains')
						   ->join('tasker_roles', 'tasker_roles.id', '=', 'citizen_complains.role_id')
						    ->select('citizen_complains.*','tasker_roles.name')
						    ->where(['citizen_complains.role_id'=>$roles_id])->get();
				?>

				@foreach($roler as $tasker)
				<h4><b><span class="text-info">Staff member </span>: {{$tasker->name}}</b></h4>
					<?php break;?>
				@endforeach
				<hr>
				<br>
				<?php

					if ($data->image == null){
					}else{
						?>
						<h4><b><span class="text-info float-left">Image&nbsp;:</span></b></h4></a> 
						<div class="image-gallery">
							<span>
								<img src="{{asset('assets/images/'.$data->image)}}"><br>
							<a href="{{asset('assets/images/'.$data->image)}}" target="parent"><i class="fa fa-eye"></i>&nbsp;View</a>
							</span>
						</div>
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

