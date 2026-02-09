<BR>

<fieldset>

<h2> Modifier le batiment</h2>

<form method="post" action="<?php echo $GLOBALS['base_url'] . 'batiments/action'; ?>">

<label for="nom_batiment">Nom du batiment :</label>
<input type="text" id="nom_batiment" name="nom_batiment" value="<?php echo htmlspecialchars($data['info'][0]['nom']); ?>" required>
<BR>

<label for="gps_lat">GPS_LAT :</label>
<input type="text" id="gps_lat" name="gps_lat" value="<?php echo htmlspecialchars($data['info'][0]['GPS_LAT']); ?>" required>
<BR>

<label for="gps_lon">GPS_LON :</label>
<input type="text" id="gps_lon" name="gps_lon" value="<?php echo htmlspecialchars($data['info'][0]['GPS_LON']); ?>" required>
<BR>

<label for="id_site">Id site :</label>
<select id="id_site" name="id_site">
    <?php foreach ($data['sites'] as $item): ?>
        <option value="<?php echo htmlspecialchars($item['id_sites']); ?>"
            <?php if ($item['id_sites'] == $data['info'][0]['id_sites']) echo 'selected'; ?>>
            <?php echo htmlspecialchars($item['id_sites'] . ' - ' . $item['nom']); ?>
        </option>
    <?php endforeach; ?>
</select>

<input type="text" id="id_batiments" name="id_batiments" value="<?php echo htmlspecialchars($data['info'][0]['id_batiments']); ?>" readonly hidden>

<input type="submit" name="choix" value="enregistrer_batiment">

</form>

</fieldset>
