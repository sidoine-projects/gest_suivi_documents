@extends('admin.layouts.master')

@section('content')
    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Dashboard</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </div>
            {{-- role name  admin --}}

            {{-- end role name admin --}}

            <div class="row col-lg-12 col-md-12 ">
                <!-- 1st row Start -->


                <!-- 1st row Start -->
            </div>

            <div class="row col-lg-12 col-md-12 ">
                <!-- 1st row Start -->

                <div class="col-lg-12">
                    <div class="row col-md-12">

                        <div class="col-md-3 ">
                            <div class="card  mb-4 bg-pattern-2-dark">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-user display-4 text-primary"></div>
                                        <div class="ml-3">
                                            <div class="small">
                                                <h6>Total utilisateurs <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalUser }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px"><a
                                            href="{{ route('admin/register') }}"> Créer un utilisateur</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 bg-pattern-2-dark">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-warning display-4 text-primary"></div>
                                        <div class="ml-3">
                                            <div class=" small">
                                                <h6>Total signalisation <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalSignalement }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px"><a
                                            href="#"> En savoir + </a></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card mb-4 bg-pattern-2-dark">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-chart-bars display-4 text-primary"></div>
                                        <div class="ml-3">
                                            <div class=" small">
                                                <h6>Total sondage <br> /Enquête</h6>
                                            </div>
                                            <div class="text-large">{{ $totalSondage }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px"><a
                                            href="#"> Créer un sondage <br> /Enquête </a></div>
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
                                                <h6>Total Actualités <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalActualite }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px"><a
                                            href="#"> En savoir + </a></div>
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="row">

                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div id="graphParPib" style="height: 400px"></div>
                                </div>
                            </div>
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


@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>

    <script>
        Highcharts.chart('graphParPib', {
            chart: {
    type: 'variablepie'
  },credits: { enabled: false },
  title: {
    text: 'Evolution des utilisateurs par année.'
  },
  tooltip: {
    headerFormat: '',
    pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
      'Total: <b>{point.y}</b><br/>' 

  },
  series: [{
    type: 'pie',
        allowPointSelect: true,
        keys: ['name', 'y', 'selected', 'sliced'],
    data: [

    @foreach ($years as $year)
                <?php $a = 0; ?>
            {
                name: "{{$year->year}}",
                @foreach ($users_year as $item)
                    @if ($item->year == $year->year )
                        <?php $a = $item->total; ?>

                    @break
                    @endif
                @endforeach
        
                y:{{ $a }},
            },
    @endforeach

    ],
    showInLegend: true


  }]
});
    </script>
@endsection
