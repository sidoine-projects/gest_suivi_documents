<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>Base de données MP</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description"
        content="Bhumlu Bootstrap admin template made using Bootstrap 4, it has tons of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="Bhumlu, bootstrap admin template, bootstrap admin panel, bootstrap 4 admin template, admin template">
    <meta name="author" content="SoengSouy" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/open-iconic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shreerang-material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.css') }}">

    <!-- Libs -->
    <link rel="stylesheet" href="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/flot/flot.css') }}">

    @yield('style')

</head>

<style>
    /* close icon */
    .close:focus,
    .close:hover {
        color: rgb(255, 0, 0);
        text-decoration: none;
        opacity: .75;
        outline: none !important;
    }

    .close {
        font-size: 45px !important;
        margin-top: 5px !important;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

</style>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">

            {{-- -------------------------------------------- --}}
            {{-- @include('sidebar.sidebar') --}}

            {{-- menu --}}

            {{-- @yield('menu') --}}
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->

                <!-- [ Layout navbar ( Header ) ] End -->
                {{-- content layout --}}
                <div class="layout-content">
                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h3 class="font-weight-bold py-3 mb-0"
                            style="text-align:center; border:2px ridge black; text-transform : uppercase; ">Evolution de
                            l'IPSH par Année</h3>
                        {{-- <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">Annee</li>

                            </ol>
                        </div> --}}

                        <div class="row">

                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h4 class="card-header"><i class="feather icon-user"></i> Liste Evolution de
                                        l'IPSH par Année</h4>
                                    {{-- <a class=" mx-4 col-sm-1 btn btn-primary" href="{{ route('evolution_sexe/downloadPDF') }}">Download PDF</a> --}}
                                    <div class="card-body">
                                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Annee</th>
                                                @foreach($listDim as $dim)
            
                                                <th>{{$dim->libelle}}</th>
                                                @endforeach
            
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($listAnnee as $annee)
                                                <tr>
                                                    <td>{{$annee->annee}}</td>
            
                                                    @foreach($listDim as $dim)
            
                                                        <?php
                                                        $a = "";
                                                        ?>
            
                                                        @foreach ($evolution as $item)
                                                            @if($item->libelle==$dim->libelle and $item->annee==$annee->annee )
            {{--                                                    <td>{{ $a $item->taux }}</td>--}}
            
            {{--                                                          $a =$item->taux--}}
                                                                <?php
                                                                $a = $item->taux;
                                                                ?>
            
                                                             @else
            
                                                            @endif
                                                        @endforeach
            
                                                        <td> {{ $a }} </td>
            
            
                                                    @endforeach
            
            
            
            
                                                </tr>
                                            @endforeach
            
            
            {{--                                @foreach ($evolution as $item)--}}
            
            {{--                                    <tr>--}}
            {{--                                        <td class="id">{{ $item->annee }}</td>--}}
            
            {{--                                        @foreach($listDim as $dim)--}}
            
            {{--                                            @if($item->libelle ==$dim->libelle  )--}}
            {{--                                                <td>{{ $item->taux }}</td>--}}
            
            {{--                                            @else--}}
            {{--                                                <td>{{ "" }}</td>--}}
            {{--                                            @endif--}}
            
            {{--                                        @endforeach--}}
            
            {{--                                    </tr>--}}
            {{--                                @endforeach--}}
                                            </tbody>
                                        </table>
            
            



                                    </div>
                                </div>
                            </div>



                        </div>


                        <!-- [ content ] End -->
                    </div>


                </div>
            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    {{-- model profile user --}}

    <!-- Modal User-->

    <!-- End Modal User-->

    <!-- Core scripts -->
    <script src="{{ asset('assets/js/pace.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/sidenav.js') }}"></script>
    <script src="{{ asset('assets/js/layout-helpers.js') }}"></script>
    <script src="{{ asset('assets/js/material-ripple.js') }}"></script>

    <!-- Libs -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/libs/eve/eve.js') }}"></script>
    <script src="{{ asset('assets/libs/flot/flot.js') }}"></script>
    <script src="{{ asset('assets/libs/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('assets/libs/chart-am4/core.js') }}"></script>
    <script src="{{ asset('assets/libs/chart-am4/charts.js') }}"></script>
    <script src="{{ asset('assets/libs/chart-am4/animated.js') }}"></script>

    <!-- Demo -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/analytics.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboards_index.js') }}"></script>

    {{-- @yield('script') --}}
    <!-- library js validate -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    {{-- form validate --}}

    <script>
        $('#validation').validate({
            reles: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                sex: {
                    required: true,
                },
                country: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                facebook_name: {
                    required: true,
                },
                youtube_name: {
                    required: true,
                }
            },
            messages: {
                name: "Please input full name*",
                email: "Please input email*",
                sex: "Please input sex*",
                country: "Please input country*",
                phone: "Please input phone number*",
                facebook_name: "Please input facebook name*",
                youtube_name: "Please input youtube name*",
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
</body>

</html>
