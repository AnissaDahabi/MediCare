<h3>Liste des médecins</h3>
<form method="post" class="search-form">
    <input type="text" name="filtre" class="search-box" placeholder="Rechercher...">
    <input type="submit" name="Filtrer" value="Filtrer" class="button">
</form>
<br>
<div class="table-container">
    <table>
        <tr>
            <th>ID Médecin</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Spécialité</th>
            <?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin") echo "<th>Opérations</th>"; ?>
        </tr>
        <?php foreach($lesMedecins as $unMedecin): ?>
            <tr>
                <td><?= $unMedecin['idmedecin'] ?></td>
                <td><?= $unMedecin['nom'] ?></td>
                <td><?= $unMedecin['prenom'] ?></td>
                <td><?= $unMedecin['email'] ?></td>
                <td><?= $unMedecin['tel'] ?></td>
                <td><?= $unMedecin['specialite'] ?></td>
                <?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin"): ?>
                    <td>
                        <a href="index.php?page=3&action=sup&idmedecin=<?= $unMedecin['idmedecin'] ?>"><img src="Images/delete.png" width="20"></a>
                        <a href="index.php?page=3&action=edit&idmedecin=<?= $unMedecin['idmedecin'] ?>"><img src="Images/edit.png" width="18"></a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    echo "</br> Nombre de médecins : ".count($lesMedecins)." </br>" ;
    ?>
</div>

<footer>
    <p>&copy; 2025 MediCare - Tous droits réservés</p>
</footer>

