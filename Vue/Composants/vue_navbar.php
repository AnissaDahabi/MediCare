<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>

<nav class="navbar">

    <div class="nav-left">
        <a href="index.php?page=1" class="logo">
            <img src="Images/logo.png" alt="logo Care" height="60">
        </a>
    </div>

    <?php if(isset($_SESSION['email'])): ?>

        <div class="nav-center">
            <?php
            if ($page == 2) {
                echo '<a href="index.php?page=2" class="active">Patients</a>';
            } else {
                echo '<a href="index.php?page=2">Patients</a>';
            }

            if ($page == 3) {
                echo '<a href="index.php?page=3" class="active">Médecins</a>';
            } else {
                echo '<a href="index.php?page=3">Médecins</a>';
            }

            if ($page == 4) {
                echo '<a href="index.php?page=4" class="active">Prescriptions</a>';
            } else {
                echo '<a href="index.php?page=4">Prescriptions</a>';
            }

            if ($page == 5) {
                echo '<a href="index.php?page=5" class="active">Consultations</a>';
            } else {
                echo '<a href="index.php?page=5">Consultations</a>';
            }
            ?>
        </div>

        <div class="nav-right">
            <a href="index.php?page=6" class="button">Déconnexion</a>
        </div>

    <?php endif; ?>

</nav>
