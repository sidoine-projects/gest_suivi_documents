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
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo-pigier.PNG') }}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/import2/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .flex-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px; /* Adjust margin as needed */
        }

        .flex-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .flex-container .content {
            max-width: 50%;
            margin-right: 20px;
        }

        .section-heading .line {
            width: 50px;
            height: 2px;
            background-color: #000;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .flex-container {
                flex-direction: column;
                text-align: center;
            }

            .flex-container .content {
                max-width: 100%;
                margin: 0 0 20px 0;
            }

            .flex-container img {
                max-width: 100%;
                margin-bottom: 20px; /* Add margin-bottom to the image */
            }
        }

        /* Additional styles to ensure image doesn't touch the bottom yellow bar */
        .features-area {
            padding-bottom: 50px; /* Adjust padding as needed to prevent touching the bottom yellow bar */
        }
    </style>
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
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title=""><img src="{{ asset('assets/import2/img/core-img/message.png') }}" alt=""> <span>pigierbenin@gmail.com</span></a>
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
                                    <li><a href="#">Accueil</a></li>
                                    <li><a href="{{ route('login.user') }}">Faire une Demande</a></li>
                                    <li><a href="#pieces-disponibles">Pieces Disponibles</a></li>
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
            <div class="flex-container">
                <div class="content">
                    <div class="section-heading">
                        <div class="line"></div>
                        <h2>PIGIER_ACAD</h2>
                    </div>
                    <h6> Bienvenue sur notre plateforme de retrait de pièces académiques et administratives !</h6>
                    <a href="{{ route('login.user') }}" class="btn credit-btn mt-50">Se connecter</a>
                </div>
                <img src="{{ asset('assets/import2/img/bg-img/i2.jpg') }}" alt="Image" class="custom-img">
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
                    <div class="section-heading text-center mb-100 wow fadeInUp" data-wow-delay="100ms" id="pieces-disponibles">
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
                            <h5>Relevé de notes </h5>

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
                                    </script> All rights reserved | PIGIER Acad <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
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