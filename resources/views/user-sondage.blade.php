@extends('layouts-user.master')
@section('style')
    {{-- ----------------------datatable --}}

    <link rel="stylesheet" href="{{ 'assets/css/datatable/dataTables.bootstrap4.min.css' }}" />
    <link rel="stylesheet" href="{{ 'assets/css/datatable/jquery.dataTables.min.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/datatable/responsive.bootstrap4.min.css' }}" type="text/css" />
@endsection

@section('content')
    <div class="container " style="margin-top: -40px">
        <a href="{{ route('home') }}" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i> RETOUR</a>
        {{-- <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-12 ">

                <div class="search "> <i class="fa fa-search"></i> <input type="text" class="form-control"
                        placeholder="Je recherche un arrondissement ou quartier"> <button
                        class="btn btn-primary">Search</button> </div>
            </div>
        </div> --}}
    </div>

    <section id="departments" class="departments">
        <div class="container col-md-8" data-aos="fade-up">

            <div class="section-title">
                <h2>Lites des sondages</h2>
            </div>

            <div style="margin-top:-10px" class="row card-body" data-aos="fade-up" data-aos-delay="100">
                <p>Veuillez participer aux sondages</p>
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr style="background-color: #176ae6 !important">


                            <th style="color:white">Sondage</th>
                            <th style="color:white">Date</th>
                            <th style="color:white">Action</th>


                        </tr>


                    </thead>

                    <tbody>
                        @foreach ($sondages as $sondage)
                            <tr>

                                <td width=60%>{{ $sondage->name }}</td>

                                <td width=20%>{{ $sondage->created_at->format('d-m-Y') }}</td>


                                <td width=20% class="text-center">

                                    <a href="{{ url('survey/' . $sondage->slug) }}"><i class="fa fa-play"
                                            aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
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
                            <h4 class="title"><a href="{{route('actualite-user')}}">Info sur l'Arrondissement / le quartier</a></h4>
                            <p class="description"> Soyez informer des actualités sur l'arrondissement ou le quartier choisi en temps réel</p>
                            {{-- <h4 class="title"><a href="{{route('user-city')}}">Visualiser mes arrondissements / quartiers choisis</a></h4> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="fa fa-info-circle"></i></div>
                        
                            <h4 class="title"><a href="{{route('signalement-user')}}">Signalement</a></h4>
                            <p class="description">Siganlez une anormalie sur la voie publique (éclairage public, dechets, accident...)
                                </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="fa fa-star"   aria-hidden="true" ></i></div>
                            <h4 class="title"><a href="{{route('user-city')}}">Préférence</a></h4>
                            <p class="description">Vous pouvez chosir un arrondissement ou quartier afin d'être au courant des actualité à temps réel en fonctions des thématiques séléctionnées</p>
                        </div>
                    </div>


                </div>

            </div>
        </section><!-- End Featured Services Section -->

    </main><!-- End #main -->
@endsection


@section('script')
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
@endsection
