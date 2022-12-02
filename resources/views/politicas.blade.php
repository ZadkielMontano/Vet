<!DOCTYPE html>
@section('title','Política')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<title>
    {{config('app.name')}} | @yield('title')
</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
    <link href="{{asset('css/estilos.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
</head>

<body>


    <header>
        <nav>




        </nav>
        <section class="textos-header">
            <h1>Política de Privacidad</h1>

        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            
            
            

    
            
                
                <div class="contenido-textos1">
                    <br><br>
                    <h3>Veterinaria Huellitas</h3><br>
                    <p> Veterinaria Huellitas informa seguidamente de su política de privacidad aplicada a los datos personales. De esta manera, todos los datos personales que tenga bajo su responsabilidad serán tratados de acuerdo con la Ley 15/1999,
                        13 de diciembre, de Protección de Datos de Carácter Personal y se guardarán las debidas medidas de seguridad y confidencialidad de los mismos.</p>
                </div>
            <br><br>    
            

            <div class="contenedor-sobre-nosotros">
                <div class="contenido-textos">
                    <br><br>
                    <h3><span>1</span>Recogida de datos</h3>
                    <p>La recogida de datos de carácter personal se realizará única y exclusivamente a través de los formularios publicados en la web 
                        y de los correos electrónicos que los usuarios puedan remitir a­­­­­­­­­­­­­­­­­ nombre de la empresa que serán incluidos en un fichero automatizado.<br>                        
                        Veterinaria Huellitas conservará sus datos una vez finalizada la relación con el usuario para cumplir las obligaciones legales necesarias. 
                        </p>
                </div>
                <img src=" {{asset('img/wel/21253193_2106.q703.012.F.m004.c5.veterinary clinic cartoon.jpg')}}"class="imagen-about-us4">
            </div>

            <div class="contenedor-sobre-nosotros">
                <img src=" {{asset('img/wel/21253193_2106.q703.012.F.m004.c5.veterinary clinic cartoon.jpg')}}"class="imagen-about-us4">
                <div class="contenido-textos">
                    <br><br>
                    <h3><span>2</span>Seguridad de la información</h3>
                    <p> Veterinaria Huellitas ha desarrollado todos los sistemas y medidas técnicas y organizativas a su alcance,
                        previstas en la normativa de protección de datos de carácter personal para evitar la pérdida, mal uso, 
                        alteración, acceso no autorizado y sustracción de los datos de carácter personal facilitados por el usuario o visitante</p>
                </div>
            </div>

            <div class="contenedor-sobre-nosotros">
                <div class="contenido-textos">
                    <br><br>
                    <h3><span>3</span>Confidencialidad</h3>
                    <p>Las comunicaciones privadas que pudieran darse entre el personal de nombre de la empresa y los usuarios o visitantes
                    serán consideradas como confidenciales. El acceso a esta información está restringido mediante herramientas tecnológicas 
                    y mediante estrictos controles internos.</p>
                </div>
                <img src=" {{asset('img/wel/21253193_2106.q703.012.F.m004.c5.veterinary clinic cartoon.jpg')}}"class="imagen-about-us4">
            </div>

            <div class="contenedor-sobre-nosotros">
                <img src=" {{asset('img/wel/21253193_2106.q703.012.F.m004.c5.veterinary clinic cartoon.jpg')}}"class="imagen-about-us4">
                <div class="contenido-textos">
                    <br><br>
                    <h3><span>4</span>Enlaces con otros sitios web</h3>
                    <p>El presente sitio web puede contener enlaces o links con otros sitios. Se informa que 
                        Veterinaria Huellitas no dispone de control alguno ni ostenta responsabilidad alguna sobre las políticas o medidas de protección de datos de otros sitios web.</p>
                </div>
            </div>  

            <div class="contenedor-sobre-nosotros">
                <div class="contenido-textos">
                    <br><br>
                    <h3><span>5</span>Derechos de los usuarios</h3>
                    <p>El usuario podrá ejercitar, respecto a los datos recabados en la forma prevista, los derechos reconocidos por la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal y en particular los derechos de acceso, 
                        rectificación o cancelación de datos y oposición, si resultase pertinente, así como el de revocación del consentimiento para la cesión de sus datos.</p>
                </div>
                <img src=" {{asset('img/wel/21253193_2106.q703.012.F.m004.c5.veterinary clinic cartoon.jpg')}}"class="imagen-about-us4">
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