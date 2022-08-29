@extends('users.es.Cover')
@section('content')
@php
  use Illuminate\Support\Facades\DB;
  use App\Models\CitizenComplain;
  use App\Models\Tasker;

@endphp
<br>
<?php
$staff=Tasker::all();
$staff_count=collect($staff)->count();

//unsolved
$unsolved_comp=CitizenComplain::all()->where('forward','!=',null)->where('complains_reply',null)->where('decision',null);
$unsolved_counts=collect($unsolved_comp)->count();

$cit_comp=CitizenComplain::all();
$cit_counts=collect($cit_comp)->count();

//Solved complains
$solved_comp=CitizenComplain::all()->where('complains_reply','!=',null)->where('decision','!=',null);
$solved_counts=collect($solved_comp)->count();
?>
<div class="container">
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{url('es/viewstaff')}}">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$staff_count}}</h3>
                <p>All Staff members</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-person"></i>
              </div>
            </div>
            </a>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{url('es/dashboard')}}">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$cit_counts}}</h3>
                <p>Citizens Complains</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
            </a>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{url('es/solved/complains')}}">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$solved_counts}}</h3>
                <p>Solved Complains</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
            </a>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{url('es/unsolved/complains')}}">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$unsolved_counts}}</h3>
                <p>Unsolved Complains</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
            </a>
          </div>

    </div>

</div>
@endsection
