<?php

require_once("../bo/vuelosBo.php");
require_once("../domain/vuelos.php");

//************************************************************
// Personas Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myVueloBo = new VuelosBo();
        $myVuelo = Vuelos::createNullVuelos();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_vuelos" or $action === "update_vuelos") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'id_Vuelo') != null) && (filter_input(INPUT_POST, 'Fecha_Hora') != null) && (filter_input(INPUT_POST, 'Ruta_idRuta') != null) && (filter_input(INPUT_POST, 'Tipo_Avion_idTipo_Avion') != null)) {
                $myVuelo->setId_Vuelo(filter_input(INPUT_POST, 'id_Vuelo'));
                $myVuelo->setFecha_Hora(filter_input(INPUT_POST, 'Fecha_Hora'));
                $myVuelo->setRuta(filter_input(INPUT_POST, 'Ruta_idRuta'));
                $myVuelo->setAvion(filter_input(INPUT_POST, 'Tipo_Avion_idTipo_Avion'));
                if ($action == "add_vuelos") {
                    $myVueloBo->add($myVuelo);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_vuelos") {
                    $myVueloBo->update($myVuelo);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_vuelos") {//accion de consultar todos los registros
            $resultDB   = $myVueloBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_vuelos") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'id_Vuelo') != null) {
                $myVuelo->setId_Vuelo(filter_input(INPUT_POST, 'id_Vuelo'));
                $myVuelo = $myVueloBo->searchById($myVuelo);
                if ($myVuelo != null) {
                    echo json_encode(($myVuelo));
                } else {
                    echo('E~NO Existe el vuelo con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_vuelos") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'id_Vuelo') != null) {
                $myVuelo->setId_Vuelo(filter_input(INPUT_POST, 'id_Vuelo'));
                $myVueloBo->delete($myVuelo);
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
