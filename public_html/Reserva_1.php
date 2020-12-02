<?php
?>
<!DOCTYPE html>
    <html lang="en">
    
    <!-- Cargas: I --> 
        
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AeroVida-Reserva</title>
        <link rel="shortcut icon" href="img/iconologo.png">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand">  
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">            
        <link rel="stylesheet" href="css/bootstrap.min.css">                                 
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="css/templatemo-style-reserva.css">               
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
                                        <a class="nav-link active" href="Inicio.php">Inicio<span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Inicio.php">Salida</a>
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
                                        <h1 class="text-uppercase tm-banner-title">Empieza tu reserva</h1>
                                        <p class="tm-banner-subtitle">Estamos para hacer tus vuelos confiables y comodos.</p>     
                                    </div>    
                                </div>                      
                            </div> 
                            
                            <!-- Cabezera: F -->
                            
                            <!-- Formulario: I -->
                        
                            <div class="row tm-banner-row" id="tm-section-search">
                                
                                <form role="form" onsubmit="return false;" id="formReservas" class="tm-search-form tm-section-pad-2">
                                    
                                    <div class="form-row tm-search-form-row">                                     
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                            
                                            <!-- Espacios: I -->
                                            
                                            <label for="inputCity">Vuelo</label>
                                            <input type="text" class="form-control" id="txtVuelo" placeholder="Vuelo a elegir..." readonly>
                                            <label for="inputCity">Usuario</label>
                                            <input type="text" class="form-control" id="txtUsuario" placeholder="Reserva del usuario...">       
                                            <label for="inputRoom">Numero de la Fila</label>
                                            <input type="text" class="form-control" id="txtFila" placeholder="Numero de fila" readonly>                                                                       
                                            <label for="inputAdult">Letra del Asiento</label>     
                                            <input type="text" class="form-control" id="txtAsiento" placeholder="Letra del asiento" readonly>  
                                             
                                        </div>
                                        
                                            <!-- Espacios: F --> 
                                            
                                            <!-- Botones: I -->
                                            
                                            <div class="form-group tm-form-group tm-form-group-pad tm-form-group-4">
                                                <input type="hidden" id="typeAction" value="add_reservas" />
                                                <input type="hidden" value="" id="idTarea"/>
                                                <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="enviar">Finalizar registro</button>
                                            </div>  
  
                                            <div class="form-group tm-form-group tm-form-group-pad tm-form-group-4">
                                                <button type="reset" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="cancelar">Cancelar</button>     
                                            </div>     
                                            
                                            <!-- Botones: F --> 
                                    </div>
                                    
                                </form>
                                
                            </div>                             
                            
                            <!-- Formulario: F -->
                            
                            <div class="tm-banner-overlay"></div>
                            
                        </div>                                          <!-- div2-5 -->                   
                    </div>                                              <!-- div1-5 -->     
                    
            </section>
                
        </div>
              
        <!-- PayPal: I -->  
        
        <section>
            
            <div class="tm-page-wrap mx-auto tm-asientos ">
            
                <form class="paypal" action="../paypal/payments.php" method="post" id="paypal_form">
                    
                    <!--Espacios: I-->
                    
                    <input type="hidden" name="cmd" value="_xclick" />
                    <input type="hidden" name="no_note" value="1" />
                    <input type="hidden" name="lc" value="US" />
                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                    <input type="hidden" name="first_name" value="Apellido Uaurio" />
                    <input type="hidden" name="last_name" value="Nombre Usuario" />
                    <input type="hidden" name="payer_email" value="usuario@example.com" />
                    <input type="hidden" name="item_number" value="123456" />
                    <input type="hidden" name="precio_item" id="precio_item" />
                    <input type="hidden" name="vuelo_item" id="vuelo_item" />
                    <input type="hidden" name="bool_item" id="bool_item" value = "true" />
                    <input type="submit" name="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" value="HACER PAGO DEL VUELO"/>
                    
                    <!--Espacios: F-->
            
                </form>
            
            </div>
        
        </section>
        
        <!-- PayPal: F -->
        
        <!--Asientos: I -->    
            
        <section>
            <div class="tm-page-wrap mx-auto tm-asientos ">
                <div style="padding: 50px;">
                <p1>AVION</p1>
                    <table>
                        <tr>
                            <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                <input type="text" class="form-control" id="txtAvion" placeholder="Avion del Vuelo elegido..." readonly>
                            </div>
                        </tr>
                        <tr id="parte1">
                            <!-- asientos-->
                        </tr>
                    </table>
                    <img src="img/airbus-320-seatguru.gif" alt="Asientos" class="img-asiento img-fluid"> 
                </div>
            </div>
        </section>
        
        <!--Asientos: I -->  
            
        <!--Recommended-parte1: I-->
        
        <div class="tm-page-wrap mx-auto">
            <div class="tm-container-outer" id="tm-section-3">
                
                    <ul class="nav nav-pills tm-tabs-links">
                        <li class="tm-tab-link-li">
                            <a href="#1a" data-toggle="tab" class="tm-tab-link">
                                <img src="img/north-america.png" alt="Image" class="img-fluid">
                                Norte America
                            </a>
                        </li>
                        <li class="tm-tab-link-li">
                            <a href="#2a" data-toggle="tab" class="tm-tab-link">
                                <img src="img/south-america.png" alt="Image" class="img-fluid">
                                Sur America
                            </a>
                        </li>
                        <li class="tm-tab-link-li">
                            <a href="#3a" data-toggle="tab" class="tm-tab-link">
                                <img src="img/europe.png" alt="Image" class="img-fluid">
                                Europa
                            </a>
                        </li>
                        <li class="tm-tab-link-li">
                            <a href="#4a" data-toggle="tab" class="tm-tab-link active"><!-- Current Active Tab -->
                                <img src="img/asia.png" alt="Image" class="img-fluid">
                                Asia
                            </a>
                        </li>
                    </ul>
            
        <!--Recommended-parte1: F-->
        
        <!--Recommended-parte2: I-->
        
                    <div class="tab-content clearfix">
                        
                        <!-- Tab 1 -->
                        <div class="tab-pane fade" id="1a">
                            <div class="tm-recommended-place-wrap">
                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-06.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Nueva York</h3>
                                        <p class="tm-text-highlight">Estados Unidos</p>
                                        <p class="tm-text-gray">Vuelo de San Jose a Nueva York para 2020-12-22 a las 04:35:00 su duracion de llega es de 01:00:00.</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box" id="precio1">
                                        <p class="tm-recommended-price">$110</p>
                                        <p class="tm-recommended-price-link">COMPRAR</p>
                                    </a>                        
                                </div>

                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-07.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Toronto</h3>
                                        <p class="tm-text-highlight">Canada</p>
                                        <p class="tm-text-gray">Vuelo de San Jose a Toronto para 2021-03-01 a la 01:00:00 su duracion de llega es de 04:20:00.</p>   
                                    </div>
                                    <div id="preload-hover-img"></div>
                                    <a href="#" class="tm-recommended-price-box" id="precio2">
                                        <p class="tm-recommended-price">$120</p>
                                        <p class="tm-recommended-price-link">COMPRAR</p>
                                    </a>
                                </div>      
                            </div>                        

                            <a href="#" class="text-uppercase btn-primary tm-btn mx-auto tm-d-table">Show More Places</a>
                        </div> <!-- tab-pane -->

                        <!-- Tab 2 -->
                        <div class="tab-pane fade" id="2a">

                            <div class="tm-recommended-place-wrap">
                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-05.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Santa Martha</h3>
                                        <p class="tm-text-highlight">Colombia</p>
                                        <p class="tm-text-gray">Vuelo de San Jose a Santa Martha para 2021-01-24 a las 15:30:00 su duracion de llega es de 03:25:00.</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box" id="precio3">
                                        <p class="tm-recommended-price">$220</p>
                                        <p class="tm-recommended-price-link">COMPRAR</p>
                                    </a>                        
                                </div>

                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-03.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Santiago</h3>
                                        <p class="tm-text-highlight">Chile</p>
                                        <p class="tm-text-gray">Vuelo de San Jose a Santa Martha para 2021-02-15a las 17:25:00 su duracion de llega es de 04:25:00.</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box" id="precio4">
                                        <p class="tm-recommended-price">$230</p>
                                        <p class="tm-recommended-price-link">COMPRAR</p>
                                    </a>
                                </div>  
                            </div>

                            <a href="#" class="text-uppercase btn-primary tm-btn mx-auto tm-d-table">Show More Places</a>
                        </div> <!-- tab-pane --> 

                        <!-- Tab 3 -->     
                        <div class="tab-pane fade" id="3a">

                            <div class="tm-recommended-place-wrap">
                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-02.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Venecia</h3>
                                        <p class="tm-text-highlight">Italia</p>
                                        <p class="tm-text-gray">Vuelo de San Jose a Venecia para 2021-02-24 a las 23:05:00 su duracion de llega es de 04:00:00.</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box" id="precio5">
                                        <p class="tm-recommended-price">$330</p>
                                        <p class="tm-recommended-price-link">COMPRAR</p>
                                    </a>                        
                                </div>

                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-01.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Paris</h3>
                                        <p class="tm-text-highlight">Francia</p>
                                        <p class="tm-text-gray">Vuelo de San Jose a Paris para 2021-03-14 a las 14:17:00 su duracion de llega es de 03:30:00.</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box" id="precio6">
                                        <p class="tm-recommended-price">$340</p>
                                        <p class="tm-recommended-price-link">COMPRAR</p>
                                    </a>
                                </div> 
                            </div>

                            <a href="#" class="text-uppercase btn-primary tm-btn mx-auto tm-d-table">Show More Places</a>
                        </div> <!-- tab-pane -->

                        <!-- Tab 4-->
                        <div class="tab-pane fade show active" id="4a">
                        <!-- Current Active Tab WITH "show active" classes in DIV tag -->
                            <div class="tm-recommended-place-wrap">
                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-08.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Singapore</h3>
                                        <p class="tm-text-highlight">China</p>
                                        <p class="tm-text-gray">Vuelo de San Jose a Sigapore para 2021-01-05 a las 17:19:00 su duracion de llega es de 	05:40:00.</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box" id="precio7">
                                        <p class="tm-recommended-price">$440</p>
                                        <p class="tm-recommended-price-link">COMPRAR</p>
                                    </a>                        
                                </div>

                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-09.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Seul</h3>
                                        <p class="tm-text-highlight">Corea del sur</p>
                                        <p class="tm-text-gray">Vuelo de San Jose a Seul para 2021-05-05 a las 02:35:00 su duracion de llega es de 06:17:00.</p>   
                                    </div>
                                    <div id="preload-hover-img"></div>
                                    <a href="#" class="tm-recommended-price-box" id="precio8">
                                        <p class="tm-recommended-price">$450</p>
                                        <p class="tm-recommended-price-link">COMPRAR</p>
                                    </a>
                                </div>  
                            </div>
                        
            <!--Recommended-parte2: F--> 
            
            <!--Recommended-parte3: I-->

                        <a href="Inicio.php#tm-section-3" class="text-uppercase btn-primary tm-btn mx-auto tm-d-table">Mostrar mas lugares</a>
                        
            <!--Recommended-parte3: I-->
            
                    </div> 
                </div>
            </div>
            
            <!-- Pie de pagina: I -->
                
                <footer class="tm-container-outer">
                    <p class="mb-0">Copyright © <span class="tm-current-year">2020</span> AeroVida
                    .The base was designed by <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Template Mo</a></p>
                </footer>
                
            <!-- Pie de pagina: F -->
                
            </div>                                                      <!-- div1-4 -->
            
            <!-- Hoja: F -->
            
        </div>

    <!-- Documentos JS: I  -->
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
    <script type="text/javascript" src="js/FunctionsAsientos.js"></script>
    <script type="text/javascript" src="js/FunctionsReservas.js"></script>
    <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        
    <!-- Documentos JS: F  -->

    </body>
    
    <!-- Cuerpo: F -->
    
    </html>
