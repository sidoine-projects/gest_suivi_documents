<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inscription</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/import/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/import/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body style="background-color: #003679;">

    <div class="container ">

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
                                        <h1 class="h4 text-gray-900 mb-0">Créez un Compte !</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}" class="my-5">
                                        @csrf

                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0"> 
                                                <input id="name" type="text" style="text-transform: uppercase;"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}" autocomplete="name"
                                                    autofocus placeholder="Nom">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input id="prename" type="text"
                                                    class="form-control @error('prename') is-invalid @enderror"
                                                    name="prename" value="{{ old('prename') }}" autocomplete="prename"
                                                    autofocus placeholder="Prénom">
                                                @error('prename')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" autocomplete="email"
                                                placeholder="Entrer votre email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <input id="tel" type="tel"
                                                class="form-control @error('tel') is-invalid @enderror" name="tel"
                                                value="{{ old('tel') }}" autocomplete="tel"
                                                placeholder="Votre Téléphone">
                                            @error('tel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="form-group">
                                            <input id="adresse" type="text"
                                                class="form-control @error('adresse') is-invalid @enderror"
                                                name="adresse" value="{{ old('adresse') }}" autocomplete="adresse"
                                                placeholder="Entrer votre adresse">
                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group ">
                                            <select class="form-control" name="profil_id" id="profil_id" required>
                                                <option value="">Selectionnez un profil</option>
                                                @foreach ($profils as $profil)
                                                    <option value="{{ $profil->id }}">{{ $profil->profil }}</option>
                                                @endforeach
                                            </select>
                                            @error('tel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="new-password"
                                                    placeholder="Entrez votre mot de passe">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="col-sm-6"> <input id="password-confirm" type="password"
                                                    class="form-control" name="password_confirmation"
                                                    autocomplete="new-password"
                                                    placeholder="Confirmez votre mot de passe">
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        {{-- <button type="submit" class="btn btn-primary btn-block mt-4">ENREGISTRER</button> --}}
                                        <div class="row  text-center  m-0 ">

                                            <button onclick="return confirm('voulez vous enrégistrer ?')"
                                                type="submit" class="btn btn-primary  ">ENREGISTRER</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="large" href="{{ route('login') }}">Avez vous déja un Compte ?
                                            Connectez vous!</a>
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
