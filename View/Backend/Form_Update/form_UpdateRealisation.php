<?php $title = 'Modifier Realisation'; ?>

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
    <h2> Modifier réalisation</h2>

    <form  action="index.php?act=realisation&req=update" method="POST" id="form_UpdateRealisation" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$realisation->getId();?>">
        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img" value="<?=$realisation->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title" value="<?=$realisation->getTitle();?>">
        </p>

        <p>
            <label for="content"> Contenu </label> <span class="error"></span>
            <textarea name="content" id="content_o" form="form_UpdateRealisation" cols="100" rows="10" class="tinymce"> <?=$realisation->getContent();?></textarea>
        </p>

        <p>
            <label for="link_view"> Lien vue </label> <span class="error"></span>
            <input type="url" id="link_view" name="link_view" value="<?=$realisation->getLinkView();?>">
        </p>

        <p>
            <label for="link_git"> Lien github </label> <span class="error"></span>
            <input type="url" id="link_git" name="link_git" value="<?=$realisation->getLinkGit();?>">
        </p>
        <p>
            <br>
            <input type="submit" value="Modifier">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>

