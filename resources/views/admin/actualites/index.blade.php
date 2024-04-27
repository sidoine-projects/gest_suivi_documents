@extends('admin/layouts.master')
@section('style')
<style>
    table.dataTable tbody td {
  word-break: break-word; word-break: break-all; white-space: normal; word-wrap: break-word;
}


 th,td{
    /* width:6em; */
}

table.display {
  margin: 0 auto !important;
  width: 100% !important;
  clear: both !important;
  border-collapse: collapse !important;
  table-layout: fixed !important;        
  word-wrap:break-word !important;     
}
</style>
@endsection
@section('content')



    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Actualite </h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Actualite</li>

                </ol>
            </div>


            <div class="row">

                <div class="col-md-12">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste Actualite Information</h6>

                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered wrap " style="width:100%; ">
                                <thead>
                                    <tr  style="background-color: #dbdbdf !important; color:rgb(0, 0, 0) !important">
                                        <th style="width: 12% !important">Arrondissement</th>
                                        <th style="width: 12% !important">Quartier</th>
                                        <th style="width: 14% !important">Thématique</th>
                                        <th style="width: 20% !important">Titre de l'article</th>
                                        <th style="width: 40% !important">Description de l'article</th> 
                                        <th style="width: 1% !important;">A la une</th> 
                                        {{-- <th>Informer le Signaleur</th> --}}
                                        {{-- <th>Geolocaliser la Actualite</th> --}}
                                        <th style="width: 1% !important" class="text-center">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actualites as $item)
                                    <tr>
                                        {{-- <td class="id">{{ \App\Models\User::where(['id'=>$item->user_id ])->first()->name}} {{ \App\Models\User::where(['id'=>$item->user_id ])->first()->prename}}</td> --}}
                                        <td >{{$item->arrondissement}}</td>
                                        <td >{{$item->quartier}}</td>
                                        <td >{{ \App\Models\Thematique::where(['id'=>$item->thematique_id ])->first()->thematique}}</td>
                                        <td >{{$item->titre}}</td>
                                        <td >{{substr($item->description, 0, 150)}}...</td>
                                        <td style="text-align: center">{{$item->alaune}}</td>


                                        {{-- <td class="id">{{$item->description}}</td> --}}

                                        <td class="text-center">
                                            @if($item->image)
                                            <a href="{{asset('assets/actualites-images/'.$item->image)}}"  target="_blank"><i class="fa fa-camera-retro" aria-hidden="true"></i></a>
                                                  @else
                                                  <a href="" style="font-size: 20px" onclick="return confirm('Aucune image retrouvé pour cette atualité')"
                                                  ><i class="fa fa-camera-retro" aria-hidden="true"></i></a>
  
                                            @endif
                                            <a href="{{ url('admin/actualite/update/'.$item->id) }}" class="m-r-15 text-muted userUpdate">
                                                <i class="fa fa-edit" style="color: #2196f3;"></i>
                                            </a>
                                            <a href="{{ url('admin/actualite/delete/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash" style="color: red;"></i></a>
                                        </td>                                        {{-- <td class="id">aaaaaaaaaaaaaaddddddddddddddddddddddddddddddddddddddddddd</td> --}}
                                        
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
   
@endsection
