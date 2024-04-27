<div class="row ">
    {{-- <p wire:loading >Chargement de données ...</p> --}}
    <div class="col-md-6 form-group mt-3">
        <select name="arrondissement"  id="arrondissement_id" wire:model="arrondissement_id" class="form-select" required>

            <option value="">Selectionnez un arrondissement</option>

            @foreach ($arrondissements as $item)
                <option  @if (Request::old('arrondissement') == $item->arrondissement ) selected="selected" @endif) value="{{ $item->arrondissement }}">{{ $item->arrondissement }}</option>
            @endforeach


        </select>
    </div>

    @if ($quartiers->count())
        <div class="col-md-6 form-group mt-3">
            <select name="quartier"   id="quartier_id" wire:model="quartier_id" class="form-select">

                <option value="">Selectionnez un quartier</option>

                @foreach ($quartiers as $item)
                    <option  value="{{ $item->quartier }}">{{ $item->quartier }}</option>
                @endforeach

            </select>
        </div>
            
        @else

        <div class="col-md-6 form-group mt-3">
            <select name="quartier" required id="quartier_id" wire:model="quartier_id" class="form-select">

                <option value="">Selectionnez un quartier</option>

            </select>
        </div>

    
    @endif


</div>
