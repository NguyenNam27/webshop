<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from colorlib.com/etc/lf/Login_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Mar 2021 14:12:27 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <title>Login</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
      <link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="/login/vendor/animate/animate.css">
      <link rel="stylesheet" type="text/css" href="/login/vendor/css-hamburgers/hamburgers.min.css">
      <link rel="stylesheet" type="text/css" href="/login/vendor/select2/select2.min.css">
      <link rel="stylesheet" type="text/css" href="/login/css/util.css">
      <link rel="stylesheet" type="text/css" href="/login/css/main.css">
   </head>
   <body>
      @yield('content')
      <script src="/login/vendor/jquery/jquery-3.2.1.min.js"></script>
      <script src="/login/vendor/bootstrap/js/popper.js"></script>
      <script src="/login/vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="/login/vendor/select2/select2.min.js"></script>
      <script src="/login/vendor/tilt/tilt.jquery.min.js"></script>
      <script>
         $('.js-tilt').tilt({
         	scale: 1.1
         })
      </script>
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         
         gtag('config', 'UA-23581568-13');
      </script>
      <script src="/login/js/main.js"></script>
      @yield('my_js')
      
   </body>
   <!-- Mirrored from colorlib.com/etc/lf/Login_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Mar 2021 14:12:30 GMT -->
</html>