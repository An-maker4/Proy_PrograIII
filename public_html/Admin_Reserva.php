<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AeroVida-Reserva</title>
        <link rel="shortcut icon" href="img/iconologo.png">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand">  <!-- Google web font "Open Sans" -->
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
        <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="css/templatemo-style-reserva.css">                <!-- Templatemo style -->
        <script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/reservasFunctions.js"></script>
        <script type="text/javascript" src="js/AsientosFunctions.js"></script>
        
        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
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
                            <a href="Inicio.html"><img class ="logo" src="img/logodefinitivo.png" alt="" /></a>
                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="Inicio.html#top">Inicio<span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Inicio.html">Aministracion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Ingreso.html">Ingresar</a>
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
                                    <h1 class="text-uppercase tm-banner-title">Empieza tu reserva</h1>
                                    <p class="tm-banner-subtitle">Estamos para hacer tus vuelos confiables y comodos.</p>     
                                </div>    
                            </div>  <!-- col-xs-12 -->                      
                        </div> <!-- row -->
                        
                        <div class="row tm-banner-row" id="tm-section-search">
                            <form role="form" onsubmit="return false;" id="formReservas" class="tm-search-form tm-section-pad-2">
                                <div class="form-row tm-search-form-row">                                
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                        <label for="inputCity">Vuelo</label>
                                        <input type="text" class="form-control" id="txtVuelo" placeholder="Vuelo a elegir...">
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                        <label for="inputCity">Usuario</label>
                                        <input type="text" class="form-control" id="txtUsuario" placeholder="Reserva del usuario...">       
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                        <label for="inputRoom">Numero de Fila</label>
                                        <input type="text" class="form-control" id="txtFila" placeholder="Numero de Fila" readonly>                                       
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">                                       
                                        <label for="inputAdult">Numero de Asiento</label>     
                                         <input type="text" class="form-control" id="txtAsiento" placeholder="Numero de Fila" readonly>                                       
                                    </div>
                                    </div> <!-- form-row -->
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                        <input type="hidden" id="typeAction" value="add_reservas" />
                                        <input type="hidden" value="" id="idTarea"/>
                                        <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="enviar">Finalizar registro</button>
                                        <button type="reset" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="cancelar">Cancelar</button>     
                                    </div>                                     
                                </div>
                            </form>  
                            <form class="paypal" action="../paypal/payments.php" method="post" id="paypal_form">
                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="no_note" value="1" />
                                <input type="hidden" name="lc" value="US" />
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                <input type="hidden" name="first_name" value="Apellido Uaurio" />
                                <input type="hidden" name="last_name" value="Nombre Usuario" />
                                <input type="hidden" name="payer_email" value="usuario@example.com" />
                                <input type="hidden" name="item_number" value="123456" />
                                <input type="submit" name="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" value="PAGO"/>
                            </form>
                        </div> <!-- row -->
                        <div class="tm-banner-overlay"></div>
                    </div>  <!-- .container -->                   
                </div>     <!-- .tm-container-outer -->                 
            </section>
        </div>
                
        <!--Asientos: I -->    
            
        <section>
            <div class="tm-page-wrap mx-auto tm-asientos">
                <button type="submit" class="btn-asiento1 active" id="1-a">1A</button>
                <button type="submit" class="btn-asiento2 active" id="1-b">1B</button>
                <button type="submit" class="btn-asiento3 active" id="1-c">1C</button>
                <img src="img/airbus-320-seatguru.gif" alt="Asientos" class="img-asiento img-fluid">             
            </div>
        </section>
            
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
                    <div class="tab-content clearfix">

                        <!-- Tab 1 -->
                        <div class="tab-pane fade" id="1a">
                            <div class="tm-recommended-place-wrap">
                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-06.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Nueva York</h3>
                                        <p class="tm-text-highlight">Estados Unidos</p>
                                        <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">$110</p>
                                        <p class="tm-recommended-price-link">Seguir leyendo</p>
                                    </a>                        
                                </div>

                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-07.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Toronto</h3>
                                        <p class="tm-text-highlight">Canada</p>
                                        <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                                    </div>
                                    <div id="preload-hover-img"></div>
                                    <a href="#" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">$120</p>
                                        <p class="tm-recommended-price-link">Seguir leyendo</p>
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
                                        <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">$220</p>
                                        <p class="tm-recommended-price-link">Seguir leyendo</p>
                                    </a>                        
                                </div>

                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-03.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Santiago</h3>
                                        <p class="tm-text-highlight">Chile</p>
                                        <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">$230</p>
                                        <p class="tm-recommended-price-link">Seguir leyendo</p>
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
                                        <p class="tm-text-highlight">Italy</p>
                                        <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">$330</p>
                                        <p class="tm-recommended-price-link">Seguir leyendo</p>
                                    </a>                        
                                </div>

                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-01.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Paris</h3>
                                        <p class="tm-text-highlight">France</p>
                                        <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">$340</p>
                                        <p class="tm-recommended-price-link">Seguir leyendo</p>
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
                                        <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                                    </div>
                                    <a href="#" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">$440</p>
                                        <p class="tm-recommended-price-link">Seguir leyendo</p>
                                    </a>                        
                                </div>

                                <div class="tm-recommended-place">
                                    <img src="img/tm-img-09.jpg" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title">Seul</h3>
                                        <p class="tm-text-highlight">Corea del sur</p>
                                        <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                                    </div>
                                    <div id="preload-hover-img"></div>
                                    <a href="#" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">$450</p>
                                        <p class="tm-recommended-price-link">Seguir leyendo</p>
                                    </a>
                                </div>  
                            </div>

                            <a href="#" class="text-uppercase btn-primary tm-btn mx-auto tm-d-table">Mostrar mas lugares</a>
                        </div> <!-- tab-pane -->
                    </div>
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

</body>
</html>

