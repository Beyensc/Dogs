<?php

class GUser {

    private $id;
    private $login;
    private $pass;
    private $name;
    private $firstname;
    private $dbPdo;

    function __construct($dbPdo) {
        $this->dbPdo = $dbPdo;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getFirstname() {
        return $this->firstname;
    }

    private function loadUser($sql) {
        $results = $this->dbPdo->query($sql);
        $results->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
        $row = $results->fetch();
        if ($row) { // on récupère la liste des membres
            $this->id = $row->usr_pkey;
            $this->login = $row->usr_login;
            $this->pass = $row->usr_pass;
            $this->name = $row->usr_name;
            $this->firstname = $row->usr_firstname;
            $result = true;
        }
        else
            $result=false;
        $results->closeCursor(); // on ferme le curseur des résultats
        return $results;
    }

    function loadUserWithPass($login, $pass) {
        $sql = 'select * from users where usr_login="' . $login . '" and usr_pass="' . $pass . '"';
        return $this->loadUser($sql);
    }

    function loadVisitorData() {
        $this->id = -1;
        $this->login = '';
        $this->pass = '';
        $this->name = '';
        $this->firstname = 'visitor';
    }

    function loadUserWithId($id) {
        $sql = 'select * from users where usr_pkey=' . $id;
        return $this->loadUser($sql);
    }

}
?>