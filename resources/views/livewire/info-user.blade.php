<div class="row">
    @if ($actualites->count() > 0)
        @foreach ($actualites as $item)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <img src="{{ asset('assets/actualites-images/' . $item->image) }}" class="img-fluid" alt="">
                        <div class="social">
                            <a href="{{ url('single-article/' . $item->id . '/' . $item->titre) }}"><i
                                    style="font-size: 30px !important" class="bi bi-eye"></i></a>
                            {{-- <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a> --}}
                        </div>
                    </div>
                    <div class="member-info">
                        <h6> {{ strtoupper(\App\Models\Thematique::where(['id' => $item->thematique_id])->first()->thematique) }}
                            | <i class="bi bi-calendar3"></i> {{ $item->created_at->format('d/m/Y') }} </h6>
                        <h6> {{ $item->arrondissement }} | {{ $item->quartier }} </h6>

                        <a style="font-size: 12px" class="text-info"
                            href="{{ url('single-article/' . $item->id . '/' . $item->titre) }}">{{ $item->titre }}</a>
                        {{-- <span>{{$item->description}} </span> --}}
                        <?php
                        $description = substr($item->description, 0, 150);
                        ?>

                        <span> {{ $description }} </span>
                        {{-- <span> {{Str::limit($item->description, 0 )}} </span> --}}

                    </div>
                </div>
            </div>
        @endforeach

        {{ $actualites->links() }}
    @else
        <div class="section-title">
            <h3>Aucune actualité trouvée </h3>

        </div>


    @endif

    {{-- @push('scripts')
<script>
    Livewire.restart();
</script> 
@endpush --}}
</div>
