<!-- Heading -->
<h6 class="navbar-heading text-muted">
@if(auth()->user()->role =='admin')
    Gestión
@else
    Menú
@endif

</h6>
<ul class="navbar-nav">

    @include('includes.panel.menu.'.auth()->user()->role)

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
<h6 class="navbar-heading text-muted">CITAS</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/reportes/citas/line')}}">
            <i class="ni ni-chart-bar-32 text-default"></i> Citas registradas 
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/reportes/vets/column')}}">
            <i class="ni ni-chart-bar-32 text-warning"></i> Citas atendidas / Citas canceladas
        </a>
    </li>
</ul>
@endif