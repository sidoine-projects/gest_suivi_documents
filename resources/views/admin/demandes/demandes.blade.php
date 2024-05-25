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
            <?php $initialMontant = isset($initialMontant) ? $initialMontant : ""; ?>

            <form id="demande" action="{{ route('demandes/save') }}" method="POST">
              {{ csrf_field() }}

              <input type="hidden" id="hiddenMontant" name="initialMontant" value="<?php echo $initialMontant; ?>"> <!-- Champ caché pour le montant -->


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
                    <option value="" disabled selected>Selectionnez une piece</option>
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
                  <input type="text" class="form-control" id="montant_total" style="text-transform: uppercase;" name="montant" value="" readonly placeholder="montant" required>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows=6 id="profil" style="text-transform: uppercase;" name="description" placeholder="Description" ></textarea>
                  <div class="clearfix"></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right"></label>
                <div class="col-sm-10 d-flex justify-content-between align-items-center"> <!-- Utilisation de Flexbox -->
                  <button type="reset" class="btn btn-secondary">Annuler</button> <!-- Bouton "Annuler" à gauche -->
                  <button type="button" id="paiementEnLigneBtn" class=" button-class btn btn-primary btn-flat">Envoyer</button>
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



<script>
  var pieceSelect = document.getElementById('piece');
  var montantInput = document.getElementById('montant_total');
 
  pieceSelect.addEventListener('change', function() {
    var selectedPieceId = this.value; // Récupère l'ID de la pièce sélectionnée
    var pieces = <?php echo json_encode($pieces); ?>; // Récupère la liste des pièces depuis PHP
    var selectedPiece = pieces.find(function(piece) {

      return piece.id == selectedPieceId;
    });

    if (selectedPiece) {
      montantInput.value = selectedPiece.montant; // Met à jour le champ de montant avec le montant de la pièce sélectionnée
      console.log('qqqqqqqqq' + montantInput.value);
      var paiementEnLigneBtn = document.getElementById("paiementEnLigneBtn");

      FedaPay.init('#paiementEnLigneBtn', {
        public_key: 'pk_sandbox_cdiapMSeRJxMt6rwvjP7t2Ns',
        transaction: {
          amount: montantInput.value,
          description: 'Reglement du BFU',
        },
        customer: {
          email: '{{ Auth::user()->email }}',
          lastname: '{{ Auth::user()->name }}',
          firstname: '{{ Auth::user()->prename }}',
          phone_number: {
            number: '{{ Auth::user()->tel }}',
            country: "BJ"
          }
        },
        currency: {
          iso: 'XOF'
        },
        submit_form_on_failed: 'false'
      });
    }
  });
</script>

<script>
        $('#validation').validate({
            reles: {
              piece: {
                    required: true,
                },
                montant_total: {
                    required: true,
                },
                
                
            },
            messages: {
              piece: "Ce champs est obligatoire*",
              montant_total: "Ce champs est obligatoire*",

            }
        });
    </script>





{{-- hide message js --}}

@endsection