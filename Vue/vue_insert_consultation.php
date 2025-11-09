<div class="form-container">
    <form method="post">
        <h2>Gestion des consultations</h2>
        <h3><?= ($laConsultation == null) ? "Ajout d'une consultation" : "Modifier la consultation" ?></h3>

        <table>
            <tr>
                <td>Prix :</td>
                <td><input type="number" step="0.01" name="prix" value="<?= ($laConsultation == null) ? '' : $laConsultation['prix'] ?>"></td>
            </tr>
            <tr>
                <td>Patient :</td>
                <td>
                    <select name="idpatient">
                        <option value="">-- Sélectionner un patient --</option>
                        <?php foreach($lesPatients as $patient): ?>
                            <option value="<?= $patient['idpatient'] ?>" <?= ($laConsultation != null && $laConsultation['idpatient'] == $patient['idpatient']) ? 'selected' : '' ?>>
                                <?= $patient['nom'] . " " . $patient['prenom'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Médecin :</td>
                <td>
                    <select name="idmedecin">
                        <option value="">-- Sélectionner un médecin --</option>
                        <?php foreach($lesMedecins as $medecin): ?>
                            <option value="<?= $medecin['idmedecin'] ?>" <?= ($laConsultation != null && $laConsultation['idmedecin'] == $medecin['idmedecin']) ? 'selected' : '' ?>>
                                <?= $medecin['nom'] . " " . $medecin['prenom'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Début :</td>
                <td><input type="datetime-local" name="debut" value="<?= ($laConsultation == null) ? '' : date('Y-m-d\TH:i', strtotime($laConsultation['debut'])) ?>"></td>
            </tr>
            <tr>
                <td>Fin :</td>
                <td><input type="datetime-local" name="fin" value="<?= ($laConsultation == null) ? '' : date('Y-m-d\TH:i', strtotime($laConsultation['fin'])) ?>"></td>
            </tr>
        </table>

        <?php if ($laConsultation != null): ?>
            <input type="hidden" name="idconsult" value="<?= $laConsultation['idconsult'] ?>">
        <?php endif; ?>

        <div class="form-buttons">
            <input type="reset" name="Annuler" value="Annuler" class="button">
            <input type="submit"
                   name="<?= ($laConsultation == null) ? 'Valider' : 'Modifier' ?>"
                   value="<?= ($laConsultation == null) ? 'Valider' : 'Modifier' ?>"
                   class="button">
        </div>
    </form>
</div>
