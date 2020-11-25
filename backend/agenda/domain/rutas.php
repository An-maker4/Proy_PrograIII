<?php

require_once("baseDomain.php");

class Rutas extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idrutas;
    private $trayecto;
    private $duracion;
    private $precio;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullRutas() {
        $instance = new self();
        return $instance;
    }

    public static function createPersonas($idrutas, $trayecto, $duracion, $precio) {
        $instance = new self();
        $instance->idrutas    = $idrutas;
        $instance->trayecto   = $trayecto;
        $instance->duracion   = $duracion;
        $instance->precio     = $precio;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getIdRutas() {
        return $this->idrutas;
    }

    public function setIdRutas($idrutas) {
        $this->idrutas = $idrutas;
    }

    /****************************************************************************/

    public function getTrayecto() {
        return $this->trayecto;
    }

    public function setTrayecto($trayecto) {
        $this->trayecto = $trayecto;
    }

    /****************************************************************************/

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    /****************************************************************************/

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}