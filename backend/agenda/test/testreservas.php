<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/reservasBo.php");
require_once ("../domain/reservas.php");

$obj_reserva = new Reservas();
//$obj_reserva->setIdReserva(1);
$obj_reserva->setNumero_Fila(1);
$obj_reserva->setNumero_Asiento("a");
$obj_reserva->setVuelo(230);
$obj_reserva->setUsuario("Nico");

$bo_reserva = new ReservasBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_reserva->add($obj_reserva);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_reserva->update($obj_reserva);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_reserva->delete($obj_reserva);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $reservaConsultada = $bo_reserva->searchById($obj_reserva);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($reservaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_reserva->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
