@extends('layouts.base')

@section('content')
    <style>
        .my-badge {
            background-color: #6c757d;
            padding: 0px 7px 2px 7px;
            color: #ffffff;
            border-radius: 10px;
        }
    </style>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-header">
            <h2>
                Puertos:
                <a href="port/create" class="btn btn-primary float-end">Nuevo</a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-ligth table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">IMAGEN</th>
                        <th scope="col">CIUDAD</th>
                        <th scope="col">PROVINCIA</th>
                        <th scope="col">PAIS</th>
                        <th scope="col">LATITUD</th>
                        <th scope="col">LONGITUD</th>
                        <th scope="col">SERVICIOS</th>
                    <tr>
                </thead>
                <tbody>
                    @foreach ($ports as $port)
                        <tr>
                            <td>
                                @if ($port->image)
                                    <img src={{$port->image}} class="image-fluid" width="30px"/>
                                @endif
                            </td>
                            <td>{{$port->city}}</td>
                            <td>{{$port->province}}</td>
                            <td>{{$port->country}}</td>
                            <td>{{$port->latitude}}</td>
                            <td>{{$port->longitude}}</td>
                            <td>
                                @foreach ($port->services as $service)
                                    <span class="my-badge">{{$service->name}}</span>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{route ('port.destroy', $port->id)}}" method="POST">
                                    <a href="/port/{{$port->id}}/edit" class="btn btn-secondary">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection