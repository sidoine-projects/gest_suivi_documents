@extends('layouts.master')
<style>
    .error {
        color: red;
        border-color: red;
        font-weight: 900;
    }

</style>

@section('content')
    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Annee / Update</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Annee Update</li>
                    <li class="breadcrumb-item active">Annee Update</li>
                </ol>
            </div>

            <div class="card mb-4">
                <h6 class="card-header"><i class="feather icon-user"></i> Annee Update</h6>

                <div class="card-body">

                    <div class="form-group row">
                        <div class="col-sm-12">
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
                    <form id="" action="{{ route('annees/edit') }}" method="POST">


                        {{ csrf_field() }}
                        
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="code" name="code"
                                    value="{{ $datas->code }}">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Annee</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="annee" name="annee"
                                    value="{{ $datas->annee }}">
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-group col-md-1">
                            <label class="col-form-label  text-sm-right"></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ $datas->id }}" placeholder="Enter le taux" required>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right"></label>
                            <div class="col-sm-10">
                                <button type="submit" id="update" name="update" class="btn btn-primary">Modifier</button>
                                <a href="{{ url('annee/new') }}" class="m-r-15  btn btn-danger text-white ">Retour</a>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- [ content ] End -->

        </div>


        <!-- [ Layout footer ] Start -->
    
        <!-- [ Layout footer ] End -->
    </div>

    <!-- [ Layout content ] Start -->

@endsection
@section('script')
    {{-- hide message js --}}

    <script>
        $('#validation').validate({
            reles: {
                code: {
                    required: true,
                },
                annee: {
                    required: true,
                }

            },
            messages: {
                code: "saisissez un code*",
                annee: "saisissez une annee*",

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
