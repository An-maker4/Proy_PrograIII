<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/vuelos.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class VuelosDao {

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

    public function add(Vuelos $vuelo) {
        try {
            $sql = sprintf("insert into Vuelo (id_Vuelo, Fecha_Hora, Ruta_idRuta, Tipo_Avion_idTipo_Aviones) 
                                          values (%s,%s,%s,%s)",
                    $this->labAdodb->Param("id_Vuelo"),
                    $this->labAdodb->Param("Fecha_Hora"),
                    $this->labAdodb->Param("Ruta_idRuta"),
                    $this->labAdodb->Param("Tipo_Avion_idTipo_Aviones"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["id_Vuelo"]                    = $vuelo->getId_Vuelo();
            $valores["Fecha_Hora"]                  = $vuelo->getFecha_Hora();
            $valores["Ruta_idRuta"]                 = $vuelo->getRuta();
            $valores["Tipo_Avion_idTipo_Aviones"]     = $vuelo->getAvion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase VueloDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Vuelos $vuelo) {
        $exist = false;
        try {
            $sql = sprintf("select * from Vuelo where  id_Vuelo = %s ",
                            $this->labAdodb->Param("id_Vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["id_Vuelo"] = $vuelo->getId_Vuelo();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase VueloDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Vuelos $vuelo) {
        try {
            $sql = sprintf("update Vuelo set Fecha_Hora = %s, 
                                                Ruta_idRuta = %s, 
                                                Tipo_Avion_idTipo_Aviones = %s, 
                            where id_Vuelo = %s",
                    $this->labAdodb->Param("Fecha_Hora"),
                    $this->labAdodb->Param("Ruta_idRuta"),
                    $this->labAdodb->Param("Tipo_Avion_idTipo_Aviones"),
                    $this->labAdodb->Param("id_Vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Fecha_Hora"]                  = $vuelo->getFecha_Hora();
            $valores["Ruta_idRuta"]                 = $vuelo->getRuta();
            $valores["Tipo_Avion_idTipo_Aviones"]     = $vuelo->getAvion();
            $valores["id_Vuelo"]                    = $vuelo->getId_Vuelo();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase VueloDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Vuelos $vuelo) {

        
        try {
            $sql = sprintf("delete from Vuelo where  id_Vuelo = %s",
                            $this->labAdodb->Param("id_Vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["id_Vuelo"] = $vuelo->getId_Vuelo();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase VueloDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Vuelos $vuelo) {
        $returnVuelo = null;
        try {
            $sql = sprintf("select * from Vuelo where  id_Vuelo = %s",
                            $this->labAdodb->Param("id_Vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["id_Vuelo"] = $vuelo->getId_Vuelo();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnVuelo = Vuelos::createNullVuelos();
                $returnVuelo->setId_Vuelo($resultSql->Fields("id_Vuelo"));
                $returnVuelo->setFecha_Hora($resultSql->Fields("Fecha_Hora"));
                $returnVuelo->setRuta($resultSql->Fields("Ruta_idRuta"));
                $returnVuelo->setAvion($resultSql->Fields("Tipo_Avion_idTipo_Aviones"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase VueloDao), error:'.$e->getMessage());
        }
        return $returnVuelo;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from Vuelo");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase VueloDao), error:'.$e->getMessage());
        }
    }

}
   
