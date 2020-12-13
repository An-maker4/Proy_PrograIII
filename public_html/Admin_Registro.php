<?php
session_name("proyecto");
session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    
    <!-- Cargas: I --> 
        
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AeroVida-Admin usuarios</title>
        <link rel="shortcut icon" href="img/iconologo.png">
              
        <!-- CCS-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand">  
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                
        <link rel="stylesheet" href="css/bootstrap.min.css">                                      
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="css/templatemo-style-admin-registro.css">         
        <link href="lib/animate.css/animate.min.css" rel="stylesheet" type="text/css"/>   
        <link href="lib/dataTableFull/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="lib/dataTableFull/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/dataTableFull/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="lib/dataTableFull/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="lib/dataTableFull/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="lib/dataTableFull/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <!-- Cargas: F -->
    
    <!-- Cuerpo: I -->
    
    <body>
        
        <?php
        if ((isset($_SESSION["proyecto_usuario"])) && (isset($_SESSION["proyecto_tipo_usuario"]))) {
        echo ('
        
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
                                        <a class="nav-link active" href="Inicio.php#top">Regreso<span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Admin_Reserva.php">Reservas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Admin_Vuelo.php">Vuelos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Admin_Ruta.php">Rutas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Admin_Avion.php">Aviones</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">'.$_SESSION["proyecto_usuario"].'</a>
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
                                        <h1 class="text-uppercase tm-banner-title">Adimistracion de usuarios</h1>
                                        <p class="tm-banner-subtitle">Nuestra recompensa se encuentra en el esfuerzo.</p>       
                                    </div>    
                                </div>                      
                            </div> 
                            
                            <!-- Cabezera: F -->
                            
                            <!-- Formulario: I -->
                            
                            <div class="row tm-banner-row" id="tm-section-search">

                                <form class="tm-search-form tm-section-pad-2" role="form" onsubmit="return false;" id="formPersonas" action="../backend/agenda/controller/personasController.php">
                                    
                                    <div class="form-row tm-search-form-row"> 
                                        
                                        <!-- Espacios: I --> 
                                           
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                            <label>Usuario</label>
                                                <input type="text" id="txtUsuario" class="form-control" placeholder="Usuario" />
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <label>Contrasena</label>
                                                <input type="password" id="txtContrasena" class="form-control" placeholder="Contrasena" />
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
                                        
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-4">
                                            <input type="hidden" id="typeAction" value="add_personas" />
                                            <input type="hidden" value="" id="idTarea"/>
                                            <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="enviar">Finalizar registro</button>
                                        </div>
                                        
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-4">
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
                
               <!-- Tabla: I -->
                
                <section>
                    
                    <div style="padding: 20px;">
                        
                        <!-- encabezado: I -->    

                            <br>
                            <h3>Tabla con informacion de los Usuarios</h3>
                            <br><br>

                        <!-- encanbezado: F -->

                        <!-- Datos: I -->

                            <div class="row">
                                <div class="col-md-12">
                                    <table id="dt_personas"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>USUARIO</th>
                                                <th>NOMBRE</th>
                                                <th>APELLIDO1</th>
                                                <th>APELLIDO2</th>
                                                <th>CORREO</th>
                                                <th>FEC. NACIMIENTO</th>
                                                <th>DIRECCION</th>
                                                <th>TEL1</th>
                                                <th>TEL2</th>
                                                <th>TIP</th>
                                                <th>SEXO</th>
                                                <th>ACCION</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                        <!-- Datos: F -->

                        <br><br><br><br>
                
                    </div>
                    
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
            
        <!-- Page scripts -->
        <!-- Datatables -->
        <script src="lib/dataTableFull/datatables/media/js/jquery.dataTables.js"></script>
        <script src="lib/dataTableFull/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="lib/dataTableFull/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="lib/dataTableFull/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="lib/dataTableFull/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="lib/dataTableFull/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="lib/dataTableFull/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="lib/dataTableFull/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="lib/dataTableFull/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="lib/dataTableFull/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="lib/dataTableFull/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        
        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        
        <script type="text/javascript" src="js/FunctionsUsuarios.js"></script>
 
    <!-- Documentos JS: F  -->

         ');}else{
            echo('<h1>No tiene acceso</h1>');
        }
    ?>
        
    </body>
    
    <!-- Cuerpo: F -->
    
    </html>
