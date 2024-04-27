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
        <h4 class="font-weight-bold py-3 mb-0">Catégorie</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin/home')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Catégorie</li>

            </ol>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="card mb-4">
                    <h6 class="card-header"><i class="feather icon-user"></i> Catégorie Information</h6>

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
                        <form id="validation" action="{{ route('categories/save') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 text-sm-right">Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="code" name="code" value="" placeholder="Enter un code" required>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 text-sm-right">Catégorie</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Enter une Categorie" required>
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 text-sm-right"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    <button type="reset" class="btn btn-danger">Annuler</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <h6 class="card-header"><i class="feather icon-user"></i> Liste Categorie</h6>

                    <div class="card-body">

                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Catégorie</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td class="id">{{ $item->code }}</td>
                                    <td class="id">{{ $item->categorie }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/categorie/update/'.$item->id) }}" class="m-r-15 text-muted userUpdate">
                                            <i class="fa fa-edit" style="color: #2196f3;"></i>
                                        </a>
                                        <a href="{{ url('admin/categorie/delete/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash" style="color: red;"></i></a>
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

    <script>
        $('#validation').validate({
            reles:{
                code:{
                    required:true,
                },
                categorie:{
                    required:true,
                }
            
            },
            messages:{
                code:"saisissez un code*",
                categorie:"saisissez une Categorie*",
               
            }
        });
    </script>

    {{-- hide message js --}}
    <script>

        $('#hide-message').show();
        setTimeout(function()
        {
            $('#hide-message').hide();
        },5000);

    </script>
@endsection
