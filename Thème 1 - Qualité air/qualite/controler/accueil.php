<?php

class acceuil extends authentification {
    public function __construct() {
	parent::__construct();

    require_once("./view/vue_accueil.php");
    require_once("./view/vue_footer.php");
	}
}



?>