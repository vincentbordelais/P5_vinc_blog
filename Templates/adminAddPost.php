<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('BootstrapTheme/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Rédiger un article</h1>
                    <!-- <span class="subheading">Développeur PHP / Symfony</span> -->
                </div>
            </div>
        </div>
    </div>
</header>

<?php ob_start(); ?>


<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <!-- Formulaire création article pour l'admin connecté -->
            <?php if (isset($_SESSION['ROLE_ADMIN'])) { ?>
                <form action="index.php?page=adminPost&action=addPost" method="POST">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="wording">Chapo</label>
                        <input type="text" class="form-control" id="wording" name="wording" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Contenu de l'article</label>
                        <textarea class="form-control" id="content" name="content" required></textarea>
                    </div><br />
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            <?php }; ?>

        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>


<?php require('layout.php') ?>