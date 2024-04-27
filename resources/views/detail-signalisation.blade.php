@extends('layouts-user.master')

@section('content')
    <style>
        .error {
            color: red;
            border-color: red;
            font-weight: 900;
        }
    </style>


    <div class="container " style="margin-top: -80px">
        <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i>
            RETOUR</a>
        {{-- <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-12 ">
          {{ redirect()->back()->getTargetUrl() }}

            <div class="search "> <i class="fa fa-search"></i> <input type="text" class="form-control"
                    placeholder="Je recherche un arrondissement ou quartier"> <button
                    class="btn btn-primary">Search</button> </div>
        </div>
    </div> --}}
    </div>

    <section id="appointment" class=" appointment section-bg ">
        <div class="container col-md-12 text-center" data-aos="fade-up">

            <div class="section-title">
                <h2>Détail Signalement </h2>
                <p></p>
            </div>

        </div>

        </div>
    </section>





    <section class="layout-content container">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Resolue :   @if ($data->resolue==1 )  <span style="color:green"><i class="fa fa-check-square" style="color:green" aria-hidden="true"></i> OUI</span>  @else <span style="color:red">NON</span> @endif  </h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Catégorie : {{ \App\Models\Categorie::where(['id'=>$data->categorie_id ])->first()->categorie}} | Quartier : {{$data->arrondissement}} | Quartier : {{$data->quartier}} | Date : {{$data->created_at->format('d/m/Y à H:i:s')}}</li>

                </ol>
            </div>


            <div class="row">

                <div class="col-md-12 ">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste Signalements Infomation</h6>

                        <div class="card-body">
                           
                            <p> {{$data->commentaire}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- [ content ] End -->
        </div>

        <!-- [ Layout footer ] Start -->

        <!-- [ Layout footer ] End -->
    </section>




    <main id="main" class="py-0">
        <!-- ======= Doctors Section ======= -->

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
                            <h4 class="title"><a href="{{ route('actualite-user') }}">Info sur l'Arrondissement
                                    /
                                    le quartier</a></h4>
                            <p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier
                                choisi en temps réel</p>
                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">

                            <div class="icon"><i class="fa fa-signal" aria-hidden="true"></i></div>
                            <h4 class="title"><a href="{{ route('user-sondage') }}">Sondage</a></h4>
                            <p class="description">Si vous habitez ou fréquentez l'arrondissement ou le quartier choisi
                                pour un sondage à affectuer, Vous serez alors appelé à répondre à une serie de questions.
                            </p>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
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



    {{-- @livewireScripts() --}}
@endsection


@section('script')
    <!-- library js validate -->

    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>



    {{-- <script src="{{ asset('assets/js/bootstrap.js') }}"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
    {{-- form validate --}}


    <script>
        $('#hide-message').show();
        setTimeout(function() {
            $('#hide-message').hide();
        }, 5000);
    </script>
@endsection
