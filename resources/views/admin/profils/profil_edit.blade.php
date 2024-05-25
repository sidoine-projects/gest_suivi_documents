@extends('admin.layouts.master')
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
            <h4 class="font-weight-bold py-3 mb-0">Profil / Modifier</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Modifier un Profil</li>
                    <li class="breadcrumb-item active">Modifier un Profil</li>
                </ol>
            </div>

            <div class="card mb-4">
                <h6 class="card-header"><i class="feather icon-user"></i>Modifier un Profil </h6>

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
                    <form id="" action="{{ route('profils/edit') }}" method="POST">


                        {{ csrf_field() }}

                        <input type="hidden" class="form-control" id="id" name="id"
                        value="{{ $data->id }}">

        
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Profil</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="profil" name="profil" style="text-transform: uppercase;"
                                    value="{{ $data->profil }}">
                                <div class="clearfix"></div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right"></label>
                            <div class="col-sm-10">
                                <button type="submit" id="update" name="update" class="btn btn-warning">Modifier</button>
                                <a href="{{ route('profils') }}" class="m-r-15  btn btn-primary text-white ">Retour</a>

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
                profil: {
                    required: true,
                }

            },
            messages: {
               
                profil: "saisissez un profil*",

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
