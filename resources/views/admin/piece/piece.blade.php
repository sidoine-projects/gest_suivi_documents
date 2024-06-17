@extends('admin/layouts.master')


@section('content')
<style>
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
        <h4 class="font-weight-bold py-3 mb-0">Ajouter une Piece</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin/home')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"> Piece </li>

            </ol>
        </div>

        <div class="row">

            <div class="col-md-8">
                <div class="card mb-4">
                    <h6 class="card-header"><i class="feather icon-user"></i>Piece Information</h6>

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
                        <form id="validation" action="{{ route('piece/save') }}" method="POST" >
                            {{ csrf_field() }}
                        
                                <div class="form-group row ">
                                    <label class="col-form-label col-sm-2 text-sm-right">Types piece</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="typepiece_id" id="typepiece_id" required>
                                            <option value="">Selectionnez une piece</option>
                                            @foreach($typesPieces as $typesPiece)
                                            <option value="{{ $typesPiece->id }}">{{ $typesPiece->typepiece }}</option>
                                            @endforeach
                                        </select>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Pieces</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="profil" style="text-transform: uppercase;" name="piece" placeholder="piece" required>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Montant</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="profil" style="text-transform: uppercase;" name="montant" placeholder="montant" required>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 text-sm-right"></label>
                                <div class="col-sm-10 d-flex justify-content-between align-items-center"> <!-- Utilisation de Flexbox -->
                                    <button type="reset" class="btn btn-secondary">Annuler</button> <!-- Bouton "Annuler" à gauche -->
                                    <button type="submit" class="btn btn-primary">Enregistrer</button> <!-- Bouton "Enregistrer" à droite -->
                                </div>
                            </div>
                        </form>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
<script src="{{asset('assets/js/jquery.validate.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
{{-- form validate --}}



{{-- hide message js --}}
<script>
    $('#hide-message').show();
    setTimeout(function() {
        $('#hide-message').hide();
    }, 5000);
</script>
@endsection