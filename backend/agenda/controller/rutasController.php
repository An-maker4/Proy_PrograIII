<?php

require_once("../bo/rutasBo.php");
require_once("../domain/rutas.php");

//************************************************************
// Personas Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myRutaBo = new RutasBo();
        $myRuta = Rutas::createNullRutas();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_rutas" or $action === "update_rutas") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idRuta') != null) && (filter_input(INPUT_POST, 'Trayecto') != null) && (filter_input(INPUT_POST, 'Duracion') != null) && (filter_input(INPUT_POST, 'Precio') != null)) {
                $myRuta->setIdRutas(filter_input(INPUT_POST, 'idRuta'));
                $myRuta->setTrayecto(filter_input(INPUT_POST, 'Trayecto'));
                $myRuta->setDuracion(filter_input(INPUT_POST, 'Duracion'));
                $myRuta->setPrecio(filter_input(INPUT_POST, 'Precio'));
                if ($action == "add_rutas") {
                    $myRutaBo->add($myRuta);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_rutas") {
                    $myRutaBo->update($myRuta);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_rutas") {//accion de consultar todos los registros
            $resultDB   = $myRutaBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_rutas") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idRuta') != null) {
                $myRuta->setIdRutas(filter_input(INPUT_POST, 'idRuta'));
                $myRuta = $myRutaBo->searchById($myRuta);
                if ($myRuta != null) {
                    echo json_encode(($myRuta));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_rutas") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idRuta') != null) {
                $myRuta->setIdRutas(filter_input(INPUT_POST, 'idRuta'));
                $myRutaBo->delete($myRuta);
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

