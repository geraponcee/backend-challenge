@extends('layouts.base')

@section('content')
    <div class="card p-5 shadow-sm">
        <h2>Editar puerto</h2>
        <form action="/port/{{$port->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="city" class="form-label">Ciudad</label>
                <input id="city" name="city" type="text" class="form-control" value="{{old('city', $port->city)}}"/>
                @error('city')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="province" class="form-label">Provincia</label>
                <input id="province" name="province" type="text" class="form-control" value="{{old('province', $port->province)}}"/>
                @error('province')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="country" class="form-label">País</label>
                <input id="country" name="country" type="text" class="form-control" value="{{old('country', $port->country)}}"/>
                @error('country')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="latitude" class="form-label">Latitud</label>
                <input id="latitude" name="latitude" type="text" class="form-control" value="{{old('latitude', $port->latitude)}}"/>
                @error('latitude')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="longitude" class="form-label">Longitud</label>
                <input id="longitude" name="longitude" type="text" class="form-control" value="{{old('longitude', $port->longitude)}}"/>
                @error('longitude')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div>
                <label for="services" class="form-label">Servicios</label>
                <select multiple="multiple" id="services" name="services[]" size="4" class="form-control" style="overflow: hidden">
                    @foreach ($services as $service)
                        <option value="{{$service->id}}" {{($port->service) ? "selected" : ""}}>
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
                <input id="image" name="image" type="file" class="form-control" value="{{old('image'), $port->image}}"/>
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