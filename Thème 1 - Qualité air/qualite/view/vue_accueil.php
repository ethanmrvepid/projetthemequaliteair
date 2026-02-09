<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <link rel="stylesheet" href="./assets/css/style.css" />
	   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
       <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
       <title> Container </title>
   </head>
<body>
<fieldset>
		
		
<?php if($GLOBALS['auth']=="") {  ?> 
<legend><b>Menu Général </b> <?php for($i=0;$i<10;$i++) echo("&nbsp;"); ?> non authentifié </legend>    
<button onclick="window.location.href= '<?php echo($GLOBALS['base_url']).'auth/login' ?>';">Login</button>   
<?php
}
else if($GLOBALS['auth']=="user") {
?>
<legend><b>Menu Général </b> <?php for($i=0;$i<10;$i++) echo("&nbsp;"); ?> authentifié en tant que:<?php echo($GLOBALS['auth']); ?> </legend>  
<button onclick="window.location.href= '<?php echo($GLOBALS['base_url']).'mesures' ?>';">Qualité Air</button>  
<button onclick="window.location.href= '<?php echo($GLOBALS['base_url']).'auth/logout' ?>';">Logout</button> 

<?php
} else
{
?>
<legend><b>Menu Général </b> <?php for($i=0;$i<10;$i++) echo("&nbsp;"); ?> authentifié en tant que:<?php echo($GLOBALS['auth']); ?> </legend>  
<button onclick="window.location.href= '<?php echo($GLOBALS['base_url']).'mesures' ?>';">Qualité Air</button> 
<button onclick="window.location.href= '<?php echo($GLOBALS['base_url']).'sites' ?>';">Sites</button>  
<button onclick="window.location.href= '<?php echo($GLOBALS['base_url']).'batiments' ?>';">Batiments</button>  
<button onclick="window.location.href= '<?php echo($GLOBALS['base_url']).'salles' ?>';">Salles</button>  
<button onclick="window.location.href= '<?php echo($GLOBALS['base_url']).'auth/logout' ?>';">Logout</button> 
<?php
}

?>
<button onclick="window.location.href ='<?php echo($GLOBALS['base_url']).'accueil' ?>';">accueil</button>



</fieldset>
