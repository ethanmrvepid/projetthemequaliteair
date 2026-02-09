<?php

class mesures extends authentification {
	public function __construct() {
	parent::__construct();

    
}
public function index()
{
require("./view/vue_accueil.php");

require("./view/vue_footer.php");
}

}



?>