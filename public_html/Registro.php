<?php
?>
<!DOCTYPE html>
    <html lang="en">
    
    <!-- Cargas: I --> 
        
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AeroVida-Nueva cuenta</title>
        <link rel="shortcut icon" href="img/iconologo.png">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand">  
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                
        <link rel="stylesheet" href="css/bootstrap.min.css">                                      
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="css/templatemo-style-registro.css">                
        
        <script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/FunctionsPersonas.js"></script>
        
        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <!-- Cargas: F -->
    
    <!-- Cuerpo: I -->
    
    <body>
        
        <!-- Modal: I -->
        
        <div class="modal fade" id="myModal" role="dialog">             <!-- div1-1 -->
            <div class="modal-dialog modal-sm">                         <!-- div2-1 -->
                <div class="modal-content">                             <!-- div3-1 -->
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="myModalTitle">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="myModalMessage">
                        <p>This is a small modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>  
                </div>                                                  <!-- div3-1 -->
           </div>                                                       <!-- div2-1 -->
        </div>                                                          <!-- div1-1 -->
        
        <!-- Modal: F -->
                    
        <div class="tm-main-content" id="top">                          <!-- div1-2 -->
            
            <div class="tm-top-bar-bg"></div>                           <!-- div1-3 -->  
            
            <div class="tm-top-bar" id="tm-top-bar">                    <!-- div2-3 -->
                
                <!-- Bar de menu: I -->
                
                <div class="container">                                 <!-- div3-2 --> 
                    <div class="row">                                   <!-- div4-3 -->
                        
                        <nav class="navbar navbar-expand-lg narbar-light">
                            
                            <a href="Inicio.php"><img class ="logo" src="img/logodefinitivo.png" alt="" /></a>
                            
                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                                
                                <!-- Menu: I -->
                                
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="Inicio.php#top">Inicio<span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Inicio.php#tm-section-2">Somos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Inicio.php#tm-section-3">Lugares</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Inicio.php#tm-section-4">Contactenos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Ingreso.php">Ingresar</a>
                                    </li>
                                </ul>
                            <!-- Menu: F -->
                                
                            </div>
                            
                        </nav>
                        
                    </div>                                              <!-- div4-3 -->
                </div>                                                  <!-- div3-2 -->
                
                <!-- Bar de menu: F -->
             
            </div>                                                      <!-- div2-3 -->
            
            <!-- Hoja: I -->
            
            <div class="tm-page-wrap mx-auto">                          <!-- div1-4 -->
                
                <!--  Seccion formunario -->
                
                <section class="tm-banner">
                    
                    <div class="tm-container-outer tm-banner-bg">       <!-- div1-5 -->
                        <div class="container">                         <!-- div2-5 -->
                            
                            <!-- Cabezera: I -->

                            <div class="row tm-banner-row tm-banner-row-header">
                                <div class="col-xs-12">
                                    <div class="tm-banner-header">
                                        <h1 class="text-uppercase tm-banner-title">Registro usuario</h1>
                                        <p class="tm-banner-subtitle">Gracias por preferirnos, esperamos que tenga una buena experiencia.</p>      
                                    </div>    
                                </div>                      
                            </div> 
                            
                            <!-- Cabezera: F -->
                            
                            <!-- Formulario: I -->
                            
                            <div class="row tm-banner-row" id="tm-section-search">

                                <form role="form" onsubmit="return false;" id="formPersonas" class="tm-search-form tm-section-pad-2">
                                    
                                    <div class="form-row tm-search-form-row"> 
                                        
                                        <!-- Espacios: I --> 
                                           
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                            <label>Usuario</label>
                                                <input type="text" id="txtUsuario" class="form-control" placeholder="Usuario" />
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <label>Contrasena</label>
                                                <input type="password" id="txtContrasena" class="form-control" placeholder="Contraseña" />
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                            <label>Nombre</label>
                                                <input type="text" id="txtNombre" class="form-control" placeholder="Nombre" />
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1"> 
                                            <label>Primer Apellido</label>
                                                <input type="text" id="txtApellido1" class="form-control" placeholder="Primer apellido" />
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2"> 
                                            <label>Segundo Apellido</label>
                                                <input type="text" id="txtApellido2" class="form-control" placeholder="Segundo apellido" />
                                        </div>   
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">        
                                            <label>Correo electronico</label>
                                                <input type="email" id="txtCorreo" class="form-control" placeholder="Example@email.com" />
                                            <label>Direccion</label>
                                                <input type="text" id="txtDireccion" class="form-control" placeholder="Distrito, Canton, Provincia" /> 
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">   
                                            <label>Telefono Celular</label>
                                                <input type="tel" id="txtTel1" class="form-control"  placeholder="12345678"  pattern="[0-9]{8}">
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">    
                                            <label>Telefono Fijo</label>
                                                <input type="tel" id="txtTel2" name="phone" class="form-control" placeholder="12345678"  pattern="[0-9]{8}">
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2"> 
                                            <label for="inputCheckIn">Genero</label> 
                                            <select class="form-control tm-select" id="txtSexo">
                                                <option value="1" selected>Femenino</option>
                                                <option value="2">Maculino</option>
                                            </select>
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2"> 
                                            <label for="inputCheckIn">Fecha de nacimiento</label> 
                                            <input type="text" class="form-control" id="txtFecha" placeholder="AA-MM-DD">
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">        
                                            <label>Tipo Usuario</label>
                                            <input type="txt" id="txtTip" class="form-control" placeholder="1: Usuario o 2:Admin" />
                                        </div>
                                        
                                        <!-- Espacios: F -->
                                        
                                        <!-- Botones: I -->
                                        
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <input type="hidden" id="typeAction" value="add_personas" />
                                            <input type="hidden" value="" id="idTarea"/>
                                            <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="enviar">Finalizar registro</button>
                                        </div>
                                        
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <button type="reset" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="cancelar">Cancelar</button>
                                        </div>
                                        
                                        <!-- Botones: F -->
                                        
                                       </div>
                                    </div>
                                    
                                </form>
                                
                            </div>                             
                            
                            <!-- Formulario: F -->
                            
                            <div class="tm-banner-overlay"></div>
                            
                        </div>                                          <!-- div2-5 -->                   
                    </div>                                              <!-- div1-5 -->     
                    
                </section>
                
                <!-- Seccion formunario: F -->
                
                <!-- Seccion Info: I -->
                    
                <section class="p-5 tm-container-outer tm-bg-gray">
                    
                    <!-- Contenido: I -->
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">                        
                                <h2 class="text-uppercase mb-4">Tu <strong>seguridad y comodidad</strong> es nuestra prioridad</h2>
                                <p class="mb-4">Estamos en funcion de la seguridad de nuestro clientes y su comodidad tanto en la compra de vuelos como en los viajes. Queremos que la experiencia de nuetros viajeros sea la mas optima. Somos su opcion de confianza.</p>
                                <a href="Inicio.html#tm-section-3" class="text-uppercase btn-primary tm-btn">Explore los lugares</a>                              
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contenido: F -->
                    
                </section>
                
                <!-- Seccion Info: F -->
                
                <!-- mapa: I -->
                
                <div class="mapouter tm-container-outer">
                    <div class="gmap_canvas">
                        <iframe width="960" height="405" id="gmap_canvas" 
                                src="https://maps.google.com/maps?q=ucr%20costa%20rica&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>
                        <!--https://2piratebay.org-->
                    </div>   
                </div>
                
                <!-- mapa: F -->
                
                <!-- Pie de pagina: I -->
                
                <footer class="tm-container-outer">
                    <p class="mb-0">Copyright © <span class="tm-current-year">2020</span> AeroVida
                    .The base was designed by <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Template Mo</a></p>
                </footer>
                
                <!-- Pie de pagina: F -->
                
            </div>                                                      <!-- div1-4 -->
            
            <!-- Hoja: F -->
            
        </div>                                                          <!-- div1-2 -->

    <!-- Documentos JS: I  -->
    <script src="js/jquery-1.11.3.min.js"></script>             
    <script src="js/popper.min.js"></script>                          
    <script src="js/bootstrap.min.js"></script>                 
    <script src="slick/slick.min.js"></script>                  
    <script src="js/jquery.scrollTo.min.js"></script>  
    <script> 

        /* DOM is ready
        ------------------------------------------------*/
        $(function(){

            // Change top navbar on scroll
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 100) {
                    $(".tm-top-bar").addClass("active");
                } else {                    
                 $(".tm-top-bar").removeClass("active");
                }
            });       
        });

    </script> 
    
    <!-- Documentos JS: F  -->

    </body>
    
    <!-- Cuerpo: F -->
    
    </html>
