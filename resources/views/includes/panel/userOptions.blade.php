<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Bienvenidos</h6>
    </div>
    <a href="/home" class="dropdown-item">
        <i class="ni ni-single-02"></i>
        <span>Mi perfil</span>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formlogout').submit();">
        <i class="ni ni-user-run"></i>
        <span>Cerrar Sesión</span>
        <form action="{{route('logout')}}" method="POST" style="display: none" id="formlogout">
            @csrf
        </form>
    </a>
</div>