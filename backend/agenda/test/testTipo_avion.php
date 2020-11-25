<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/tipo_avionesBo.php");
require_once ("../domain/tipo_aviones.php");

$obj_tipo_avion = new Tipo_Aviones();
$obj_tipo_avion->setIdTipo_Avion(121212);
$obj_tipo_avion->setFecha(2020);
$obj_tipo_avion->setModelo("AV-1");
$obj_tipo_avion->setMarca("PILOT");
$obj_tipo_avion->setFila(1);
$obj_tipo_avion->setAsiento_Fila(4);

$bo_tipo_avion = new AvionesBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_tipo_avion->add($obj_tipo_avion);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_tipo_avion->update($obj_tipo_avion);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_tipo_avion->delete($obj_tipo_avion);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $tipo_avionConsultada = $bo_tipo_avion->searchById($obj_tipo_avion);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($personaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_tipo_avion->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}