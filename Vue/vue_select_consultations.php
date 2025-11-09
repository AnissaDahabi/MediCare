<h3>Liste des consultations</h3>

<form method="post" class="search-form">
    <input type="text" name="filtre" class="search-box" placeholder="Rechercher...">
    <input type="submit" name="Filtrer" value="Filtrer" class="button">
</form>
<br>

<div class="table-container">
    <table>
        <tr>
            <th>ID Consultation</th>
            <th>Prix (€)</th>
            <th>Patient</th>
            <th>Médecin</th>
            <th>Début</th>
            <th>Fin</th>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") echo "<th>Opérations</th>"; ?>
        </tr>

        <?php foreach ($lesConsultations as $uneConsultation): ?>
            <tr>
                <td><?= $uneConsultation['idconsult'] ?></td>
                <td><?= $uneConsultation['prix'] ?></td>
                <td><?= $uneConsultation['nom_patient'] . " " . $uneConsultation['prenom_patient'] ?></td>
                <td><?= $uneConsultation['nom_medecin'] . " " . $uneConsultation['prenom_medecin'] ?></td>
                <td><?= date('d/m/Y H:i', strtotime($uneConsultation['debut'])) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($uneConsultation['fin'])) ?></td>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin"): ?>
                    <td>
                        <a href="index.php?page=5&action=sup&idconsult=<?= $uneConsultation['idconsult'] ?>">
                            <img src="Images/delete.png" width="20" alt="Supprimer">
                        </a>
                        <a href="index.php?page=5&action=edit&idconsult=<?= $uneConsultation['idconsult'] ?>">
                            <img src="Images/edit.png" width="18" alt="Modifier">
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <?php echo "Nombre de consultations : " . count($lesConsultations) . " consultation(s)."; ?>
</div>

<footer>
    <p>&copy; 2025 MediCare - Tous droits réservés</p>
</footer>
