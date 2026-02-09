<?php



class authentification_model {

       private $conn;

    public function __construct() {

       require_once './model/database.php';

       $database = new Database();

        $this->conn = $database->getConnection();

               

       }

       

       public function findUser($identifiant, $password) {

               $out=0;

        try {

            $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE identifiant = :identifiant");

            $stmt->bindParam(':identifiant', $identifiant);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

                       

            if ($result) {

                $hash_enregistre = $result['password'];

                if (password_verify($password, $hash_enregistre)) $out=$result["role"];

                }



            return $out;

        } catch (PDOException $e) {

            echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();

            return $out;

        }

    }

}



       

       ?>