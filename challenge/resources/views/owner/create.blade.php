@extends('layouts.base')

@section('content')
    <div class="card p-5 shadow-sm">
        <h2>Nuevo propietario</h2>
        <form action="/owner" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="dni" class="form-label">DNI</label>
                <input id="dni" name="dni" type="text" class="form-control" value="{{old('dni')}}"/>
                @error('dni')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="first_name" class="form-label">Nombre</label>
                <input id="first_name" name="first_name" type="text" class="form-control" value="{{old('first_name')}}"/>
                @error('first_name')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="last_name" class="form-label">Apellido</label>
                <input id="last_name" name="last_name" type="text" class="form-control" value="{{old('last_name')}}"/>
                @error('last_name')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="birth" class="form-label">Fecha de nacimiento</label>
                <input id="birth" name="birth" type="date" class="form-control" value="{{old('birth')}}"/>
                @error('birth')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="mail" class="form-label">Mail</label>
                <input id="mail" name="mail" type="text" class="form-control" value="{{old('mail')}}"/>
                @error('mail')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="phone_number" class="form-label">Teléfono</label>
                <input id="phone_number" name="phone_number" type="text" class="form-control" value="{{old('phone_number')}}"/>
                @error('phone_number')
                    <small style="color:red">{{$message}}</small>
                @enderror
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