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

    <style>
      .custom-button {
            display: inline-block;
            background-color: #e0e0e0; /* Couleur cendre */
            color: dark;
            font-weight: 500;
            text-align: center;
            padding: 10px 20px;
            text-decoration: none;
            width: 45%; /* 50% de la page */
            box-sizing: border-box; /* Inclure padding dans la largeur totale */
            border: none; /* Supprimer la bordure par défaut */
            transition: background-color 0.3s, border 0.3s; /* Transition pour un effet de survol fluide */
        }

        .custom-button:hover {
            background-color: transparent; /* Rendre le fond transparent au survol */
            border: 2px solid #e0e0e0; /* Ajouter une bordure de 2px couleur cendre */
            color: #e0e0e0; /* Optionnel : Changer la couleur du texte au survol */
        }
        .flex-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            /* Adjust margin as needed */
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
                margin-bottom: 20px;
                /* Add margin-bottom to the image */
            }
        }

        /* Additional styles to ensure image doesn't touch the bottom yellow bar */
        .features-area {
            padding-bottom: 50px;
            /* Adjust padding as needed to prevent touching the bottom yellow bar */
        }
    </style>
</head>

<body class=" bg-danger">
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('assets/import2/img/core-img/pigier.png') }}"
                                    alt=""></a>
                        </div>
                        <!-- Top Contact Info -->
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title=""><img
                                    src="{{ asset('assets/import2/img/core-img/placeholder.png') }}" alt="">
                                <span>PIGIER-BENIN, Carré 1270, Rue 320 AGONTINKON-AYIDOTE, Cotonou, Bénin.</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title=""><img
                                    src="{{ asset('assets/import2/img/core-img/message.png') }}" alt="">
                                <span>pigierbenin@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ##### Features Area Start ###### -->
    <section class="features-area section-padding-100-0 bg-danger">
      <div class="container bg-danger">
          <div class="content-wrapper d-flex align-items-center text-center  ">
              <div class="row flex-grow">
                  <div class="col-lg-7 mx-auto text-white">
                      <div class="row align-items-center d-flex flex-row">
                          <div class="col-lg-6 text-lg-right pr-lg-4">
                              <h1 class="display-1 mb-0">404</h1>
                          </div>
                          <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                              <h2>Désolé!</h2>
                              <h3 class="font-weight-light">Vous n'êtes pas autorisé à accéder à cette page.</h3>
                          </div>
                      </div>
                      <div class="row mt-5">
                          <div class="col-12 text-right mt-xl-2">
                             <h3><a class=" font-weight-medium custom-button" href="/">Retour</a></h3>  
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
          <div class="row text-center mt-5">
            <div class="col-12 mt-xl-5">
                <p class="text-white font-weight-medium text-center"> Copyright &copy;
                    @<?php $Year = date('Y'); ?> {{ $Year }} PIGIER Acad All rights reserved - PIGIER BENIN.</p>
            </div>
        </div>
      </div>
    </section>
    <!-- ##### Features Area End ###### -->


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
