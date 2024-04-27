@extends('admin/layouts.master')
@section('style')
  
@endsection
@section('content')


    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Signalement </h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Signalement</li>

                </ol>
            </div>


            <div class="row">

                <div class="col-md-12">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste des Signalements </h6>

                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr  style="background-color: #00c5cd !important; color:white !important">
                                        <th>Signaleur</th>
                                        <th>Téléphone</th>
                                        <th>Categorie</th>
                                        <th>Quartier</th>
                                        <th>Date</th> 
                                        <th>Résolue</th> 
                                        {{-- <th>Informer le Signaleur</th> --}}
                                        {{-- <th>Geolocaliser la signalisation</th> --}}
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($signalisations as $item)
                                    <tr>
                                        <td class="id">{{ \App\Models\User::where(['id'=>$item->user_id ])->first()->name}} {{ \App\Models\User::where(['id'=>$item->user_id ])->first()->prename}}</td>
                                        <td class="id">{{ \App\Models\User::where(['id'=>$item->user_id ])->first()->tel}}</td>

                                        <td class="id">{{ \App\Models\Categorie::where(['id'=>$item->categorie_id ])->first()->categorie}}</td>
                                        <td class="id">{{$item->quartier}}</td> 
                                        {{-- <td class="id">aaaaaaaaaaaaaaddddddddddddddddddddddddddddddddddddddddddd</td> --}}
                                        <td class="id">{{$item->created_at->format('d/m/Y à H:i:s')}}</td> 
                                        <td class="id"> @if ($item->resolue==1 )  OUI @else NON @endif</td> 
                                       
                                        <td class="text-center">
                                            {{-- <a href="" class="m-r-15 text-muted userUpdate">
                                                <i class="fa fa-edit" style="color: #2196f3;"></i>
                                            </a> --}}

                                            

                                            <a href="{{url('detail-admin-signalisations/'.$item->id)}}" style="font-size: 20px" ><i
                                                class="far fa-newspaper" style="color: rgb(39, 126, 13);"></i></a> &nbsp;

                                        
                                            <a href="{{$item->url_gps}}" style="font-size: 20px" target="_blank"><i
                                                class="fa fa-map-marker" style="color: rgb(39, 126, 13);"></i></a> &nbsp;

                                                {{-- <a href="{{asset('assets/user-images/'.$item->image)}}" target="_blank"><img src="{{asset('assets/user-images/'.$item->image)}}" style="font-size: 20px"  width="400" height="600"  title="{{$item->commentaire}}"><i class="fa fa-camera-retro" aria-hidden="true"></i></a> --}}

                                          @if($item->image)
                                          <a href="{{asset('assets/user-images/'.$item->image)}}" style="font-size: 20px" target="_blank"><i class="fa fa-camera-retro" aria-hidden="true"></i></a>
                                                @else
                                                <a href="" style="font-size: 20px" onclick="return confirm('Aucune image retrouvé pour cette siganlisation')"
                                                ><i class="fa fa-camera-retro" aria-hidden="true"></i></a>

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
   
@endsection
