<?php

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AeroVida-Ingreso</title>
        <link rel="shortcut icon" href="img/iconologo.png">
<!-- 
Journey Template 
http://www.templatemo.com/tm-511-journey
-->
    <!-- load stylesheets -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand">  <!-- Google web font "Open Sans" -->
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
        <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="css/templatemo-style-Ingreso.css">                                   <!-- Templatemo style -->

        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        
      </head>
      <body>
          
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
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
               </div>
           </div>
       </div>
          
        <div class="tm-main-content" id="top">
            <div class="tm-top-bar-bg"></div>    
            <div class="tm-top-bar" id="tm-top-bar">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-expand-lg narbar-light">
                            <a href="Inicio.php"><img class ="logo" src="img/logodefinitivo.png" alt="" /></a>
                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
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
                                        <a class="nav-link" href="#">Ingresar</a>
                                    </li>
                                </ul>
                            </div>                            
                        </nav>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- .tm-top-bar -->

            <div class="tm-page-wrap mx-auto">
                <section class="tm-banner">
                    <div class="tm-container-outer tm-banner-bg">
                        <div class="container">

                            <div class="row tm-banner-row tm-banner-row-header">
                                <div class="col-xs-12">
                                    <div class="tm-banner-header">
                                        <h1 class="text-uppercase tm-banner-title">Registro usuario</h1>
                                        <p class="tm-banner-subtitle">Gracias por preferirnos, esperamos que tenga una buena experiencia.</p>
                                        <a href="javascript:void(0)" class="tm-down-arrow-link"><i class="fa fa-2x fa-angle-down tm-down-arrow"></i></a>       
                                    </div>    
                                </div>  <!-- col-xs-12 -->                      
                            </div> <!-- row -->
                            <div class="row tm-banner-row" id="tm-section-search">

                                <form role="form" onsubmit="return false;" id="formPersonas" class="tm-search-form tm-section-pad-2">
                                    <div class="form-row tm-search-form-row">                                
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                            <label>Usuario</label>
                                                <input type="text" id="txtUsuario" class="form-control" placeholder="Usuario" />
                                            <label>Contrasena</label>
                                                <input type="password" id="txtContrasena" class="form-control" placeholder="Contraseña" />
                                            <input type="hidden" id="typeAction" value="into_personas" />
                                            <input type="hidden" value="" id="idTarea"/>
                                            <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="ingreso">Ingreso</button>
                                            <a href="Registro.php" class="text-uppercase btn-primary tm-btn">Nueva cuenta</a>
                                        </div>
                                    </div>                              
                                </form>                             

                            </div> <!-- row -->
                            <div class="tm-banner-overlay"></div>
                        </div>  <!-- .container -->                   
                    </div>     <!-- .tm-container-outer -->                 
                </section>

                <section class="p-5 tm-container-outer tm-bg-gray">            
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">                        
                                <h2 class="text-uppercase mb-4">Tu <strong>seguridad y comodidad</strong> es nuestra prioridad</h2>
                                <p class="mb-4">Estamos en funcion de la seguridad de nuestro clientes y su comodidad tanto en la compra de vuelos como en los viajes. Queremos que la experiencia de nuetros viajeros sea la mas optima. Somos su opcion de confianza.</p>
                                <a href="Inicio.html#tm-section-3" class="text-uppercase btn-primary tm-btn">Explore los lugares</a>                              
                            </div>
                        </div>
                    </div>            
                </section>

                <footer class="tm-container-outer">
                    <p class="mb-0">Copyright © <span class="tm-current-year">2020</span> AeroVida

                    .The base was designed by <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Template Mo</a></p>
                </footer>
            </div>
        </div> <!-- .main-content -->

    <!-- load JS files -->
    <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
    <script src="js/popper.min.js"></script>                    <!-- https://popper.js.org/ -->       
    <script src="js/bootstrap.min.js"></script>                 <!-- https://getbootstrap.com/ -->
    <script src="slick/slick.min.js"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
    <script src="js/jquery.scrollTo.min.js"></script>           <!-- https://github.com/flesler/jquery.scrollTo -->          
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
    <script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/ingresosFunctions.js"></script>
    <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
</body>
</html>

