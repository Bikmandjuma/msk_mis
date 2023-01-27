@extends('users.Admin.Cover')
@section('content')

@php
use App\Models\CitizenComplain;
use App\Models\Tasker;
@endphp

<br>
<?php

$taskers_counts=Tasker::all();
$count_taskers=collect($taskers_counts)->count();

$all_complains_counts=CitizenComplain::all();
$count_all_complains=collect($all_complains_counts)->count();


$pending_counts=CitizenComplain::all()->where('forward','forwarded')->where('complains_reply','pending')->where('decision',null);
$count_pending=collect($pending_counts)->count();

//count solved conmplains
$solved_counts=CitizenComplain::all()->where('complains_reply','solved')->where('decision','done');
$count_solved=collect($solved_counts)->count();

?>
<div class="container">
    <div class="row">
          <div class="col-lg-3 col-6">
            <a href="{{url('admin/staff/members')}}">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$count_taskers}}</h3>
                  <p>System users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-person"></i>
                </div>
              </div>
            </a>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <a href="{{url('admin/view/all/complains')}}">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$count_all_complains}}</h3>
                  <p>All Complains</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-person"></i>
                </div>
              </div>
            </a>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <a href="{{url('admin/view/Solved/complains')}}">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$count_solved}}</h3>
                  <p>Solved complains</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-folder"></i>
                </div>
              </div>
            </a>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <a href="{{url('admin/pending/complain')}}">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$count_pending}}</h3>
                <p>Pending complains</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
            </a>
          </div>

    </div>

</div>


    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        
        <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="height:330px; width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.card -->
      </div>
    </div>
    <input type="hidden" id="sparkline-1" name="" disabled>
    <input type="hidden" id="sparkline-2" name="" disabled>
    <input type="hidden" id="sparkline-3" name="" disabled>
    <script>
      var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9' })
      var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9' })
      var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9' })

      sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
      sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
      sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

    </script>
    <div class="col-md-3"></div>
    </div>

@endsection
