@extends('layouts.panel')

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Cancelar cita</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/miscitas')}}" class="btn btn-sm btn-success">
                    <i class="fas fa-reply"></i>
                    Regresar</a>
            </div>
            
        </div>
    </div>
    <div class="card-body">
        @if(session('notification'))
        <div class="alert alert-default" role="alert">
            {{session('notification')}}
        </div>
        @endif

        @if($role == 'cliente')
        <p>Se cancelará tu cita con el veterinario: <b>{{ $appointment->veterinario->name}}</b>
            ,(que se especializa en <b>{{ $appointment->specialty->name}}</b>) 
            programada el día <b>{{$appointment->scheduled_date }}</b>. </p>

            @elseif($role == 'veterinario')

            <p>Se cancelará la cita del cliente: <b>{{ $appointment->client->name}}</b><br>
            programada el día <b>{{$appointment->scheduled_date }}</b> a la hora: <b>{{$appointment->scheduled_time_12 }}</b>.</p>
            
            @else

            <p>Se cancelará la cita del cliente: <b>{{ $appointment->client->name}}</b>. <br>
            Con el veterinario: <b>{{ $appointment->veterinario->name}}</b>
            (que se especializa en <b>{{ $appointment->specialty->name}}</b>) <br>
            programada el día <b>{{$appointment->scheduled_date }}</b>, a la hora: <b>{{$appointment->scheduled_time_12 }}</b>.</p>
            @endif

            <form action="{{ url('/miscitas/'.$appointment->id.'/cancel') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="justification">Describa los motivos de la cancelación  de esta cita: </label>
                    <textarea name="justification" id="justification" rows="2" class="form-control" required></textarea>
                </div>
                <button class="btn btn-danger" type="submit">Cancelar cita</button>
            </form>


</div>


</div>


@endsection