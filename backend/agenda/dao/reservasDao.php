<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/reservas.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class ReservasDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost:8000", "root", "annyanneko", "mydb");
        
    }
    
    //agrega a la base de datos
    public function add(Reservas $reservas) {

        
        try {
            $sql = sprintf("insert into Reservacion (Numero_Fila, Numero_Asiento, Vuelo_id_Vuelo, Fecha_Reserva, Persona_Usuario1) 
                                          values (%s,%s,%s,CURDATE(),%s)",
                    $this->labAdodb->Param("Numero_Fila"),
                    $this->labAdodb->Param("Numero_Asiento"),
                    $this->labAdodb->Param("Vuelo_id_Vuelo"),
                    $this->labAdodb->Param("Persona_Usuario1"),);
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Numero_Fila"]          = $reservas->getNumero_Fila();
            $valores["Numero_Asiento"]       = $reservas->getNumero_Asiento();
            $valores["Vuelo_id_Vuelo"]       = $reservas->getVuelo();
            $valores["Persona_Usuario1"]     = $reservas->getUsuario();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase ReservasDao), error:'.$e->getMessage());
        }
        
    }
    
    //verifica si existe en la base de datos por ID
    public function exist(Reservas $reservas) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Reservacion where  idReservacion = %s ",
                            $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idReservacion"] = $reservas->getIdReserva();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase ReservasDao), error:'.$e->getMessage());
        }
    }
    
     //modifica en la base de datos
    public function update(Reservas $reserva) {

        
        try {
            $sql = sprintf("update Reservacion set Numero_Fila = %s, 
                                               Numero_Asiento = %s, 
                                               Vuelo_id_Vuelo = %s,
                                               Fecha_Reserva = CURDATE(),
                                               Persona_Usuario1 = %s 
                            where idReservacion = %s",
                    $this->labAdodb->Param("Numero_Fila"),
                    $this->labAdodb->Param("Numero_Asiento"),
                    $this->labAdodb->Param("Vuelo_id_Vuelo"),
                    $this->labAdodb->Param("Persona_Usuario1"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservacion"]          = $reserva->getIdReserva();
            $valores["Numero_Fila"]            = $reserva->getNumero_Fila();
            $valores["Numero_Asientos"]        = $reserva->getNumero_Asiento();
            $valores["Vuelo_id_Vuelo"]         = $reserva->getVuelo();
            $valores["Persona_Usuario1"]       = $reserva->getUsuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase ReservasDao), error:'.$e->getMessage());
        }
    }

    //elimina en la base de datos
    public function delete(Reservas $reservas) {

        
        try {
            $sql = sprintf("delete from Reservacion where idReservacion = %s",
                            $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservas"] = $reservas->getIdReserva();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase ReservasDao), error:'.$e->getMessage());
        }
    }

    //busca en la base de datos
    public function searchById(Reservas $resevas) {

        
        $returnReservas = null;
        try {
            $sql = sprintf("select * from Reservacion where idReservacion = %s",
                            $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservacion"] = $resevas->getUsuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnReservas = Reservas::createNullReservas();
                $returnReservas->setIdReserva($resultSql->Fields("idReservacion"));
                $returnReservas->setNumero_Fila($resultSql->Fields("Numero_Fila"));
                $returnReservas->setNumero_Asiento($resultSql->Fields("Numero_Asiento"));
                $returnReservas->setVuelo($resultSql->Fields("Vuelo_id_Vuelo"));
                $returnReservas->setFecha($resultSql->Fields("Fecha_Reserva"));
                $returnReservas->setUsuario($resultSql->Fields("Persona_Usuario1"));
                
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase ReservasDao), error:'.$e->getMessage());
        }
        return $returnReservas;
    }

    //obtiene la información completa en la base de datos
    public function getAll() {

        
        try {
            $sql = sprintf("select * from Reservacion");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase ReservasDao), error:'.$e->getMessage());
        }
    }

}