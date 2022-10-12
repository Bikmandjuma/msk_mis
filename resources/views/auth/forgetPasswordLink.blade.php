<!DOCTYPE html>
<html>
<head>
  <title>Reset password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:lightgray;">
  <div class="row bg-white text-info">
    <div class="col-md-12 text-center">
      <h2><b>Masaka sector</b></h2>
    </div>
  </div>

  <br>

    <main class="login-form">
      <div class="cotainer">
          <div class="row justify-content-center">
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-header text-center bg-info text-white"><b>Reset Password</b></div>
                      <div class="card-body">
      
                          <form action="{{ route('reset.password.post') }}" method="POST">
                              @csrf
                              <input type="hidden" name="token" value="{{ $token }}">
      
                              <div class="form-group row">
                                  <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                  <div class="col-md-6">
                                      <input type="text" id="email_address" class="form-control" name="email" autofocus>
                                      @if ($errors->has('email'))
                                          <span class="text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                  <div class="col-md-6">
                                      <input type="password" id="password" class="form-control" name="password" autofocus>
                                      @if ($errors->has('password'))
                                          <span class="text-danger">{{ $errors->first('password') }}</span>
                                      @endif
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                  <div class="col-md-6">
                                      <input type="password" id="password-confirm" class="form-control" name="password_confirmation" autofocus>
                                      @if ($errors->has('password_confirmation'))
                                          <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                      @endif
                                  </div>
                              </div>
      
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      Reset Password
                                  </button>
                              </div>
                          </form>
                            
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </main>
</body>
</html>