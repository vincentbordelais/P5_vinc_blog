<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('BootstrapTheme/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Mes messages</h1>
                </div>
            </div>
        </div>
    </div>
</header>



<?php ob_start(); ?>


<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <!-- Seul l'admin peut consulter les messages -->
            <?php
            foreach ($messages as $message) {
            ?>
                <div class="post-preview">
                    <p class="post-meta">
                        Message n° <?= $message->getId(); ?>
                    </p>
                    <p class="post-meta">
                        De <strong><?= $message->getFirstname(); ?></strong> <?= $message->getLastname(); ?> (<?= $message->getEmail(); ?>)
                    </p>
                    <p class="post-meta">
                        Le <?= $message->getCreated_date(); ?>
                    </p>
                    <p class="post-meta">
                        <?= $message->getMessage(); ?>
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