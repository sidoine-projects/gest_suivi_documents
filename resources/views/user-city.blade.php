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


    <div class="container " style="margin-top: -80px">
            <a href="{{route('home')}}" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i> RETOUR</a>
        {{-- <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-12 ">

                <div class="search "> <i class="fa fa-search"></i> <input type="text" class="form-control"
                        placeholder="Je recherche un arrondissement ou quartier"> <button
                        class="btn btn-primary">Search</button> </div>
            </div>
        </div> --}}
    </div> 


    <section id="appointment" class=" appointment section-bg ">
        <div class="container col-md-12  col-lg-12 col-sm-12 text-center" data-aos="fade-up">

            <div class="section-title">
                <h2>Vos préferences</h2>
                <p>Visualiser mes arrondissements / quartiers choisis.</p>
            </div>

            <div class="form-group row ">
                <div class="col-sm-12">
                    @if (\Session::has('insert'))
                        <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                            {!! \Session::get('insert') !!}

                        </div>
                    @endif

                    {{-- @if (\Session::has('error'))
                        <div id="hide-message" class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                            {!! \Session::get('error') !!}
                        </div>
                    @endif --}}
                    <div class="clearfix"></div>
                </div>
            </div>

            <form action="{{ route('townUser') }}" method="post" role="form" class="php-email-form container "
                data-aos="fade-up" data-aos-delay="100">
                {{ csrf_field() }}
                <div class=" text-center row col-md-12 ">

                    <div class="col-md-10 form-group ">
                        @livewire('arrondissements-quartiers-select')


                    </div>

                    <div class="col-md-2 form-group mt-3">
                        <button type="submit">Ajouter</button>


                    </div>

                </div>


            </form>

        </div>
    </section>


    <main id="main" class="py-0">

        <!-- ======= Doctors Section ======= -->
        <div class="container col-md-6">



            <div class="form-group row">
                <div class="row py-2 ">

                    {{-- <div class="col-md-12 my-1 col-lg-4 col-sm-12  ">
                        <div class="card" style="">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Arrondissement
                                    <label class="checkbox">
                                        <input type="checkbox" id="pdp" name="pdp" value="oui" />

                                        <span class="primary"></span>
                                    </label>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12  my-1 col-lg-4 col-sm-12">
                        <div class="card" style="">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Quartier
                                    <label class="checkbox">
                                        <input type="checkbox" id="quartier" name="quartier" value="oui" />

                                        <span class="primary"></span>
                                    </label>
                                </li>

                            </ul>
                        </div>
                    </div> --}}


                </div>


                <div class="form-group row">
                    <div class="col-sm-12">
                        @if (\Session::has('insert-choix'))
                            <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <i class="feather icon-check-circle" style="font-size:1em"></i>
                                {!! \Session::get('insert-choix') !!}

                            </div>
                        @endif



                        @if (\Session::has('delete'))
                            <div id="hide-message" class="alert alert-info alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <i class="feather icon-check-circle" style="font-size:1em"></i>
                                {!! \Session::get('delete') !!}

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

            </div>

            @livewire('town-city')

            {{-- <table class="table table-striped table-bordered nowrap" style="width:100%;">
                <thead>
                    <tr>
                        <th scope="col">Arrondissement/quartier</th>

                        <th class="text-center">Action</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($arronddisementsUser as $item)
                        <form action="{{ route('updateStatus') }}" method="POST">
                            {{ csrf_field() }}
                            <tr>
                                <td> <input type="hidden" value="{{ $item->arrondissement }}" name="arrondissement">
                                    {{ $item->arrondissement }} &nbsp;

                                    @if ($item->status == 1)
                                        <i class="fa fa-check-square" style="color:green" aria-hidden="true"></i>
                                    @endif

                                </td>


                                <td class="text-center">
                                    <input type="submit" class=" form-group btn btn-outline-primary btn-sm" value="choisir">
                                    <a href="" class="form-group btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Are you sure to want to delete it?')">Supprimer</a>
                                </td>
                            </tr>
                        </form>
                    @endforeach


                    @foreach ($quartiersUser as $item)
                        <form action="{{ route('updateStatus') }}" method="POST">
                            {{ csrf_field() }}
                            <tr>
                                <td> <input type="hidden" value="{{ $item->quartier }}" name="quartier">
                                    {{ $item->quartier }} &nbsp;

                                    @if ($item->status == 1)
                                        <i class="fa fa-check-square" style="color:green" aria-hidden="true"></i>
                                    @endif

                                </td>


                                <td class="text-center">
                                    <input type="submit" class=" form-group btn btn-outline-primary btn-sm" value="choisir">

                                    <a href="{{ url('townUser/delete/' . $item->id) }}"
                                        class="form-group btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Are you sure to want to delete it?')">Supprimer</a>
                                </td>
                            </tr>
                        </form>
                    @endforeach



                </tbody>
            </table> --}}

        </div>



        <div class="container col-md-6 py-2" data-aos="fade-up">

            <div class="section-title">
                <h2>Choisir une thématique</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-12 card">
                    <div class="tab-content card-body ">
                        <div class="tab-pane active card-box show" id="tab-1">

                            <p class="fst-italic">Choississez vos thématiques favoris et soyez infomer uniquement sur
                                ces thématiques.</p>

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
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="row text-center">
                    {{-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa fa-list-ul"></i></div>
                            <h4 class="title"><a href="">Info sur l'Arrondissement / le quartier</a></h4>
                            <p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier choisi en temps réel</p>
                            <h4 class="title"><a href="">Visualiser mes arrondissements / quartiers choisis</a></h4>
                        </div>
                    </div> --}}

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa fa-list-ul"></i></div>
                            <h4 class="title"><a href="{{route('actualite-user')}}">Info sur l'Arrondissement / le quartier</a></h4>
                            <p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier choisi en temps réel</p>
                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                   
                            <div class="icon"><i class="fa fa-signal" aria-hidden="true"></i></div>
                            <h4 class="title"><a href="{{route('user-sondage')}}">Sondage</a></h4>
                            <p class="description">Si vous habitez ou fréquentez l'arrondissement ou le quartier choisi pour un sondage à affectuer, Vous serez alors appelé à répondre à une serie de questions. </p>
                               
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="fa fa-info-circle"></i></div>
                        
                            <h4 class="title"><a href="{{route('signalement-user')}}">Signalement</a></h4>
                            <p class="description">Siganlez une anormalie sur la voie publique (éclairage public, dechets, accident...)
                                </p>
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
