<?php

use Illuminate\Support\Str;

?>

@extends('layouts.panel')

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Registrar nueva Cita</h3>
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


        <form action="{{url('/reservarcitas')}}" method="POST">
            @csrf

            <div class="form-row">
            
            <div class="form-group col-md-6">
                <label for="specialty">Especialidad</label>
                <select name="specialty_id" id="specialty" class="form-control">
                    <option value="">Seleccionar Especialidad</option>
                    @foreach ($specialties as $especialidad)
                    <option value="{{ $especialidad->id}}"
                    @if(old('specialty_id') == $especialidad->id) selected @endif>
                    {{$especialidad->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="veterinario">Veterinario</label>
                <select name="veterinario_id" id="veterinario" class="form-control" required>
                
                @foreach ($vet as $veterinario)
                    <option value="{{ $veterinario->id}}"
                    @if(old('veterinario_id') == $veterinario->id) selected @endif>
                    {{ $veterinario->name }}</option>
                @endforeach
            
                </select>
            </div>

            </div>

            <div class="form-group">
                <label for="date">Fecha</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker"
                    id="date" name="scheduled_date"
                    placeholder="Seleccionar Fecha"
                    type="date" value="{{ old('scheduled_date'), date('Y-m-d') }}" 
                    data-date-format="yyyy-mm-dd"
                    data-date-start-date="{{ date('Y-m-d')}}"
                    data-date-end-date="+30d">
                </div>
            </div>
            <div class="form-group">
                <label for="hours">Hora de atenci??n</label>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4 class="m-3" id="titleMorning"></h4>
                            <div id="hoursMorning">
                                @if($intervals)
                                <h4 class="m-3">En la ma??ana</h4>
                                    @foreach ($intervals['morning'] as $key => $interval)
                                    <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="intervalMorning{{ $key }}" name="scheduled_time" value="{{ $interval['start'] }}" class="custom-control-input">
                                    <label class="custom-control-label" for="intervalMorning{{ $key }}">{{ $interval['start'] }} - {{ $interval['end'] }} </label>
                                    </div>
                                    @endforeach
                                @else
                                    <mark>
                                        <small class="text-warning display-5">
                                            Selecciona un Veterinario  y una fecha, para visualizar las horas disponibles.
                                        </small>
                                    </mark>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="m-3" id="titleAfteroon"></h4>
                            <div id="hoursAfteroon">
                            @if($intervals)
                            <h4 class="m-3">En la tarde</h4>
                                    @foreach ($intervals['afteroon'] as $key => $interval)
                                    <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="intervalAfteroon{{ $key }}" name="scheduled_time" value="{{ $interval['start'] }}" class="custom-control-input">
                                    <label class="custom-control-label" for="intervalAfteroon{{ $key }}">{{ $interval['start'] }} - {{ $interval['end'] }} </label>
                                    </div>
                                    @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Tipo de cita</label>
            <div class="custom-control custom-radio mt-3 mb-3">
                    <input type="radio" id="type1" name="type" class="custom-control-input"
                    @if(old('type') == 'Consulta') checked @endif value="Consulta">
                    <label class="custom-control-label" for="type1">Consulta</label>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" id="type2" name="type" class="custom-control-input"
                    @if(old('type') == 'Vacunaci??n') checked @endif value="Vacunaci??n">
                    <label class="custom-control-label" for="type2">Vacunaci??n</label>
                </div>
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="type3" name="type" class="custom-control-input"
                    @if(old('type') == 'Operaci??n') checked @endif value="Operaci??n">
                    <label class="custom-control-label" for="type3">Operaci??n</label>
                </div>
                
                
                
            </div>
            <div class="form-group">
                <label for="description">Breve descripci??n</label>
                <textarea  name="description" id="description" type="text" class="form-control" rows="5" placeholder="Descripci??n breve" required>

                </textarea>
            </div>
            



            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </form>
</div>
</div>

@endsection

@section('scripts')

<script src="{{asset ('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}} "></script>

<script src="{{asset('/js/appointments/create.js') }}">


</script>

@endsection


