<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('/html/assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/html/assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <title>Log In</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/html/assets/css/vendors/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ url('/html/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/html/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/html/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/html/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/html/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/html/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ url('/html/assets/css/color-1.css" media="screen') }}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/html/assets/css/responsive.css') }}">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">
            <div>
              {{-- <div><a class="logo" href="{{ url('/login-admin') }}"><img class="img-fluid for-light" src="{{ url('/html/assets/images/logo/login.png') }}" alt="loginpage"></a></div> --}}
              <div><a class="logo" href="{{ route('super-admin.auth') }}">Pilihku</a></div>
              <div class="login-main"> 
                <form class="theme-form" action="{{ route('super-admin.auth.store') }}" method="POST">
                    @csrf
                  <h4 class="text-center">Sign in to account</h4>
                  <p class="text-center">Enter your username & password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Username</label>
                    <input class="form-control @error('username') is-invalid @enderror" type="text" required="" placeholder="Username" name="username" value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="*********">
                      <div class="show-hide"><span class="show">                         </span></div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox" name="remember" id="remember">
                      <label class="text-muted" for="checkbox1">Remember password</label>
                    </div>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in                 </button>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="{{ url('/html/assets/js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{ url('/html/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ url('/html/assets/js/icons/feather-icon/feather.min.js') }}"></script>
      <script src="{{ url('/html/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
      <script src="{{ url('/html/assets/js/config.js') }}"></script>
      <script src="{{ url('/html/assets/js/script.js') }}"></script>
      <script>
           $(function(){
           $('form').on('submit', function(){
               $(':input[type="submit"]').prop('disabled', true);
           })
           })
       </script>
       @include('sweetalert::alert')
    </div>
  </body>
</html>