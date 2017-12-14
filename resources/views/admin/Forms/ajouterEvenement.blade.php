@extends('layouts.admin')
@section('content')
    @if($event)
        <form class="col-7" method="POST" enctype="multipart/form-data" action="{{route('admin.update.event')}}" style="margin-bottom: 15px;">
            {{ csrf_field() }}
            <h3 class="label-primary text-center">Publier un evenement</h3>
            <hr/>
            <div class="form-group">
                <label class="label">Titre *</label>
                <input type="text" name="title" class="form-control" value="{{$event->title}}">
            </div>

            <div class="form-group">
                <label for="orangeForm-pass">Type de l'evenements *:</label>
                <select name="type" class="form-control">

                    <option disabled selected>Choisir le Type</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="orangeForm-email">Affiche *:</label>
                <input type="file" name="picture" class="form-control">
            </div>

            <div class="form-group">
                <label for="orangeForm-email">Description</label>
                <textarea name="description" class="form-control"  placeholder="Ajouter une Description...">
                    {{$event->description}}
                </textarea>
            </div>

            <div class="form-group">
                <label for="orangeForm-pass">Nombre de Tickets</label>
                <input type="number" name="tickets" value="{{$event->tickets}}" class="form-control" placeholder="0">
            </div>
            <fieldset>
                <legend>Repartition des tickets:</legend>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">VIP</span>
                            <input type="number" name="vip" class="form-control"
                                   placeholder="0 ticket">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="number" name="prixvip" class="form-control"
                                   placeholder="0">
                            <span class="input-group-addon">FCFA</span>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">PUBLIC</span>
                            <input type="number" name="public" class="form-control"
                                   placeholder="0 ticket">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="number" name="prixpublic" class="form-control"
                                   placeholder="0">
                            <span class="input-group-addon">FCFA</span>
                        </div>
                    </div>
                </div>
            </fieldset>
            <hr/>
            <div class="form-group">
                <label for="orangeForm-pass">Date de debut *:</label>
                <input type="date" name="begin" class="form-control">
            </div>

            <div class="form-group">
                <label for="orangeForm-pass">Date de Fin *:</label>
                <input type="date" name="end" class="form-control">
            </div>

            <div class="form-group">
                <label for="orangeForm-pass">Lieu *:</label>
                <select name="lieu" class="form-control">

                    <option disabled selected>Choisir le Lieu</option>
                    @foreach($lieux as $lieu)
                        <option value="{{$lieu->id}}">{{$lieu->label}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success" value="PUBLIER">
            </div>
        </form>
    @else
                <form class="col-7" method="POST" enctype="multipart/form-data" action="{{route('admin.save.event')}}">
                    @endif
                    {{ csrf_field() }}
                    <h3 class="label-primary text-center">Publier un evenement</h3>
                    <hr/>
                    <div class="form-group">
                        <label class="label">Titre *</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="orangeForm-pass">Type de l'evenements *:</label>
                        <select name="type" class="form-control">

                            <option disabled selected>Choisir le Type</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="orangeForm-email">Affiche *:</label>
                        <input type="file" name="picture" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="orangeForm-email">Description</label>
                        <textarea name="description" class="form-control"
                                  placeholder="Ajouter une Description..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="orangeForm-pass">Nombre de Tickets</label>
                        <input type="number" name="tickets" class="form-control" placeholder="0">
                    </div>
                    <fieldset>
                        <legend>Repartition des tickets:</legend>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">VIP</span>
                                    <input type="number" name="vip" class="form-control"
                                           placeholder="0 ticket">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" name="prixvip" class="form-control"
                                           placeholder="0">
                                    <span class="input-group-addon">FCFA</span>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">PUBLIC</span>
                                    <input type="number" name="public" class="form-control"
                                           placeholder="0 ticket">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" name="prixpublic" class="form-control"
                                           placeholder="0">
                                    <span class="input-group-addon">FCFA</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <hr/>
                    <div class="form-group">
                        <label for="orangeForm-pass">Date de debut *:</label>
                        <input type="date" name="begin" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="orangeForm-pass">Date de Fin *:</label>
                        <input type="date" name="end" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="orangeForm-pass">Lieu *:</label>
                        <select name="lieu" class="form-control">

                            <option disabled selected>Choisir le Lieu</option>
                            @foreach($lieux as $lieu)
                                <option value="{{$lieu->id}}">{{$lieu->label}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="PUBLIER">
                    </div>
                </form>

                <!-- Form register -->

@endsection