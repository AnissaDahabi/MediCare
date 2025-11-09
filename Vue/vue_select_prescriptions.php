<h3>Liste des prescriptions</h3>
<form method="post" class="search-form">
    <input type="text" name="filtre" class="search-box" placeholder="Rechercher...">
    <input type="submit" name="Filtrer" value="Filtrer" class="button">
</form>
<br>
<div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Prescription</th>
            <th>Patient</th>
            <th>Médecin</th>
            <?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin") echo "<th>Opérations</th>"; ?>
        </tr>
        <?php foreach($lesPrescriptions as $unePrescription): ?>
            <tr>
                <td><?= $unePrescription['idpres'] ?></td>
                <td><?= $unePrescription['date_pres'] ?></td>
                <td><?= $unePrescription['prescription'] ?></td>
                <td><?= $unePrescription['nom_patient'].' '.$unePrescription['prenom_patient'] ?></td>
                <td><?= $unePrescription['nom_medecin'].' '.$unePrescription['prenom_medecin'] ?></td>
                <?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin"): ?>
                    <td>
                        <a href="index.php?page=4&action=sup&idpres=<?= $unePrescription['idpres'] ?>"><img src="Images/delete.png" width="20"></a>
                        <a href="index.php?page=4&action=edit&idpres=<?= $unePrescription['idpres'] ?>"><img src="Images/edit.png" width="18"></a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    echo "</br> Nombre de prescriptions : ".count($lesPrescriptions)." </br>" ;
    ?>
</div>

<footer>
    <p>&copy; 2025 MediCare - Tous droits réservés</p>
</footer>
