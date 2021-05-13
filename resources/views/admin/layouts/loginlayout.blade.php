<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>

 <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <!-- Theme style -->
 <link rel="stylesheet" href="{{asset('assets/css/new.css')}}">
 <!-- iCheck -->
 <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/plugins/iCheck/square/blue.css">
 
 {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css"> --}}

@yield('styles')

</head>
<body class="hold-transition login-page">

    <div class="login-box">
      @if ($message = Session::get('msg'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
              <strong>{{ $message }}</strong>
      </div>
      @endif
        <div class="login-logo">
          <a href="../../index2.html"><b>{{  Config::get('constants.site_name')  }} &nbsp;</b><b>Admin &nbsp; </b>Login Pannel</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Sign in to start your session</p>
      
          <form action="{{route('admin.verify')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
              <input type="email" name="email" class="form-control" placeholder="Email">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              @error('email')
              <div class="text-danger">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              @error('password')
              <div class="text-danger">
                {{ $message }}
              </div>
               @enderror
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
      
         
          <!-- /.social-auth-links -->
      
         
         
      
        </div>
        <!-- /.login-box-body -->
      </div>
      <!-- /.login-box -->

      <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

     {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script> --}}

     
      <!-- iCheck -->
      <script src="https://adminlte.io/themes/AdminLTE/plugins/iCheck/icheck.min.js"></script>
      <script>
        $(function () {
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
          });
        });
      </script>




@yield('scripts')


</body>
</html>
