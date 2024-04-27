@extends('layouts-user.master')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/survey-manager/css/survey.css') }}" />
@endsection

@section('content')

<div class="container ">
    <a href="{{route('home')}}"  class="btn btn-primary " > <i class="fa fa-arrow-left" aria-hidden="true"></i> RETOUR</a>

</div>


    <section id="departments" class="departments">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Sondages</h2>
                <p>Veuillez participer aux sondages</p>
            </div>


            <div class="col-xs-12 mt-0">
                <a href="{{ route('user-sondage') }}" class="btn btn-primary material-icons"> arrow_back</a>
                <br>
                <br>

                <div class="panel panel-default center-block ">
                    <div class="panel-heading">{{ $survey->name }}</div>
                    <div class="panel-body" id="surveyElement">
                        <survey-show :survey-data="{{ json_encode($survey) }}"></survey-show>
                    </div>
                </div>
            </div>

        </div>
    </section>





    <main id="main" class="py-0">

        <!-- ======= Doctors Section ======= -->


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
                            <h4 class="title"><a href="{{ route('actualite-user') }}">Info sur l'Arrondissement /
                                    le quartier</a></h4>
                            <p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier
                                choisi en temps réel</p>
                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="fa fa-info-circle"></i></div>

                            <h4 class="title"><a href="{{ route('signalement-user') }}">Signalement</a></h4>
                            <p class="description">Siganlez une anormalie sur la voie publique (éclairage public,
                                dechets, accident...)
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





    </main><!-- End #main -->
@endsection


@section('script')
    <script>
        window.SurveyConfig = {!! json_encode(config('survey-manager')) !!};
    </script>

    <script src="{{ asset('vendor/survey-manager/js/survey-front.js') }}"></script>
@endsection
