@extends('layouts.panel')

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Veterinarios</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/veterinarios/create')}}" class="btn btn-sm btn-primary">Crear Nuevo veterinario</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if(session('notification'))
        <div class="alert alert-default" role="alert">
            {{session('notification')}}
        </div>
        @endif

    </div>
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach($vet as $veterinario)
                <tr>
                    <th scope="row">
                        {{$veterinario->name}}
                    </th>
                    <td>
                        {{$veterinario->email}}
                    </td>
                    <td>
                        {{$veterinario->cedula}}
                    </td>
                    <td>

                        <form action="{{url('/veterinarios/'.$veterinario->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/veterinarios/'.$veterinario->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-body">
    {{$vet->links()}}
    </div>
</div>

@endsection