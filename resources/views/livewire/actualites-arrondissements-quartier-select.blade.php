<div class="row">

    <div class="form-group col-md-4">
        <label class="col-form-label  text-sm-right">Arrondissement</label>
        <div class="col-sm-10">
            <select name="arrondissement" required id="arrondissement_id" wire:model="arrondissement_id"
                class=" form-control form-select">

                <option value="">Selectionnez un arrondissement</option>

                @foreach ($arrondissements as $item)
                    <option value="{{ $item->arrondissement }}">{{ $item->arrondissement }}</option>
                @endforeach


            </select>
            <div class="clearfix"></div>
        </div>
    </div>


    @if ($quartiers->count())
        <div class="form-group col-md-4">
            <div class="col-sm-12">
                <label class="col-form-label  text-sm-right"></label>
                <select name="quartier" required id="quartier_id" wire:model="quartier_id"
                    class="form-control form-select">

                    <option value="">Selectionnez un quartier</option>

                    @foreach ($quartiers as $item)
                        <option value="{{ $item->quartier }}">{{ $item->quartier }}</option>
                    @endforeach


                </select>
                <div class="clearfix"></div>
            </div>
        </div>
    @else
        <div class="form-group col-md-4">

            <div class="col-sm-12">
                <label class="col-form-label  text-sm-right">Quartier</label>
                <select name="quartier" id="quartier_id" wire:model="quartier_id" class="form-control form-select">

                    <option value="">Selectionnez un quartier</option>

                </select>
                <div class="clearfix"></div>
            </div>
        </div>

    @endif


    <div class="form-group col-md-4">
        <label class="col-form-label   text-sm-right">Thématiques</label>
        <div class="col-sm-12">

            <select class="form-control" name="thematique_id" id="thematique_id" required>
                {{-- @foreach ($thematiques as $item)
                    <option value="{{ $item->id }}">{{ $item->thematique }}</option>
                @endforeach --}}
                <option value="">Selectionnez une thématique</option>

                @foreach ($thematiques as $item)
                    <option value="{{ $item->id }}"
                        @if (Request::old('thematique_id') == $item->id) selected="selected" @endif) @if(session('actualitedata') && str_contains(url()->current(), '/admin/actualite/update/') && session('actualitedata')->thematique_id == $item->id)  selected="selected" @endif>{{ $item->thematique }}
                    </option>
                @endforeach

            </select>

            <div class="clearfix"></div>
        </div>
    </div>

</div>




<div class="row">

    {{-- <p wire:loading >Chargement de données ...</p> --}}

    <div class="form-group col-md-7">
        <label class="col-form-label  text-sm-right">Titre</label>
        <div class="col-sm-12">
            <input type="text" value="{{ old('titre') }} @if(session('actualitedata') && str_contains(url()->current(), '/admin/actualite/update/'))  {{session('actualitedata')->titre}}  @endif  " class="form-control" id="titre" name="titre"
                placeholder="Enter le titre" required>

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group col-md-3">
        <label class="col-form-label  text-sm-right">Image</label>
        <div class="col-sm-12">
            <input type="file" class="form-control" id="image" name="image">
            <div class="clearfix"></div>
        </div>
    </div>

    

    <div class="form-group col-md-2">
        <label class="col-form-label  text-sm-right">A la une ?</label>
        <div class="col-sm-12">
            <select class="form-control form-select" name="alaune" id="alaune" required>
                {{-- @foreach ($thematiques as $item)
                    <option value="{{ $item->id }}">{{ $item->thematique }}</option>
                @endforeach --}}
                <option value="">Choississez </option>
                <option value="OUI"
                @if (Request::old('alaune') == 'OUI') selected="selected" @endif)
                @if (session('actualitedata') && str_contains(url()->current(), '/admin/actualite/update/') && session('actualitedata')->alaune == 'OUI') selected="selected" @endif
                >OUI </option>
                <option value="NON"
                @if (Request::old('alaune') == 'NON') selected="selected" @endif)
                @if (session('actualitedata') && str_contains(url()->current(), '/admin/actualite/update/') && session('actualitedata')->alaune == 'NON') selected="selected" @endif
                >NON </option>


            </select>
            <div class="clearfix"></div>
        </div>
    </div>



</div>
