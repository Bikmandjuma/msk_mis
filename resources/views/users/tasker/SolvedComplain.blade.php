@extends('users.tasker.Cover')
@section('content')
<?php
  use Illuminate\Support\Facades\DB;
  use App\Models\CitizenComplain;
?>
<br>
<div class="row">
  <div class="col-md-12">

    <div class="card">
      <div class="card-header text-white text-center" style="background-color: teal;">Solved Complains</div>
      <div class="card-body" style="overflow:auto;">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>names</th>
              <th>phone</th>
              <th>email</th>
              <th>Citizen&nbsp;Complains</th>
              <th>Complained&nbsp;date</th>
              <th>Solved&nbsp;date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($solvedcomplain as $data)
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
                <td>on&nbsp;{{$data->date_co}}&nbsp;at&nbsp;{{$data->time_co}}</td>
                <td>on&nbsp;{{$data->replied_date}}&nbsp;at&nbsp;{{$data->replied_time}}</td>
              </tr>
              
            @endforeach

            <?php
              $rol_id=auth()->guard('tasker')->user()->role_id;
              $count_compl=CitizenComplain::all()->where('role_id',$rol_id)->where('complains_reply','solved')->where('decision','done');
              $counts=collect($count_compl)->count();

              if ($counts == 0) {
                echo '
                    <tr>
                      <td colspan="6" class="text-center">No data found ! </td>
                    </tr>
                ';
              }
            ?>
          
          </tbody>
        </table>
      </div>
    </div>
    {{$solvedcomplain->links()}}
  </div>
</div> 

@endsection