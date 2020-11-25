<?php

require_once("../bo/tipo_avionesBo.php");
require_once("../domain/tipo_aviones.php");

//************************************************************
// Personas Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myTipo_AvionBo = new AvionesBo();
        $myTipo_Avion = Tipo_Aviones::createNullTipo_Aviones();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_aviones" or $action === "update_aviones") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idTipo_Avion') != null) && (filter_input(INPUT_POST, 'Fecha') != null) && (filter_input(INPUT_POST, 'Modelo') != null) && (filter_input(INPUT_POST, 'Marca') != null) && (filter_input(INPUT_POST, 'Fila') != null) && (filter_input(INPUT_POST, 'Asiento_Fila') != null)) {
                $myTipo_Avion->setidTipo_avion(filter_input(INPUT_POST, 'idTipo_Avion'));
                $myTipo_Avion->setFecha(filter_input(INPUT_POST, 'Fecha'));
                $myTipo_Avion->setModelo(filter_input(INPUT_POST, 'Modelo'));
                $myTipo_Avion->setMarca(filter_input(INPUT_POST, 'Marca'));
                $myTipo_Avion->setFila(filter_input(INPUT_POST, 'Fila'));
                $myTipo_Avion->setAsiento_Fila(filter_input(INPUT_POST, 'Asiento_Fila'));
                if ($action == "add_aviones") {
                    $myTipo_AvionBo->add($myTipo_Avion);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_aviones") {
                    $myTipo_AvionBo->update($myTipo_Avion);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_aviones") {//accion de consultar todos los registros
            $resultDB   = $myTipo_AvionBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_aviones") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idTipo_Avion') != null) {
                $myTipo_Avion->setIdTipo_Avion(filter_input(INPUT_POST, 'idTipo_Avion'));
                $myTipo_Avion = $myTipo_AvionBo->searchById($myTipo_Avion);
                if ($myTipo_Avion != null) {
                    echo json_encode(($myTipo_Avion));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_aviones") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idTipo_Avion') != null) {
                $myTipo_Avion->setIdTipo_Avion(filter_input(INPUT_POST, 'idTipo_Avion'));
                $myTipo_AvionBo->delete($myTipo_Avion);
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
    echo('M~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>
