<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <title>Centro de Control INIAP</title>
        
        <!-- Loading Bootstrap -->
        <link href="{{ asset('landing/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Loading Template CSS -->
        <link href="{{ asset('landing/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('landing/css/animate.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('landing/css/pe-icon-7-stroke.css')}}">
        <link href="{{ asset('landing/css/style-magnific-popup.css')}}" rel="stylesheet">
        <!-- Awsome Fonts -->
        <link rel="stylesheet" href="{{ asset('landing/css/all.min.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
        <!-- Font Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        
    </head>
    <body>
        <!--begin header -->
        <header class="header">
            <!--begin navbar-fixed-top -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <!--begin container -->
                <div class="container">
                    <!--begin navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <!--begin logo -->
                        <a class="navbar-brand" href="/login">INIAP</a>
                        <!--end logo -->
                        <!--begin navbar-toggler -->
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                        </button>
                        <!--end navbar-toggler -->
                        <!--begin navbar-collapse -->
                        <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                            
                            <!--begin navbar-nav -->
                            <ul class="navbar-nav ml-auto">
                                <li><a href="#home">Inicio</a></li>
                                <li><a href="#about">Sobre Nosotros</a></li>
                                <li><a href="#theprogram">Nuestro Programa</a></li>
                                <li><a href="#contact">Contacto</a></li>
                                {{-- <li class="discover-link"><a href="#contact" class="discover-btn">Get In Touch</a></li> --}}
                            </ul>
                            <!--end navbar-nav -->
                        </div>
                        <!--end navbar-collapse -->
                        
                        <ul class="navbar-nav ml-auto">
                            @guest
                            <li >
                                <li class="menu-has-children"><a href="/login">Inicia Sesión</a>
                            </li>
                            @else
                            @role('admin|super-admin')
                            <li><a href="{{ route('admin.index') }}">Administrador</a></li>
                            @endrole
                            @role('coordinador')
                            <li><a href="{{ route('coordinador.index') }}">Coordinador</a></li>
                            
                            @endrole
                            @role('operador')
                            <li><a href="{{ route('operador.index') }}">Operador</a></li>
                            @endrole
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        
                        @endif
                    </ul>
                </nav>
                <!--end navbar -->
                
            </div>
            <!--end container -->
            
        </nav>
        <!--end navbar-fixed-top -->
        
    </header>
    <!--end header -->
    {{--     <!--begin home section -->
    <section class="home-section" id="home">
        <div class="home-section-overlay"></div>
        
    </section> --}}
    <!--end home section -->
    <!--begin section-white -->
    <section class="section-white" id="home">
        
        <!--begin services-wrapper -->
        <div class="services-wrapper">
            <!--begin container -->
            <div class="container">
                <!--begin row -->
                <div class="row">
                    <!--begin col-md-12-->
                    <div class="col-md-12 text-center padding-bottom-10">
                        <h2 class="section-title">Estación Experimental Litoral Sur</h2>
                        <p class="section-subtitle">El Instituto Nacional de Investigaciones Agropecuarias (INIAP), es una entidad adscrita al ministerio rector de la política agraria, cuyos fines primordiales son: impulsar la investigación científica, la generación, innovación, validación, y difusión de tecnologías en el sector agropecuario y de producción forestal, en el ámbito de sus competencias.</p>
                    </div>
                    <!--end col-md-12 -->
                </div>
                <!--end row -->
                <!--begin row -->
                <div class="row">
                    <!--begin col-md-3 -->
                    <div class="col-md-3">
                        <div class="main-services">
                            <i class="pe-7s-science"></i>
                            <h4>Biotecnología</h4>
                            <p>Servicios de cultivo de tejidos y biología molecular para responder a la demanda de producción de semillas meristemática.</p>
                            
                        </div>
                    </div>
                    <!--end col-md-3 -->
                    <!--begin col-md-3 -->
                    <div class="col-md-3">
                        <div class="main-services">
                            <i class="pe-7s-medal"></i>
                            <h4>Producción</h4>
                            <p>Las semillas que se producen en cada una de las Estaciones Experimentales son de plantas de clones seleccionados.</p>
                            
                        </div>
                    </div>
                    <!--end col-md-3 -->
                    <!--begin col-md-3 -->
                    <div class="col-md-3">
                        <div class="main-services">
                            <i class="pe-7s-shield"></i>
                            <h4>Protección Vegetal</h4>
                            <p>Tiene como objetivo principal la sanidad de los cultivos a través de la investigación e innovación ecológica.</p>
                            
                        </div>
                    </div>
                    <!--end col-md-3 -->                                       

                    <!--begin col-md-3 -->
                    <div class="col-md-3">
                        <div class="main-services">
                            <i class="pe-7s-display1"></i>
                            <h4>Planificación</h4>
                            <p>El Departamento ejecuta actividades en tres ámbitos: Planificación, Economía Agrícola y Convenios.</p>
                            
                        </div>
                    </div>
                    <!--end col-md-3 -->
                    
                </div>
                <!--end row -->
                
            </div>
            <!--end container -->
        </div>
        <!--end services-wrapper -->
    </section>
    <!--end section-white -->
    <!--begin section-grey -->
    <section class="section-grey no-padding" id="about">
        
        <!--begin container-->
        <div class="container-fluid px-0">
            <!--begin row-->
            <div class="row no-gutters">
                
                <!--begin col-md-6-->
                <div class="col-md-6 margin-top-10">
                    <img src="{{ asset('img/iniap_arroz.jpg') }}" class="width-100" alt="Happy">
                </div>
                <!--end col-sm-6-->
                
                <!--begin col-md-6-->
                <div class="col-md-6 margin-top-10">
                    <!--begin small-column-inside-->
                    <div class="small-col-inside">
                        <h3>Instituto Nacional de Investigaciones Agropecuarias sobre los servicios</h3>
                        <p>El INIAP trabaja en el desarrollo de nuevas tecnologías, además de ofertar las herramientas para la implementación de nuevas tecnologías en el manejo integrado del cultivo de arroz.</p>
                        
                        <ul class="benefits">
                            <li><i class="fas fa-check"></i> Servicios de laboratorio.</li>
                            <li><i class="fas fa-check"></i> Producción de semillas y material vegetal.</li>
                            <li><i class="fas fa-check"></i> Servicios especializados.</li>
                            <li><i class="fas fa-check"></i> Programas y Departamentos.</li>
                            
                        </ul>
                        <!--begin row-->
                        
                        <!--end row-->
                        
                        <a href="{{ asset('img/PEIINIAP2018-2022.pdf') }}" target="_blank"class="btn-dashed small scrool">Rendición de cuentas 2020</a>
                    </div>
                    <!--end small-column-inside-->
                </div>
                <!--end col-md-6-->
                
            </div>
            <!--end row-->
            
        </div>
        <!--end container-->
        
    </section>
    <!--end section-grey -->
    <!--begin section-white -->
    <section class="section-white" id="theprogram">
        
        <!--begin container-->
        <div class="container">
            <!--begin row-->
            <div class="row">
                
                <!--begin col-md-6-->
                <div class="col-md-6">
                    <h3>Programa Arroz Litoral Sur</h3>
                    <p>Preparación de semilleros, trasplante, control químico de malezas, fertilización de base y en cobertura, controles fitosanitarios y cosecha de ensayos experimentales a nivel de Estación y regionales. Multiplicación de semilla genética y básica de líneas promisorias y variedades comerciales.</p>
                    <p>Elaboración y ejecución de planes de cruzamientos para la generación de nuevas líneas segregantes. Evaluación en invernadero y campo de las principales plagas y enfermedades que ocasionan daños económicos al cultivo de arroz. Elaboración de planes operativos e informes anuales. Procesamiento de muestras en Laboratorio de Calidad Molinera para determinar índice de pilado, centro blanco y longitud de grano.</p>                    
                </div>
                <!--end col-sm-6-->
                
                <!--begin col-md-6-->
                <div class="col-md-6">
                    <h6>Producción de arroz por toneladas métrica en las provincias arroceras más importantes del Ecuador durante el período 2018 al 2020</h6>
                    <!--begin progress-list -->
                    <ul class="progress-list">
                        
                        <li>
                            <p>Manabi <span>5% (60.851,14)</span></p>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        
                        <li>
                            <p>Los Ríos <span>34,43% (397.703,00)</p>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: 34%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        
                        <li>
                            <p>Loja <span>1,97% (22.798,13)</p>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: 2%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        
                        <li>
                            <p>Guayas <span>57,35% (1´154.869,65)</p>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: 57%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        
                        <li>
                            <p>El Oro <span>0,96% (11.162,23)</p>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: 1%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                    </ul>
                    <!--end progress-list -->
                    
                </div>
                <!--end col-md-6-->
                
            </div>
            <!--end row-->
            
        </div>
        <!--end container-->
        
    </section>
    <!--end section-white -->


    <!--end faq section -->
    
    <!--begin contact section -->
    <section class="section-white" id="contact">
        
        <!--begin container-->
        <div class="container">
            <!--begin row-->
            <div class="row">
                
                <!--begin col-md-6-->
                <div class="col-md-6">
                    <h4>Contactanos</h4>
                    <!--begin contact-form-wrapper-->
                    <div class="contact-form-wrapper wow bounceIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;">
                        <!--begin form-->
                        <div>
                            
                            <!--begin success message -->
                            <p class="contact_success_box" style="display:none;">We received your message and youll hear from us soon. Thank You!</p>
                            <!--end success message -->
                            
                            <!--begin contact form -->
                            <form id="contact-form" class="contact-form contact" action="php/contact.php" method="post">
                                
                                <input class="contact-input white-input" required="" name="contact_names" placeholder="Your Name*" type="text">
                                
                                <input class="contact-input white-input" required="" name="contact_phone" placeholder="Phone Number*" type="text">
                                
                                <input class="contact-input white-input" required="" name="contact_email" placeholder="Email Adress*" type="email">
                                
                                <textarea class="contact-input white-input" rows="2" cols="20" name="contact_message" placeholder="Your Message..."></textarea>
                                <input value="Enviar" class="contact-submit" type="submit">
                                
                            </form>
                            <!--end contact form -->
                        </div>
                        <!--end form-->
                    </div>
                    <!--end contact-form-wrapper-->
                </div>
                <!--end col-md-6-->
                
                <!--begin col-md-6 -->
                <div class="col-md-6">
                    <h4>Ubícanos en :</h4>
                    <iframe class="contact-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d996.6854278631436!2d-79.64392457086089!3d-2.2502207598265795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d44a3f45f2efd%3A0x475f35264b0bd875!2sEstacion%20Experimental%20Litoral%20Sur%20%22Dr%20Enrique%20Ampuero%22%20-%20INIAP!5e0!3m2!1ses!2sec!4v1621152313420!5m2!1ses!2sec" width="600" height="250" style="border:0" allowfullscreen="" loading="lazy"></iframe>
                    <h6>Contactos</h6>
                    <p class="contact-details"><i class="fas fa-map-marker-alt"></i>Km 26 Vía Durán-Tambo, al Oeste de Guayaquil, Cantón Yaguachi, Guayas</p>
                    <p class="contact-details"><i class="fas fa-envelope"></i> <a href="mailto:litoralsur@iniap.gob.ec">litoralsur@iniap.gob.ec</a></p>
                    <p class="contact-details"><i class="fa fa-phone"></i>593 4 2724-260 / 593 4 2724-261 / 593 4 2724-262</p>
                </div>
                <!--end col-md-6 -->
            </div>
            <!--end row-->
            
        </div>
        <!--end container-->
        
    </section>
    <!--end section-white -->
    <!--begin footer -->
    <div class="footer">
        
        <!--begin container -->
        <div class="container">
            
            <!--begin row -->
            <div class="row">
                
                
                <!--begin col-md-12 -->
                <div class="col-md-12 text-center">
                    
                    <p>Copyright © 2021 <span class="template-name">INIAP</span>. Designed by <a href="http://www.ug.edu.ec" target="_blank">Universidad de Guayaquil</a></p>
                    
                </div>
                <!--end col-md-12 -->
                
            </div>
            <!--end row -->
            
        </div>
        <!--end container -->
        
    </div>
    <!--end footer -->
    <!-- Load JS here for greater good =============================-->
    <script src="{{ asset('landing/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('landing/js/jquery.scrollTo-min.js')}}"></script>
    <script src="{{ asset('landing/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('landing/js/jquery.nav.js')}}"></script>
    <script src="{{ asset('landing/js/wow.js')}}"></script>
    <script src="{{ asset('landing/js/plugins.js')}}"></script>
    <script src="{{ asset('landing/js/custom.js')}}"></script>
</body>
</html>