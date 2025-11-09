<div class="form-container">
    <form method="post">
        <h2> Gestion des prescriptions </h2>
        <h3><?= ($laPrescription==null) ? 'Ajout d\'une prescription' : 'Modifier la prescription' ?></h3>

        <table>
            <tr>
                <td>Date :</td>
                <td><input type="date" name="date_pres" value="<?= ($laPrescription==null)? '' : $laPrescription['date_pres'] ?>"></td>
            </tr>
            <tr>
                <td>Description :</td>
                <td><textarea name="prescription" rows="4" cols="40"><?= ($laPrescription==null)? '' : $laPrescription['prescription'] ?></textarea></td>
            </tr>
            <tr>
                <td>Patient :</td>
                <td>
                    <select name="idpatient">
                        <option value="" disabled selected>-- Sélectionner un patient --</option>
                        <?php foreach($lesPatients as $unPatient): ?>
                            <option value="<?= $unPatient['idpatient'] ?>"
                                    <?= ($laPrescription != null && $laPrescription['idpatient'] == $unPatient['idpatient']) ? 'selected' : '' ?>>
                                <?= $unPatient['nom'].' '.$unPatient['prenom'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Médecin :</td>
                <td>
                    <select name="idmedecin">
                        <option value="" disabled selected>-- Sélectionner un médecin --</option>
                        <?php foreach($lesMedecins as $unMedecin): ?>
                            <option value="<?= $unMedecin['idmedecin'] ?>"
                                    <?= ($laPrescription != null && $laPrescription['idmedecin'] == $unMedecin['idmedecin']) ? 'selected' : '' ?>>
                                <?= $unMedecin['nom'].' '.$unMedecin['prenom'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>

        <?php if($laPrescription!=null): ?>
            <input type="hidden" name="idpres" value="<?= $laPrescription['idpres'] ?>">
        <?php endif; ?>

        <div class="form-buttons">
            <input type="reset" value="Annuler" class="button">
            <input type="submit"
                   name="<?= ($laPrescription==null)? 'Valider' : 'Modifier' ?>"
                   value="<?= ($laPrescription==null)? 'Valider' : 'Modifier' ?>"
                   class="button">
        </div>
    </form>
</div>
