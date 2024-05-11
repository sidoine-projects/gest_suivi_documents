<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>PIGIER_ACAD</title>


    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/import2/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>


    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('assets/import2/img/core-img/pigier.png') }}" alt=""></a>
                        </div>

                        <!-- Top Contact Info -->
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title=""><img src="{{ asset('assets/import2/img/core-img/placeholder.png') }}" alt=""> <span>PIGIER-BENIN, Carré 1270, Rue 320 AGONTINKON-AYIDOTE, Cotonou, Bénin.</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title=""><img src="{{ asset('assetsimport2/img/core-img/message.png') }}" alt=""> <span>pigierbenin@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="credit-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="creditNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.html">Accueil</a></li>
                                    <li><a href="about.html">Faire une Demande</a></li>

                                    <li><a href="services.html">Pieces Disponibles</a></li>

                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Contact -->
                        <div class="contact">
                            <a href="tel:+22997846728"><img src="{{ asset('assets/import2/img/core-img/call2.png') }}" alt=""> +22997846728</a>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->



    <!-- ##### Features Area Start ###### -->
    <section class="features-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <div class="line"></div>
                            <h2>PIGIER_ACAD</h2>
                        </div>
                        <h6> Bienvenue sur notre plateforme de retrait de pièces académiques et administratives !</h6>
                        <a href="{{ route('login') }}" class="btn credit-btn mt-50">Se connecter</a>
                    </div>
                </div>
                <style>
                    .custom-img {
                        width: 150px;
                        height: 150px;
                    }
                </style>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp">
                        <img src="{{ asset('assets/import2/img/bg-img/i1.jpg') }}" alt="" class="custom-img"> <!-- Ajout de la classe custom-img -->
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp">
                        <img src="{{ asset('assets/import2/img/bg-img/i2.jpg') }}" alt="" class="custom-img"> <!-- Ajout de la classe custom-img -->
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp">
                        <img src="{{ asset('assets/import2/img/bg-img/i3.jpg') }}" alt="" class="custom-img"> <!-- Ajout de la classe custom-img -->
                    </div>
                </div>
            </div>
    </section>
    <!-- ##### Features Area End ###### -->

    <!-- ##### Call To Action Start ###### -->
    <section class="cta-area d-flex flex-wrap">
        <!-- Cta Thumbnail -->
        <div class="cta-thumbnail bg-img jarallax" style="background-image: url(assets/import2/img/bg-img/5.jpg);"></div>

        <!-- Cta Content -->
        <div class="cta-content">
            <!-- Section Heading -->
            <div class="section-heading white">
                <div class="line"></div>
            </div>
            <h6>"La seule façon de rester leader, donc d'être suivi, c'est de courir plus vite que les autres. On n'avance pas avec les idées fixes"</h6>
            <h7>Gervais Pigier</h7>
            <div class="row">
                <!-- Single Skills Area -->
                <div class="col-md-3">
                    <div id="circle" class="circle" data-value="0.90">
                        <div class="skills-text">
                            <span>0%</span>
                        </div>
                    </div>
                    <p>Defaut</p>
                </div>

                <!-- Single Skills Area -->
                <div class="col-md-3">
                    <div id="circle2" class="circle" data-value="0.75">
                        <div class="skills-text">
                            <span>0%</span>
                        </div>
                    </div>
                    <p>Echec</p>
                </div>

                <!-- Single Skills Area -->
                <div class="col-md-3">
                    <div id="circle3" class="circle" data-value="0.97">
                        <div class="skills-text">
                            <span>0%</span>
                        </div>
                    </div>
                    <p>Conflit</p>
                </div>

                <!-- Single Skills Area -->
                <div class="col-md-3">
                    <div id="circle4" class="circle" data-value="0.97">
                        <div class="skills-text">
                            <span>0%</span>
                        </div>
                    </div>
                    <p>Absence</p>
                </div>

                <!-- Nouvel élément ajouté -->
                <div class="col-md-3">
                    <div id="circle5" class="circle" data-value="0.85">
                        <div class="skills-text">
                            <span>0%</span>
                        </div>
                    </div>
                    <p>Retard</p>
                </div>
            </div>
        </div>



    </section>
    <!-- ##### Call To Action End ###### -->


    <!-- ##### Services Area Start ###### -->
    <section class="services-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <div class="line"></div>
                        <h2>Pieces Disponibles</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="200ms">
                        <div class="icon">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <div class="text">
                            <h5>Attestation de scolarité</h5>

                        </div>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <div class="icon">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <div class="text">
                            <h5>Attestation de fin de formation</h5>

                        </div>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <div class="icon">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <div class="text">
                            <h5>Authenticité de diplome</h5>

                        </div>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="icon">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <div class="text">
                            <h5>Certificat de scolarité</h5>

                        </div>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="600ms">
                        <div class="icon">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <div class="text">
                            <h5>Attestation d'inscription</h5>

                        </div>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <div class="icon">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <div class="text">
                            <h5>Authenticité d'Attestation</h5>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="600ms">
                        <div class="icon">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <div class="text">
                            <h5>Attestation de Service fait</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copywrite-content d-flex flex-wrap justify-content-center align-items-center">
                            <!-- Footer Logo -->
                            <a href="index.html" class="footer-logo"><img src="{{ asset('assets/import2/img/core-img/logo.png') }}" alt=""></a>

                            <!-- Copywrite Text -->
                            <p class="copywrite-text"><a href="#">Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </footer>
        <!-- ##### Footer Area Start ##### -->

        <!-- ##### All Javascript Script ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="{{ asset('import1/js/jquery/jquery-2.2.4.min.js') }}"></script>
        <!-- Popper js -->
        <script src="{{ asset('import1/js/bootstrap/popper.min.js') }}"></script>
        <!-- Bootstrap js -->
        <script src="{{ asset('import1/js/bootstrap/bootstrap.min.js') }}"></script>
        <!-- All Plugins js -->
        <script src="{{ asset('import1/js/plugins/plugins.js') }}"></script>
        <!-- Active js -->
        <script src="{{ asset('import1/js/active.js') }}"></script>

</body>

</html>