<BR>
<fieldset>
<legend><b>Identifiez vous</b></legend>
 <form method="POST" action="<?php echo($GLOBALS['base_url']).'auth/login' ?>">
            <div>
                <label for="identifiant">Nom d'utilisateur :</label>
                <input type="text" id="identifiant" name="identifiant" required>
            </div>
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Se connecter">
            </div>
        </form>
</fieldset>		

