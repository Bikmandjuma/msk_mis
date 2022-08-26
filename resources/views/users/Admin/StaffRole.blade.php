@extends('users.admin.Cover')
@section('content')
<br>
<div class="container">
    <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header text-center bg-info">Register staff role</div>
              <div class="card-body">
                <form action="{{route('Addstaffrole')}}" method="POST">
                   @csrf  
                  <label>Name</label>
                  <input type="text" placeholder="enter role name" name="role_name" value="{{old('role_name')}}" class="form-control">
                  <span style="color:red;">@error('role_name') {{$message}} @enderror</span>
                  <br>
                  <button class="btn btn-primary" type="submit" name="submit"> Add</button>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-6">

            <div class="card">
              <div class="card-header text-center bg-info"> Staff role</div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($role_name as $items)
                    <tr>
                      <td>{{$items->id}}</td>
                      <td>{{$items->name}}</td>
                      <td><a href="#{{$items->id}}"><i class="fa fa-edit"></i>&nbsp;Edit</a> </td>
                    </tr>
                  @endforeach

                  @if($count_role == 0)
                    <tr class="text-center">
                      <td colspan="3">No data found !</td>
                    </tr>
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        toastr.options.timeOut = 8000;
        @if (Session::has('role_added'))
            toastr.success('{{ Session::get('role_added') }}');
        @endif
    });
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
@endsection
