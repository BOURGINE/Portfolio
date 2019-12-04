<?php $title = 'Envoyer un message'; ?>

<?php ob_start(); ?>

<!-- ****************************************
                  ENTETE
      ******************************************-->
<div class="bande_profil">

    <div class="profile_member">
        <p> <?= 'HELLO '.$_SESSION['pseudo'].' !'?> </p>
    </div>

    <div class="space_nav">
        <a href="index.php"> <div class="button">ACCUEIL</div> </a>
        <a href="index.php?act=code-lioko&req=authentification"> <div class="button">BACK-OFFICE</div> </a>
        <a href="index.php?act=mail&req=readall&p="> <div class="button">MAIL BOX</div> </a>
        <a href="index.php?act=deconnexion"> <div class="button">DECONNEXION</div> </a>
    </div>

 </div>

<!-- ******************************
                MESSAGES
      ******************************-->
<div class="page_form" style="padding-left:20%; padding-right:20%;">

    <div class="section_articles"> <h3 style="text-align: center"> REPONSE AU MESSAGE DE: <?=$message->getNom();?> </h3></div>

    <form method="POST" action="index.php?act=mail&req=answers" id="form_admin">
        <input type="hidden" id="id" name="id" value="<?=$message->getId();?>">

        <p>
            <input type="text" id="mail" name="mail" value="<?=$message->getMail();?>">
            <input type="text" id="subject" name="subject" value="<?=$message->getSubject();?>">
        </p>

        <p>
            <label for="content"> Nouveau message: </label> <span class="error"></span>
            <textarea name="content" id="content_o" cols="100" rows="10"></textarea>
        </p>

        <input type="submit" value="Répondre" id="submit"/>
    </form>


</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>
