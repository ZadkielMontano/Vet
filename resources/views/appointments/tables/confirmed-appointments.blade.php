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
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach($confirmedAppointments as $cita)
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
                        {{$cita->status}}
                    </td>
                    <td>


                    @if($role == 'admin')
                    <a href="{{ url('/miscitas/'.$cita->id) }}" class="btn btn-sm btn-info" title="Ver cita">
                    Ver cita</a>
                    @endif
                    
                    <a href="{{ url('/miscitas/'.$cita->id.'/cancel') }}" class="btn btn-sm btn-danger" title="Cancelar cita">Cancelar cita</a>


                    </td>
                    

                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 