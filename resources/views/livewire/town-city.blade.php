<div class="row ">
    {{-- <p wire:loading >Chargement de données ...</p> --}}

    <div class="col-md-12 my-1 col-lg-4 col-sm-12  ">
        <div class="card" style="">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Quartier
                    <label class="checkbox">
                        <input type="checkbox" id="arrondissement_id" wire:model="arrondissement_id">
                        {{-- <input type="checkbox" name="camera_video[]" value="{{$video->id}}"> <label>{{$video->name}}</label> --}}

                        <span class="primary"></span>
                    </label>
                </li>

            </ul>
        </div>
    </div>

    <div class="col-md-12 my-1 col-lg-4 col-sm-12  ">
        <div class="card" style="">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Arrondissement
                    <label class="checkbox">
                        <input type="checkbox" id="quartier_id" wire:model="quartier_id">
                        {{-- <input type="checkbox" name="camera_video[]" value="{{$video->id}}"> <label>{{$video->name}}</label> --}}

                        <span class="primary"></span>
                    </label>
                </li>

            </ul>
        </div>
    </div>


    {{-- <input type="checkbox" id="quartier_id" wire:model="quartier_id"> --}}



    <table class="table table-striped table-bordered nowrap" style="width:100%;">
        <thead>
            <tr>
                <th scope="col">Arrondissement/quartier</th>

                <th class="text-center">Action</th>

            </tr>
        </thead>
        <tbody>

            @if ($quartiers->count() && !$arrondissements->count())

                @foreach ($quartiers as $item)
                    <form action="{{ route('updateStatus') }}" method="POST">
                        {{ csrf_field() }}
                        <tr>
                            <td> <input type="hidden" value="{{ $item->quartier }}" name="quartier">
                                {{ $item->quartier }} &nbsp;

                                @if ($item->status == 1)
                                    <i class="fa fa-check-square" style="color:green" aria-hidden="true"></i>
                                @endif

                            </td>


                            <td class="text-center">
                                <input type="submit" class=" form-group btn btn-outline-primary btn-sm" value="choisir">

                                <a href="{{ url('townUser/delete/' . $item->id) }}"
                                    class="form-group btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to want to delete it?')">Supprimer</a>
                            </td>
                        </tr>
                    </form>
                @endforeach

            @elseif($arrondissements->count() && !$quartiers->count())

                @foreach ($arrondissements as $item)
                    <form action="{{ route('updateStatus') }}" method="POST">
                        {{ csrf_field() }}
                        <tr>
                            <td> <input type="hidden" value="{{ $item->arrondissement }}" name="quartier">
                                {{ $item->arrondissement }} &nbsp;

                                @if ($item->status == 1)
                                    <i class="fa fa-check-square" style="color:green" aria-hidden="true"></i>
                                @endif

                            </td>


                            <td class="text-center">
                                <input type="submit" class=" form-group btn btn-outline-primary btn-sm" value="choisir">

                                <a href="{{ url('townUser/delete/' . $item->id) }}"
                                    class="form-group btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to want to delete it?')">Supprimer</a>
                            </td>
                        </tr>
                    </form>
                @endforeach

            @else
            
                @foreach ($arronddisementsUser as $item)
                    <form action="{{ route('updateStatus') }}" method="POST">
                        {{ csrf_field() }}
                        <tr>
                            <td> <input type="hidden" value="{{ $item->arrondissement }}" name="arrondissement">
                                {{ $item->arrondissement }} &nbsp;

                                @if ($item->status == 1)
                                    <i class="fa fa-check-square" style="color:green" aria-hidden="true"></i>
                                @endif

                            </td>


                            <td class="text-center">
                                <input type="submit" class=" form-group btn btn-outline-primary btn-sm" value="choisir">
                                <a href="" class="form-group btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to want to delete it?')">Supprimer</a>
                            </td>
                        </tr>
                    </form>
                @endforeach


                @foreach ($quartiersUser as $item)
                    <form action="{{ route('updateStatus') }}" method="POST">
                        {{ csrf_field() }}
                        <tr>
                            <td> <input type="hidden" value="{{ $item->quartier }}" name="quartier">
                                {{ $item->quartier }} &nbsp;

                                @if ($item->status == 1)
                                    <i class="fa fa-check-square" style="color:green" aria-hidden="true"></i>
                                @endif

                            </td>


                            <td class="text-center">
                                <input type="submit" class=" form-group btn btn-outline-primary btn-sm" value="choisir">

                                <a href="{{ url('townUser/delete/' . $item->id) }}"
                                    class="form-group btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to want to delete it?')">Supprimer</a>
                            </td>
                        </tr>
                    </form>
                @endforeach




            @endif





        </tbody>
    </table>

    {{-- @if ($quartiers->count())

        <table class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead>
                <tr>
                    <th scope="col">Arrondissement/quartier</th>

                    <th class="text-center">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($quartiers as $item)
                    <form action="{{ route('updateStatus') }}" method="POST">
                        {{ csrf_field() }}
                        <tr>
                            <td> <input type="hidden" value="{{ $item->quartier }}" name="quartier">
                                {{ $item->quartier }} &nbsp;

                                @if ($item->status == 1)
                                    <i class="fa fa-check-square" style="color:green" aria-hidden="true"></i>
                                @endif

                            </td>


                            <td class="text-center">
                                <input type="submit" class=" form-group btn btn-outline-primary btn-sm" value="choisir">

                                <a href="{{ url('townUser/delete/' . $item->id) }}"
                                    class="form-group btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to want to delete it?')">Supprimer</a>
                            </td>
                        </tr>
                    </form>
                @endforeach

            </tbody>
        </table>


    @endif --}}

    {{-- @if ($arrondissements->count())



        <table class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead>
                <tr>
                    <th scope="col">Arrondissement/quartier</th>

                    <th class="text-center">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($arrondissements as $item)
                    <form action="{{ route('updateStatus') }}" method="POST">
                        {{ csrf_field() }}
                        <tr>
                            <td> <input type="hidden" value="{{ $item->arrondissement }}" name="quartier">
                                {{ $item->arrondissement }} &nbsp;

                                @if ($item->status == 1)
                                    <i class="fa fa-check-square" style="color:green" aria-hidden="true"></i>
                                @endif

                            </td>


                            <td class="text-center">
                                <input type="submit" class=" form-group btn btn-outline-primary btn-sm" value="choisir">

                                <a href="{{ url('townUser/delete/' . $item->id) }}"
                                    class="form-group btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to want to delete it?')">Supprimer</a>
                            </td>
                        </tr>
                    </form>
                @endforeach

            </tbody>
        </table>


    @endif --}}

</div>
