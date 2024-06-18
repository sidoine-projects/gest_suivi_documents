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

                <div class="col-md-10">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste des Demandes </h6>

                        <div class="card-body">

                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>N° Demande</th>
                                        <th>Pièce</th>
                                        <th>Description</th>
                                        <th>Statut</th>
                                        <th class="text-center">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demandes as $item)
                                        <tr>
                                            <td class="id" style="text-transform: uppercase;">{{ $item->numero }}</td>
                                            <td class="id" style="text-transform: uppercase;">{{ $item->piece->piece }}
                                            </td>
                                            <td class="id" >{{ $item->description }}
                                            </td>
                                            <td class="id" style="text-transform: uppercase;">
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
                                                    @if (!empty($item->suiviDemande->file))
                                                        <a href="{{ url('storage/documents/' . $item->suiviDemande->file) }}"
                                                            target="_blank" class="m-r-15 text-muted userUpdate"
                                                            style="font-size: 20px">
                                                            <i class="fa fa-eye" style="color: #16a886;"></i>
                                                        </a>
                                                    @else
                                                        <i class="fa fa-eye-slash"
                                                            style="font-size: 20px; color: #2196f3;"></i>
                                                    @endif
                                                @else
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
