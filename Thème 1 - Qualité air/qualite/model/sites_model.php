<?php



class sites_model {

       private $conn;

    public function __construct() {

       require_once './model/database.php';

       $database = new Database();

        $this->conn = $database->getConnection();

               

       }

       

       public function findSites() {

       

            $stmt = $this->conn->prepare("SELECT * FROM sites");

            $stmt->execute();

            $result = $stmt->fetchAll();

                       



            return $result; // ressort un array 

        

    }

public function create_site($nom,$gps_lat,$gps_lon,$adresse) {

       if ($this->existSitesbyname($nom))

       {

       

       $query = "INSERT INTO sites (nom,gps_lat,gps_lon,adresse) VALUES (:nom, :gps_lat, :gps_lon, :adresse)";

       $stmt = $this->conn->prepare($query);

       $stmt->bindParam(':nom', $nom);

       $stmt->bindParam(':gps_lat', $gps_lat);

       $stmt->bindParam(':gps_lon', $gps_lon);

       $stmt->bindParam(':adresse', $adresse);

       if ($stmt->execute()) return true;

       else return false;

       }

       else return false;

}



       public function existSitesbyName($nom) {

                       $stmt = $this->conn->prepare("SELECT * FROM sites WHERE nom = :nom");

                       $stmt->bindParam(':nom', $nom);

            $stmt->execute();

            $result = $stmt->fetchAll();

                       if (count($result)==0) return true;

                       else return false;

       }

public function delete_site($id){

       $stmt = $this->conn->prepare("SELECT * FROM batiment WHERE batiment.id_sites = :id");
       $stmt->bindParam(':id', $id);
       $stmt->execute();
       $result = $stmt->fetchAll();
              if (count($result)==0) 
              {
              $stmt = $this->conn->prepare("DELETE from sites WHERE id_sites = :id");
              $stmt->bindParam(':id', $id);
              $stmt->execute();
              }
              else return false;
}

public function findSitesbyId($id) {

                       $stmt = $this->conn->prepare("SELECT * FROM sites WHERE id_sites = :id");

                       $stmt->bindParam(':id', $id);

            $stmt->execute();

            $result = $stmt->fetchAll();

                       if (count($result)!=0) return $result;

                       else return false;

       }

       

       public function modif_site($id,$nom,$gps_lat,$gps_lon,$adresse)

       {

       $query = "UPDATE sites SET nom=:nom ,gps_lat =:gps_lat,gps_lon=:gps_lon,adresse=:adresse WHERE id_sites=:id";

       $stmt = $this->conn->prepare($query);

       $stmt->bindParam(':id', $id);

       $stmt->bindParam(':nom', $nom);

       $stmt->bindParam(':gps_lat', $gps_lat);

       $stmt->bindParam(':gps_lon', $gps_lon);

       $stmt->bindParam(':adresse', $adresse);

       if ($stmt->execute()) return true;

       else return false;



       }
}

?>