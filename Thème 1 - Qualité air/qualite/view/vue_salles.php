<BR>

<fieldset>

<?php

if (isset($data['erreur'])) echo $data['erreur'];

if (isset($data['salles']) && $data['salles'] != null)
{
?>

<h2> choisissez la salle</h2>

<form method="post" action="<?php echo $GLOBALS['base_url'] . 'salles/action'; ?>">

<select name="id_salles">

<?php foreach ($data['salles'] as $item): ?>
    <option value="<?php echo htmlspecialchars($item['id_salles']); ?>">
        <?php echo htmlspecialchars($item['nom']); ?>
    </option>
<?php endforeach; ?>

</select>

<input type="submit" name="choix" value="suprimer_salle">

</form>

<?php
}
?>

<h2> créer la salle</h2>

<form method="post" action="<?php echo $GLOBALS['base_url'] . 'salles/create'; ?>">

<label for="nom_salle">Nom de la salle :</label>
<input type="text" id="nom_salle" name="nom_salle" required>
<BR>



<label for="id_batiments">id batiment :</label>
<select name="id_batiments" id="id_batiments">

<?php if (!empty($data['batiments'])): ?>
    <?php foreach ($data['batiments'] as $item): ?>
        <option value="<?php echo htmlspecialchars($item['id_batiments']); ?>">
            <?php echo htmlspecialchars($item['id_batiments'] . ' - ' . $item['nom']); ?>
        </option>
    <?php endforeach; ?>
<?php endif; ?>

</select>

<input type="submit" name="choix" value="creer_salle">

</form>

</fieldset>
