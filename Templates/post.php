<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('BootstrapTheme/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= htmlspecialchars($post->getTitle()) ?></h1>
                    <h2 class="subheading"><?= htmlspecialchars($post->getWording()) ?></h2>
                    <span class="meta">
                        Posté par Vinc <em>le <?= $post->getCreationDate() ?></em>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>


<?php ob_start(); ?>

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <div>
                <!-- <h3>
                    <?= htmlspecialchars($post->getTitle()) ?>
                    <em>le <?= $post->getCreationDate() ?></em>
                </h3> -->

                <p>
                    <?= nl2br(htmlspecialchars($post->getContent())) ?>
                </p>
            </div>

            <h2>Commentaires</h2>
            <!-- Formulaire commentaire pour les utilisateurs connectés en passant l'id du user par la session (ou pas en saisissant le username ?) -->
            <form id="contactForm" action="index.php? page=post & action=addComment & id=<?= $post->getId() ?>" method="POST">
                <div class="form-floating">
                    <input class="form-control" id="author" type="text" name="username" placeholder="Saisissez votre pseudo..." data-sb-validations="required" />
                    <label for="name">Votre pseudonyme</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">Un pseudo est requis.</div>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" id="comment" type="text" name="comment" placeholder="Saisissez votre commentaire..." data-sb-validations="required"></textarea>
                    <label for="comment">Commentaire</label>
                </div>
                </br>
                <button class="btn btn-primary text-uppercase disabled" id="submitButton" type="submit">Envoyer</button>
            </form>

            <?php
            foreach ($comments as $comment) {
            ?>
                <p><strong><?= htmlspecialchars($comment->getUsername()) ?></strong> le <?= $comment->getCreation_date() ?></p>
                <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>