<?php

require_once("../domain/reservas.php");
require_once("../dao/reservasDao.php");

class ReservasBo {

    private $reservasDao;

    public function __construct() {
        $this->reservasDao = new ReservasDao();
    }

    public function getReservasDao() {
        return $this->reservasDao;
    }

    public function setReservasDao(ReservasDao $reservasDao) {
        $this->reservasDao = $reservasDao;
    }

    //agrega a la base de datos
    public function add(Reservas $reservas) {
        try {
            if (!$this->reservasDao->exist($reservas)) {
                $this->reservasDao->add($reservas);
            } else {
                throw new Exception("La reservacion ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //modifica en la base de datos
    public function update(Reservas $reservas) {
        try {
            $this->reservasDao->update($reservas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //eliminar en la base de datos
    public function delete(Reservas $reservas) {
        try {
            $this->reservasDao->delete($reservas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //consulta a la base de datos
    public function searchById(Reservas $reservas) {
        try {
            return $this->reservasDao->searchById($reservas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //consultar todo en la base de datos
    public function getAll() {
        try {
            return $this->reservasDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class ReservasBo
?>
