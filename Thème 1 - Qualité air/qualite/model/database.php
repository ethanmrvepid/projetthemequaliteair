<?php
// /model/database.php

class Database {
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $dbname = "qualite_air";
    private $conn;

    public function getConnection() {
		try {
            $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname, $this->username, $this->password);
			//$this->conn = new PDO("mysql:host=127.0.0.1;dbname=qualite","root","");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            //die("Échec de la connexion : " . $e->getMessage());
			return false;
        }
    }
}
?>