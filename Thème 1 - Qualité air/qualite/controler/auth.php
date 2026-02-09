<?php

class auth extends authentification {

    public function __construct() {
	parent::__construct();

    
	}
	
public function index()
{
$this->login();
}
	
public function login()
{$test=false;
if (isset($_POST['identifiant']) && isset($_POST['password']))
{
if ($this->validate($_POST['identifiant'],$_POST['password'])) 
{
require("./view/vue_accueil.php");
$test=true;
}
}
if ($test==false)
{
require("./view/vue_accueil.php");
require("./view/vue_login.php");
}
require("./view/vue_footer.php");
}


public function logout()
{
$this->quit();
require("./view/vue_accueil.php");
require("./view/vue_footer.php");
}
}



?>