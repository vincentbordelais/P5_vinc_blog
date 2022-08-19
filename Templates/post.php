<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('BootstrapTheme/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= htmlspecialchars($post->title) ?></h1>
                    <h2 class="subheading"><?= htmlspecialchars($post->wording) ?></h2>
                    <span class="meta">
                        Posté par Vinc <em>le <?= $post->frenchCreationDate ?></em>
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
                    <?= htmlspecialchars($post->title) ?>
                    <em>le <?= $post->frenchCreationDate ?></em>
                </h3> -->

                <p>
                    <?= nl2br(htmlspecialchars($post->content)) ?>
                </p>
            </div>

            <h2>Commentaires</h2>

            <form action="index.php?action=addComment&id=<?= $post->id ?>" method="post">
                <div>
                    <label for="author">Votre pseudonyme</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>

            <?php
            foreach ($comments as $comment) {
            ?>
                <p><strong><?= htmlspecialchars($comment->user_id) ?></strong> le <?= $comment->frenchCreationDate ?></p>
                <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>

            <?php
            }
            ?>

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>