<h3>Liste des patients</h3>
<form method="post" class="search-form">
    <input type="text" name="filtre" class="search-box" placeholder="Rechercher...">
    <input type="submit" name="Filtrer" value="Filtrer" class="button">
</form>
<br>
<div class="table-container">
    <table>
        <tr>
            <th>ID Patient</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin") echo "<th>Opérations</th>"; ?>
        </tr>
        <?php foreach($lesPatients as $unPatient): ?>
            <tr>
                <td><?= $unPatient['idpatient'] ?></td>
                <td><?= $unPatient['nom'] ?></td>
                <td><?= $unPatient['prenom'] ?></td>
                <td><?= $unPatient['email'] ?></td>
                <td><?= $unPatient['adresse'] ?></td>
                <td><?= $unPatient['tel'] ?></td>
                <?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin"): ?>
                    <td>
                        <a href="index.php?page=2&action=sup&idpatient=<?= $unPatient['idpatient'] ?>"><img src="Images/delete.png" width="20"></a>
                        <a href="index.php?page=2&action=edit&idpatient=<?= $unPatient['idpatient'] ?>"><img src="Images/edit.png" width="18"></a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    echo "</br> Nombre de patients: ".count($lesPatients)." Patients </br>" ;
    ?>

</div>
    <footer>
        <p>&copy; 2025 MediCare - Tous droits réservés</p>
    </footer>

