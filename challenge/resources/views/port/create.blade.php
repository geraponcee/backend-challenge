@extends('layouts.base')

@section('content')
    <div class="card p-5 shadow-sm">
        <h2>Nuevo puerto</h2>
        <form action="/port" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="city" class="form-label">Ciudad</label>
                <input id="city" name="city" type="text" class="form-control" value="{{old('city')}}"/>
                @error('city')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="province" class="form-label">Provincia</label>
                <input id="province" name="province" type="text" class="form-control" value="{{old('province')}}"/>
                @error('province')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="country" class="form-label">País</label>
                <input id="country" name="country" type="text" class="form-control" value="{{old('country')}}"/>
                @error('country')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="latitude" class="form-label">Latitud</label>
                <input id="latitude" name="latitude" type="text" class="form-control" value="{{old('latitude')}}"/>
                @error('latitude')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="longitude" class="form-label">Longitud</label>
                <input id="longitude" name="longitude" type="text" class="form-control" value="{{old('longitude')}}"/>
                @error('longitude')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="services" class="form-label">Servicios</label>
                <select multiple="multiple" id="services" name="services[]" size="4" class="form-control" style="overflow: hidden">
                    @foreach ($services as $service)
                        <option value="{{$service->id}}">
                            {{$service->name}}
                        </option>
                    @endforeach
                </select>
                @error('services')
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
                <a href="/port" class="btn btn-secondary">Candelar</a>
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
@endsection