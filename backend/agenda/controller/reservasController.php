<?php

require_once("../bo/reservasBo.php");
require_once("../domain/reservas.php");

//********************************************************
// Reservas Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myReservasBo = new ReservasBo();
        $myReservas = Reservas::createNullReservas();

        //***********************************************************
        //Escoge la accion
        //***********************************************************

        if ($action === "add_reservas" or $action === "update_reservas") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'Numero_Fila') != null) && (filter_input(INPUT_POST, 'Numero_Asiento') != null) && (filter_input(INPUT_POST, 'Vuelo_id_Vuelo') != null) && (filter_input(INPUT_POST, 'Persona_Usuario1') != null)) {
                $myReservas->setNumero_Fila(filter_input(INPUT_POST, 'Numero_Fila'));
                $myReservas->setNumero_Asiento(filter_input(INPUT_POST, 'Numero_Asiento'));
                $myReservas->setVuelo(filter_input(INPUT_POST, 'Vuelo_id_Vuelo'));
                $myReservas->setUsuario(filter_input(INPUT_POST, 'Persona_Usuario1'));
                $myReservas->setIdReserva(filter_input(INPUT_POST, 'idReservacion'));
                if ($action == "add_reservas") {
                    $myReservasBo->add($myReservas);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_reservas") {
                    $myReservasBo->update($myReservas);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_reservas") {//accion de consultar todos los registros
            $resultDB   = $myReservasBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_reservas") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idReservacion') != null) {
                $myReservas->setIdReserva(filter_input(INPUT_POST, 'idReservacion'));
                $myReservas = $myReservasBo->searchById($myReservas);
                if ($myReservas != null) {
                    echo json_encode(($myReservas));
                } else {
                    echo('E~NO Existe una reservacion con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_reservas") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idReservacion') != null) {
                $myReservas->setIdReserva(filter_input(INPUT_POST, 'idReservacion'));
                $myReservasBo->delete($myReservas);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }

        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('E~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>