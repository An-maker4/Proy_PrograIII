<?php
?>
<!DOCTYPE html>
    <html lang="en">
    
    <!-- Cargas: I --> 
        
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AeroVida-Admin Avion</title>
        <link rel="shortcut icon" href="img/iconologo.png">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand">  
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                
        <link rel="stylesheet" href="css/bootstrap.min.css">                                      
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="css/templatemo-style-avion-admin.css">                
        
        <script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/tipo_avionesFunctions.js"></script>
        
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
                                        <a class="nav-link" href="Inicio.php">Aministracion</a>
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
                                        <h1 class="text-uppercase tm-banner-title">Registro de Aviones</h1> 
                                        <p class="tm-banner-subtitle">Nuestra recompensa se encuentra en el esfuerzo.</p>
                                    </div>    
                                </div>   
                            </div> 
                            
                            <!-- Cabezera: F -->
                            
                            <!-- Formulario: I -->
                            
                            <div class="row tm-banner-row" id="tm-section-search">
                                
                                <form role="form" onsubmit="return false;" id="formAvion" class="tm-search-form tm-section-pad-2">
                                    
                                    <div class="form-row tm-search-form-row">   
                                        
                                         <!-- Espacios: I --> 
                                         
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                 
                                            <label>ID Avion</label>
                                                <input type="text" id="txtAvion" class="form-control" placeholder="Numero de la avion" />
                                            <label>Año de fabricacion</label>
                                                <input type="text" id="txtFecha" class="form-control" placeholder="Año" />
                                            <label>Modelo</label>
                                                <input type="text" id="txtModelo" class="form-control" placeholder="Modelo" />
                                            <label>Marca</label>
                                                <input type="text" id="txtMarca" class="form-control" placeholder="Marca" />
                                            <label for="inputRoom">Numero de Fila</label>
                                                <input type="text" id="txtFila" class="form-control" placeholder="Filas totales" />
                                            <label for="inputAdult">Numero de Asiento</label>
                                                <input type="text" id="txtAsiento" class="form-control" placeholder="Asientos por fila" />
                                            
                                        </div>
                                         
                                            <!-- Espacios: F --> 
                                            
                                            <!-- Botones: I -->
                                            
                                            <div class="form-group tm-form-group tm-form-group-pad tm-form-group-4"> 
                                                <input type="hidden" id="typeAction" value="add_aviones" />
                                                <input type="hidden" value="" id="idTarea"/>
                                                <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="enviar">Ingresar registro</button>
                                            </div>
                                            
                                            <div class="form-group tm-form-group tm-form-group-pad tm-form-group-4">
                                                <button type="reset" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="cancelar">Cancelar</button>
                                            </div>
                                            
                                            <div class="form-group tm-form-group tm-form-group-pad tm-form-group-4">
                                                <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="buscar">Buscar</button>
                                            </div>
                                            
                                            <div class="form-group tm-form-group tm-form-group-pad tm-form-group-4">
                                                <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="borrar">Borrar</button>
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
                
                <!--  Seccion formunario: F -->
                
                <!-- Tabla: I -->
                
                <section>
                    
                <!-- encabezado: I -->    
                    
                    <br>
                    <h3>Tabla con informacion de los aviones</h3>
                    <br><br>
                <!-- encanbezado: F -->
                
                <!-- Datos: I -->
                    <div class="row">
                        <div class="col-md-12">
                            <div id="divResult" style="text-align:center;">Resultado de la consulta</div>
                        </div>
                    </div>
                <!-- Datos: F -->
                
                </section>
                
                <!-- Tabla: F -->
                
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

