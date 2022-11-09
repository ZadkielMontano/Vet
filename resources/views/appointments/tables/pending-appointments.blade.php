<div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Descripción</th>
                    <th scope="col">Especialidad</th>
                    
                    @if($role == 'cliente')
                    <th scope="col">Veterinario</th>
                    @elseif($role == 'veterinario')
                    <th scope="col">Cliente</th>
                    @endif

                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach($pendigAppointments as $cita)
                <tr>
                    <th scope="row">
                        {{$cita->description}}
                    </th>
                    <td>
                        {{$cita->specialty->name}}
                    </td>
                    
                    @if($role == 'cliente')
                    <td>
                        {{$cita->veterinario->name}}
                    </td>
                    @elseif($role == 'veterinario')
                    <td>
                        {{$cita->client->name}}
                    </td>
                    @endif

                    <td>
                        {{$cita->scheduled_date}}
                    </td>
                    <td>
                        {{$cita->scheduled_Time_12}}
                    </td>
                    <td>
                        {{$cita->type}}
                    </td>

                    <td>

                    @if($role == 'admin')
                    <a href="{{ url('/miscitas/'.$cita->id) }}" class="btn btn-sm btn-info" title="Ver cita">
                    <i class="ni fas fa-eye"></i>    
                    </a>
                    @endif

                    @if($role == 'veterinario' || $role == 'admin')
                            <form action="{{url('/miscitas/'.$cita->id.'/confirm')}}" method="POST"
                            class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success" title="Confirmar cita">
                                <i class="ni ni-check-bold"></i>
                                </button>
                            </form>
                        @endif

                        <form action="{{url('/miscitas/'.$cita->id.'/cancel')}}" method="POST"
                        class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" title="Cancelar cita">
                            <i class="ni ni-fat-remove"></i>
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 