<div class="form-container">
    <form method="post">
        <h2> Gestion des patients</h2>
        <h3><?= ($lePatient==null) ? 'Ajout d\'un patient' : 'Modifier le patient' ?></h3>

        <table>
            <tr>
                <td>Nom :</td>
                <td><input type="text" name="nom" value="<?= ($lePatient==null)? '': $lePatient['nom'] ?>"></td>
            </tr>
            <tr>
                <td>Prénom :</td>
                <td><input type="text" name="prenom" value="<?= ($lePatient==null)? '': $lePatient['prenom'] ?>"></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><input type="email" name="email" value="<?= ($lePatient==null)? '': $lePatient['email'] ?>"></td>
            </tr>
            <tr>
                <td>Adresse :</td>
                <td><input type="text" name="adresse" value="<?= ($lePatient==null)? '': $lePatient['adresse'] ?>"></td>
            </tr>
            <tr>
                <td>Téléphone :</td>
                <td><input type="tel" name="tel" value="<?= ($lePatient==null)? '': $lePatient['tel'] ?>"></td>
            </tr>
        </table>

        <?php if($lePatient!=null): ?>
            <input type="hidden" name="idpatient" value="<?= $lePatient['idpatient'] ?>">
        <?php endif; ?>

        <div class="form-buttons">
            <input type="reset" name="Annuler" value="Annuler" class="button">
            <input type="submit"
                   name="<?= ($lePatient==null) ? 'Valider' : 'Modifier' ?>"
                   value="<?= ($lePatient==null) ? 'Valider' : 'Modifier' ?>"
                   class="button">
        </div>
    </form>
</div>
