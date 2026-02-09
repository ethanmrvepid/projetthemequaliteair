<BR>

<fieldset>



<h2> Modifier le site</h2>

<form method="post" action="<?php echo($GLOBALS['base_url']).'sites/action' ?>">

<label for="identifiant">Nom du site :</label>

<input type="text" id="nom_site" name="nom_site" value="<?php echo($data['info'][0]['nom']); ?>" required>

<BR>

<label for="identifiant">GPS_LAT :</label>

<input type="text" id="gps_lat" name="gps_lat" value="<?php echo($data['info'][0]['GPS_LAT']); ?>" required>

<BR>

<label for="identifiant">GPS_LON :</label>

<input type="text" id="gps_lon" name="gps_lon" value="<?php echo($data['info'][0]['GPS_LON']); ?>" required>

<BR>

<label for="identifiant">Adresse :</label>

<input type="text" id="adresse" name="adresse" value="<?php echo($data['info'][0]['adresse']); ?>" required>

<input type="text" id="id_sites" name="id_sites" value="<?php echo($data['info'][0]['id_sites']); ?>" readonly hidden>



<input type="submit" name="choix" value="enregistrer_site">



</form>

</fieldset>        