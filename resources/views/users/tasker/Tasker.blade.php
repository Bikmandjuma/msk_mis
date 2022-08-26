@extends('users.tasker.Cover')
@section('content')
<?php
  use Illuminate\Support\Facades\DB;
  use App\Models\CitizenComplain;
?>
<br>
<?php
//All complains
$roler_id=auth()->guard('tasker')->user()->role_id;

$all_complains=CitizenComplain::all()->where('role_id',$roler_id);
$counts_all_complains=collect($all_complains)->count();


//Count unsolved or pending complains solution
$pending_complains=CitizenComplain::all()->where('role_id',$roler_id)->where('complains_reply','pending')->where('decision',null);
$counts_pending_complains=collect($pending_complains)->count();


//Count Solved complains solution
$solved_complains=CitizenComplain::all()->where('role_id',$roler_id)->where('complains_reply','solved')->where('decision','done');
$counts_solved_complains=collect($solved_complains)->count();

?>
<div class="container">
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$counts_all_complains}}</h3>
                <p>All complains</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$counts_pending_complains}}</h3>
                <p>Pending(Unsolved complains)</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$counts_solved_complains}}</h3>
                <p>Solved complains</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>
                <p>All files (documents)</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
          </div>

    </div>
</div>

<?php

      $tasker_id=auth()->guard('tasker')->user()->id;
        $complains= DB::table('citizen_complains')
            ->join('tasker_roles', 'tasker_roles.id', '=', 'citizen_complains.role_id')
            ->join('taskers', 'taskers.role_id', '=', 'citizen_complains.role_id')
            ->select('citizen_complains.*','citizen_complains.names','citizen_complains.phone','citizen_complains.email','citizen_complains.role_id')
            ->where(['taskers.role_id'=>$tasker_id,'citizen_complains.complains_reply'=>null,'citizen_complains.forward'=>'forwarded'])->paginate(5);
?>
<br>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">

    <div class="card">
      <div class="card-header text-white text-center" style="background-color: teal;">Forwarded Citizen Complains</div>
      <div class="card-body" style="overflow:auto;">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>names</th>
              <th>phone</th>
              <th>email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($complains as $data)
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
                <td><a href="{{url('tasker/view/single/complain')}}/{{$data->id}}"><i class="fa fa-eye"></i>&nbsp;View</a></td>
              </tr>
              
            @endforeach

            <?php
              $rol_id=auth()->guard('tasker')->user()->role_id;
              $count_compl=CitizenComplain::all()->where('role_id',$rol_id)->where('complains_reply',null)->where('forward','forwarded');
              $counts=collect($count_compl)->count();

              if ($counts == 0) {
                echo '
                    <tr>
                      <td colspan="4" class="text-center">No data found ! </td>
                    </tr>
                ';
              }
            ?>
            


          </tbody>
        </table>
      </div>
    </div>
    {{$complains->links()}}
  </div>
  <div class="col-md-1"></div>
</div> 
@endsection
