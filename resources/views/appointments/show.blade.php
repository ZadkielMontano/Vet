@extends('layouts.panel')

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Cita #{{$appointment->id}}</h3>

            </div>
            <div class="col text-right">
                <a href="{{url('/miscitas')}}" class="btn btn-sm btn-success">
                    <i class="fas fa-reply"></i>
                    Regresar</a>
            </div>
            
        </div>
    </div>
    <div class="card-body">
        <ul>
            <dd>
                <strong>Fecha:</strong>{{$appointment->scheduled_date}}
            </dd>
            <dd>
                <strong>Hora:</strong>{{$appointment->scheduled_time_12}}
            </dd>

            @if($role == 'cliente' || $role == 'admin')
            <dd>
                <strong>Veterinario:</strong>{{$appointment->veterinario->name}}
            </dd>
            @endif
            @if($role == 'veterinario' || $role == 'admin')
            <dd>
                <strong>Cliente:</strong>{{$appointment->client->name}}
            </dd>
            @endif

            <dd>
                <strong>Especialidad del veterinario:</strong>{{$appointment->specialty->name}}
            </dd>
            <dd>
                <strong>Tipo:</strong>{{$appointment->type}}
            </dd>
            <dd>
            <strong>Estado: </strong> 
                @if($appointment->status == 'Cancelada')
                <span class="badge badge-danger">Cancelada</span>
                @else
                <span class="badge badge-primary">{{ $appointment->status}}</span>
                @endif
            </dd>
            <dd>
                <strong>Tipo:</strong>{{$appointment->type}}
            </dd>
            <dd>
                <strong>Descripción:</strong> {{$appointment->description}}
            </dd>
        </ul>

        @if($appointment->status == 'Cancelada')
            <div class="alert bg-light text-primary">
                    <h3>Información de cancelación</h3>
                    @if($appointment->cancellation)
                    <ul>
                        <li>
                            <strong>Fecha de la cancelación:</strong>
                            {{ $appointment->cancellation->created_at}}
                        </li>
                        <li>
                            <strong>Cita cancelada por:</strong>
                            {{ $appointment->cancellation->cancelled_by->name}}
                        </li>
                        <li>
                            <strong>Motivos de cancelación:</strong>
                            {{ $appointment->cancellation->justification}}
                        </li>
                    </ul>
                    @else
                    <ul>
                        <li>La cita se cancelo antes de la confirmación.</li>
                    </ul>
                    @endif
                </div>
            @endif





</div>


</div>


@endsection