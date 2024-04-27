
                                        <option value="">Choisir un arrondissement</option>
                                        @foreach ($arrondissements as $item)
                                             <option value="{{$item->arrondissement}}">{{$item->arrondissement}}</option>
                                        @endforeach
                          