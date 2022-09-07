<?php session_start(); ?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">Vinc's Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=posts">Articles</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=about">A propos / CV
                    </a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=connection&action=seeConnection">Connexion / Inscription</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=disconnect">(Déco)</a></li>
            </ul>
        </div>
        <?php if (isset($_SESSION['LOGGED_USER']) && isset($_SESSION['ROLE_ADMIN'])) { ?>
            <strong style="background-color: red">ADMINISTRATION</strong>
        <?php }; ?>
    </div>
</nav>