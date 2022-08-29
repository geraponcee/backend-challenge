@extends('layouts.base')

@section('content')
    <div class="card p-5 shadow-sm">
        <h2>Editar embarcación</h2>
        <form action="/boarding/{{$boarding->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="registration" class="form-label">Matrícula</label>
                <input id="registration" name="registration" type="text" class="form-control" tabindex="1" value="{{old('registration', $boarding->registration)}}"/>
                @error('registration')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="name" class="form-label">Nombre</label>
                <input id="name" name="name" type="text" class="form-control" value="{{old('name', $boarding->name)}}"/>
                @error('name')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="name" class="form-label">Tipo de embarcación</label>
                <select id="type" name="type" class="form-control">
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" {{($boarding->type_id == $type->id) ? "selected" : ""}}>
                            {{$type->description}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="owner" class="form-label">Propietario</label>
                <select id="owner" name="owner" class="form-control">
                    @foreach ($owners as $owner)
                        <option value="{{$owner->id}}" {{($boarding->owner_id == $type->id) ? "selected" : ""}}>
                            {{$owner->last_name}}, {{$owner->first_name}} 
                        </option>
                    @endforeach
                </select>
                @error('owner')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="color" class="form-label">Color</label>
                <input id="color" name="color" type="text" class="form-control" value="{{old('color', $feature->color)}}"/>
            </div>
            <div>
                <label for="length" class="form-label">Largo</label>
                <input id="length" name="length" type="text" class="form-control" value="{{old('length', $feature->length)}}"/>
            </div>
            <div>
                <label for="width" class="form-label">Ancho</label>
                <input id="width" name="width" type="text" class="form-control" value="{{old('width', $feature->width)}}"/>
            </div>
            <div>
                <label for="max_weight" class="form-label">Peso máximo</label>
                <input id="max_weight" name="max_weight" type="text" class="form-control" value="{{old('max_weight', $feature->max_weight)}}"/>
            </div>
            <div>
                <label for="image" class="form-label">Imágen</label>
                <input id="image" name="image" type="file" class="form-control" value="{{old('image'), $boarding->image}}"/>
                @error('image')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div class="mt-4">
                <a href="/boarding" class="btn btn-secondary" tabindex="3">Candelar</a>
                <button class="btn btn-primary" type="submit" tabindex="4">Guardar</button>
            </div>
        </form>
    </div>
@endsection