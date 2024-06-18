@extends('admin.layouts.master')

@section('content')
    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Tableau de board</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Statistiques</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </div>
            {{-- role name  admin --}}

            {{-- end role name admin --}}

            <div class=" col-lg-12 col-md-12 ">
                <!-- 1st row Start -->

                <div class="">
                    <div class="row">

                        <div class="col-md-3 ">
                            <div class="card  mb-4 bg-pattern-2-dark">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-user display-4 text-primary"></div>
                                        <div class="ml-3">
                                            <div class="small">
                                                <h6>Total étudiants <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalEtudiant }}</div>
                                        </div>
                                    </div>

                                    <div class="mt-3" style="height: 40px">
                                        @if (auth()->user()->role_name == 'admin' || auth()->user()->role_name == 'super_admin')
                                            <a href="{{ route('admin/users') }}">Voir plus</a>
                                        @else
                                            <a href="{{ route('register') }}">Inscription</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="card  mb-4 bg-pattern-2-dark">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-user display-4 text-primary"></div>
                                        <div class="ml-3">
                                            <div class="small">
                                                <h6>Total enseignants <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalEnseignant }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px">
                                        @if (auth()->user()->role_name == 'admin' || auth()->user()->role_name == 'super_admin')
                                            <a href="{{ route('admin/users') }}">Voir plus</a>
                                        @else
                                            <a href="{{ route('register') }}">Inscription</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card mb-4 bg-pattern-2-dark">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-file-empty display-4 text-primary"></div>
                                        <div class="ml-3">
                                            <div class="small">
                                                <h6>Total demandes/jour <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalDemande }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px">
                                        @if (auth()->user()->role_name == 'admin' || auth()->user()->role_name == 'super_admin')
                                            <a href="{{ route('demandes') }}">Voir plus</a>
                                        @else
                                            <a href="{{ route('demandes/new') }}">Faire une demande</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 bg-pattern-2-dark">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-file-empty display-4 text-primary"></div>
                                        <div class="ml-3">
                                            <div class="small">
                                                <h6>Total suivi demande/jour <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalSuiviDemande }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px">
                                        @if (auth()->user()->role_name == 'admin' || auth()->user()->role_name == 'super_admin')
                                            <a href="{{ route('demandes/admin') }}">Voir plus</a>
                                        @else
                                            <a href="{{ route('demandes') }}">Voir plus</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="graphParDemande" style="height: 400px"></div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="graphParMontant" style="height: 400px"></div>
                        </div>
                    </div>

                </div>
                <!-- 1st row Start -->
            </div>

        </div>
        <!-- [ content ] End -->

        <!-- [ Layout footer ] Start -->

        <!-- [ Layout footer ] End -->
    </div>
    <!-- [ Layout content ] Start -->
@endsection

@section('style')
    <style>
        .disabled-link {
            color: #6c757d;
            /* Couleur du texte pour un lien désactivé */
            text-decoration: none;
            /* Supprime la décoration de lien */
            cursor: default;
            /* Curseur par défaut (non cliquable) */
        }
    </style>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>

    <script>
        Highcharts.chart('graphParMontant', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Montant total journalier des demandes'
            },
            series: [{
                name: 'Montant',
                colorByPoint: true,
                data: [{
                    name: 'Enseignant',
                    y: {{ $totalDemandesEnseignant }},
                    color: '#0b448a' // Couleur pour les enseignants
                }, {
                    name: 'Étudiant',
                    y: {{ $totalDemandesEtudiant }},
                    color: '#1e70cd' // Couleur pour les étudiants
                }]
            }],
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y:.1f}'
                    }
                }
            }
        });
 
    </script>


    <script>
        Highcharts.chart('graphParDemande', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Evolution mensuelle des demandes '
            },
            xAxis: {
                categories: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc']
            },
            yAxis: {
                title: {
                    text: 'Nombre de demandes'
                }
            },
            // plotOptions: {
            //     column: {
            //         colorByPoint: true, // Couleur automatique par point
            //         colors: ['#FF4961', '#28D094', '#FF9149'] // Couleurs spécifiques pour chaque série
            //     }
            // },

            series: [{
                name: 'En cours',
                data: {!! json_encode($data['en_cours']) !!}
              
            }, {
                name: 'Rejeté',
                data: {!! json_encode($data['rejeté']) !!}
            }, {
                name: 'Approuvé',
                data: {!! json_encode($data['approuvé']) !!}
            }]
        });
    </script>
@endsection
