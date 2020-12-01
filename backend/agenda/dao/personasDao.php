<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/personas.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class PersonasDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost:8000", "root", "annyanneko", "mydb");
        
    }


    //agrega a la base de datos
    public function add(Personas $personas) {

        
        try {
            $sql = sprintf("insert into Persona (Usuario, Contrasena, Nombre, Apellido1, Apellido2, Correo, Fecha_Nacimiento, Direccion, Telefono1, Telefono2, Tipo_Usuario, Sexo) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("Usuario"),
                    $this->labAdodb->Param("Contrasena"),
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Apellido1"),
                    $this->labAdodb->Param("Apellido2"),
                    $this->labAdodb->Param("Correo"),
                    $this->labAdodb->Param("Fecha_Nacimiento"),
                    $this->labAdodb->Param("Direccion"),
                    $this->labAdodb->Param("Telefono1"),
                    $this->labAdodb->Param("Telefono2"),
                    $this->labAdodb->Param("Tipo_Usuario"),
                    $this->labAdodb->Param("Sexo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Usuario"]             = $personas->getUsuario();
            $valores["Contrasena"]          = $personas->getContrasena();
            $valores["Nombre"]              = $personas->getNombre();
            $valores["Apellido1"]           = $personas->getApellido1();
            $valores["Apellido2"]           = $personas->getApellido2();
            $valores["Correo"]              = $personas->getCorreo();
            $valores["Fecha_Nacimiento"]    = $personas->getFecha_Nacimiento();
            $valores["Direccion"]           = $personas->getDireccion();
            $valores["Telefono1"]           = $personas->getTelefono1();
            $valores["Telefono2"]           = $personas->getTelefono2();
            $valores["Tipo_Usuario"]        = $personas->getTipo_Usuario();
            $valores["Sexo"]                = $personas->getSexo();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //verifica si existe en la base de datos por ID
    public function exist(Personas $personas) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Persona where  Usuario = %s ",
                            $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Usuario"] = $personas->getUsuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //modifica en la base de datos
    public function update(Personas $personas) {

        
        try {
            $sql = sprintf("update Persona set Contrasena = %s, 
                                               Nombre = %s, 
                                               Apellido1 = %s,
                                               Apellido2 = %s,
                                               Correo = %s, 
                                               Fecha_Nacimiento = %s, 
                                               Direccion = %s, 
                                               Telefono1 = %s, 
                                               Telefono2 = %s, 
                                               Tipo_Usuario = %s, 
                                               Sexo = %s 
                            where Usuario = %s",
                    $this->labAdodb->Param("Contrasena"),
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Apellido1"),
                    $this->labAdodb->Param("Apellido2"),
                    $this->labAdodb->Param("Correo"),
                    $this->labAdodb->Param("Fecha_Nacimiento"),
                    $this->labAdodb->Param("Direccion"),
                    $this->labAdodb->Param("Telefono1"),
                    $this->labAdodb->Param("Telefono2"),
                    $this->labAdodb->Param("Tipo_Usuario"),
                    $this->labAdodb->Param("Sexo"),
                    $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Contrasena"]          = $personas->getContrasena();
            $valores["Nombre"]              = $personas->getNombre();
            $valores["Apellido1"]           = $personas->getApellido1();
            $valores["Apellido2"]           = $personas->getApellido2();
            $valores["Correo"]              = $personas->getCorreo();
            $valores["Fecha_Nacimiento"]    = $personas->getFecha_Nacimiento();
            $valores["Direccion"]           = $personas->getDireccion();
            $valores["Telefono1"]           = $personas->getTelefono1();
            $valores["Telefono2"]           = $personas->getTelefono2();
            $valores["Tipo_Usuario"]        = $personas->getTipo_Usuario();
            $valores["Sexo"]                = $personas->getSexo();
            $valores["Usuario"]             = $personas->getUsuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //elimina en la base de datos
    public function delete(Personas $personas) {

        
        try {
            $sql = sprintf("delete from Persona where  Usuario = %s",
                            $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Usuario"] = $personas->getUsuario();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //busca en la base de datos
    public function searchById(Personas $personas) {

        
        $returnPersonas = null;
        try {
            $sql = sprintf("select * from Persona where  Usuario = %s",
                            $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Usuario"] = $personas->getUsuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnPersonas = Personas::createNullPersonas();
                $returnPersonas->setUsuario($resultSql->Fields("Usuario"));
                $returnPersonas->setNombre($resultSql->Fields("Nombre"));
                $returnPersonas->setApellido1($resultSql->Fields("Apellido1"));
                $returnPersonas->setApellido2($resultSql->Fields("Apellido2"));
                $returnPersonas->setCorreo($resultSql->Fields("Correo"));
                $returnPersonas->setFecha_Nacimiento($resultSql->Fields("Fecha_Nacimiento"));
                $returnPersonas->setDireccion($resultSql->Fields("Direccion"));
                $returnPersonas->setTelefono1($resultSql->Fields("Telefono1"));
                $returnPersonas->setTelefno2($resultSql->Fields("Telefono2"));
                $returnPersonas->setTipo_Usuario($resultSql->Fields("Tipo_Usuario"));
                $returnPersonas->setSexo($resultSql->Fields("Sexo"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnPersonas;
    }

    //obtiene la información completa en la base de datos
    public function getAll() {

        
        try {
            $sql = sprintf("select Usuario, Nombre, Apellido1, Apellido2, Correo, Fecha_Nacimiento, Direccion, Telefono1, Telefono2, Tipo_Usuario, Sexo from Persona");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }
    
     public function IntoById(Personas $personas) {

        
        $returnPersonas = null;
        try {
            $sql = sprintf("select * from Persona where  Usuario = %s",
                            $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Usuario"] = $personas->getUsuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnPersonas = Personas::createNullPersonas();
                $returnPersonas->setUsuario($resultSql->Fields("Usuario"));
                $returnPersonas->setContrasena($resultSql->Fields("Contrasena"));
                $returnPersonas->setTipo_Usuario($resultSql->Fields("Tipo_Usuario"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnPersonas;
    }

}
