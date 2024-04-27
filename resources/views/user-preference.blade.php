@extends('layouts-user.master')


@section('content')
    <style>
        .checkbox {
            background-color: #fff;
            display: inline-block;
            height: 28px;
            margin: 0 .25em;
            width: 28px;
            border-radius: 4px;
            border: 1px solid #ccc;
            float: right
        }

        .checkbox span {
            display: block;
            height: 28px;
            position: relative;
            width: 28px;
            padding: 0
        }

        .checkbox span:after {
            -moz-transform: scaleX(-1) rotate(135deg);
            -ms-transform: scaleX(-1) rotate(135deg);
            -webkit-transform: scaleX(-1) rotate(135deg);
            transform: scaleX(-1) rotate(135deg);
            -moz-transform-origin: left top;
            -ms-transform-origin: left top;
            -webkit-transform-origin: left top;
            transform-origin: left top;
            border-right: 4px solid #fff;
            border-top: 4px solid #fff;
            content: '';
            display: block;
            height: 20px;
            left: 3px;
            position: absolute;
            top: 15px;
            width: 10px
        }

        .checkbox span:hover:after {
            border-color: #999
        }

        .checkbox input {
            display: none
        }

        .checkbox input:checked+span:after {
            -webkit-animation: check .8s;
            -moz-animation: check .8s;
            -o-animation: check .8s;
            animation: check .8s;
            border-color: #555
        }


        .checkbox input:checked+.primary:after {
            border-color: #2196F3
        }

    </style>


    <div class="container " style="margin-top: -33px">
            <a href="{{route('home')}}" class="btn btn-dark"> <i class="fa fa-arrow-left" aria-hidden="true"></i> RETOUR</a>
        {{-- <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-12 ">

                <div class="search "> <i class="fa fa-search"></i> <input type="text" class="form-control"
                        placeholder="Je recherche un arrondissement ou quartier"> <button
                        class="btn btn-primary">Search</button> </div>
            </div>
        </div> --}}
    </div> 




    <main id="main" class="">

       

        <div class="container col-md-6 py-3" data-aos="fade-up">

            <div class="section-title">
                <h2>Choisir une thématique</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-12 card">
                    <div class="tab-content card-body ">
                        <div class="tab-pane active card-box show" id="tab-1">

                            <p class="fst-italic">Choississez vos thématiques favoris et soyez infomer uniquement sur 
                                les actualités de ces thématiques.</p>

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

                            <form action="{{ route('thematiqueUser') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="form-group row  font-weight-bold  ">


                                    <div class=" text-left">


                                        @foreach ($thematiques as $item)
                                            <div>

                                                <input
                                                    @foreach ($thematiquesUser as $thematique) @if ($item->id == $thematique->thematique_id) checked @endif
                                                    @endforeach




                                                type="checkbox" name="thematiques[]" id="alerte"
                                                value="{{ $item->id }}"
                                                >
                                                <label class="mx-2 text-uppercase"
                                                    for="alerte">{{ $item->thematique }}</label>

                                            </div>

                                        @endforeach


                                    </div>


                                </div>
                                <div class="text-center">
                                    {{-- <a type="" href="" class=" mx-2 d-none d-md-inline scrollto btn btn-outline-info"
                                value="ENREGISTRER">ANNULER</a> --}}


                                    <input type="submit" class="  mx-2 d-none d-md-inline scrollto btn btn-outline-success"
                                        value="VALIDER">

                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>


        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services text-center">
            <div class="container text-center" data-aos="fade-up">

                <div class="row text-center">


                    <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('indicateur-macro-economique') }}">
                                <div class="icon"><i class="fa fa-cube" aria-hidden="true"></i></div>
                            </a>
                            <h6 class="title"><a href="{{ route('indicateur-macro-economique') }}">PIB en volume - PIB en
                                    Valeur</a></h6>

                        </div>
                    </div>


                    <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('classification-fonctions') }}">
                                <div class="icon"> <i class="sidenav-icon feather icon-pie-chart"></i></div>
                            </a>
                            <h4 class="title"><a href="{{ route('classification-fonctions') }}">Classification budgétaire
                                    par fonction</a></h4>

                        </div>
                    </div>


                    <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('classification-programmatiques') }}">
                                <div class="icon"> <i class="sidenav-icon feather icon-bar-chart-2"></i></div>
                            </a>
                            <h4 class="title"><a href="{{ route('classification-programmatiques') }}">Classification budgétaire
                                    programmatique</a></h4>

                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('dotation-budgetaires') }}">
                                <div class="icon"><i class="sidenav-icon feather icon-layers"></i></div>
                            </a>
                            <h4 class="title"><a href="{{ route('dotation-budgetaires') }}"> Dotation Budgétaire par
                                    action et par ministère</a></h4>

                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-3 mt-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('tofes') }}">
                                <div class="icon"> <i class="sidenav-icon feather icon-grid"></i></div>
                            </a>
                            <h4 class="title"><a href="{{ route('tofes') }}"> Opérations financières
                                    de l'Etat (TOFE)</a></h4>

                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-3  mt-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('recettes') }}">
                                <div class="icon"><i class="sidenav-icon feather icon-bar-chart"></i></div>
                            </a>
                            <h4 class="title"><a href="{{ route('recettes') }}"> Recette du budget
                                    générale
                                    de l'Etat</a></h4>

                        </div>
                    </div>


                    <div class="col-md-4 col-lg-3  mt-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('depense-budget-etat') }}">
                                <div class="icon"> <i class="sidenav-icon feather icon-command"></i></div>
                            </a>
                            <h4 class="title"><a href="{{ route('depense-budget-etat') }}"> Dépense du budget
                                    générale
                                    de l'Etat</a></h4>

                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3  mt-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('fadec-affecte') }}">
                                <div class="icon"><i class="sidenav-icon feather icon-disc"></i></div>
                            </a>
                            <h4 class="title"><a href="{{ route('fadec-affecte') }}"> FADeC Affecté par
                                    ministère</a></h4>

                        </div>
                    </div>


                    <div class="col-md-4 col-lg-3  mt-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('fadec-non-affecte') }}">
                                <div class="icon"> <i class="sidenav-icon feather icon-minus-circle"></i></div>
                            </a>
                            <h4 class="title"><a href="{{ route('fadec-non-affecte') }}"> FADeC non Affecté par
                                    ministère</a></h4>

                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3  mt-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('credit-delegue') }}">
                                <div class="icon"> <i class="sidenav-icon feather icon-package"></i></div>
                            </a>
                            <h4 class="title"><a href="{{ route('credit-delegue') }}">Crédit délégué des
                                    ministères par année</a></h4>

                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Featured Services Section -->


    </main><!-- End #main -->
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
                annee: {
                    required: true,
                }

            },
            messages: {
                code: "saisissez un code*",
                annee: "saisissez une annee*",

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
