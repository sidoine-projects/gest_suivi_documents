@extends('layouts-user.master')

@section('content')





    {{-- <div class="container card my-4">
    <h5 class="card-header">Recherche</h5>
    <form class="card-body" action="/search" method="GET" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Rechercher..." name="q">
            <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">Go!</button>
      </span>
        </div>
    </form>
</div> --}}

<section class="col-md-12" style="margin-top: -80px !important">

    <div class="row">
        <!--Breaking box-->
        <div class="col-1 col-md-3 col-lg-2 py-1 pr-md-0 mb-md-1 " style="background-color:#3564bb  !important">
            <div style="background-color: #49b9ff   !important"
                class="d-inline-block d-md-block bg-primary text-white text-center breaking-caret py-1 px-2">
                <span class="fas fa-bolt" title="Breaking News"></span>
                <span class="d-none d-md-inline-block">A LA UNE</span>
            </div>
        </div>
        <!--Breaking content-->
        <div class="col-11 col-md-9 col-lg-10 pl-1 pl-md-2" style="">
            <div class="breaking-box pt-2 pb-1">
                <!--marque-->
                <marquee loop="infinite" behavior="scroll" direction="left" scrolldelay="50"
                    onmouseover="this.stop();" onmouseleave="this.start();">


                    @foreach ($actualites_alaune as $item)
                        <a class="h6 font-weight-bold"
                            href="{{ url('single-article/' . $item->id . '/' . $item->titre) }}"><span
                                class="position-relative mx-2 badge badge-success bg-success rounded-0"
                                style="background-color: #49b9ff !important">{{ strtoupper(\App\Models\Thematique::where(['id' => $item->thematique_id])->first()->thematique) }}</span>
                            {{ $item->titre }}</a>
                    @endforeach


                </marquee>
            </div>
        </div>
    </div>

