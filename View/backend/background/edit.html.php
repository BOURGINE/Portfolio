<?php $title = 'Modifier Parcours'; ?>

<!-- ************** ESPACE MEMBRE *****************-->
<div class="bande_profil container">
        <div class="profile_member">
            <!-- ** PSEUDO *-->
            <h3> <?= 'Bonjour '.$_SESSION['pseudo'].' !'?> </h3>
        </div>

        <!-- ************** MENU DE NAVIGATION *****************-->
        <div class="space_nav">
            <a href="index.php"> <div class="button">ACCUEIL</div> </a>
            <a href="index.php?act=deconnexion"> <div class="button">DECONNEXION</div> </a>
        </div>
</div>

<div class="page_form container">

    <h2>Modifier parcours</h2>

    <form  action="index.php?ent=background&tsk=edit" method="POST" id="form_CreateCompetence" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$background->getId();?>">

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title" value="<?=$background->getTitle();?>">
        </p>

        <p>
            <label for="link"> Lien (école)</label> <span class="error"></span>
            <input type="url" id="link" name="link" value="<?=$background->getLink();?>">
        </p>

        <p>
            <br>
            <input type="submit" value="Modifier">
        </p>
    </form>
</div>


