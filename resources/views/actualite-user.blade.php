@extends('layouts-user.master')

@section('content')

<div class="container " style="margin-top: -80px" >
    <a href="{{route('home')}}"  style="margin-top: -10px" class="btn btn-primary " > <i class="fa fa-arrow-left" aria-hidden="true"></i> RETOUR</a>

    
</div>


    
    <!-- End Hero -->


    <main id="main" class="py-0" style="margin-top: 0px" >

             <!-- ======= Departments Section ======= -->
             <div>
                 
             </div>

             <!-- ======= Doctors Section ======= -->
             <section id="doctors" class="doctors section-bg " >
                <div class="container" data-aos="fade-up">
    
                    <div class="section-title">
                        <h2>Fil'Info | @if($town) {{$town}} @endif</h2>

                        <p>Suivez les actualités | @if($town) {{$town}} @endif</p>
                    </div>
    
                    @livewire('info-user')
    
                </div>
            </section><!-- End Doctors Section -->
    

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

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="fa fa-star"   aria-hidden="true" ></i></div>
                            <h4 class="title"><a href="{{route('user-city')}}">Préférence</a></h4>
                            <p class="description">Vous pouvez chosir un arrondissement ou quartier afin d'être au courant des actualité à temps réel en fonctions des thématiques séléctionnées</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Featured Services Section -->


    </main><!-- End #main -->

 
@endsection