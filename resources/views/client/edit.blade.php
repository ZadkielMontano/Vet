<?php

use Illuminate\Support\Str;

?>

@extends('layouts.panel')

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Editar Cliente</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/clientes')}}" class="btn btn-sm btn-success">
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
        
        
        <form action="{{url('/clientes/'.$client->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del nuevo cliente</label>
                <input type="text" name="name" class="form-control" value="{{old ('name',$client->name) }}">
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" name="email" class="form-control" value="{{old ('email',$client->email) }}">
            </div>
            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" class="form-control" value="{{old ('cedula',$client->cedula) }}">
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{old ('address',$client->address) }}">
            </div>
            <div class="form-group">
                <label for="phone">Telefóno</label>
                <input type="text" name="phone" class="form-control" value="{{old ('phone',$client->phone) }}">
            </div>
            <div class="form-group">
                <label for="password">Constraseña</label>
                <input type="text" name="password" class="form-control">
                <small class="text-warning">Solo llena el campo si desea cambiar la contraseña</small>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Modificar cliente</button>
        </form>
    </div>
</div>

@endsection