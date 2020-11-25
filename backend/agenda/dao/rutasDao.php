<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/rutas.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class RutasDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost:8000", "root", "annyanneko", "mydb");
        
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Rutas $ruta) {
        try {
            $sql = sprintf("insert into Ruta (idRuta, Trayecto, Duracion, Precio) 
                                          values (%s,%s,%s,%s)",
                    $this->labAdodb->Param("idRuta"),
                    $this->labAdodb->Param("Trayecto"),
                    $this->labAdodb->Param("Duracion"),
                    $this->labAdodb->Param("Precio"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRuta"]          = $ruta->getIdRutas();
            $valores["Trayecto"]        = $ruta->getTrayecto();
            $valores["Duracion"]        = $ruta->getDuracion();
            $valores["Precio"]          = $ruta->getPrecio();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Rutas $ruta) {
        $exist = false;
        try {
            $sql = sprintf("select * from Ruta where  idRuta = %s ",
                            $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRuta"] = $ruta->getIdRutas();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************
    public function update(Rutas $ruta) {
        try {
            $sql = sprintf("update Ruta set Trayecto = %s, 
                                                Duracion = %s, 
                                                Precio = %s
                            where idRuta = %s",
                    $this->labAdodb->Param("Trayecto"),
                    $this->labAdodb->Param("Duracion"),
                    $this->labAdodb->Param("Precio"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Trayecto"]        = $ruta->getTrayecto();
            $valores["Duracion"]        = $ruta->getDuracion();
            $valores["Precio"]          = $ruta->getPrecio();
            $valores["idRuta"]          = $ruta->getidRuta();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************
    public function delete(Rutas $ruta) {

        
        try {
            $sql = sprintf("delete from Ruta where  idRuta = %s",
                            $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idRuta"] = $ruta->getIdRutas();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase RutasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************
    public function searchById(Rutas $ruta) {
        $returnRuta = null;
        try {
            $sql = sprintf("select * from Ruta where  idRuta = %s",
                            $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRuta"] = $ruta->getidRuta();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnRuta = Rutas::createNullRutas();
                $returnRuta->setIdRutas($resultSql->Fields("idRuta"));
                $returnRuta->setTrayecto($resultSql->Fields("Trayecto"));
                $returnRuta->setDuracion($resultSql->Fields("Duracion"));
                $returnRuta->setPrecio($resultSql->Fields("Precio"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase RutaDao), error:'.$e->getMessage());
        }
        return $returnRuta;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from Ruta");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase RutaDao), error:'.$e->getMessage());
        }
    }

}


