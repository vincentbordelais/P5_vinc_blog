<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('BootstrapTheme/assets/img/home-bg.jpg')">
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
            // foreach ($posts as $post) {
            ?>
            <!-- Post preview-->
            <!-- <div class="post-preview">
                <a href="index.php?action=post&id=<?= urlencode($post->id) ?>">
                    <h2 class="post-title"><?= htmlspecialchars($post->title); ?></h2>
                    <h3 class="post-subtitle"><?= nl2br(htmlspecialchars($post->content)); ?></h3>
                </a>
                <p class="post-meta">
                    Posté par Vinc le <?= $post->frenchCreationDate; ?>
                </p>
            </div>
            <!-- Divider-->
            <!-- <hr class="my-4" />
        <?php
        // }
        ?>

        <!-- Pager-->
            <!-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Billets plus anciens →</a></div> -->

            <p>Vous souhaitez me contacter ? Remplissez le formulaire ci-dessous pour m'envoyer un message et je vous répondrai dans les plus brefs délais !</p>
            <div class="my-5">
                <form id="contactForm" action="index.php? page=homepage & action=" method="POST">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="tel">Téléphone</label>
                        <input type="tel" class="form-control" id="tel" name="tel" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaire</label>
                        <textarea class="form-control" id="comment" name="comment" required></textarea>
                    </div><br />
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>