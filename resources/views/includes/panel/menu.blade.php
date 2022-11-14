<!-- Heading -->
<h6 class="navbar-heading text-muted">
@if(auth()->user()->role =='admin')
    Gestión
@else
    Menú
@endif

</h6>
<ul class="navbar-nav">

    @if(auth()->user()->role =='admin')
    <li class="nav-item  active ">
        <a class="nav-link  active " href="/home">
            <i class="ni ni-tv-2 text-danger"></i>Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{url('/especialidades')}}">
            <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="/veterinarios">
            <i class="fa fa-stethoscope text-info"></i> Veterinarios
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="/clientes">
            <i class="fas fa-users text-default"></i> Clientes
        </a>
    </li>

    
    @elseif(auth()->user()->role =='veterinario')
    <li class="nav-item">
        <a class="nav-link " href="/horario">
            <i class="ni ni-calendar-grid-58 text-primary"></i> Gestiónar Horario
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="">
            <i class="far fa-clock text-info"></i> Mis citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="">
            <i class="far fa-clock text-danger"></i> Mis clientes
        </a>
    </li>

    @else
    <li class="nav-item">
        <a class="nav-link " href="/reservarcitas/create">
            <i class="ni ni-calendar-grid-58 text-primary"></i>Reservar cita
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="/miscitas">
            <i class="far fa-clock text-info"></i> Mis citas
        </a>
    </li>

    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formlogout').submit();">
            <i class="fas fa-door-open text-danger"></i> Cerrar sesión
        </a>
        <form action="{{route('logout')}}" method="POST" style="display: none" id="formlogout">
            @csrf
        </form>
    </li>
</ul>
@if(auth()->user()->role == 'admin')
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-books text-default"></i> Citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño Personal
        </a>
    </li>
</ul>
@endif