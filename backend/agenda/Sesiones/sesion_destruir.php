<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_name('proyecto');
session_start();
session_destroy();
$header = 'http://localhost/Proyect/public_html/Inicio.php'; 
header('location: '. $header);