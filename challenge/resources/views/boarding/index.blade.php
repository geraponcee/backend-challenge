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
                Embarcaciones:
                <a href="boarding/create" class="btn btn-primary float-end">Nuevo</a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-ligth table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">IMAGEN</th>
                        <th scope="col">MATRICULA</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">TIPO</th>
                        <th scope="col">PROPIETARIO</th>
                    <tr>
                </thead>
                <tbody>
                    @foreach ($boardings as $boarding)
                        <tr>
                            <td>
                                @if ($boarding->image)
                                    <img src={{$boarding->image}} class="image-fluid" width="30px"/>
                                @endif
                            </td>
                            <td>{{$boarding->registration}}</td>
                            <td>{{$boarding->name}}</td>
                            <td>{{$boarding->type->description}}</td>
                            <td>{{$boarding->owner->last_name}}, {{$boarding->owner->first_name}}</td>
                            <td>
                                <form action="{{route ('boarding.destroy', $boarding->id)}}" method="POST">
                                    <a href="/boarding/{{$boarding->id}}/edit" class="btn btn-secondary">Editar</a>
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