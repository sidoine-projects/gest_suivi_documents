@extends('admin/layouts.master')

@section('content')
    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
                <h4 class="font-weight-bold ">Resolue : </h4> &nbsp;

              
                <form action="{{ route('admin/updaterp') }}" method="POST">
                    {{ csrf_field() }}


                    <input type="hidden" name="id" value="{{ $data->id }}">

                    <input  onclick="return confirm('Vous avez résolue le signalement')" type="submit" name="rpo" class="form-group btn btn-outline-primary btn-sm" value="OUI">

                    <input onclick="return confirm('Ce signalement ne sera pas résolue ')" type="submit" name="rpn" class=" form-group btn btn-outline-danger btn-sm" value="non">


                </form>
            </div>
            <h4>
                @if ($data->resolue == 1)
                    <span style="color:green"><i class="fa fa-check-square" style="color:green" aria-hidden="true"></i>
                        Signalement déjà résolu</span>
                @endif
            </h4>

            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/home') }}"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Catégorie :
                        {{ \App\Models\Categorie::where(['id' => $data->categorie_id])->first()->categorie }} | Quartier :
                        {{ $data->arrondissement }} | Quartier : {{ $data->quartier }} | Date :
                        {{ $data->created_at->format('d/m/Y à H:i:s') }}</li>

                </ol>
            </div>


            <div class="row">

                <div class="col-md-12 ">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste Signalisation Infomation</h6>

                        <div class="card-body">

                            <p> {{ $data->commentaire }}</p>
                        </div>
                    </div>
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
@endsection
