<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('BootstrapTheme/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Mes articles</h1>
                </div>
            </div>
        </div>
    </div>
</header>



<?php ob_start(); ?>


<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <?php
            foreach ($posts as $post) {
            ?>
                <!-- Tout le monde peut voir la liste des articles -->
                <div class="post-preview">
                    <a href="index.php?page=post&action=seeOnePost&id=<?= urlencode($post->getId()) ?>">
                        <!-- htmlspecialchars() ou strip_tags() ignore le code HTML pour bloquer notamment l'exécution de code JavaScript -->
                        <h2 class="post-title"><?= htmlspecialchars($post->getTitle()); ?></h2>

                        <!-- Seul l'admin peut supprimer ou modifier un article -->
                        <?php if (isset($_SESSION['ROLE_ADMIN'])) { ?>
                            <div class="d-flex justify-content-end mb-4">
                                <a class="btn btn-primary text-uppercase" style="margin-right: 10px" href="index.php?page=adminPost&action=seeUpdateFormPost&id=<?= urlencode($post->getId()) ?>">Modifier</a>
                                <a class="btn btn-primary text-uppercase" href="index.php?page=adminPost&action=deletePost&id=<?= urlencode($post->getId()) ?>">Suprimer</a>
                            </div>
                        <?php }; ?>

                        <h3 class="post-subtitle"><?= nl2br(htmlspecialchars($post->getWording())); ?></h3>
                    </a>
                    <p class="post-meta">
                        Posté par Vinc le <?= $post->getUpdateDate(); ?>
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            <?php
            }
            ?>


        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>


<?php require('layout.php') ?>