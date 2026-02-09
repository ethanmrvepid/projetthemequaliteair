<?php

class salles_model {

    private $conn;

    public function __construct() {

        require_once './model/database.php';

        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findSalles() {

        $stmt = $this->conn->prepare("SELECT * FROM salles");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function findBatiments() {

        $stmt = $this->conn->prepare("SELECT * FROM batiment");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function create_salle($nom, $id_salles) {

        if ($this->existSallesbyName($nom))
        {
            $query = "INSERT INTO salles (nom, id_batiments) VALUES (:nom, :id_batiments)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':id_batiments', $id_salles);

            if ($stmt->execute()) return true;
            else return false;
        }
        else return false;
    }

    public function existSallesbyName($nom) {

        $stmt = $this->conn->prepare("SELECT * FROM salles WHERE nom = :nom");
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) == 0) return true;
        else return false;
    }

    public function delete_salle($id){

        $stmt = $this->conn->prepare("DELETE FROM salles WHERE id_salles = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function findSallesbyId($id) {

        $stmt = $this->conn->prepare("SELECT * FROM salles WHERE id_salles = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) != 0) return $result;
        else return false;
    }


}

?>
