@extends('layouts.master')
{{-- @section('menu') --}}

@section('content')
    <style>
        .table thead,
        .table th {
            text-align: center;
        }

    </style>
    <!-- [ Layout content ] Start -->



    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Evolution de l'IPSH par année</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Annee</li>

                </ol>
            </div>

            <div class="row">

                <div class="col-md-12">


                    <div id="bass"></div>

                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste Evolution de l'IPSH par année
                        </h6>

                        <div class="row">
                            <a class=" mx-4 col-sm-1 btn btn-primary" href="{{ route('evolution_annee/downloadPDF') }}"><i
                                    class="fas fa-arrow-circle-down"></i>&nbsp; PDF</a>

                            <a class="  col-sm-1 btn btn-success" href="{{ route('evolution_annee/downloadExcel') }}"><i
                                    class="fas fa-arrow-circle-down"></i>&nbsp; Excel</a>
                        </div>
                        <div class="card-body">

                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr style="background-color: #dee0e3 !important">
                                        <th>Annee</th>
                                        @foreach ($listDim as $dim)

                                            <th>{{ $dim->libelle }}</th>
                                        @endforeach

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listAnnee as $annee)


                                        <tr>
                                            <td>{{ $annee->annee }}</td>


                                            @foreach ($listDim as $dim)

                                                <?php
                                                $a = '';
                                                ?>

                                                @foreach ($evolution as $item)
                                                    @if ($item->libelle == $dim->libelle and $item->annee == $annee->annee)
                                                        {{-- <td>{{ $a $item->taux }}</td> --}}

                                                        {{-- $a =$item->taux --}}
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


                                    {{-- @foreach ($evolution as $item) --}}

                                    {{-- <tr> --}}
                                    {{-- <td class="id">{{ $item->annee }}</td> --}}

                                    {{-- @foreach ($listDim as $dim) --}}

                                    {{-- @if ($item->libelle == $dim->libelle) --}}
                                    {{-- <td>{{ $item->taux }}</td> --}}

                                    {{-- @else --}}
                                    {{-- <td>{{ "" }}</td> --}}
                                    {{-- @endif --}}

                                    {{-- @endforeach --}}

                                    {{-- </tr> --}}
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>



            </div>


            <!-- [ content ] End -->
        </div>


    </div>

    <!-- [ Layout content ] Start -->

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


    <script>
        Highcharts.chart('bass', {
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Data extracted from a HTML table in the page'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Units'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    </script>
@endsection
