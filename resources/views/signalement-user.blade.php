@extends('layouts-user.master')
@section('style')
    {{-- ----------------------datatable --}}

    <link rel="stylesheet" href="{{ 'assets/css/datatable/dataTables.bootstrap4.min.css' }}" />
    <link rel="stylesheet" href="{{ 'assets/css/datatable/jquery.dataTables.min.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/datatable/responsive.bootstrap4.min.css' }}" type="text/css" />
@endsection

@section('content')

    <style>
        .error {
            color: red;
            border-color: red;
            font-weight: 900;
        }

    </style>

    <style>
        #map {
            /* height: 0%; */
            /* margin-top: -3em; */


            /* position: relative; */
        }

        /* .mapbox-logo {
                           display: none;
                       }*/

        .mapboxgl-ctrl-logo {
            display: none !important;
        }

        /* Optional: Makes the sample page fill the window. */
        /* html,
                       body {
                           height: 100%;
                           margin: 0;
                           padding: 0;
                       }*/

        @keyframes check {
            0% {
                height: 0;
                width: 0;
            }

            25% {
                height: 0;
                width: 10px;
            }

            50% {
                height: 20px;
                width: 10px;
            }
        }

        .checkbox {
            background-color: #fff;
            display: inline-block;
            height: 28px;
            margin: 0 .25em;
            width: 28px;
            border-radius: 4px;
            border: 1px solid #ccc;
            float: right
        }

        .checkbox span {
            display: block;
            height: 28px;
            position: relative;
            width: 28px;
            padding: 0
        }

        .checkbox span:after {
            -moz-transform: scaleX(-1) rotate(135deg);
            -ms-transform: scaleX(-1) rotate(135deg);
            -webkit-transform: scaleX(-1) rotate(135deg);
            transform: scaleX(-1) rotate(135deg);
            -moz-transform-origin: left top;
            -ms-transform-origin: left top;
            -webkit-transform-origin: left top;
            transform-origin: left top;
            border-right: 4px solid #fff;
            border-top: 4px solid #fff;
            content: '';
            display: block;
            height: 20px;
            left: 3px;
            position: absolute;
            top: 15px;
            width: 10px
        }

        .checkbox span:hover:after {
            border-color: #999
        }

        .checkbox input {
            display: none
        }

        .checkbox input:checked+span:after {
            -webkit-animation: check .8s;
            -moz-animation: check .8s;
            -o-animation: check .8s;
            animation: check .8s;
            border-color: #555
        }


        .checkbox input:checked+.primary:after {
            border-color: #2196F3
        }

    </style>



    {{-- @livewireStyles() --}}
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>

    <div class="container " style="margin-top: -80px">
        <a href="{{ route('home') }}" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i> RETOUR</a>
        {{-- <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-12 ">

            <div class="search "> <i class="fa fa-search"></i> <input type="text" class="form-control"
                    placeholder="Je recherche un arrondissement ou quartier"> <button
                    class="btn btn-primary">Search</button> </div>
        </div>
    </div> --}}
    </div>

    <section id="appointment" class=" appointment section-bg ">
        <div class="container col-md-12 text-center" data-aos="fade-up">

            <div class="section-title">
                <h2>Signalement </h2>
                <p>Signalez une anormalie sur la voie publique (éclairage public,
                    dechets, accident...)</p>
            </div>


            <div class=" text-center row col-md-12 ">
                <div class="col-lg-12 ">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            @if (\Session::has('insert'))
                                <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                                    <i class="feather icon-check-circle" style="font-size:1em"></i>
                                    {!! \Session::get('insert') !!}
                                </div>
                            @endif

                            @if (\Session::has('error'))
                                <div id="hide-message" class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                                    <i class="feather icon-check-circle" style="font-size:1em"></i>
                                    {!! \Session::get('error') !!}
                                </div>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            {{-- @if ($errors->has('image'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Oups!</strong> {{ $errors->first('image') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>


                                </div>
                            @endif --}}

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Oups!</strong> {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>


                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <form id="validation" action="{{ route('store') }}" method="POST" class="php-email-form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row ">
                            <div class="col-md-6 form-group mt-3">
                                <select name="categorie" id="categorie" class="form-control form-select" required>
                                    <option value="">Catégorie de signalement *</option>
                                    @foreach ($categorie as $item)
                                        <option @if (Request::old('categorie') == $item->id) selected="selected" @endif)
                                            value="{{ $item->id }}">{{ $item->categorie }}</option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- <div class="col-md-6 form-group mt-3">
                                    <textarea class="form-control" name="message" rows="5"
                                        placeholder="Message"></textarea>
                                </div> --}}

                            <div class="col-md-6 form-group mt-3">
                                <div class="card" style="">
                                    <input type="file" name="image">

                                </div>
                            </div>

                        </div>

                        @livewire("arrondissements-quartiers-select")


                        <div class="row ">

                            <div class="col-md-12 form-group mt-3">
                                <textarea type="text" required class="form-control " style="  resize:none;" name="commentaire" wrap="hard"
                                    id="commentaire" placeholder="Commentaire * "
                                    rows="15">{{ old('commentaire') }}</textarea>

                            </div>

                        </div>

                        <div class="row ">

                            {{-- <div class="col-md-6 form-group mt-3">
                                    <textarea class="form-control" name="message" rows="5"
                                        placeholder="Message"></textarea>
                                </div> --}}
                            <div class="col-md-12 form-group mt-3">

                                <div class="row">
                                    {{-- <div class="col-md-6 offset-md-3"> --}}

                                    <div class="col-md-6 mt-3 col-lg-6 col-sm-12">
                                        <div class="card" style="">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    Soyez informer de la résolution du problème
                                                    <label class="checkbox">
                                                        <input type="checkbox" id="" name="rp" value="oui" />
                                                        <span class="primary"></span>
                                                    </label>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3 col-lg-6 col-sm-12">
                                        <div class="card" style="">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    J'accepte la politique de données personnelles
                                                    <label class="checkbox">
                                                        <input type="checkbox" id="pdp" name="pdp" value="oui" />
                                                        {{-- <input type="checkbox" name="camera_video[]" value="{{$video->id}}"> <label>{{$video->name}}</label> --}}

                                                        <span class="primary"></span>
                                                    </label>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="long" name="long" value="">
                        <input type="hidden" required id="lat" name="lat" value="">
                        <input type="hidden" required id="link" name="link" value="">




                        <div class=" mt-3 col-md-12 form-group" id="map" style="height: 500px !important"></div>

                        {{-- <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5"
                                    placeholder="Message"></textarea>
                            </div> --}}
                        <div class="row mt-3 text-center col-md-12 ">

                            <div class="text-center col-md-6 mt-3 col-lg-6 col-sm-12"><a href="#">Accéder à la
                                    politique des données personnelles</a></div>
                            <div class="text-center col-md-6 mt-3 col-lg-6 col-sm-12"><button type="submit"
                                    name="submit">ENVOYER</button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>





        </div>
    </section>





    <section class="layout-content container">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Vos Signalements </h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Visualiser vos Signalements</li>

                </ol>
            </div>


            <div class="row">

                <div class="col-md-12 ">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste Signalements </h6>

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

                                            

                                            <a href="{{url('detail-signalisations/'.$item->id)}}" style="font-size: 20px" target="_blank"><i
                                                class="far fa-newspaper" style="color: rgb(39, 126, 13);"></i></a> &nbsp;

                                                {{-- <a href="{{$item->url_gps}}" style="font-size: 20px" target="_blank"><i
                                                    class="fa fa-edit" style="color: rgb(39, 126, 13);"></i></a> &nbsp; --}}
                                        
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
    </section>




    <main id="main" class="py-0">
        <!-- ======= Doctors Section ======= -->

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="row text-center">
                    {{-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa fa-list-ul"></i></div>
                            <h4 class="title"><a href="">Info sur l'Arrondissement / le quartier</a></h4>
                            <p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier choisi en temps réel</p>
                            <h4 class="title"><a href="">Visualiser mes arrondissements / quartiers choisis</a></h4>
                        </div>
                    </div> --}}

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa fa-list-ul"></i></div>
                            <h4 class="title"><a href="{{ route('actualite-user') }}">Info sur l'Arrondissement /
                                    le quartier</a></h4>
                            <p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier
                                choisi en temps réel</p>
                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">

                            <div class="icon"><i class="fa fa-signal" aria-hidden="true"></i></div>
                            <h4 class="title"><a href="{{ route('user-sondage') }}">Sondage</a></h4>
                            <p class="description">Si vous habitez ou fréquentez l'arrondissement ou le quartier choisi
                                pour un sondage à affectuer, Vous serez alors appelé à répondre à une serie de questions.
                            </p>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="fa fa-star" aria-hidden="true"></i></div>
                            <h4 class="title"><a href="{{ route('user-city') }}">Préférence</a></h4>
                            <p class="description">Vous pouvez chosir un arrondissement ou quartier afin d'être au
                                courant des actualité à temps réel en fonctions des thématiques séléctionnées</p>
                        </div>
                    </div>


                </div>

            </div>
        </section><!-- End Featured Services Section -->







    </main><!-- End #main sk.eyJ1Ijoidmlkb2xlIiwiYSI6ImNsMTNnMG5wMzAwMHEzY21mcjdqcnNhMHgifQ.Ji24n7en8pYCRyfmXDVDDA-->

    <script>
        // TO MAKE THE MAP APPEAR YOU MUST
        // ADD YOUR ACCESS TOKEN FROM
        // https://account.mapbox.com
        mapboxgl.accessToken = 'pk.eyJ1Ijoidmlkb2xlIiwiYSI6ImNrd2x1M3F1ZjAyNjgycXF0NTZ5ZjQ0Ym4ifQ._Fcd0M9j2ZMX42kqmwzGag';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            attributionControl: false,
            style: 'mapbox://styles/mapbox/streets-v11', // style URL
            center: [2.4281088, 6.3700992

            ], // starting position
            zoom: 10 // starting zoom
        });

        var geolocate = new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true

            },

            // When active the map will receive updates to the device's location as it changes.
            trackUserLocation: true,
            // Draw an arrow next to the location dot to indicate which direction the device is heading.
            showUserHeading: true
        });

        // Add geolocate control to the map.


        map.addControl(geolocate);

        map.addControl(new mapboxgl.FullscreenControl());

        geolocate.on('geolocate', function(e) {
            var lon = e.coords.longitude;
            var lat = e.coords.latitude
            var link = 'https://www.google.com/maps/dir//' + '+' + lat + ',' + '+' + lon;
            var position = [lon, lat];
            //document.getElementById("long").innerHTML = lon; value pour les input et innerHTML pour les <p> ou </p> <span></span>
            document.getElementById("long").value = lon;
            document.getElementById("lat").value = lat;
            document.getElementById("link").value = link;
            //document.getElementById("lag").innerHTML = lat;
            /* map.addControl(new mapboxgl.AttributionControl({
                 customAttribution: 'Map design by me'
             }));*/

            //console.log(position);
        });

        map.addControl(new mapboxgl.NavigationControl());
        /*map.addControl(new mapboxgl.GeolocateControl({
     trackUserLocation: true, 
     showUserHeading: true
}));*/

        class ToggleControl {

            constructor(options) {
                this._options = Object.assign({}, this._options, options)
            }



            onAdd(map, cs) {
                this.map = map;
                this.container = document.createElement('div');
                this.container.className = `${this._options.className}`;

                const button = this._createButton('monitor_button')
                this.container.appendChild(button);
                return this.container;
            }
            onRemove() {
                this.container.parentNode.removeChild(this.container);
                this.map = undefined;
            }
            _createButton(className) {
                const el = window.document.createElement('a')
                el.className = className;
                // el.style.color = 'blue';
                el.style.background = 'rgb(71, 172, 255)';
                el.style.height = "30px";
                el.style.fontSize = "13px";
                el.style.padding = "5px 5px";
                el.style.cursor = "pointer";
                el.textContent = 'SE GEOLOCALISER';
                el.addEventListener('click', (e) => {
                    geolocate.trigger();
                }, false)
                return el;
            }
        }

        const toggleControl = new ToggleControl({
            className: 'mapboxgl-ctrl'
        })

        map.addControl(toggleControl, 'top-left')
    </script>
    <!-- Vendor JS Files -->


    {{-- @livewireScripts() --}}
