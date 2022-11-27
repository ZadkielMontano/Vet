<!DOCTYPE html>
@section('title','Bienvenido')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<title>
    {{config('app.name')}} | @yield('title')
  </title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
    <link href="{{asset('css/estilos.css')}}"rel="stylesheet"/>
    <!-- <link href="{{asset('css/argon-dashboard.css?v=1.1.2')}}" rel="stylesheet" /> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
</head>

<body>
    <header>
        <nav>
        @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}" class="a2">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="a2">Log in</a> &nbsp;&nbsp;

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="a2">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

           
        </nav>
        <section class="textos-header">
            <h1>Veterinaria Huellitas</h1>
            
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">¿QUIÉNES SOMOS?</h2>
            <div class="contenedor-sobre-nosotros">
                <img src=" {{asset('img/wel/21253193_2106.q703.012.F.m004.c5.veterinary clinic cartoon.jpg')}}"class="imagen-about-us2">
               
                <div class="contenido-textos">
                    <h3><span>1</span>Huellitas</h3>
                    <p>Somos el mejor centro Veterinario de la Zona de Ecatepec enfocado a brindar servicios médicos y quirúrgicos aplicando 
                        las técnicas más actuales y equipo de vanguardia para diagnósticos precisos y tratamientos oportunos.</p>
                    <h3><span>2</span>Nuestro equipo de trabajo</h3>
                    <p>Nuestro equipo de trabajo está conformado por veterinarios certificados y profesionales que se actualizan día a día en las diversas técnicas
                    y tratamientos para el cuidado de su mascota, para proporcionarle a cada cliente la atención que se merece.</p>
                </div>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">ANIMALES EN ADOPCIÓN</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="{{asset('img/wel/adop1.png')}}">
                        <div class="hover-galeria">
                            <img src="{{asset('img/wel/icono1.png')}}">
                            
                            
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src=" {{asset('img/wel/adop4.jpg')}}">
                        <div class="hover-galeria">
                            <img src="{{asset('img/wel/icono1.png')}}">
                            
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="{{asset('img/wel/adop3.jpeg')}}">
                        
                        <div class="hover-galeria">
                            <img src="{{asset('img/wel/icono1.png')}}">
                            
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="{{asset('img/wel/adop2.jpg')}}">
                        
                        <div class="hover-galeria">
                            <img src="{{asset('img/wel/icono1.png')}}">
                            
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="{{asset('img/wel/adop9.jpg')}}">
                        
                        <div class="hover-galeria">
                            <img src="{{asset('img/wel/icono1.png')}}">
                            
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="  {{asset('img/wel/adop7.jpeg')}}">

                        <div class="hover-galeria">
                            <img src="{{asset('img/wel/icono1.png')}}">
                            
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="{{asset('img/wel/adop10.jpg')}}">
                        
                        <div class="hover-galeria">
                            <img src="{{asset('img/wel/icono1.png')}}">
                            
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="{{asset('img/wel/adop1.png')}}">
                        
                        <div class="hover-galeria">
                            <img src="{{asset('img/wel/icono1.png')}}">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clientes contenedor">
            <h2 class="titulo">OPINIONES DE CLIENTES</h2>
            <div class="cards">
                <div class="card">
                    <img src="{{asset('img/wel/mujer.png')}}">
                    <div class="contenido-texto-card">
                        <h4 class="pcard">Alexandra Castillo</h4>
                        <p class="pcard">¡Recomendable centro veterinario para tus mascotas, facilidad para agendar la cita de tu mascota!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('img/wel/hombre.png')}}">
                    <div class="contenido-texto-card">
                        <h4 class="pcard">Juan Carlos</h4>
                        <p class="pcard">Increíble atención brindada por los veterinarios y personal de la veterinaria.<br>!Mi peludo lo agradece!</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">ALGUNOS DE NUESTROS SERVICIOS</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                    
                        <img src="{{asset('img/wel/close-up-on-veterinarian-taking-care-of-cat.jpg')}}" class="imagen-about-us3">
                        <h3>Rehabilitación</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, qui?</p>
                    </div>
                    <div class="servicio-ind">
                    
                        <img src="{{asset('img/wel/veterinarian-taking-care-of-pet-dog.jpg')}}" class="imagen-about-us3">
                        <h3>Vacunas</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, qui?</p>
                    </div>
                    <div class="servicio-ind">
                    
                        <img src="{{asset('img/wel/cute-dog-spitz-at-groomer-salon-1-1.jpg')}}" class="imagen-about-us3">
                        <h3>Estética canina</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, qui?</p>
                    </div>
                    
                </div>
            </div>
        </section>
        
    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Número Telefónico</h4>
                <p>5610994565</p>
            </div>
            <div class="content-foo">
                <h4>Correo Oficial</h4>
                <p>veterinaria_huellitas@gmail.com</p>
            </div>
            
        </div>
        <h2 class="titulo-final">VETERINARIA HUELLITAS</h2>
    </footer>
</body>

</html>