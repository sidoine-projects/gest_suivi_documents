{{-- <div>

    <div wire:ignore>
     
        <select class="form-control" id="select2">
            <option value="">Choissisez un quartier</option>
            @foreach ($quartiers as $data)
            <option value="{{ $data->quartier }}">{{ $data->quartier }}</option>
            @endforeach
        </select>
    </div>

</div> --}}



<div class="row  text-center">
    {{-- <p wire:loading >Chargement de données ...</p> --}}
    <div class="col-md-3 form-group mt-3">

        <select name="arrondissement" id="arrondissement_id" wire:model="arrondissement_id" class="form-select">

            <option value="">Selectionnez un arrondissement</option>
            {{-- @if (Request::old('thematique_id') == $item->id) selected="selected" @endif) --}}
            @foreach ($arrondissements as $item)
                <option value="{{ $item->arrondissement }}" wire:key="{{$item->arrondissement}}">{{ $item->arrondissement }}</option>
            @endforeach

        </select>

    </div>


    @if ($quartiers->count())
        <div class="col-md-3 form-group mt-3">
            <select name="quartier" id="quartier_id" wire:model="quartier_id" class="form-select">

                <option value="">Selectionnez un quartier</option>

                @foreach ($quartiers as $item)
                    <option value="{{ $item->quartier }}">{{ $item->quartier }}</option>
                @endforeach

            </select>
        </div>
    @else
        <div class="col-md-3 form-group mt-3">
            <select name="quartier" id="quartier_id" wire:model="quartier_id" class="form-select">

                <option value="">Selectionnez un quartier</option>

            </select>
        </div>


    @endif


    <div class="col-md-4 form-group mt-3">
        <select name="thematique" id="thematique" class="form-select">

            <option value="">Selectionnez une thématique</option>

            @foreach ($thematiques as $item)
                <option value="{{ $item->id }}" @if (session('filtre_thematique') && session('filtre_thematique') == $item->id) selected="selected" @endif>
                    {{ $item->thematique }}</option>
            @endforeach

        </select>
    </div>


    <div class="col-md-2 form-group mt-3">

        <button type="submit" name="submit" style="border-radius: 0px ">Filtrer</button>

    </div>


</div>


{{-- @push('scripts')

<script>
    $(document).ready(function () {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            var item = $('#select2').select2("val");
            @this.set('viralSongs', item);
        });
    });

</script>

@endpush --}}
