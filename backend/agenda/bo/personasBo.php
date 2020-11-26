<?php

require_once("../domain/personas.php");
require_once("../dao/PersonasDao.php");

class PersonasBo {

    private $personasDao;

    public function __construct() {
        $this->personasDao = new PersonasDao();
    }

    public function getPersonasDao() {
        return $this->personasDao;
    }

    public function setPersonasDao(PersonasDao $personasDao) {
        $this->personasDao = $personasDao;
    }

    //agrega a la base de datos
    public function add(Personas $personas) {
        try {
            if (!$this->personasDao->exist($personas)) {
                $this->personasDao->add($personas);
            } else {
                throw new Exception("El Usuario ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //modifica en la base de datos
    public function update(Personas $personas) {
        try {
            $this->personasDao->update($personas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //eliminar en la base de datos
    public function delete(Personas $personas) {
        try {
            $this->personasDao->delete($personas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //consulta a la base de datos
    public function searchById(Personas $personas) {
        try {
            return $this->personasDao->searchById($personas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //consultar todo en la base de datos
    public function getAll() {
        try {
            return $this->personasDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    //consulta a la base de datos
    public function IntoById(Personas $personas) {
        try {
            return $this->personasDao->IntoById($personas);
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class PersonasBo
?>