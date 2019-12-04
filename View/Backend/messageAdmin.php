<?php $title = 'Lecture des messages'; ?>

<?php ob_start(); ?>
<!-- ****************************************
             NOTIFICATION D'ERREUR
     ******************************************-->

<div class="section_articles" style="width: 60%; margin: auto; margin-bottom: 50px"> <h3 style="text-align: center;"> NOTIFICATION </h3></div>

<div id="block_message_admin">

    <a href="index.php?act=code-lioko?req=authentification">
        <img src="Public/images/croix.png" alt="Bourgine FAGADE"/>
    </a>

    <p> <?=$message?></p>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>
