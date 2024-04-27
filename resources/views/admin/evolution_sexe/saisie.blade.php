@extends('layouts.master')

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
        <h4 class="font-weight-bold py-3 mb-0">Evolution de l'IPSH par Sexe</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Sexe</li>

            </ol>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="card mb-4">
                    <h6 class="card-header"><i class="feather icon-user"></i> Saisie Evolution de l'IPSH par  Sexe</h6>

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
                        <form id="validation" action="{{ route('evolution_sexe/save') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label   text-sm-right">Année</label>
                                    <div class="col-sm-10">

                                        <select class="form-control"  name="annee" id="annee" required>
                                            @foreach ($annees as $item)
                                            <option value="{{$item->id}}">{{$item->annee}}</option>
                                            @endforeach

                                        </select>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label  text-sm-right">Dimension</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="dimension" id="dimension" required>
                                            @foreach ($dimensions as $item)
                                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                                            @endforeach

                                        </select>

                                         <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label  text-sm-right">Sexe</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="sexe" id="sexe" required>
                                            @foreach ($sexes as $item)
                                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                                            @endforeach

                                        </select>

                                         <div class="clearfix"></div>
                                    </div>
                                </div>
                                



                                <div class="form-group col-md-3">
                                    <label class="col-form-label  text-sm-right">Taux</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="taux" name="taux" placeholder="Enter le taux" required>
                                        <div class="clearfix"></div>
                                    </div>
                                    @error('taux')
                                            <h6 style="font-size:12px" class="alert alert-danger alert-dismissible fade show" role="alert">
                                              Veuillez respecter le format du taux(0.000)
                                                <button style="font-size:12px"  type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </h6>
                                            @enderror
                                </div>

                            </div>


                           
                            <div class="form-group row  m-auto text-center">
                            
                                <div class="col-md-12 text-center">
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
                    <h6 class="card-header"><i class="feather icon-user"></i> Liste Evolution sexe  Infomation</h6>

                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                            <tr>
                              
                             
                                <th>Annee</th>
                                <th>Dimension</th>
                                <th>Sexe</th>
                                <th>Taux</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($evolutionSexe as $item)
                                    <tr>
                                        
                                        <td class="id"> {{ \App\Models\Annee::where(['id'=>$item->annee_id ])->first()->annee}}</td>
                                        <td class="id"> {{ \App\Models\Dimension::where(['id'=>$item->dimenesion_id ])->first()->libelle}}</td>
                                        <td class="id"> {{ \App\Models\Sexe::where(['id'=>$item->sexe_id ])->first()->libelle}}</td>
                                    
                                        <td class="id">{{ $item->taux }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('evolution_sexe/update/'.$item->id) }}" class="m-r-15 text-muted userUpdate">
                                                <i class="fa fa-edit" style="color: #2196f3;"></i>
                                            </a>
                                            <a href="{{ url('evolution_sexe/delete/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash" style="color: red;"></i></a>
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
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>

{{-- form validate --}}

<script>
    $('#validation').validate({
        reles:{
            annee:{
                required:true,
            },
            dimension:{
                required:true,
            },
            sexe:{
                required:true,
            },
            taux:{
                required:true,
            },
      
        },
        messages:{
            annee:"Please selectionner une annee*",
            dimension:"Please saisir une dimension*",
            sexe:"Please saississez sexe*",
            taux:"saissisez un taux*",

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
