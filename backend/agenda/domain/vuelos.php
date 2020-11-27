<?php

require_once("baseDomain.php");

class Vuelos extends BaseDomain implements \JsonSerializable{

    //attributes
    private $id_vuelo;
    private $fecha_hora;
    private $ruta;
    private $avion;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullVuelos() {
        $instance = new self();
        return $instance;
    }

    public static function createPersonas($id_vuelo, $fecha_hora, $ruta, $avion) {
        $instance = new self();
        $instance->id_vuelo         = $id_vuelo;
        $instance->fecha_hora       = $fecha_hora;
        $instance->ruta             = $ruta;
        $instance->avion            = $avion;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getId_Vuelo() {
        return $this->id_vuelo;
    }

    public function setId_Vuelo($id_vuelo) {
        $this->id_vuelo = $id_vuelo;
    }

    /****************************************************************************/

    public function getFecha_Hora() {
        return $this->fecha_hora;
    }

    public function setFecha_Hora($fecha_hora) {
        $this->fecha_hora = $fecha_hora;
    }

    /****************************************************************************/

    public function getRuta() {
        return $this->ruta;
    }

    public function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    /****************************************************************************/

    public function getAvion() {
        return $this->avion;
    }

    public function setAvion($avion) {
        $this->avion = $avion;
    }


    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}