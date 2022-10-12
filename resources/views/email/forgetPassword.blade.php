<!DOCTYPE html>
<html>
<head>
  <title>Reset password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:lightgray;">

  <br>

    <main class="login-form">
      <div class="cotainer">
          <div class="row justify-content-center">
              <div class="col-md-6 text-center">
              	<h2 style="font-family:sans-serif;"><b>Masaka Sector</b> </h2>
                  <div class="card">
                      <div class="card-header bg-success text-white"><b><h2>Forget Password Email</h2></b></div>
                      <div class="card-body">
							<h4>You can reset password from the bellow link:</h4><br>
							<hr>
							<button class="btn btn-success text-white"><a href="{{ route('reset.password.get', $token) }}" style="color: white;"><b>Click here to reset password&nbsp;<i class=" fa fa-angle-double-right"></i> </b></a></button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </main>
</body>
</html>