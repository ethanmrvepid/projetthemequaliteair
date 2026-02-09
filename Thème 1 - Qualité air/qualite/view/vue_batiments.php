<BR>

<fieldset>

<?php

if (isset($data['erreur'])) echo $data['erreur'];

if (isset($data['batiments']) && $data['batiments'] != null)
{
?>

<h2> choisissez le batiment</h2>

<form method="post" action="<?php echo $GLOBALS['base_url'] . 'batiments/action'; ?>">

<select name="id_batiments">

<?php foreach ($data['batiments'] as $item): ?>
    <option value="<?php echo htmlspecialchars($item['id_batiments']); ?>">
        <?php echo htmlspecialchars($item['nom']); ?>
    </option>
<?php endforeach; ?>

</select>

<input type="submit" name="choix" value="modifier_batiment">
<input type="submit" name="choix" value="suprimer_batiment">

</form>

<?php
}
?>

<h2> créer le batiment</h2>

<form method="post" action="<?php echo $GLOBALS['base_url'] . 'batiments/create'; ?>">

<label for="nom_batiment">Nom du batiment :</label>
<input type="text" id="nom_batiment" name="nom_batiment" required>
<BR>

<label for="gps_lat">GPS_LAT :</label>
<input type="text" id="gps_lat" name="gps_lat" required>
<BR>

<label for="gps_lon">GPS_LON :</label>
<input type="text" id="gps_lon" name="gps_lon" required>
<BR>

<label for="id_site">id sites :</label>
<select name="id_site" id="id_site">

<?php if (!empty($data['sites'])): ?>
    <?php foreach ($data['sites'] as $item): ?>
        <option value="<?php echo htmlspecialchars($item['id_sites']); ?>">
            <?php echo htmlspecialchars($item['id_sites'] . ' - ' . $item['nom']); ?>
        </option>
    <?php endforeach; ?>
<?php endif; ?>

</select>

<input type="submit" name="choix" value="creer_batiment">

</form>

</fieldset>
