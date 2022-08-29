@extends('layouts.base')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-header">
            <h2>
                Propietarios:
                <a href="owner/create" class="btn btn-primary float-end">Nuevo</a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-ligth table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">IMAGEN</th>
                        <th scope="col">DNI</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">FECHA DE NACIMIENTO</th>
                        <th scope="col">MAIL</th>
                        <th scope="col">TELEFONO</th>
                    <tr>
                </thead>
                <tbody>
                    @foreach ($owners as $owner)
                        <tr>
                            <td>
                                @if ($owner->image)
                                    <img src={{$owner->image}} class="image-fluid" width="30px"/>
                                @endif
                            </td>
                            <td>{{$owner->dni}}</td>
                            <td>{{$owner->first_name}}</td>
                            <td>{{$owner->last_name}}</td>
                            <td>{{$owner->birth}}</td>
                            <td>{{$owner->mail}}</td>
                            <td>{{$owner->phone_number}}</td>
                            <td>
                                <form action="{{route ('owner.destroy', $owner->id)}}" method="POST">
                                    <a href="/owner/{{$owner->id}}/edit" class="btn btn-secondary">Editar</a>
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