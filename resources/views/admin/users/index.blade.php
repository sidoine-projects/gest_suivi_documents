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
            <h4 class="font-weight-bold py-3 mb-0">Liste des utilisateurs</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Liste des utilisateurs</li>

                </ol>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste des utilisateurs</h6>
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
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Profil</th>
                                        <th>Email</th>
                                        <th>Tel</th>
                                        <th class="text-center">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->prename }}</td>
                                            <td style="text-transform: uppercase" >{{ $item->role_name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->tel }}</td>
                                            <td class="text-center">
                                                @if (auth()->user()->role_name == 'super_admin' || auth()->user()->role_name === 'admin')
                                                    <a href="{{ url('admin/user/update/' . $item->id) }}"
                                                        class="m-r-15 text-muted userUpdate">
                                                        <i class="fa fa-edit" style="color: #2196f3;"></i>
                                                    </a>
                                                    <a href="{{ url('admin/user/delete/' . $item->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete it?')">
                                                        <i class="fa fa-trash" style="color: red;"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="m-r-15 text-muted userUpdate disabled"
                                                        aria-disabled="true" tabindex="-1" style="pointer-events: none;">
                                                        <i class="fa fa-edit" style="color: #2196f3;"></i>
                                                    </a>
                                                    <a href="#" class="disabled" aria-disabled="true" tabindex="-1"
                                                        style="pointer-events: none;">
                                                        <i class="fa fa-trash" style="color: red;"></i>
                                                    </a>
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

        <!-- [ Layout footer ] Start -->

        <!-- [ Layout footer ] End -->
    </div>

    <!-- [ Layout content ] Start -->
@endsection
@section('script')
    <!-- library js validate -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
    {{-- form validate --}}


    <script>
        $('#validation').validate({
            reles: {
                code: {
                    required: true,
                },
                libelle: {
                    required: true,
                }

            },
            messages: {
                code: "saisissez un code*",
                libelle: "saisissez un libelle*",

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
