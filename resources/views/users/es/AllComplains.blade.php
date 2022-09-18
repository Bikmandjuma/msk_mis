@extends('users.es.Cover')
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
	
		@if(session('forwarded'))
		       <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		         <strong>{{session('forwarded')}}</strong>
		       </div><br>
		@endif
		<div class="card">
			<div class="card-header text-center bg-info">All citizens complains <span class="badge badge-light float-right">{{$counts}}</span></div>
			<div class="card-body" style="overflow:auto;">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Names</th>
							<th>Phone</th>
							<th>email</th>
							<th>Complain</th>
							<th colspan="2">Action</th>
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
									$btn='<a href="#pending" data-toggle="modal"><button id="primary" class="btn btn-primary">Pending</button></a>';
								}elseif($content->complains_reply == "solved") {
									$btn='<a href="#solved" data-toggle="modal"><button class="btn btn-success">Solved</button></a>';
								}elseif($content->complains_reply == null and $content->forward == null) {
									$btn='<a href="#Unforwarded" data-toggle="modal"><button class="btn btn-danger">Unforwarded</button></a>';
								}elseif($content->complains_reply == null) {
									$btn='<a href="#forwarded" data-toggle="modal"><button class="btn btn-secondary">Forwarded</button></a>';
								}

								// if ($content->complains_reply == null) {
								// 	$btn_link="<a href='{{url('es/solved/complains')}}'><i class='fa fa-eye'></i> View 1</a>";
								// }elseif($content->complains_reply == "pending") {
								// 	$btn_link="<a href='{{url('es/solved/complains')}}''><i class='fa fa-eye'></i> View</a>";

								// }elseif($content->complains_reply == "solved") {
								// 	$btn_link="<a href='{{route('SolveCompl')}}'><i class='fa fa-eye'></i> View</a>";
								// }
							?>

							<tr>
								<td>{{$content->names}}</td>
								<td>{{$content->phone}}</td>
								<td>{{$emails}}</td>
								<td>{{$content->complains}}</td>
								<!-- td><?php //echo $btn_link?></td> -->
								<td><?php echo $btn?></td>
								</td>
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

<!-- start Pending complains -->
<div class="modal fade" id="pending">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Citizen complains</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>All solved complains <a href="{{url('es/unsolved/complains')}}" class="float-right"><i class="fa fa-eye"></i> View</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End Pending complains -->

<!-- start Solved complains -->
<div class="modal fade" id="solved">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Citizen complains</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>All Solved complains <a href="{{url('es/solved/complains')}}" class="float-right"><i class="fa fa-eye"></i> View</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End Solved complains -->


<!-- start Forwarded complains -->
<div class="modal fade" id="forwarded">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title">Citizen complains</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>This complain is already forwarded to staff member but not seen yet .</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End Forwarded complains -->

<!-- start UnForwarded complains -->
<div class="modal fade" id="Unforwarded">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Citizen complains</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>All unforwarded complains <a href="{{url('es/citizen/complains')}}" class="float-right"><i class="fa fa-eye"></i> View</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End UnForwarded complains -->


@endsection
