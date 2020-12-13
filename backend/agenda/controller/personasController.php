<?php

require_once("../bo/personasBo.php");
require_once("../domain/personas.php");

//********************************************************
// Personas Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myPersonasBo = new PersonasBo();
        $myPersonas = Personas::createNullPersonas();

        //***********************************************************
        //Escoge la accion
        //***********************************************************

        if ($action === "add_personas" or $action === "update_personas") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'Usuario') != null) && (filter_input(INPUT_POST, 'Contrasena') != null)&& (filter_input(INPUT_POST, 'Nombre') != null) && (filter_input(INPUT_POST, 'Apellido1') != null) && (filter_input(INPUT_POST, 'Apellido2') != null) && (filter_input(INPUT_POST, 'Correo') != null) && (filter_input(INPUT_POST, 'Fecha_Nacimiento') != null) && (filter_input(INPUT_POST, 'Direccion') != null) && (filter_input(INPUT_POST, 'Telefono1') != null) &&  (filter_input(INPUT_POST, 'Telefono2') != null) && (filter_input(INPUT_POST, 'Tipo_Usuario') != null) && (filter_input(INPUT_POST, 'sexo') != null)) {
                $myPersonas->setUsuario(filter_input(INPUT_POST, 'Usuario'));
                $myPersonas->setContrasena(filter_input(INPUT_POST,'Contrasena'));
                $myPersonas->setNombre(filter_input(INPUT_POST, 'Nombre'));
                $myPersonas->setApellido1(filter_input(INPUT_POST, 'Apellido1'));
                $myPersonas->setApellido2(filter_input(INPUT_POST, 'Apellido2'));
                $myPersonas->setCorreo(filter_input(INPUT_POST, 'Correo'));
                $myPersonas->setFecha_Nacimiento(filter_input(INPUT_POST, 'Fecha_Nacimiento'));
                $myPersonas->setDireccion(filter_input(INPUT_POST, 'Direccion'));
                $myPersonas->setTelefono1(filter_input(INPUT_POST, 'Telefono1'));
                $myPersonas->setTelefno2(filter_input(INPUT_POST, 'Telefono2'));
                $myPersonas->setTipo_Usuario(filter_input(INPUT_POST, 'Tipo_Usuario'));
                $myPersonas->setSexo(filter_input(INPUT_POST, 'sexo'));
                if ($action == "add_personas") {
                    $myPersonasBo->add($myPersonas);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_personas") {
                    $myPersonasBo->update($myPersonas);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_personas") {//accion de consultar todos los registros
            $resultDB   = $myPersonasBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_personas") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'Usuario') != null) {
                $myPersonas->setUsuario(filter_input(INPUT_POST, 'Usuario'));
                $myPersonas = $myPersonasBo->searchById($myPersonas);
                if ($myPersonas != null) {
                    echo json_encode(($myPersonas));
                } else {
                    echo('E~NO Existe un usuario con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_personas") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'Usuario') != null) {
                $myPersonas->setUsuario(filter_input(INPUT_POST, 'Usuario'));
                $myPersonasBo->delete($myPersonas);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }
        
        //***********************************************************
        //***********************************************************

        
        if ($action === "into_personas") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'Usuario') != null && filter_input(INPUT_POST, 'Contrasena') != null) {
                $myPersonas->setUsuario(filter_input(INPUT_POST, 'Usuario'));
                $myPersonas = $myPersonasBo->IntoById($myPersonas);
                $contrasena = filter_input(INPUT_POST, 'Contrasena');
                if ($myPersonas != null) {
                    if($myPersonas->getContrasena() === $contrasena ){                       
                        session_name("proyecto");
                        session_start();
                        $_SESSION["proyecto_usuario"] = $myPersonas->getUsuario(); 
                        $_SESSION["proyecto_tipo_usuario"] = $myPersonas->getTipo_Usuario();
                    }else{
                        echo('E~Usuario y/o contrasena invalidos');
                    }
                } else {
                    echo('E~NO Existe un usuario con el ID especificado');
                }
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

