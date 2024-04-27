
                                        <option value="">Choisir un quartier</option>
                                        @foreach ($quartiers as $item)
                                             <option value="{{$item->quartier}}">{{$item->quartier}}</option>
                                        @endforeach
                       