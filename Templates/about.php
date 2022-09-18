<?php $title = "Le blog de Vinc"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('BootstrapTheme/assets/img/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>A propos de moi</h1>
                    <span class="subheading">Développeur PHP / Symfony</span>
                </div>
            </div>
        </div>
    </div>
</header>

<?php ob_start(); ?>


<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <p>J’ai pour objectif de monter nettement en compétence dans le domaine du back-end sur Symfony.<br>
                Je travaille chez Sirom en alternance, mon référent est le pdg, Eric Vigneron.
                Sirom est un éditeur de logiciel de gestion, utilisant la technologie Symfony 7.2.</p>
            <p>Anciennement chef opérateur du son, j’ai débuté ma reconversion en tant que développeur web en suivant une formation continue chez WebForce3 de développeur web puis une année en alternance avec l’IPSSI en devOps.</p>

            <!-- CV-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="cv/CV_Bordelais_Vincent.pdf" target="_blank">Téléchargez mon CV</a></div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>


<?php require('layout.php') ?>