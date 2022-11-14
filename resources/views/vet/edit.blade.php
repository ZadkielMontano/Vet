<?php
use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Editar veterinario</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/veterinarios')}}" class="btn btn-sm btn-success">
                    <i class="fas fa-reply"></i>
                    Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">

    @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle"></i>    
                    <strong>Por favor!</strong> {{$error}}
                </div>
            @endforeach
        @endif 
        
        
        <form action="{{url('/veterinarios/'.$vet->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del nuevo veterinario</label>
                <input type="text" name="name" class="form-control" value="{{old ('name',$vet->name) }}">
            </div>

            <div class="form-group">
                <label for="specialties">Especialidades</label>
                <select name="specialties[]" id="specialties" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar especialidades" multiple required>
                @foreach ($specialties as $especialidad)

                    <option value="{{ $especialidad->id }}">{{ $especialidad->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" name="email" class="form-control" value="{{old ('email',$vet->email) }}">
            </div>
            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" class="form-control" value="{{old ('cedula',$vet->cedula) }}">
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{old ('address',$vet->address) }}">
            </div>
            <div class="form-group">
                <label for="phone">Telefóno</label>
                <input type="text" name="phone" class="form-control" value="{{old ('phone',$vet->phone) }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control">
                <small class="text-warning">Solo lleva el campo si deseas cambiar la contraseña</small>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Modificar veterinario</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(()=>{});
    $('#specialties').selectpicker('val', @json($specialty_ids) );
</script>

@endsection