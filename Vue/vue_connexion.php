<?php
require_once("Vue/Composants/vue_navbar.php");
?>
<br>
<div class="login-container">
    <form method="post" action="index.php?page=connexion" class="popup">
        <table border="0">
            <label for="Connexion"><h3>Connectez-vous</h3></label>
            <tr>
                <td>Email :</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mot de passe :</td>
                <td><input type="password" name="mdp"></td>
            </tr>
            <tr>
                <td><input type="reset" value="Annuler" class="button"></td>
                <td><input type="submit" name="Connexion" value="Connexion" class="button"></td>
            </tr>
        </table>
    </form>
</div>