@endsection


@section('script')
    <!-- library js validate -->

    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>


    <script src="{{ 'assets/js/datatable/jquery.dataTables.min.js' }}"></script>

    <script src="{{ 'assets/js/datatable/dataTables.bootstrap4.min.js' }}"></script>

    <script src="{{ 'assets/js/datatable/dataTables.responsive.min.js' }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "scrollX": true,
                "order": []
            });
            //var table = $('#example').DataTable({  responsive: true, "order": [] });

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').keyup(function() {
                table.draw();
            });
        });
    </script>
    {{-- <script src="{{ asset('assets/js/bootstrap.js') }}"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
    {{-- form validate --}}

    <script>
        $('#validation').validate({
            rules: {
                categorie: {
                    required: true,
                },
                arrondissement: {
                    required: true,
                }
                quartier: {
                    required: true,
                }
                commentaire: {
                    required: true,
                }


            },
            messages: {
                categorie: "Choisissez un categorie*",
                arrondissement: "Choisissez un categorie*",
                quartier: "Choisissez un quartier*",
                commentaire: "Laissez votre commmentaire SVP ! *",

            }
        });
    </script>

    <script>
        $('#hide-message').show();
        setTimeout(function() {
            $('#hide-message').hide();
        }, 5000);
    </script>
@endsection
