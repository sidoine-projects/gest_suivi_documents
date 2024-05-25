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

                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-12">
                                <div class="card mb-4 bg-pattern-2-dark">
                                    <div class="card-body text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="lnr lnr-user display-4 text-primary"></div>
                                            <div class="ml-3">
                                                <div class="large">
                                                    <h6>Total utilisateurs <br> <br> </h6>
                                                </div>
                                                <div class="text-large">{{ $totalUser }}</div>
                                            </div>
                                        </div>

                                        <div class="mt-3"><a href="{{ route('admin/register') }}">Créer un utilisateur</a></div>
                                    </div>
                                </div>
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