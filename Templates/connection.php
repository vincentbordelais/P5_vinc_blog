<?php session_start(); ?>
<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('BootstrapTheme/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Connexion</h1>
                </div>
            </div>
        </div>
    </div>
</header>


<?php ob_start(); ?>

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <!-- Seul un utilisateur inscrit peut se connecter -->
            <?php if (isset($_SESSION['errorMessage'])) { ?>
                <div class="alert alert-danger ?>" role="alert">
                    <span><?php echo $_SESSION['errorMessage']; ?></span>
                </div>
            <?php }
            unset($_SESSION['errorMessage']);
            ?>

            <form action="index.php? page=connection&action=login" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <br><button type="submit" class="btn btn-primary">Envoyer</button>
            </form>


            <p>Si vous n'avez pas encore créé de compte, c'est ici: <a href="index.php?page=registration&action=seeRegistration">Inscription</a></p>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>