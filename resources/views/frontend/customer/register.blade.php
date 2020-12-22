<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ogani | Customer Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset("backend") }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset("backend") }}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">!! Customer Registration !!</h1>
                    <!-- <p class="text-danger">{{ Session::has('message') }}</p> -->
                  </div>
                  <form class="user" action="{{ url('/checkout/register') }}" method="POST">
                    @csrf 
                    <div class="form-group">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter You Name...">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter You Phone No...">
                      @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email Address...">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-block">
                      Register
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <!-- <a href="">Forgot Password?</a> -->
                  </div>
                  <div class="text-center">
                    <a href="{{ url('checkout/login') }}">Already have an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset("backend") }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset("backend") }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset("backend") }}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset("backend") }}/js/sb-admin-2.min.js"></script>

</body>
</html>
