<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= htmlspecialchars($post['title']) ?></h1>
                    <!-- <h2 class="subheading">Problems look mighty small from 150 miles up</h2> -->
                    <span class="meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        <em>le <?= $post['french_creation_date'] ?></em>
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
                    <?= htmlspecialchars($post['title']) ?>
                    <em>le <?= $post['french_creation_date'] ?></em>
                </h3> -->

                <p>
                    <?= nl2br(htmlspecialchars($post['content'])) ?>
                </p>
            </div>

            <h2>Commentaires</h2>

            <?php
            foreach ($comments as $comment) {
            ?>
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['french_creation_date'] ?></p>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

            <?php
            }
            ?>

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>