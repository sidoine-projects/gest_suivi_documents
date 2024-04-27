@extends('layouts-user.master')
@section('style')
    {{-- ----------------------datatable --}}

    <link rel="stylesheet" href="{{ 'assets/css/datatable/dataTables.bootstrap4.min.css' }}" />
    <link rel="stylesheet" href="{{ 'assets/css/datatable/jquery.dataTables.min.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/datatable/responsive.bootstrap4.min.css' }}" type="text/css" />
@endsection

@section('content')

    <style>
        .error {
            color: red;
            border-color: red;
            font-weight: 900;
        }

    </style>

    




    <div class="container " style="margin-top: -80px">
        <a href="{{ route('home') }}" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i> RETOUR</a>
        {{-- <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-12 ">

            <div class="search "> <i class="fa fa-search"></i> <input type="text" class="form-control"
                    placeholder="Je recherche un arrondissement ou quartier"> <button
                    class="btn btn-primary">Search</button> </div>
        </div>
    </div> --}}
    </div>

    <section id="appointment" class=" appointment section-bg ">
        <div class="container col-md-12 text-center" data-aos="fade-up">

            <div class="section-title">
                <h2>Profil </h2>
                <p>Vos informations </p>
            </div>


            <div class=" text-center row col-md-12 ">
                <div class="col-lg-12 ">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            @if (\Session::has('insert'))
                                <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                                    <i class="feather icon-check-circle" style="font-size:1em"></i>
                                    {!! \Session::get('insert') !!}
                                </div>
                            @endif

                            @if (\Session::has('error'))
                                <div id="hide-message" class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                                    <i class="feather icon-check-circle" style="font-size:1em"></i>
                                    {!! \Session::get('error') !!}
                                </div>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            {{-- @if ($errors->has('image'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Oups!</strong> {{ $errors->first('image') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>


                                </div>
                            @endif --}}

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Oups!</strong> {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>


                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
              

        <div class="container col-md-6 py-2" data-aos="fade-up">

            <div class="section-title">
         
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-12 card">
                    <div class="tab-content card-body ">
                        <div class="tab-pane active card-box show" id="tab-1">

                            {{-- <p class="fst-italic">Vous pouvez modifier vos information en cliquant sur le boton modifier</p> --}}

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    @if (\Session::has('insert-thematique'))
                                        <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('insert-thematique') !!}

                                        </div>
                                    @endif

                                    @if (\Session::has('error'))
                                        <div id="hide-message" class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('error') !!}
                                        </div>
                                    @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="text-left">

                                

                                Nom:  {{$user->name}} <br> <br>
                                Prénom: {{$user->prename}} <br><br>
                                Email: {{$user->email}} <br><br>
                                Téléphone :  {{$user->tel}}



                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

                </div>

            </div>





        </div>
    </section>






    <main id="main" class="py-0">
        <!-- ======= Doctors Section ======= -->

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="row text-center">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa fa-list-ul"></i></div>
                            <h4 class="title"><a href="">Info sur l'Arrondissement / le quartier</a></h4>
                            <p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier choisi en temps réel</p>
                            <h4 class="title"><a href="">Visualiser mes arrondissements / quartiers choisis</a></h4>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa fa-list-ul"></i></div>
                            <h4 class="title"><a href="{{ route('actualite-user') }}">Info sur l'Arrondissement /
                                    le quartier</a></h4>
                            <p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier
                                choisi en temps réel</p>
                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">

                            <div class="icon"><i class="fa fa-signal" aria-hidden="true"></i></div>
                            <h4 class="title"><a href="{{ route('user-sondage') }}">Sondage</a></h4>
                            <p class="description">Si vous habitez ou fréquentez l'arrondissement ou le quartier choisi
                                pour un sondage à affectuer, Vous serez alors appelé à répondre à une serie de questions.
                            </p>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="fa fa-star" aria-hidden="true"></i></div>
                            <h4 class="title"><a href="{{ route('user-city') }}">Préférence</a></h4>
                            <p class="description">Vous pouvez chosir un arrondissement ou quartier afin d'être au
                                courant des actualité à temps réel en fonctions des thématiques séléctionnées</p>
                        </div>
                    </div>


                </div>

            </div>
        </section><!-- End Featured Services Section -->







    </main><!-- End #main sk.eyJ1Ijoidmlkb2xlIiwiYSI6ImNsMTNnMG5wMzAwMHEzY21mcjdqcnNhMHgifQ.Ji24n7en8pYCRyfmXDVDDA-->

    {{-- <script src="{{ asset('assets/js/bootstrap.js') }}"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
    {{-- form validate --}}

    <script>
        $('#validation').validate({
            rules: {
                categorie: {
                    required: true,
                },
                arrondissement: {
                    required: true,
                }
                quartier: {
                    required: true,
                }
                commentaire: {
                    required: true,
                }


            },
            messages: {
                categorie: "Choisissez un categorie*",
                arrondissement: "Choisissez un categorie*",
                quartier: "Choisissez un quartier*",
                commentaire: "Laissez votre commmentaire SVP ! *",

            }
        });
    </script>

    <script>
        $('#hide-message').show();
        setTimeout(function() {
            $('#hide-message').hide();
        }, 5000);
    </script>
@endsection
