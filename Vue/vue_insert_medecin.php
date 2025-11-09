<div class="form-container">
    <form method="post">
        <h2> Gestion des médecins</h2>
        <h3><?= ($leMedecin==null) ? 'Ajout d\'un médecin' : 'Modifier le médecin' ?></h3>

        <table>
            <tr>
                <td>Nom :</td>
                <td><input type="text" name="nom" value="<?= ($leMedecin==null)? '': $leMedecin['nom'] ?>"></td>
            </tr>
            <tr>
                <td>Prénom :</td>
                <td><input type="text" name="prenom" value="<?= ($leMedecin==null)? '': $leMedecin['prenom'] ?>"></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><input type="email" name="email" value="<?= ($leMedecin==null)? '': $leMedecin['email'] ?>"></td>
            </tr>
            <tr>
                <td>Téléphone :</td>
                <td><input type="tel" name="tel" value="<?= ($leMedecin==null)? '': $leMedecin['tel'] ?>"></td>
            </tr>
            <tr>
                <td>Spécialité :</td>
                <td><input type="text" name="specialite" value="<?= ($leMedecin==null)? '': $leMedecin['specialite'] ?>"></td>
            </tr>
        </table>

        <?php if($leMedecin!=null): ?>
            <input type="hidden" name="idmedecin" value="<?= $leMedecin['idmedecin'] ?>">
        <?php endif; ?>

        <div class="form-buttons">
            <input type="reset" value="Annuler" class="button">
            <input type="submit"
                   name="<?= ($leMedecin==null)? 'Valider' : 'Modifier' ?>"
                   value="<?= ($leMedecin==null)? 'Valider' : 'Modifier' ?>"
                   class="button">
        </div>
    </form>
</div>

