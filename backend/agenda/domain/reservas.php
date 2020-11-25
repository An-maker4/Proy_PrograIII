<?php

require_once("baseDomain.php");

class Reservas extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idreserva;
    private $numero_fila;
    private $numero_asiento;
    private $vuelo;
    private $fecha;
    private $usuario;
    
    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullReservas() {
        $instance = new self();
        return $instance;
    }

    public static function createPersonas($idreserva, $numero_fila, $numero_asiento, $vuelo, $fecha, $usuario) {
        $instance = new self();
        $instance->idreserva        = $idreserva;
        $instance->numero_fila      = $numero_fila;
        $instance->numero_asiento   = $numero_asiento;
        $instance->vuelo            = $vuelo;
        $instance->fecha            = $fecha;
        $instance->usuario          = $usuario;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getIdReserva() {
        return $this->idreserva;
    }

    public function setIdReserva($idreserva) {
        $this->idreserva = $idreserva;
    }

    /****************************************************************************/

    public function getNumero_Fila() {
        return $this->numero_fila;
    }

    public function setNumero_Fila($numero_fila) {
        $this->numero_fila = $numero_fila;
    }

    /****************************************************************************/

    public function getNumero_Asiento() {
        return $this->numero_asiento;
    }

    public function setNumero_Asiento($numero_asiento) {
        $this->numero_asiento = $numero_asiento;
    }

    /****************************************************************************/

    public function getVuelo() {
        return $this->vuelo;
    }

    public function setVuelo($vuelo) {
        $this->vuelo = $vuelo;
    }

    /****************************************************************************/

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    /****************************************************************************/

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}