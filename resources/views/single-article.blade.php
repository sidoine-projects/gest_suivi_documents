@extends('layouts-user.master')

@section('content')
    <div class="container " style="margin-top: -40px">
        <a href="{{ route('home') }}" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i>
            RETOUR</a>

    </div>




    {{-- <div class="container card my-4">
    <h5 class="card-header">Recherche</h5>
    <form class="card-body" action="/search" method="GET" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Rechercher..." name="q">
            <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">Go!</button>
      </span>
        </div>
    </form>
</div> --}}


    <main id="main">


        <!-- ======= Cta Section ======= -->

        <!-- ======= About Us Section ======= -->

        <section id="" class="about">
            <div class="container col-md-8" data-aos="fade-up">

                <div class="section-title">
                    <h3 style="color:rgb(40, 158, 255)">
                        {{ strtoupper(\App\Models\Thematique::where(['id' => $data->thematique_id])->first()->thematique) }}
                    </h3>
                    {{-- <h4> Pourquoi une plateforme de participation publique au seins de la ville de cotonou? </h4> --}}
                    <h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif"> <strong>
                            {{ $data->titre }}</strong></h1>

                    <h6> {{ $data->arrondissement }} | {{ $data->quartier }} |
                        <i class="bi bi-calendar3"></i> {{ $data->created_at->format('d/m/Y') }} | Par <i
                            class="bi bi-person-circle"></i>
                        <em style="font-weight:bold">{{ ucfirst(\App\Models\User::where(['id' => $data->auteur])->first()->name) }}
                            {{ ucfirst(\App\Models\User::where(['id' => $data->auteur])->first()->prename) }}</em>
                    </h6>

                    <p>Mise à jour le <span style="font-weight: bold">{{ $data->updated_at->format('d/m/Y') }}</span>

                        <a href="https://twitter.com/intent/tweet?url={{ $url }}" class=" btn btn-dark twitter"><i
                                class="bx bxl-twitter"></i></a>
                        <a class=" btn btn-dark facebook"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"><i
                                class="bx bxl-facebook"></i></a>
                        <a class=" btn btn-dark whatsapp" href="https://wa.me/?text={{ $url }}"
                            class="whatsapp"><i class="bx bxl-whatsapp"></i></a>

                    </p>
                    <hr>

                </div>

                <div class="row col-md-12 text-center">
                    <div class="col-lg-12 text-center">
                        <img src="{{ asset('assets/actualites-images/' . $data->image) }}" class="img-fluid" alt="">
                    </div>




                </div>
                <br>

                <p style="text-align: justify">
                    {{ $data->description }}

                </p>
                <p>
                    <i style="color:rgb(31, 207, 207)" class="bi bi-eye"></i> Affichages : {{ $data->nbrview }} |
                </p>


                <div class="mb-5">


                    <div class="social-links mt-3">
                        <strong> Partager</strong>
                        <a href="https://twitter.com/intent/tweet?url={{ $url }}" class=" btn btn-dark twitter"><i
                                class="bx bxl-twitter"></i></a>
                        <a class=" btn btn-dark facebook"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"><i
                                class="bx bxl-facebook"></i></a>
                        <a class=" btn btn-dark whatsapp" href="https://wa.me/?text={{ $url }}"
                            class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                    </div>

                </div>


                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <h6>Total : <span style="background-color: #279690; border-radius: 15px;padding-left: 4px;"
                            class="text-white"> {{ $commentscount }} </span> &nbsp; Commentaire(s) trouvé(s)</h6>
                    <hr>
                    <br>
                    @if ($commentscount > 0)
                        @foreach ($comments as $item)
                            <div class="col-lg-12">



                                <p style="color: rgb(19, 124, 115)">

                                    <i class="bi bi-person-circle"></i>
                                    <em style="font-weight:bold">{{ ucfirst(\App\Models\User::where(['id' => $item->user_id])->first()->name) }}
                                        {{ ucfirst(\App\Models\User::where(['id' => $item->user_id])->first()->prename) }}</em>
                                        |
                                    <span style="color: black" class="fst-italic"> <i class="bi bi-calendar3"></i>
                                        {{ $item->created_at->format('d/m/Y à H:i:s') }} 
                                        
                                        <span> 

                                </p>

                                <p>{{ $item->comment }}</p>

                                {{-- <a class="btn btn-outline-success mb-3" href="">En savoir plus</a> --}}



                            </div>
                            <br>
                            <hr>
                            <br>
                        @endforeach

                        {{ $comments->links() }}
                    @else
                    @endif

                </div>













                <div class="row mt-2 mb-5">

                    <div class="form-group row ">
                        <div class="col-sm-6">
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

                    <div class="col-lg-6 col-md-6">
                        @if (!auth()->check())
                            <p>Vous devez <a href="{{ route('login') }}"> <span style="text-decoration: underline;">vous
                                        connecter</span> </a> pour publier un commentaire.
                            </p>
                        @endif

                        <form action="{{ url('single-article') }}" method="post" role="form" class="php-email-form">
                            {{ csrf_field() }}

                            <input type="hidden" name="actualite_id" value="{{ $data->id }}">

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="comment" rows="7" placeholder="Commenter" required></textarea>
                            </div>
                            <br>

                            <div class="text-left "><button class="btn btn-outline-dark"
                                    type="submit">Commenter</button></div>
                        </form>
                    </div>

                </div>


                @foreach ($datarand as $item)
                    <p><span
                            style="background-color: rgb(31, 150, 100); font-family:Arial, Helvetica, sans-serif; color:white">LIRE
                            AUSSI</span> <a style="color:rgb(33, 110, 91)"
                            href="{{ url('single-article/' . $item->id . '/' . $item->titre) }}">{{ $item->titre }}</a>
                    </p>
                @endforeach

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Doctors Section ======= -->
        <!-- End Doctors Section -->



        <!-- ======= Contact Section ======= -->
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
