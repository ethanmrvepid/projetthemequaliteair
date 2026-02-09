<BR>

<fieldset>

<?php

if(isset($data['erreur'])) echo ($data['erreur']);

if (isset($data['sites']) && $data['sites']!=null)

{

?>

<h2> choisissez le site</h2>

<form method="post" action="<?php echo($GLOBALS['base_url']).'sites/action' ?>">

<select name="id_site">



<?php



foreach ($data['sites'] as $item):

?>

<option value="<?php echo ($item['id_sites']);?>"> <?php echo ($item['nom']);?> </option>

<?php

endforeach;



?>

</select>

<input type="submit" name="choix" value="modifier_site">

<input type="submit" name="choix" value="suprimer_site">





</form>

<?php

}

?>

<h2> créer le site</h2>

<form method="post" action="<?php echo($GLOBALS['base_url']).'sites/create' ?>">

<label for="identifiant">Nom du site :</label>

<input type="text" id="nom_site" name="nom_site" required>

<BR>

<label for="identifiant">GPS_LAT :</label>

<input type="text" id="gps_lat" name="gps_lat" required>

<BR>

<label for="identifiant">GPS_LON :</label>

<input type="text" id="gps_lon" name="gps_lon" required>

<BR>

<label for="identifiant">Adresse :</label>

<input type="text" id="adresse" name="adresse" required>



<input type="submit" name="choix" value="creer_site">





</form>

</fieldset>     