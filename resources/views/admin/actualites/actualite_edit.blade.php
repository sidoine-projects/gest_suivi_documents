@extends('admin/layouts.master')


@section('content')
    @livewireStyles
    
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
            <h4 class="font-weight-bold py-3 mb-0">Actualité</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/home') }}"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Actualité</li>

                </ol>
            </div>

            <div class="row ">

                <div class="col-md-12">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Actualité Information</h6>

                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    @if (\Session::has('insert'))
                                        <div id="hide-message" class="alert alert-success alert-dismissible fade show text-center">
                                            
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('insert') !!}
                                            &nbsp; <a href="#" class="btn-close" data-dismiss="alert"
                                            aria-label="close">&times;</a>
                                        </div>
                                    @endif

                                    @if (\Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('error') !!}
                                            <a href="#" class="btn-close" data-dismiss="alert"
                                            aria-label="close">&times;</a>
                                        </div>
                                    @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    {{-- @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                    @endif --}}

                                    @if ($errors->has('image'))
                                        <div class="alert alert-danger alert-dismissible fade show text-center"
                                            role="alert">
                                            <strong>Oups!</strong> {{ $errors->first('image') }}

                                            &nbsp; <a href="#" class="btn-close" data-dismiss="alert"
                                                aria-label="close">&times;</a>

                                        </div>
                                    @endif

                                    {{-- {{ $errors->first('image') }} --}}
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <form id="validation" action="{{ route('actualite/edit') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @livewire("actualites-arrondissements-quartier-select")
                                

                                <input type="hidden" class="form-control" id="id" name="id"
                                value="{{session('actualitedata')->id}}">

                                <div class="row">

                                    {{-- <p wire:loading >Chargement de données ...</p> --}}
                                    <fieldset class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label  text-sm-right">Description</label>
                                            <div class="">
                                                <textarea type="text" required class="form-control " style="resize:none;" name="description" wrap="hard"
                                                    id="description" placeholder="description * "
                                                    rows="15">{{session('actualitedata')->description}}</textarea>

                                                <div class="clearfix"></div>
                                            </div>
                                        </div>

                                    </fieldset>

                                </div>


                                <div class="form-group row  m-auto text-center">

                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                        <a href="{{ route('admin/actualites') }}" class="m-r-15  btn btn-danger text-white ">Retour</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                <div class="card mb-4">
                    <h6 class="card-header"><i class="feather icon-user"></i> Liste thématique</h6>

                    <div class="card-body">

                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Actualité</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($actualites as $item)
                                <tr>
                                    <td class="id">{{ $item->code }}</td>
                                    <td class="id">{{ $item->actualite }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/actualite/update/'.$item->id) }}" class="m-r-15 text-muted userUpdate">
                                            <i class="fa fa-edit" style="color: #2196f3;"></i>
                                        </a>
                                        <a href="{{ url('admin/actualite/delete/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash" style="color: red;"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> --}}


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
        $('#validation').validate({
            rules: {
                arrondissement_id: {
                    required: true,
                },
                quartier_id: {
                    required: true,
                },
                thematique_id: {
                    required: true,
                },
                titre: {
                    required: true,
                },
                description: {
                    required: true,
                },
                alaune: {
                    required: true,
                },
                image: {
                    required: true,
                },

            },
            messages: {
                arrondissement_id: "Ce champs est obligatoire*",
                quartier_id: "Ce champs est obligatoire*",
                thematique_id: "Ce champs est obligatoire*",
                titre: "Ce champs est obligatoire*",
                description: "Ce champs est obligatoire*",
                alaune: "Ce champs est obligatoire*",
                image: "Ce champs est obligatoire*",
            }
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
