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
            <h4 class="font-weight-bold py-3 mb-0">Types de piece / Modifier</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Modifier un Types de piece</li>
                    <li class="breadcrumb-item active">Modifier un Types de piece</li>
                </ol>
            </div>

            <div class="card mb-4">
                <h6 class="card-header"><i class="feather icon-user"></i>Modifier un Types de piece </h6>

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
                    <form id="validation" action="{{ route('typepieces/edit') }}" method="POST">


                        {{ csrf_field() }}

                        <input type="hidden" class="form-control" id="id" name="id"
                        value="{{ $data->id }}">

        
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Types de piece</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="typepiece" name="typepiece" style="text-transform: uppercase;" required
                                    value="{{ $data->typepiece }}">
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right"></label>
                            <div class="col-sm-10 d-flex justify-content-between align-items-center">
                                <a href="{{ route('typepieces') }}" class="m-r-15  btn btn-secondary text-white ">Retour</a>

                                @if (auth()->user()->role_name == 'super_admin')
                                <button type="submit" id="update" name="update" class="btn btn-primary">Modifier</button>
                                    <!-- Bouton "Enregistrer" activé pour super_admin -->
                                @else
                                    <button type="submit" class="btn btn-primary" disabled>Enregistrer</button>
                                    <!-- Bouton "Enregistrer" désactivé pour les autres -->
                                @endif                            
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
    <script src="{{asset('assets/js/jquery.validate.js') }}"></script>

    <script>
        $('#validation').validate({
            reles: {
                code: {
                    required: true,
                },
                typepiece: {
                    required: true,
                }

            },
            messages: {
               
                typepiece: "Ce champs est obligatoire",

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
