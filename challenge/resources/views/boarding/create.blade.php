@extends('layouts.base')

@section('content')
    <div class="card p-5 shadow-sm">
        <h2>Nueva embarcación</h2>
        <form action="/boarding" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="registration" class="form-label">Matrícula</label>
                <input id="registration" name="registration" type="text" class="form-control" value="{{old('registration')}}"/>
                @error('registration')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="name" class="form-label">Nombre</label>
                <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}"/>
                @error('name')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="type" class="form-label">Tipo de embarcación</label>
                <select id="type" name="type" class="form-control">
                    @foreach ($types as $type)
                        <option value="{{$type->id}}">
                            {{$type->description}}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="owner" class="form-label">Propietario</label>
                <select id="owner" name="owner" class="form-control">
                    @foreach ($owners as $owner)
                        <option value="{{$owner->id}}">
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
                <input id="color" name="color" type="text" class="form-control" value="{{old('color')}}"/>
            </div>
            <div>
                <label for="length" class="form-label">Largo</label>
                <input id="length" name="length" type="number" step="any" class="form-control" value="{{old('length')}}"/>
            </div>
            <div>
                <label for="width" class="form-label">Ancho</label>
                <input id="width" name="width" type="number" step="any" class="form-control" value="{{old('width')}}"/>
            </div>
            <div>
                <label for="max_weight" class="form-label">Peso máximo</label>
                <input id="max_weight" name="max_weight" type="number" step="any" class="form-control" value="{{old('max_weight')}}"/>
            </div>
            <div>
                <label for="image" class="form-label">Imágen</label>
                <input id="image" name="image" type="file" class="form-control" value="{{old('image')}}"/>
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