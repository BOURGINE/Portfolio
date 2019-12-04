<?php $title = 'Modifier Certificat'; ?>

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
    <h2 class="text-center"> Modifier certificat</h1>

    <form  action="index.php?act=certificat&req=update" method="POST" id="form_CreateCompetence" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$certificat->getId();?>">
        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img" value="<?=$certificat->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title" value="<?=$certificat->getTitle();?>">
        </p>

        <p>
            <br>
            <input type="submit" value="Modifier">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>

