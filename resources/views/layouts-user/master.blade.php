<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Participation citoyenne</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @livewireStyles()
    <!-- Favicons -->
    <link href="{{ asset('assetss/img/armoirie.png') }}" rel="icon">
    <link href="{{ asset('assetss/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->

    <link href="{{ asset('assetss/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetss/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- @livewireStyles --}}
    {{-- ----------------------datatable --}}
    {{-- A  remettre --}}
    <link href="{{ asset('assetss/css/style.css') }}" rel="stylesheet">

    @yield('style')
    {{-- ----------------------datatable --}}

    <!-- =======================================================
        
  * Template Name: Medicio - v4.7.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <i class="bi bi-clock "></i> Lundi - Samedi, 8H 00 A 17H 30
            </div>
            <div class="d-flex align-items-center">
                {{-- <i class="bi bi-envelope cta-btn scrollto"></i> info@cotonou-benin.com | --}}
                <a href=""><i class="bi bi-phone"></i> + 229 95 56 72 14 | &nbsp;</a>
                <a href=""> <i class="bi bi-facebook"></i> &nbsp;</a>
                <a href=""> <i class="bi bi-instagram"></i>&nbsp;</a>
                <a href=""> <i class="bi bi-whatsapp"></i> &nbsp;</a>
                <a href=""> <i class="bi bi-youtube"></i> &nbsp;</a>

            </div>


        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <a href="{{route('home')}}" class="logo me-auto"><img src="{{ asset('assetss/img/logocotonou.jpg') }}" alt=""
                    width="50px"> <span style="color:rgb(71, 165, 241); font-size: 25px">COTONOU</span> </a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

            <nav id="navbar" class="navbar order-last order-lg-0 ">
                <ul>
                    {{-- <li><a class="nav-link scrollto" href="#/about">A propos</a></li> --}}
                    <li><a class="nav-link scrollto" href="{{ route('actualite-user') }}">Actualite</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('user-sondage') }}">Je participe</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('signalement-user') }}">Je signale</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('user-city') }}">Mes Preferences</a></li>
                    <li><a class="nav-link scrollto" href="#services">e-Services</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#services">e-Services</a></li>
                    <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
                    <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li> --}}
                    {{-- <li class="dropdown"><a href="#"><span>Participation</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('actualite-user')}}">ActualitÃ©s</a></li>
                    <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li> 
                            <li><a href="{{route('user-sondage')}}">Sondage</a></li>
                         
                            <li><a href="{{route('signalement-user')}}">Signalement</a></li>
                            <li><a href="{{route('user-city')}}">PrÃ©ference</a></li>
                        </ul>
                    </li> --}}

                    <li><a class="nav-link scrollto " href="#contact">Contact </a></li>
                    <li><a class="nav-link scrollto " href="{{ route('login') }}" style="color:rgb(62, 128, 228)">Je
                            suis Administrateur </a></li>

                    {{-- <li><a class="nav-link scrollto " ><input type="search" class="form-control" placeholder="Rechercher"></a></li> --}}

                    @if (Auth::check())
                        <li class="dropdown"><a href="#"><span><i class="far fa-user-circle"
                                        style="font-size: 17px"></i> Compte</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>

                                <li><a href="#"> {{ Auth::user()->email }}</a></li>
                                @if (Auth::check() && Auth::user()->role_name =="users" )
                                <li><a href="{{route('profil')}}"> Profil</a></li>
                                @endif
                            
                                <li><a href="{{ route('logout') }}">Logout</a></li>



                                {{-- <li><a href="#">Profil</a></li> --}}

                            </ul>
                        </li>
                    @endif

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->


            @if (!Auth::check())
                <a style="font-size:12px" href="{{ route('login') }}"
                    class="mx-2 scrollto btn btn-outline-success"><span class="d-none d-md-inline"></span>
                    Connexion</a> &nbsp;
                <a style="font-size:12px" href="{{ route('register') }}"
                    class=" scrollto btn btn-outline-primary"><span class="d-none d-md-inline"></span>
                    Inscription</a>
            @endif


        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section class="col-md-12 " style="background-color: #eafcff">
        <div class="row my-3 py-5">
            <img src="{{ asset('assetss/img/banniere.png') }}" alt="">
        </div>


    </section>

    {{-- <div class="container " style="margin-top: -30px">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-12 " >
                <div class="search "> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="Je recherche un arrondissement ou quartier"> <button class="btn btn-primary">Search</button> </div>
            </div>
        </div>
    </div> --}}

 




    <!-- End Hero -->

    @yield('content')


    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Vous avez des préocupations ?, Veuillez Nous Contacter</p>
            </div>

        </div>

        {{-- <div>
                <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d150893.88912269086!2d2.307514465966315!3d6.369248693885129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x102354e509f894f7%3A0xc8fde921f89849f6!2sCotonou!5e0!3m2!1sfr!2sbj!4v1645195805326!5m2!1sfr!2sbj"
                    frameborder="0" allowfullscreen></iframe>
            </div> --}}

        <div class="container">

            <div class="row mt-5">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Notre Adresse</h3>
                                <p>01 BP: 56 44 Cotonou
                                    Rép. du Bénin</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email </h3>
                                <p>info@cotonou-benin.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Appelez nous</h3>
                                <p>+229 95 56 72 14</p>
                            </div>
                        </div>
                    </div>

                </div>
          
                <div class="col-lg-6">
                    @livewire('contact-form')
                    {{-- <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row ">
                            <div class="col form-group mt-3">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Nom & prénom" required>
                            </div>
                            <div class="col form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder=" Email"
                                    required>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">ENVOYER</button></div>
                    </form> --}}
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <a href="#" class="logo me-auto"><img src="{{ asset('assetss/img/logocotonou.jpg') }}"
                                    alt="" width="60px"> <span style="color:rgb(71, 165, 241)">Ville de cotonou</span>
                            </a>
                            {{-- <h3>Ville de cotonou</h3> --}}
                            <p>
                                Littoral, BENIN <br>
                                01 BP: 56 44 Cotonou
                                Rép. du Bénin<br><br>
                                <strong>Phone:</strong> + 229 95 56 72 14<br>
                                <strong>Email : </strong>sgmcot@yahoo.fr<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Liens Utiles</h4>
                        <ul>

                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">ACCEUIL</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="{{ route('actualite-user') }}">ACTUALITE</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="{{ route('user-sondage') }}">CONSULTER</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="{{ route('signalement-user') }}">SIGNALER</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('user-city') }}">PREFERENCE</a>
                            </li>



                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Nos services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="https://pprod.service-public.bj/public/services/service/PS00961">Demande de
                                    Mariage</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Attestation de recasement</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Autorisation parentale</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter footer-links">
                        <h4> <a href="{{ route('login') }}">Se connecter</a> / <a
                                href="{{ route('register') }}">S'inscrire</a> </h4>
                        <p>Inscrivez-vous et rester informé(e) des actualités</p>

                        <ul>

                            <li><i class="bx bx-chevron-right"></i> <a href="#">Infos légales</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Conditions générales</a></li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                <strong> &copy; Copyright <span> {{ date('Y') }} | Mairie de Cotonou </span></strong>. All Rights
                Reserved | <a href="#">Politique de confidentialité</a> | Designed by <a
                    href="https://e-vidoleservices.com" class=" text-info"> <em>AKPAGNONNIDE Sidoine</em> </a>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->

            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- <script src="  https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script> --}}
    {{-- --------------------------------------------- datatable --}}

    <!-- Vendor JS Files -->
    <script src="{{ asset('assetss/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assetss/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assetss/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetss/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assetss/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assetss/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assetss/js/main.js') }}"></script>

    @livewireScripts()
    @stack('scripts')

    @yield('script')

    {{-- @stack('scripts') --}}

</body>


</html>