</section>



    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="row">

                   <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('actualite-user') }}"><div class="icon"><i class="fa fa-list-ul"></i></div></a>
                            <h4 class="title"><a href="{{ route('actualite-user') }}">Info sur l'Arrondissement /
                                    le quartier</a></h4>
                            <a href="{{ route('actualite-user') }}"><p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier
                                choisi en temps réel</p></a>
                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">

                            <a href="{{ route('user-sondage') }}"><div class="icon"><i class="fa fa-signal" aria-hidden="true"></i></div></a>
                            <h4 class="title"><a href="{{ route('user-sondage') }}">Sondage</a></h4>
                            <a href="{{ route('user-sondage') }}"><p class="description">Si vous habitez ou fréquentez l'arrondissement ou le quartier choisi
                                pour un sondage à affectuer, Vous serez alors appelé à répondre à une serie de questions.
                            </p></a>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <a href="{{ route('signalement-user') }}"> <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="fa fa-info-circle"></i></div></a>

                            <h4 class="title"><a href="{{ route('signalement-user') }}">Signalement</a></h4>
                            <a href="{{ route('signalement-user') }}"><p class="description">Siganlez une anormalie sur la voie publique (éclairage public,
                                dechets, accident...)
                            </p></a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <a href="{{ route('user-city') }}"><div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="fa fa-star" aria-hidden="true"></i></div></a>
                            <h4 class="title"><a href="{{ route('user-city') }}">Préférence</a></h4>
                            <a href="{{ route('user-city') }}"><p class="description">Vous pouvez chosir un arrondissement ou quartier afin d'être au
                                courant des actualité à temps réel en fonctions des thématiques séléctionnées</p></a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="text-center">
                    <h3>Avez vous une préocupation? </h3>
                    <p> Vous avez une préocupation ou vous avez besoin d'aide, vous pouvez nous contactez</p>
                    <a class="cta-btn scrollto" href="#contact">Contactez-Nous</a>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= About Us Section ======= -->

        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>A propos </h2>
                    <h4> Pourquoi une plateforme de participation publique au seins de la ville de cotonou? </h4>


                    <p>La participation publique permet aux citoyens de s’exprimer sur les dossiers qui les concernent, en
                        dehors du cadre électoral, conformément à la <a href="#" class=" text-info">Politique de
                            consultation publique</a> de la Ville de cotonou .</p>


                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="{{ asset('assetss/img/message.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3>L'utilisation d'outils de participation en ligne, en complémentarité avec les activités en
                            personne,</h3>


                        <p class="fst-italic">
                            facilite la participation des citoyens, ces derniers pouvant s’informer sur les projets en
                            cours, s’abonner aux fils de nouvelles et s’exprimer sur différents enjeux en utilisant l’un ou
                            l’autre des moyens proposés, sans toujours avoir à se déplacer;
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Elle encourage une contribution active des citoyens à
                                différentes étapes d’avancement des projets;</li>
                            <li><i class="bi bi-check-circle"></i> Elle permet à la Ville de cotonou de rejoindre plus de
                                citoyens et d'élargir la diversité des opinions recueillies;</li>
                            <li><i class="bi bi-check-circle"></i> Afin de pouvoir prendre part aux activités de
                                participation publique en ligne (p.ex. compléter un sondage, signaler un évenement, laisser
                                un commentaire), il est nécessaire de créer un compte usager. Cette démarche prend seulement
                                quelques minutes et permet d'accéder à toutes les activités de participation de la
                                plateforme. Pour créer un compte usager, cliquez sur le bouton « S'incrire » situé dans la
                                barre de menu sur la page d'accueil.
                            </li>
                        </ul>
                        <p>
                            Vous pourrez également prendre connaissance des conditions d'utilisation et de la politique de
                            confidentialité du site.</p>
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Doctors Section ======= -->
        <section id="doctors" class="doctors section-bg">
            <div class="container" data-aos="fade-up">

      

                <div class="section-title">
                    <h2>Fil'Info de cotonou</h2>
                    <p>Suivez les actualités dans la ville de Cotonou</p>
                </div>
                <div class="container " style="margin-top: -30px">
                    <div class="row height d-flex justify-content-center align-items-center appointment ">
                        <div class="col-md-12 php-email-form">
            
                            <form method="post" action="{{ route('filtre') }}">
            
                                {{ csrf_field() }}
            
                                {{-- @livewire("select2-auto-search") --}}
            
                                {{-- <div class="search "> <i class="fa fa-search"></i> <input type="text" class="form-control" name="search" placeholder="Recherche arrondissement/quartier"> <button type="submit" class="btn btn-primary">Search</button> </div> --}}
            
                            </form>
            
                        </div>
                    </div>
                </div>
                <br>
                {{-- @livewire('actualites-pagination') --}}


            </div>
        </section><!-- End Doctors Section -->


        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row no-gutters">

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{$totalUser}}" data-purecounter-duration="1"
                                class="purecounter"></span>

                            <p><strong>Total utilisateur</strong></p>
                            <a href="{{route('register')}}">S'incrire &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{$totalSignalement}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Total signaler </strong> </p>
                            <a href="{{route('signalement-user')}}">Signaler &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{$totalSondage}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Total sondage / Enquête</strong> </p>
                            <a href="{{route('user-sondage')}}">Trouvé encore + &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{$totalActualite}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Total Actualités</strong> </p>
                            <a href="{{route('actualite-user')}}">Vos actualités &raquo;</a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Features Section ======= -->
        {{-- <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                        <div class="icon-box mt-5 mt-lg-0">
                            <i class="bx bx-receipt"></i>
                            <h4>Est labore ad</h4>
                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                        </div>
                        <div class="icon-box mt-5">
                            <i class="bx bx-cube-alt"></i>
                            <h4>Harum esse qui</h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                        </div>
                        <div class="icon-box mt-5">
                            <i class="bx bx-images"></i>
                            <h4>Aut occaecati</h4>
                            <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                        </div>
                        <div class="icon-box mt-5">
                            <i class="bx bx-shield"></i>
                            <h4>Beatae veritatis</h4>
                            <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                        </div>
                    </div>
                    <div class="image col-lg-6 order-1 order-lg-2"
                        style='background-image: url("assetss/img/features.jpg");' data-aos="zoom-in"></div>
                </div>

            </div>
        </section> --}}
        <!-- End Features Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Services dematerialises</h2>
                    <p></p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="fa fa-venus-mars" aria-hidden="true"></i></div>
                        <h4 class="title"><a
                                href="https://pprod.service-public.bj/public/services/service/PS00961">Demande de mariage</a>
                        </h4>
                        <p class="description"><strong> Demande de célébration de mariage</strong>
                            Réserver un créneaux de célébration de mariage civil</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="fa fa-building" aria-hidden="true"></i>
                        </i></div>
                        <h4 class="title"><a
                                href="#">Attestation de recasement</a>
                        </h4>
                        <p class="description"><strong> Demande d'attestation de recasement</strong>
                            Faites votre demande d'attestation de recasement en ligne</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="fa fa-child" aria-hidden="true"></i></div>
                        <h4 class="title"><a
                                href="#">Autorisation parentale</a>
                        </h4>
                        <p class="description"><strong> Demande d'autorisation parentale</strong>
                            Vous pouvez éffectuer une demande d'autorisation parentale ici</p>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

       
        <!-- End Pricing Section -->



        <!-- ======= Contact Section ======= -->
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
