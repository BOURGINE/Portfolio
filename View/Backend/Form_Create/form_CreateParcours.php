<?php $title = 'Ajouter un Parcours'; ?>

<?php ob_start(); ?>

<div class="bande_profil container">

    <div class="profile_member">
        <!-- ** PSEUDO *-->
       <p> <?= 'HELLO '.$_SESSION['pseudo'].' !'?> </p>
    </div>


    <div class="space_nav">
        <a href="index.php"> <div class="button">ACCUEIL</div> </a>
        <a href="index.php?act=code-lioko&req=authentification"> <div class="button">BACK-OFFICE</div> </a>
        <a href="index.php?act=deconnexion"> <div class="button">DECONNEXION</div> </a>
    </div>

</div>

<div class="page_form container">
    <h1> Ajouter un parcours</h1>

    <form  action="index.php?act=parcour&req=create-parcour" method="POST" id="form_CreateCompetence" enctype="multipart/form-data">

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title">
        </p>

        <p>
            <label for="link"> Lien (vers école)</label> <span class="error"></span>
            <input type="url" id="link" name="link">
        </p>

        <div>
            <input type="submit" value="Ajouter un parcours">
        </div>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>

