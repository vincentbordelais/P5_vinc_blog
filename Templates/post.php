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
                <p>
                    <?= nl2br(htmlspecialchars($post->getContent())) ?>
                </p>
            </div>

            <h2>Commentaires</h2>

            <!-- Formulaire commentaire pour les utilisateurs connectés -->
            <?php if (isset($_SESSION['LOGGED_USER'])) { ?>
                <form action="index.php?page=post&action=addComment&id=<?= $post->getId() ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Pseudonyme</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaire</label>
                        <textarea class="form-control" id="comment" name="comment"></textarea>
                    </div><br />
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            <?php };

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