@extends('layouts.panel')

@section('content')


<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                {{ __('Bienvenido a Veterinaria Huellitas') }}
            </div>
        </div>
    </div>
</div>
<!-- <div class="card">
<div class="form-group col-md-12">

<div class="alert alert-primary" role="alert"> 
    <div class="form-group col-md7-10">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo excepturi dolor, architecto et natus numquam fuga sunt
            sint cumque quas culpa fugiat omnis incidunt eaque asperiores voluptatem vel. Neque, nam?</p>
        <div class="form-group col-md5-6">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo excepturi dolor, architecto et natus numquam fuga sunt
                sint cumque quas culpa fugiat omnis incidunt eaque asperiores voluptatem vel. Neque, nam?</p>
        </div>
    </div>
</div>

    <img class="redimension" src="{{asset('img/wel/icon.jpeg')}}" />    
    </div>
</div> -->
<div class="col-md-12 mb-5">

</div>
<div class="card" >
<div class="container">
<div class="row">
    <div class="col">
        <br>
    <h1>Huellitas</h1>
                <p>Somos el mejor centro Veterinario de la Zona de Ecatepec enfocado a brindar servicios médicos y quirúrgicos aplicando 
                        las técnicas más actuales y equipo de vanguardia para diagnósticos precisos y tratamientos oportunos.</p>
                        <h1>Nuestro equipo de trabajo</h1>
                    <p>Nuestro equipo de trabajo está conformado por veterinarios certificados y profesionales que se actualizan día a día en las diversas técnicas
                    y tratamientos para el cuidado de su mascota, para proporcionarle a cada cliente la atención que se merece.</p>
    </div>
    <div class="col">
        
    <img src="{{asset('img/wel/icon-bln.png')}}" /> 
    </div>
</div>
</div>
</div> 

    
    
    

@endsection