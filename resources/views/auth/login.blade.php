<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Connexion</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('assets/import/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/import/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body style="background-color: #003679;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenue sur notre plateforme</h1>
                  </div>

                  @if(session()->has('error'))
                  <div class="text-danger">
                    {{ session()->get('error') }}
                  </div>
                  @endif
                  <form method="POST" action="{{ route('login') }}" class="my-5">
                    @csrf

                    <div class="form-group">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Entrer votre email">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="taper votre mot de passe">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <div class="clearfix"></div>
                    </div>

                    <button type="submit" class="btn btn-primary text-center ">Connexion</button>


                  </form>
                  <hr>
               
                  <div class="text-center">
                    <a class="large" href="{{route('register')}}">S'inscrire</a>
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


</body>

</html>