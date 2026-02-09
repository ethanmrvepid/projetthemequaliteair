<?php

class api  {
	public function __construct() {
	print_r($_GET);
	

try {
    $bdd = new PDO('mysql:host=localhost;dbname=qualite_air;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_GET['temperature'], $_GET['humidite'], $_GET['co2'], $_GET['id_salles'])) {
    $temp = floatval($_GET['temperature']);
    $humi = floatval($_GET['humidite']);
    $co2 = floatval($_GET['co2']);
    $id_salles = htmlspecialchars($_GET['id_salles']);
    
    $stmt = $bdd->prepare("INSERT INTO mesures (temperature, humidite, co2, id_salles) VALUES (?, ?, ?, ?)");
    $stmt->execute([$temp, $humi, $co2, $id_salles]);
    
    echo "Enregistrement complet OK";
} else {
    echo "Paramètres manquants";
}

    
}

}
?>