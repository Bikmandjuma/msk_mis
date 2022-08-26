@extends('users.Admin.Cover')
@section('content')
<br>
<div class="container">
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>
                <p>Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-person"></i>
              </div>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>
                <p>All product in store</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-person"></i>
              </div>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0</h3>
                <p>Product booked today</p>
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
                <p>Product left in store</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
          </div>

    </div>

</div>
@endsection
