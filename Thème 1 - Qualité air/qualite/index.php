<?php
$debut = (float)microtime() ;	//temps de début du script
$addr=$_SERVER["SERVER_ADDR"]; 	//adresse du serveur dans l'URL
$uri=$_SERVER['REQUEST_URI'];	// requete URI 
$uri_tab=explode('/',$uri);		// passage en tableau de l'URI 
$sup_elmt=["","index.php"];		// elemnt dans l'URI à ne pas tenir compte
$uri_ok=array();				// création d'un tableau uri_ok 
foreach ($uri_tab as $element){	// peuplement des elements valides dans uri_ok
if (!in_array($element, $sup_elmt)) array_push($uri_ok,$element);
	}
$base_url="http://localhost/".$uri_ok[0]."/"; 	// création de l'url de base
// $base_url="http://".$addr."/".$uri_ok[0]."/"; 	// création de l'url de base
$scandir = scandir("./controler");				// liste des controleurs dans 
$controlers=array();							// création d'un tableau controlers
foreach($scandir as $fichier){					// peuplement des controleurs valides dans controlers
  if(substr(strtolower($fichier), -4, 4) == '.php'){
    array_push($controlers,substr($fichier, 0, -4));
  }
}
$GLOBALS['base_url']=$base_url; // creation variable globale base_url
$GLOBALS['uri_ok']=$uri_ok;		// creation variable globale uri_ok
$GLOBALS['auth']="";			// creation variable globale auth
$GLOBALS['debut']=$debut;		// creation variable globale debut
require_once("./model_controler/authentification.php");		// appel classe controleur authentification
if((count($uri_ok)>=2) && ($uri_ok[1]=='api')) // si appel api lancement controleur api dans repertoire api
{
require_once("./api/api.php");
$api= new api();
}
else if((count($uri_ok)==1) || ($uri_ok[1]=='accueil') || ( !in_array($uri_ok[1],$controlers)))  // sinon verification URI 
{
require_once("./controler/accueil.php");										
$acceuil = new acceuil();			// utilisation controleur par defaut
}
else
{
require_once("./controler/".$uri_ok[1].".php");  
$controler= new $uri_ok[1]();		// utilisation controleur passé dans l'URL si OK

if (isset($uri_ok[2]))
	{
	$methodes = get_class_methods($controler);
	$nom=$uri_ok[2];
	if (in_array($nom,$methodes)) call_user_func_array(array($controler, $nom),array()); // appel controleur et fonction passés dans l'URL si OK
	else $controler->index();		// appel controleur sans fonction car fonction inconnue
	}
else $controler->index();			// appel controleur sans fonction car pas de fonction dans l'URL
}
?>
