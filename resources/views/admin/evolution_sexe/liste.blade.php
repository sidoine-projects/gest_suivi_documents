@extends('layouts.master')
{{-- @section('menu') --}}

@section('content')
    <style>
        .table thead,
        .table th {
            text-align: center;
        }

        .error {
            color: red;
            border-color: red;
            font-weight: 900;
        }

    </style>
    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Evolution de l'IPSH par Sexe</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Sexe</li>

                </ol>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste Evolution de l'IPSH par Sexe</h6>
                        <div class="row">
                            <a class=" mx-4 col-sm-1 btn btn-primary" href="{{ route('evolution_sexe/downloadPDF') }}"><i
                                    class="fas fa-arrow-circle-down"></i>&nbsp; PDF</a>

                            <a class="  col-sm-1 btn btn-success" href="{{ route('evolution_sexe/downloadExcel') }}"><i
                                    class="fas fa-arrow-circle-down"></i>&nbsp; Excel</a>
                        </div>

                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    @if (\Session::has('insert'))
                                        <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('insert') !!}
                                        </div>
                                    @endif

                                    @if (\Session::has('error'))
                                        <div id="hide-message" class="alert alert-danger alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('error') !!}
                                        </div>

                                    @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <form class="my-1 " id="validation"
                                action="{{ route('evolution_sexe/update_table') }}" method="POST">

                                {{ csrf_field() }}

                                <div class="container">
                                    <div class="row">

                                    


                                        <div class="form-group  col-md-4 ">
                                            <label class="col-form-label   text-sm-right">Année 1</label>

                                            <div class="">

                                                <select class="form-control" name="annee_sexe_1"
                                                    id="annee_sexe_1"  placeholder="Enter Full Name" required>
                                                    <option value="">Veuillez choisir une année</option>
                                                    @foreach ($annees as $item)
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
                                                    @foreach ($annees as $item)
                                                        <option value="{{ $item->id }}">{{ $item->annee }}</option>
                                                    @endforeach

                                                </select>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class="form-group col-md-3 m-auto">
                                            {{-- <input type="submit" class="btn" value="submit" name= "submit" > --}}
                                            <button type="submit" name="submit" value="submit"
                                                class="btn btn-primary">Valider</button>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>


                                </div>


                            </form>


                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr style="background-color: #dee0e3 !important">
                                        <th>Sexe</th>
                                        @foreach ($listDim as $dim)

                                            <th colspan="2">{{ $dim->libelle }}</th>
                                        @endforeach

                                    </tr>

                                    <tr>

                                        <td></td>

                                        @foreach ($listDim as $dim)

                                            <th>{{ $annee1 }}</th>
                                            <th>{{ $annee2 }}</th>
                                        @endforeach

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($listSexe as $sexe)
                                        <tr>
                                            <td>{{ $sexe->libelle }}</td>

                                            @foreach ($listDim as $dim)

                                                <?php
                                                $valeur_annee1 = '';
                                                $valeur_annee2 = '';
                                                ?>

                                                @foreach ($evolution as $item)

                                                    @if ($item->sexe == $sexe->libelle and $item->dimension == $dim->libelle and $item->annee == $annee1)
                                                        <?php $valeur_annee1 = $item->taux; ?>
                                                    @else


                                                    @endif

                                                    @if ($item->sexe == $sexe->libelle and $item->dimension == $dim->libelle and $item->annee == $annee2)
                                                        <?php $valeur_annee2 = $item->taux; ?>
                                                    @else


                                                    @endif

                                                @endforeach

                                                <td>{{ $valeur_annee1 }}</td>
                                                <td>{{ $valeur_annee2 }}</td>

                                            @endforeach

                                        </tr>
                                    @endforeach



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
@endsection
