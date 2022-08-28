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
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="form-floating">
                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Nom</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est requis.</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                        <label for="email">Email</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Un email est requis.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email non valide.</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                        <label for="phone">Télephone</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">Un téléphone est requis.</div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                        <label for="message">Message</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Un message est requis.</div>
                    </div>
                    <br />
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Envoi du formulaire réussi!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Erreur d'envoi du message!</div>
                    </div>
                    <!-- Submit Button-->
                    <button class="btn btn-primary text-uppercase disabled" id="submitButton" type="submit">Envoyer</button>
                </form>
            </div>

        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

<?php require('layout.php') ?>