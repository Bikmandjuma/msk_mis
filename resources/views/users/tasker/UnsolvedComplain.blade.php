@extends('users.tasker.Cover')
@section('content')
<?php
  use Illuminate\Support\Facades\DB;
  use App\Models\CitizenComplain;
?>
<br>
<div class="row">
  <div class="col-md-12">
  <?php
      $rol_id=auth()->guard('tasker')->user()->role_id;
      $count_compl=CitizenComplain::all()->where('role_id',$rol_id)->where('complains_reply','pending')->where('decision',null);
      $counts=collect($count_compl)->count();

  ?>
    <div class="card">
      <div class="card-header text-white text-center" style="background-color: teal;">Unsolved Complains (pending)<span class="badge badge-light float-right">{{$counts}}</span> </div>
      <div class="card-body" style="overflow:auto;">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>names</th>
              <th>phone</th>
              <th>email</th>
              <th>Citizen&nbsp;Complains</th>
              <th>Complained&nbsp;date</th>
              <th>Forwarded&nbsp;date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pendingcomplain as $data)
              <?php
                if ($data->email == null) {
                  $emails=' - - - - ';
                }else{
                  $emails=$data->email;
                }
              ?>
              <tr>
                <td>{{$data->names}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$emails}}</td>
                <td>{{$data->complains}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->date_co}}</td>              
                <td><a href="{{url('tasker/view/single/pending')}}/{{$data->id}}" style="color: white"></i>&nbsp;<button class="btn btn-success">Still&nbsp;Pending&nbsp;</a></button> </td>
              </tr>
              
            @endforeach

            <?php
              if ($counts == 0) {
                echo '
                    <tr>
                      <td colspan="7" class="text-center">No data found ! </td>
                    </tr>
                ';
              }
            ?>
          
          </tbody>
        </table>
      </div>
    </div>
    {{$pendingcomplain->links()}}
  </div>
</div> 

@endsection