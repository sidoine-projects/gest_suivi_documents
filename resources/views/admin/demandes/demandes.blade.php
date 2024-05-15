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
        <h4 class="font-weight-bold py-3 mb-0">Ajouter une demande</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin/home')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Demande </li>

            </ol>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card mb-4">
                    <h6 class="card-header"><i class="feather icon-user"></i>Demande Information</h6>

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
                        <form id="demande" action="{{ route('demandes/save') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="field" value="test">

                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 text-sm-right">Numéro</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="profil" value="{{ $code }}" readonly style="text-transform: uppercase;" name="numero" placeholder="numero" required>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 text-sm-right">Pieces</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="piece_id" id="piece" required>
                                        <option value="">Selectionnez une piece</option>
                                        @foreach($pieces as $piece)
                                        <option value="{{ $piece->id }}">{{ $piece->piece }}</option>
                                        @endforeach
                                    </select>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 text-sm-right">Montant</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  id="montant" style="text-transform: uppercase;" name="montant" placeholder="montant" required>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 text-sm-right">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows=6 id="profil" style="text-transform: uppercase;" name="description" placeholder="Description" required></textarea>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 text-sm-right"></label>
                                <div class="col-sm-10 d-flex justify-content-between align-items-center"> <!-- Utilisation de Flexbox -->
                                    <button type="reset" class="btn btn-danger">Annuler</button> <!-- Bouton "Annuler" à gauche -->
                                    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7" data-public-key="pk_sandbox_cdiapMSeRJxMt6rwvjP7t2Ns" data-button-text="Envoyer" data-button-class="button-class  btn btn-primary" data-transaction-amount="" data-customer-email="" data-customer-firstname="" data-customer-lastname="" data-customer-phone_number-number="" data-transaction-description="Description de la transaction" data-currency-iso="XOF">
                                    </script>
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

    document.getElementById('piece').addEventListener('change', function() {
    var pieceId = this.value; // Récupérer l'ID de la pièce sélectionnée
    // Envoyer une requête Ajax pour récupérer le montant associé à la pièce
    // Assurez-vous d'ajuster l'URL de la requête en fonction de votre route et de votre contrôleur
    $.ajax({
        url: '/getMontant', // URL de votre route pour récupérer le montant
        type: 'GET',
        data: { piece_id: pieceId },
        success: function(response) {
            // Mettre à jour le champ de montant avec le montant récupéré
            document.getElementById('montant').value = response.montant;
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
});

</script>
@endsection