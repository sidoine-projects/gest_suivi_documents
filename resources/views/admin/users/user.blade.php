@extends('admin/layouts.master')

@section('content')
    <style>
        .error {
            color: red;
            border-color: red;
            font-weight: 900;
        }

    </style>

    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">User </h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">User</li>

                </ol>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> User Infomation</h6>

                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    @if (\Session::has('insert'))
                                        <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('insert') !!}
                                        </div>
                                    @endif

                                    @if (\Session::has('error'))
                                        <div id="hide-message" class="alert alert-danger alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('error') !!}
                                        </div>
                                    @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <form id="validation" action="{{ route('admin/register') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Nom</label>
                                    <div class="col-sm-10">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nom">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Prénom</label>
                                    <div class="col-sm-10">
                                        <input id="prename" type="text"
                                            class="form-control @error('prename') is-invalid @enderror" name="prename"
                                            value="{{ old('prename') }}" autocomplete="prename" autofocus
                                            placeholder="Prénom">
                                        @error('prename')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                                    <div class="col-sm-10">
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
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Téléphone</label>
                                    <div class="col-sm-10">
                                        <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror"
                                            name="tel" value="{{ old('tel') }}" autocomplete="tel"
                                            placeholder="Votre Téléphone">
                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Password</label>
                                    <div class="col-sm-10">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password" placeholder="Enter password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>





                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Password Confirmation</label>
                                    <div class="col-sm-10">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password"
                                            placeholder="Password confirmation">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>









                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        <button type="reset" class="btn btn-danger">Annuler</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste Users</h6>

                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>


                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Email</th>
                                        <th>Tel</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->prename}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->tel}}</td>
                                          
                                            {{-- <td class="id"> {{ \App\Models\Annee::where(['id'=>$item->annee_id ])->first()->annee}}</td>
                                            <td class="id"> {{ \App\Models\Dimension::where(['id'=>$item->dimenesion_id ])->first()->libelle}}</td>
                                            <td class="id"> {{ \App\Models\Sexe::where(['id'=>$item->sexe_id ])->first()->libelle}}</td> --}}


                                            <td class="text-center">
                                                <a href="{{ url('admin/user/update/'.$item->id) }}" class="m-r-15 text-muted userUpdate">
                                                    <i class="fa fa-edit" style="color: #2196f3;"></i>
                                                </a>
                                                <a href="{{ url('admin/user/delete/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash" style="color: red;"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>


            </div>

            <!-- [ content ] End -->
        </div>

        <!-- [ Layout footer ] Start -->

        <!-- [ Layout footer ] End -->
    </div>

    <!-- [ Layout content ] Start -->
@endsection
@section('script')
    <!-- library js validate -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
    {{-- form validate --}}


    <script>
        $('#validation').validate({
            reles: {
                code: {
                    required: true,
                },
                libelle: {
                    required: true,
                }

            },
            messages: {
                code: "saisissez un code*",
                libelle: "saisissez un libelle*",

            }
        });
    </script>

    {{-- hide message js --}}
    <script>
        $('#hide-message').show();
        setTimeout(function() {
            $('#hide-message').hide();
        }, 5000);
    </script>
@endsection
