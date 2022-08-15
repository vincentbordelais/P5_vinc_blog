<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Le blog de Vinc !</h1>
                    <span class="subheading">Les derniers billets : </span>
                </div>
            </div>
        </div>
    </div>
</header>



<?php ob_start(); ?>
<!-- <h1>Le super blog de Vinc !</h1>
<p>Derniers billets du blog :</p> -->


<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <?php
            foreach ($posts as $post) {
            ?>
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="index.php?action=post&id=<?= urlencode($post['id']) ?>">
                        <h2 class="post-title"><?= htmlspecialchars($post['title']); ?></h2>
                        <h3 class="post-subtitle"><?= nl2br(htmlspecialchars($post['content'])); ?></h3>
                    </a>
                    <p class="post-meta">
                        Posté par
                        <a href="#!">Start Bootstrap</a>
                        le <?= $post['french_creation_date']; ?>
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            <?php
            }
            ?>

            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Billets plus anciens →</a></div>

        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>


<?php require('layout.php') ?>