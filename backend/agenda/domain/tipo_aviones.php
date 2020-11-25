<?php

require_once("baseDomain.php");

class Tipo_Aviones extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idtipo_avion;
    private $fecha;
    private $modelo;
    private $marca;
    private $fila;
    private $asiento_fila;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullTipo_Aviones() {
        $instance = new self();
        return $instance;
    }

    public static function createPersonas($idtipo_avion, $fecha, $modelo, $marca, $fila, $asiento_fila) {
        $instance = new self();
        $instance->idtipo_avion    = $idtipo_avion;
        $instance->fecha           = $fecha;
        $instance->modelo          = $modelo;
        $instance->marca           = $marca;
        $instance->fila            = $fila;
        $instance->asiento_fila    = $asiento_fila;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getIdTipo_Avion() {
        return $this->idtipo_avion;
    }

    public function setIdTipo_Avion($tipo_avion) {
        $this->idtipo_avion = $tipo_avion;
    }

    /****************************************************************************/

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    /****************************************************************************/

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    /****************************************************************************/

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    /****************************************************************************/

    public function getFila() {
        return $this->fila;
    }

    public function setFila($fila) {
        $this->fila = $fila;
    }

    /****************************************************************************/

    public function getAsiento_Fila() {
        return $this->asiento_fila;
    }

    public function setAsiento_Fila($asiento_fila) {
        $this->asiento_fila = $asiento_fila;
    }
    

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}

