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
                                                <h6>Total étudiants <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalUser }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px"><a
                                            href="#">Crée un etudiant</a></div>
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
                                            <div class="text-large">{{ $totalUser }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px"><a
                                            href="#">Crée un enseignant</a></div>
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
                                                <h6>Total demande etudiant/jour  <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalUser }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px"><a
                                            href="#"> Crée demande etudiant </a></div>
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
                                                <h6>Total demande enseignants/jour  <br> <br> </h6>
                                            </div>
                                            <div class="text-large">{{ $totalUser }}</div>
                                        </div>
                                    </div>

                                    <div id="" class="mt-3 " style="height:40px"><a
                                            href="#">Crée demande enseignant</a></div>
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
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Evolution des utilisateurs par année.'
        },
        tooltip: {
            headerFormat: '',
            pointFormat: '<span style="color: #003679">\u25CF</span> <b style="color: #003679">{point.name}</b><br/>' +
                'Total: <b style="color: #ffc107">{point.y}</b><br/>'
        },
        series: [{
            type: 'pie',
            allowPointSelect: true,
            keys: ['name', 'y', 'selected', 'sliced'],
            data: [
                @foreach($years as $year)
                {
                    name: "{{$year->year}}",
                    y: {{$users_year->where('year', $year->year)->first()->total ?? 0}},
                },
                @endforeach
            ],
            showInLegend: true
        }]
    });
</script>


@endsection