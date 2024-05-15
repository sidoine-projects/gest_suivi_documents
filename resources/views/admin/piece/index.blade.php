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
                <li class="breadcrumb-item">Pieces</li>

            </ol>
        </div>

        <div class="row">

            <div class="col-md-10">
                <div class="card mb-4">
                    <h6 class="card-header"><i class="feather icon-user"></i> Liste des Pieces </h6>

                    <div class="card-body">

                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Pieces</th>
                                <th>Type de pièce</th>
                                <th>Montant</th>
                                <th class="text-right">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($piece as $item)
                                <tr>
                                    <td class="id" style="text-transform: uppercase;">{{ $item->piece }}</td>
                                    <td class="id" style="text-transform: uppercase;">{{ $item->typePiece->typepiece }}</td>
                                    <td class="id" style="text-transform: uppercase;">{{ $item->montant }}</td>
    

                                    <td class="text-right">
                                        <a href="{{ url('admin/piece/update/'.$item->id) }}" class="m-r-15 text-muted userUpdate">
                                            <i class="fa fa-edit" style="color: #2196f3;"></i>
                                        </a>
                                        <a href="{{ url('admin/piece/delete/'.$item->id) }}" onclick="return confirm('Etes vous sûr de vouloir supprimer ceci ?')"><i class="fa fa-trash" style="color: red;"></i></a>
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
    <script src="{{asset('assets/js/jquery.validate.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
    {{-- form validate --}}

   

    {{-- hide message js --}}
    <script>

        $('#hide-message').show();
        setTimeout(function()
        {
            $('#hide-message').hide();
        },5000);

    </script>
@endsection
