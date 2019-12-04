<?php $title = 'Ajouter Certificat'; ?>

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
    <h2 class="text-center"> Ajouter un Certificat</h2>

    <form  action="index.php?act=certificat&req=create-certificat" method="POST" id="form_CreateCertificat" enctype="multipart/form-data">

        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img"/>
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title">
        </p>

        <label for="cat"> Catégorie </label> <span class="error"></span>
        <select name="cat" id="cat">

        </select>
        <div>
            <br>
            <input type="submit" value="Ajouter un certificat">
        </div>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>

