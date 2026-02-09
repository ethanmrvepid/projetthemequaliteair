<?php

class batiments_model {

    private $conn;

    public function __construct() {

        require_once './model/database.php';

        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findBatiments() {

        $stmt = $this->conn->prepare("SELECT * FROM batiment");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function create_batiment($nom, $gps_lat, $gps_lon, $id_sites) {

        if ($this->existBatimentsbyName($nom))
        {
            $query = "INSERT INTO batiment (nom, gps_lat, gps_lon, id_sites) VALUES (:nom, :gps_lat, :gps_lon, :id_sites)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':gps_lat', $gps_lat);
            $stmt->bindParam(':gps_lon', $gps_lon);
            $stmt->bindParam(':id_sites', $id_sites);

            if ($stmt->execute()) return true;
            else return false;
        }
        else return false;
    }

    public function existBatimentsbyName($nom) {

        $stmt = $this->conn->prepare("SELECT * FROM batiment WHERE nom = :nom");
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) == 0) return true;
        else return false;
    }

    public function delete_batiment($id){

        $stmt = $this->conn->prepare("DELETE FROM batiment WHERE id_batiments = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function findBatimentbyId($id) {

        $stmt = $this->conn->prepare("SELECT * FROM batiment WHERE id_batiments = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) != 0) return $result;
        else return false;
    }

    public function findSites() {

        $stmt = $this->conn->prepare("SELECT * FROM sites");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function modif_batiment($id, $nom, $gps_lat, $gps_lon, $id_sites)
    {
        $query = "UPDATE batiment SET nom = :nom, gps_lat = :gps_lat, gps_lon = :gps_lon, id_sites = :id_sites WHERE id_batiments = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':gps_lat', $gps_lat);
        $stmt->bindParam(':gps_lon', $gps_lon);
        $stmt->bindParam(':id_sites', $id_sites);

        if ($stmt->execute()) return true;
        else return false;
    }
}

?>
