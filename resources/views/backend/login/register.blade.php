@extends('backend.login.main')
@section('content')
<div class="limiter">
         <div class="container-login100">
            <div class="wrap-login100">
               <div class="login100-pic js-tilt" data-tilt>
                  <img src="/login/images/img-01.png" alt="IMG">
               </div>
               <form class="login100-form validate-form" >
                  <span class="login100-form-title">
                  Member Register
                  </span>
                  <div class="wrap-input100 validate-input" data-validate="name is required">
                     <input class="input100" type="text" name="name" placeholder="name">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     </span>
                  </div>

                  <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                     <input class="input100" type="text" name="email" placeholder="Email">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                     </span>
                  </div>
                  <div class="wrap-input100 validate-input" data-validate="Password is required">
                     <input class="input100" type="password" name="pass" placeholder="Password">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     </span>
                  </div>
                  

                  <div class="container-login100-form-btn">
                     <a href="{{('login.index')}}"><button type="button" class="btn btn-primary "> Register </button></a>
                  </div>
                 
                  
               </form>
            </div>
         </div>
      </div>
@endsection

@section('my_js')
   <script type="text/javascript">
       
   </script>    

@endsection

