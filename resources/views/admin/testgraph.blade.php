@extends('layouts.master')



@section('content')
    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Tableau de bord</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </div>

            {{-- @php --}}
            {{-- dd($evolutionAnnee1); --}}
            {{-- @endphp --}}
            {{-- {{}} --}}

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="graphParAnnee" style="height: 400px"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="graphParAnnee1" style="height: 400px"></div>
                        </div>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="card mb-4 ">
                        <div class="card-body">

                            <form class="my-1 " id="validation"
                            action="{{ route('home') }}" method="POST">

                            {{ csrf_field() }}

                            <div class="container">
                                <div class="row">

                            
                                    <div class="form-group  col-md-4 ">
                                        <label class="col-form-label   text-sm-right">Année 1</label>

                                        <div class="">

                                            <select class="form-control" name="annee_sexe_1"
                                                id="annee_sexe_1"  placeholder="Enter Full Name" required>
                                                <option value="">Veuillez choisir une année</option>
                                                @foreach ($listAnnee as $item)
                                                    <option value="{{ $item->id }}">{{ $item->annee }}</option>
                                                @endforeach

                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 ">

                                        <label class="col-form-label   text-sm-right">Année 2</label>
                                        <div class="">

                                            <select class="form-control" name="annee_sexe_2" id="annee_sexe_2"
                                                required>
                                                <option value="">Veuillez choisir une année</option>
                                                @foreach ($listAnnee as $item)
                                                    <option value="{{ $item->id }}">{{ $item->annee }}</option>
                                                @endforeach

                                            </select>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3 m-auto">
                                        {{-- <input type="submit" class="btn" value="submit" name= "submit" > --}}
                                        <button type="submit" name="submit" value="submit"
                                            class="btn btn-primary">OK</button>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>


                            </div>


                        </form>


                       
                        </div>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                            <div id="graphParSexe" style="height: 400px"> </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="graphParNivInstruc" style="height: 600px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="graphParMilieu" style="height: 300px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="graphParDepartement" style="height: 300px"></div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- [ content ] End -->

        <!-- [ Layout footer ] Start -->
        <nav class="layout-footer footer bg-white">
            <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
                <div class="pt-3">
                    <span class="footer-text font-weight-semibold">&copy; <a href="#" class="footer-link"
                            target="_blank"> </a></span>
                </div>
                <div>
                    <a href="javascript:" class="footer-link pt-3">About Us</a>
                    <a href="javascript:" class="footer-link pt-3 ml-4">Help</a>
                    <a href="javascript:" class="footer-link pt-3 ml-4">Contact</a>
                    <a href="javascript:" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
                </div>
            </div>
        </nav>
        <!-- [ Layout footer ] End -->
    </div>
    <!-- [ Layout content ] Start -->



    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <script>
        Highcharts.chart('graphParAnnee', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Evolution de l\'IPSH par Année'
            },
            subtitle: {
                text: ''
            },
            xAxis: {

                categories: [
                    @foreach ($listAnnee as $annee)
                        {{ $annee->annee }},
                    
                    @endforeach
                ],


                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Taux (%)'
                }
            },
            tooltip: {
               /* headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true,*/
                
                //valuePrefix: ' ',
               // split: true,
              
            },
            plotOptions: {
                series: {
                    shadow: false,
                    borderWidth: 0,
                }
            },
           
            series: [

                @foreach ($listDim as $dim)
                    {
                    name:"{{ $dim->libelle }}",
                    data: [
                    @foreach ($listAnnee as $annee)
                        <?php $a = 0; ?>
                        @foreach ($evolutionAnnee as $item)
                            @if ($item->annee == $annee->annee and $item->dimension == $dim->libelle)
                                <?php $a = $item->taux; ?>
                            @break
                
                        @endif
                
                    @endforeach
                
                
                    {{ $a }},
                
                @endforeach
                
                ]
                },
                @endforeach

            ]
        });

        Highcharts.chart('graphParAnnee1', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Evolution de l\'IPSH par Année'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    @foreach ($listAnnee as $annee)
                        {{ $annee->annee }},
                    
                    @endforeach
                ],


                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Taux (%)'
                }
            },
            tooltip: {
                valuePrefix: ' ',
                split: true,
                distance: 30,
                padding: 5
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [

                @foreach ($listDim as $dim)
                    {
                    name:"{{ $dim->libelle }}",
                    data: [
                    @foreach ($listAnnee as $annee)
                        <?php $a = 0; ?>
                        @foreach ($evolutionAnnee as $item)
                            @if ($item->annee == $annee->annee and $item->dimension == $dim->libelle)
                                <?php $a = $item->taux; ?>
                            @break
                
                        @endif
                
                    @endforeach
                
                
                    {{ $a }},
                
                @endforeach
                
                ]
                },
                @endforeach

            ]
        });



        Highcharts.chart('graphParSexe', {
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Evolution de l\'IPSH par Sexe'
            },
            credits: {
                enabled: false
            },
            legend: {},
            plotOptions: {
                series: {
                    shadow: false,
                    borderWidth: 0,
                }
            },
            xAxis: {
                categories: [
                    @foreach ($listDim as $dim)
                        "{{ $dim->libelle }}",
                    @endforeach
                ],
                lineColor: '#999',
                lineWidth: 1,
                tickColor: '#666',
                tickLength: 3,
              
            },
            yAxis: {
                lineColor: '#999',
                lineWidth: 1,
                tickColor: '#666',
                tickWidth: 1,
                tickLength: 3,
                gridLineColor: '#ddd',
                title: {
                    text: 'Taux (%)',
                    rotation: 0,
                    margin: 50,
                }
            },
            series: [

                <?php $i = 0; ?>
                <?php $j = 0; ?>

                <?php $d = []; ?>
                <?php $h = []; ?>

                @foreach ($listsexe as $sexe)
                
                    @foreach ($listDim as $dim)
                
                        @foreach ($evolutionSexe as $evolu)
                
                            @if ($evolu->sexe == 'Femme' and $evolu->annee == '2013' and $evolu->dimension == $dim->libelle)
                
                
                                <?php $h[$i] = $evolu->taux; ?>
                
                            @endif
                
                
                            @if ($evolu->sexe == 'Femme' and $evolu->annee == '2014' and $evolu->dimension == $dim->libelle)
                
                                <?php $d[$j] = $evolu->taux; ?>
                
                
                            @endif
                
                        @endforeach
                
                        <?php $i = $i + 1; ?>
                        <?php $j = $j + 1; ?>
                
                
                    @endforeach
                
                    {
                    name: 'Year   {{ $i }} {{ $annee1 }} {{ $sexe->libelle }} ',
                
                
                    data:
                
                    [
                
                    @for ($i = 0; $i < $countlistDim; $i++)
                        @if (isset($h[$i]))
                            {{ $h[$i] }},
                        @else
                            "",
                        @endif
                
                    @endfor
                
                
                    ]
                
                
                    },
                
                    {
                    name: 'Year  {{ $j }} {{ $annee2 }} {{ $sexe->libelle }} ',
                
                
                    data:
                
                    [
                
                    @for ($j = 0; $j < $countlistDim; $j++)
                        @if (isset($d[$j]))
                            {{ $d[$j] }},
                        @else
                            "",
                        @endif
                
                    @endfor
                
                    ]
                
                
                    },
                
                    <?php $i = 0; ?>
                    <?php $j = 0; ?>
                @endforeach



            ]

        });


        Highcharts.chart('graphParNivInstruc', {
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Evolution de l\'IPSH par Niveau d\'instruction'
            },
            credits: {
                enabled: false
            },
            legend: {},
            plotOptions: {
                series: {
                    shadow: false,
                    borderWidth: 0,
                }
            },   tooltip: {
                valuePrefix: ' ',
                split: true,
                distance: 30,
                padding: 5
            },
            xAxis: {
                categories: [
                    @foreach ($listDim as $dim)
                        "{{ $dim->libelle }}",
                    @endforeach
                ],
                lineColor: '#999',
                lineWidth: 1,
                tickColor: '#666',
                tickLength: 3,
              
            },
            yAxis: {
                lineColor: '#999',
                lineWidth: 1,
                tickColor: '#666',
                tickWidth: 1,
                tickLength: 3,
                gridLineColor: '#ddd',
                title: {
                    text: 'Taux (%)',
                    rotation: 0,
                    margin: 50,
                }
            },
            series: [

                <?php $i = 0; ?>
                <?php $j = 0; ?>

                <?php $d = []; ?>
                <?php $h = []; ?>

                @foreach ($listNiveau as $niveau)
                
                    @foreach ($listDim as $dim)
                
                        @foreach ($evolutionNivInstr as $evolu)
                
                            @if ($evolu->niveau == $niveau->libelle and $evolu->annee == $annee1 and $evolu->dimension == $dim->libelle)
                
                
                                <?php $h[$i] = $evolu->taux; ?>
                
                            @endif
                
                
                            @if ($evolu->niveau == $niveau->libelle and $evolu->annee == $annee1 and $evolu->dimension == $dim->libelle)
                
                                <?php $d[$j] = $evolu->taux; ?>
                
                
                            @endif
                
                        @endforeach
                
                        <?php $i = $i + 1; ?>
                        <?php $j = $j + 1; ?>
                
                
                    @endforeach
                
                    {
                    name: 'Year  {{ $i}} {{ $annee1 }} {{ $niveau->libelle }} ',
                
                
                    data:
                
                    [
                
                    @for ($i = 0; $i < 8 ; $i++)
                        @if (isset($h[$i]))
                            {{ $h[$i] }},
                        @else
                            "",
                        @endif
                
                    @endfor
                
                
                    ]
                
                
                    },
                
                    {
                    name: 'Year   {{ $i}} {{ $annee2 }} {{ $niveau->libelle }} ',
                
                
                    data:
                
                    [
                
                    @for ($j = 0; $j < 8; $j++)
                        @if (isset($d[$j]))
                            {{ $d[$j] }},
                        @else
                            "",
                        @endif
                
                    @endfor
                
                    ]
                
                
                    },
                
                    <?php $i = 0; ?>
                    <?php $j = 0; ?>
                @endforeach



            ]

        });



       



        Highcharts.chart('graphParMilieu', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Evolution de l\'IPSH par Milieur de residence'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    @foreach ($listAnnee as $annee)
                        {{ $annee->annee }},
                    
                    @endforeach
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Taux (%)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [

                @foreach ($listDim as $dim)
                    {
                    name:"{{ $dim->libelle }}",
                    data: [
                    @foreach ($listAnnee as $annee)
                        <?php $a = ''; ?>
                
                        @foreach ($evolutionAnnee as $item)
                            @if ($annee->annee == $item->annee and $item->dimension == $dim->libelle)
                                <?php $a = $item->taux; ?>
                            @else
                                <?php $a = 0; ?>
                            @endif
                
                        @endforeach
                
                
                        {{ $a }},
                
                    @endforeach
                
                    ]
                    },
                @endforeach

            ]
        });





        Highcharts.chart('graphParDepartement', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Evolution de l\'IPSH par Departement'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    @foreach ($listAnnee as $annee)
                        {{ $annee->annee }},
                    
                    @endforeach
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Taux (%)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [

                @foreach ($listDim as $dim)
                    {
                    name:"{{ $dim->libelle }}",
                    data: [
                    @foreach ($listAnnee as $annee)
                        <?php $a = ''; ?>
                
                        @foreach ($evolutionAnnee as $item)
                            @if ($annee->annee == $item->annee and $item->dimension == $dim->libelle)
                                <?php $a = $item->taux; ?>
                            @else
                                <?php $a = 0; ?>
                            @endif
                
                        @endforeach
                
                
                        {{ $a }},
                
                    @endforeach
                
                    ]
                    },
                @endforeach

            ]
        });
    </script>



@endsection
@section('script')
    <!-- library js validate -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>

    {{-- form validate --}}

    <script>
        $('#validation').validate({
            reles: {
                annee_sexe_1: {
                    required: true,
                },
                annee_sexe_2: {
                    required: true,
                },
             


            },
            messages: {
                annee_sexe_1: "Choississez une année svp*",
                annee_sexe_1: "Choississez une année svp*",


            }
        });
    </script>


    <script>
        $('#hide-message').show();
        setTimeout(function() {
            $('#hide-message').hide();
        }, 5000);
    </script>