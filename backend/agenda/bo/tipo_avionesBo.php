<?php


require_once("../domain/tipo_aviones.php");
require_once("../dao/tipo_avionesDao.php");


class AvionesBo {

    private $avionesDao;

    public function __construct() {
        $this->avionesDao = new T_AvionesDao();
    }

    public function getAvionesDao() {
        return $this->avionesDao;
    }

    public function setAvionesDao(T_AvionesDao $avionesDao) {
        $this->avionesDao = $avionesDao;
    }

    //agrega a la base de datos
    public function add(Tipo_Aviones $aviones) {
        try {
            if (!$this->avionesDao->exist($aviones)) {
                $this->avionesDao->add($aviones);
            } else {
                throw new Exception("El avion ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //modifica en la base de datos
    public function update(Tipo_Aviones $aviones) {
        try {
            $this->avionesDao->update($aviones);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //eliminar en la base de datos
    public function delete(Tipo_Aviones $aviones) {
        try {
            $this->avionesDao->delete($aviones);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //consulta en la base de datos
    public function searchById(Tipo_Aviones $aviones) {
        try {
            return $this->avionesDao->searchById($aviones);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //consultar todo en la base de datos
    public function getAll() {
        try {
            return $this->avionesDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class AvionesBo
?>