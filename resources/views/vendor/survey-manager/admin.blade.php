@extends('admin/layouts.master')


@section('content')


<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
<link rel="stylesheet" href="{{ asset('vendor/survey-manager/css/survey.css') }}" />
        <!-- survey-JS -->
<!-- [ Layout content ] Start -->
<div class="layout-content">
    <!-- [ content ] Start -->
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Sondage  </h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin/home')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Sondage</li>

            </ol>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card mb-4">
                    <h6 class="card-header"><i class="feather icon-user"></i> Sondage Infomation</h6>

                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-sm-12">
                                @if(\Session::has('insert'))
                                <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                    <i class="feather icon-check-circle" style="font-size:1em"></i>
                                    {!! \Session::get('insert') !!}
                                </div>
                                @endif

                                    @if(\Session::has('error'))
                                        <div id="hide-message" class="alert alert-danger alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('error') !!}
                                        </div>
                                    @endif
                                <div class="clearfix"></div>
                            </div>
                        </div>




                        <div id="survey-manager" >
                        </div>
                        
                        <script>
                            window.SurveyConfig = {!! json_encode(config('survey-manager')) !!};
                        </script>
                        
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
<script src="{{ asset('vendor/survey-manager/js/survey-manager.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
{{-- form validate --}}


@endsection
