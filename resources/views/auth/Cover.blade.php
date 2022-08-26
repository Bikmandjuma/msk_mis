<!DOCTYPE html>
<html lang="en">
<head>

  <title>{{ config('app.name', 'Masaka-sector') }}</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="/style/fronts/css/bootstrap.min.css">
     <link rel="stylesheet" href="/style/fronts/css/font-awesome.min.css">
     <link rel="stylesheet" href="/style/fronts/css/owl.carousel.css">
     <link rel="stylesheet" href="/style/fronts/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="/style/fronts/css/templatemo-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Masaka&nbsp;Sector</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{url('/')}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{url('/')}}#about" class="smoothScroll">About</a></li>
                         <li><a href="{{route('citizen_complains')}}" class="smoothScroll">Citizen Complains</a></li>
                         <li><a href="{{url('/')}}#staff" class="smoothScroll">Staff</a></li>
                         <li><a href="{{url('/')}}#contact" class="smoothScroll">Contact</a></li>
                    </ul>

                    <!-- <ul class="nav navbar-nav navbar-right">
                         <li><a href="{{route('Login')}}"><i class="fa fa-lock"></i>Login</a></li>
                    </ul> -->
               </div>

          </div>
     </section>

     <!-- login -->
     <section id="login_panel">
          <main>
               @yield('content');
          </main>
     </section>       


     <!-- FOOTER -->
          
     <div class="row">
          <div class="col-md-12 col-sm-12 text-center" style="font-size: 15px;">
               <span>Copyright &copy; <?php echo date('Y');?> Alright reserved ,designed by Masaka_sector .</span>
          </div>  
     </div> 

     <!-- SCRIPTS -->
     <script src="/style/fronts/js/jquery.js"></script>
     <script src="/style/fronts/js/bootstrap.min.js"></script>
     <script src="/style/fronts/js/owl.carousel.min.js"></script>
     <script src="/style/fronts/js/smoothscroll.js"></script>
     <script src="/style/fronts/js/custom.js"></script>

</body>
</html>