<?php
class Model {

    private $db;

    public function __construct ($db_type,$config) {
        require(CORE_PATH.'databases'.DS.$db_type.'.class.php');
        $this->db = new $db_type($config);
    }

    public function insert ($table,$data) {
        $this->db->insert($table,$data);
    }

    public function getOne() {

    }

    public function geAll () {

    }

    public function getCount () {

    }

    public function del () {

    }

}