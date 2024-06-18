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
            <h4 class="font-weight-bold py-3 mb-0">Liste des demandes</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Demandes</li>

                </ol>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste des Demandes </h6>
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
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Date demande</th>
                                        <th style="display: none;">id</th>
                                        <th>N° Demande</th>
                                        <th>Nom & Prénom</th>
                                        <th>Pièce</th>
                                        <th>Description</th>
                                        <th>Statut</th>
                                        <th class="text-center">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demandes as $item)
                                        <tr>
                                            <td style="text-transform: uppercase;">
                                                {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                            <td class="demande-id" style="display: none;">{{ $item->id }}</td>
                                            <td style="text-transform: uppercase;">{{ $item->numero }}</td>
                                            <td style="text-transform: uppercase;">{{ $item->user->name }}
                                                {{ $item->user->prename }}</td>
                                            <td style="text-transform: uppercase;">{{ $item->piece->piece }}</td>

                                            <td>{{ $item->description }}
                                            </td>
                                            <td style="text-transform: uppercase;">
                                                @if ($item->statut == 1)
                                                    <span class="badge badge-rounded bg-warning">En cours</span>
                                                @elseif($item->statut == 2)
                                                    <span class="badge badge-rounded bg-success">Approuvée</span>
                                                @elseif($item->statut == 3)
                                                    <span class="badge badge-rounded bg-danger">Rejeté</span>
                                                @else
                                                    <span class="badge badge-rounded bg-secondary">Inconnu</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (isset($item->suiviDemande))
                                                    <a class="mr-2 disabled" href="#" style="cursor: not-allowed;">
                                                        <i class="fa fa-plus" style="font-size: 20px; color: #ddd;"></i>
                                                    </a>
                                                    <a type="" class="mr-2" data-toggle="modal"
                                                        data-target="#modalDelete" data-id="{{ $item->suiviDemande->id }}">
                                                        <i class="fa fa-trash"
                                                            style="font-size: 16px; color: #dc2336; cursor: pointer;"></i>
                                                    </a>
                                                    @if (!empty($item->suiviDemande->file))
                                                        <a href="{{ url('storage/documents/' . $item->suiviDemande->file) }}"
                                                            target="_blank" class="m-r-15 text-muted userUpdate"
                                                            style="font-size: 20px; cursor: pointer;">
                                                            <i class="fa fa-eye" style="color: #16a886;"></i>
                                                        </a>
                                                    @else
                                                        <i class="fa fa-eye-slash"
                                                            style="font-size: 20px; color: #2196f3;"></i>
                                                    @endif
                                                @else
                                                    <a type="" class="mr-2" data-toggle="modal"
                                                        data-target="#exampleModal">
                                                        <i class="fa fa-plus"
                                                            style="font-size: 20px; color: #14609f; cursor: pointer;"></i>
                                                    </a>
                                                    <a class="mr-2 disabled" href="#" style="cursor: not-allowed;">
                                                        <i class="fa fa-trash" style="font-size: 16px; color: #ddd;"></i>
                                                    </a>
                                                    <i class="fa fa-eye-slash" style="font-size: 20px; color: #2196f3;"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter/Modifier un fichier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="demandeForm" action="{{ route('suivi/demande') }}" method="POST" class="col-sm-12"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="demande_id" id="demande_id" value="" required>
                                <!-- Champ caché pour le montant -->
                                <div class="form-group ">
                                    <label class="col-form-label  text-sm-right">Statut</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="statut" id="statut" required>
                                            <option value="" disabled selected>Selectionnez un statut</option>
                                            <option value="1">En cours</option>
                                            <option value="2">Approuvée</option>
                                            <option value="3">Réjetée</option>

                                        </select>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group" id="file-group" style="display: none;">
                                    <label class="col-form-label  text-sm-right">Selectonnez un fichier (PDF
                                        uniquement)</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" id="file" name="file"
                                            accept="application/pdf" placeholder="fichier">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="modal-footer row">
                                    <div class="form-group   col-sm-12 col-md-12  mx-auto text-center">
                                        <label class="col-form-label"></label>
                                        <button type="submit"
                                            class="btn btn-primary mx-auto text-center">Enregistrer</button>
                                        <!-- Bouton "Enregistrer" à droite -->
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Supprimer le suivi de la demande</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <p>Voulez-vous vraiment supprimer ce suivi de demande ?</p>
                            <form id="deleteForm" method="GET">
                                @csrf
                                <div class="modal-footer row">
                                    <div class="form-group col-sm-12 col-md-12 mx-auto text-center">
                                        <label class="col-form-label"></label>
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
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
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
    {{-- form validate --}}
    <script>
        $('#modalDelete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Bouton qui a déclenché le modal
            var suiviDemandeId = button.data('id'); // Récupère l'ID du suivi de demande

            var modal = $(this);
            var form = modal.find('form');
            form.attr('action', '/suivi/demande/delete/' + suiviDemandeId);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#statut').on('change', function() {
                if ($(this).val() == '2') {
                    $('#file-group').show();
                    $('#file').attr('required', true); // Rendre le champ requis si le statut est 2
                } else {
                    $('#file-group').hide();
                    $('#file').removeAttr(
                        'required'); // Enlever la contrainte de champ requis si le statut n'est pas 2
                }
            });

            // Préremplir le champ demande_id quand on clique sur le bouton d'ajout
            $(document).on('click', '.fa-plus', function() {
                var demandeId = $(this).closest('tr').find('.demande-id').first().text().trim();
                $('#demande_id').val(demandeId);
            });
        });
    </script>

    {{-- hide message js --}}
    <script>
        $('#hide-message').show();
        setTimeout(function() {
            $('#hide-message').hide();
        }, 5000);
    </script>
@endsection
@section('style')
    <style>
        .badge-rounded {
            border-radius: 1rem;
            padding: 0.25em 0.75em;
            font-size: 0.875em;
        }

        .bg-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .bg-success {
            background-color: #28a745;
            color: #fff;
        }

        .bg-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .bg-secondary {
            background-color: #6c757d;
            color: #fff;
        }
    </style>
@endsection
