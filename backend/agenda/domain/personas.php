<?php

require_once("baseDomain.php");

class Personas extends BaseDomain implements \JsonSerializable{

    //attributes
    private $usuario;
    private $contrasena;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $correo;
    private $fecha_nacimiento;
    private $direccion;
    private $telefono1;
    private $telefono2;
    private $tipo_usuario;
    private $sexo;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullPersonas() {
        $instance = new self();
        return $instance;
    }

    public static function createPersonas($usuario, $contrasena, $nombre, $apellido1, $apellido2, $correo, $fecha_nacimiento, $direccion, $telefono1, $telefono2, $tipo_usuario, $sexo) {
        $instance = new self();
        $instance->usuario              = $usuario;
        $instance->contrasena           = $contrasena;
        $instance->nombre               = $nombre;
        $instance->apellido1            = $apellido1;
        $instance->apellido2            = $apellido2;
        $instance->correo               = $correo;
        $instance->fecha_nacimiento     = $fecha_nacimiento;
        $instance->direccion            = $direccion;
        $instance->telefono1            = $telefono1;
        $instance->telefono2            = $telefono2;
        $instance->tipo_usuario         = $tipo_usuario;
        $instance->sexo                 = $sexo;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /****************************************************************************/

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    /****************************************************************************/

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /****************************************************************************/

    public function getApellido1() {
        return $this->apellido1;
    }

    public function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    /****************************************************************************/

    public function getApellido2() {
        return $this->apellido2;
    }

    public function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    /****************************************************************************/

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }
    
    /****************************************************************************/

    public function getFecha_Nacimiento() {
        return $this->fecha_nacimiento;
    }

    public function setFecha_Nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    /****************************************************************************/

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($dereccion) {
        $this->direccion = $dereccion;
    }

    /****************************************************************************/

    public function getTelefono1() {
        return $this->telefono1;
    }

    public function setTelefono1($telefono1) {
        $this->telefono1 = $telefono1;
    }
    
    /****************************************************************************/

    public function getTelefono2() {
        return $this->telefono2;
    }

    public function setTelefno2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    /****************************************************************************/

    public function getTipo_Usuario() {
        return $this->tipo_usuario;
    }

    public function setTipo_Usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }
    
    /****************************************************************************/

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }


    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}