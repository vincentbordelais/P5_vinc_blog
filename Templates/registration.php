<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('BootstrapTheme/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Inscription</h1>
                </div>
            </div>
        </div>
    </div>
</header>


<?php ob_start(); ?>

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <div class="my-5">
                <form id="contactForm" action="index.php? page=registraion" method="POST">
                    <div class="form-floating">
                        <input class="form-control" id="name" type="text" placeholder="Saisissez votre pseudo..." data-sb-validations="required" />
                        <label for="name">Pseudonyme</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Un pseudo est requis.</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" id="name" type="text" placeholder="Saisissez votre nom..." data-sb-validations="required" />
                        <label for="name">Nom</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est requis.</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" id="name" type="text" placeholder="Saisissez votre prénom..." data-sb-validations="required" />
                        <label for="name">Prénom</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Un prénom est requis.</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" id="email" type="email" placeholder="saisissez votre email..." data-sb-validations="required,email" />
                        <label for="email">Email</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Un email est requis.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email non valide.</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" id="phone" type="text" placeholder="Saisissez votre mot de passe..." data-sb-validations="required" />
                        <label for="phone">Mot de passe</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">Un mot de passe est requis.</div>
                    </div>
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Envoi du formulaire réussi!</div>
                        </div>
                    </div>
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Erreur d'envoi du message!</div>
                    </div>
                    </br>
                    <button class="btn btn-primary text-uppercase disabled" id="submitButton" type="submit">Envoyer</button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>