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
            <form id="paimentEnLigneForm" action="{{ route('demandes/save') }}"  method="POST" onclick="setFedaPayCheckout()">
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
                  <input type="text" class="form-control" id="montant" style="text-transform: uppercase;" name="montant" readonly placeholder="montant" required>
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
                  <button type="reset" class="btn btn-secondary">Annuler</button> <!-- Bouton "Annuler" à gauche -->
                  <button type="button" id="paiementEnLigneBtn" class="btn btn-primary ">Payer</button>

                </div>
              </div>

              <div id="reglement-bfu-en-ligne" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <div class="col-md-12">
                    <div class="form-group w-50 mx-auto">
                      <label for="montant_total" class="mb-0">Montant du BFU</label>
                      <div class="input-group input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            FCFA
                          </span>
                        </div>
                        <input type="number" step="0.01" min="100" class="form-control" name="montant_total" id="montant_total" value="" placeholder="Saisissez le montant ..." required>
                        <span class="input-group-append">
       
                          <form action="/save_bfu_regle" method="POST" id="paimentEnLigneForm" onclick="setFedaPayCheckout()">
                            @csrf
                            <input type="hidden" name="id" value="{{ $procedureEnAttentesDetails->id }}">
                            <input type="hidden" name="id2" value="{{ $procedureEnAttentesDetails->id_procedure_exportation }}">
                            <input type="hidden" name="fournisseur" value="FedaPay">
                            <input type="hidden" name="montant_total_fedapay" id="montant_total_fedapay" value="">
                            <button type="button" id="paiementEnLigneBtn" class="btn btn-success btn-flat">Payer</button>
                          </form>
                        </span>
                      </div>
                    </div>
                  </div>
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
  document.addEventListener('DOMContentLoaded', function() {
    var pieceSelect = document.getElementById('piece');
    var montantInput = document.getElementById('montant');

    pieceSelect.addEventListener('change', function() {
      var selectedPieceId = this.value; // Récupère l'ID de la pièce sélectionnée
      var pieces = <?php echo json_encode($pieces); ?>; // Récupère la liste des pièces depuis PHP
      var selectedPiece = pieces.find(function(piece) {

        return piece.id == selectedPieceId;
      });
      console.log('qqqqqqqqq' + selectedPieceId);
      if (selectedPiece) {
        montantInput.value = selectedPiece.montant; // Met à jour le champ de montant avec le montant de la pièce sélectionnée

      } else {
        montantInput.value = ''; // Si aucune pièce correspondante n'est trouvée, efface le champ de montant
      }
    });
  });
</script>



<!--FedaPay Checkout Plugin-->
<script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
<script>
  var paiementAmountInput = document.getElementById("montant_total");
  var paiementEnLigneBtn = document.getElementById("paiementEnLigneBtn");

  function setFedaPayCheckout() {
    var montant_total = paiementAmountInput.value;
    if (parseFloat(montant_total) >= 100) {
      $('#montant_total_fedapay').val(montant_total);
      getFedaPayCheckoutWidget(montant_total);
      paiementEnLigneBtn.click();
    } else {
      Toast.fire({
        icon: 'error',
        title: 'Veuillez saisir un montant supérieur à 100 FCFA svp !'
      })
    }
  }

  function getFedaPayCheckoutWidget(montant_total) {
    FedaPay.init('#paiementEnLigneBtn', {
      public_key: '{{$cleFedapay->string_value}}',
      transaction: {
        amount: montant_total,
        description: 'Reglement du BFU',
      },
      customer: {
        email: '{{ Auth::user()->email }}',
        lastname: '{{ Auth::user()->name }}',
        firstname: '{{ Auth::user()->firstname }}',
        phone_number: {
          number: '{{ Auth::user()->telephone }}',
          country: "BJ"
        }
      },
      currency: {
        iso: 'XOF'
      },
      submit_form_on_failed: 'false'
    });
  }
</script>

<!--FedaPay Checkout Plugin-->
<script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
<script>
    var paiementAmountInput = document.getElementById("montant_total");
    var paiementEnLigneBtn = document.getElementById("paiementEnLigneBtn");

        FedaPay.init('#paiementEnLigneBtn',{
            public_key: 'pk_sandbox_qlcE8YI6fkZdMmSJTyIxNRb-', // Clé public FedaPay
            transaction: {
                amount: 15000, // Recupération du montant
                description: 'Reglement du BFU',
            },
            customer: {
                email: 'alladeson91@gmail.com', // Email du client
                lastname: 'ALLADE', // Nom
                firstname: 'William', // Prénom
                phone_number: {
                    number: '66163701', // Téléphone
                    country: "BJ"
                }
            },
            currency: {
                iso: 'XOF'
            },
            submit_form_on_failed: 'false'
        });
</script>

@endsection