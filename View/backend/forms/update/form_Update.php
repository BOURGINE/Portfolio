<?php $title = 'Modifier Competence'; ?>
<?php ob_start(); ?>
<!--  Mettre l'entête ici ou mette en place un tempate pour le backend-->

<div class="page_form container">
    <h2 class="text-center"> Modifier compétence</h2>

    <form  action="index.php?act=competence&req=update-competence" method="POST" id="form_CreateCompetence" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$competence->getId();?>">
        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img" value="<?=$competence->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title" value="<?=$competence->getTitle();?>">
        </p>

        <p>
            <label for="link"> Lien (vers certificats)</label> <span class="error"></span>
            <input type="url" id="link" name="link" value="<?=$competence->getLink();?>">
        </p>

        <label for="categorie"> Catégorie (1 pour Front et 2 pour Back)</label> <span class="error"></span>
        <input type="number" id="categorie" min="1" max="2" name="categorie"  value="<?=$competence->getCategorie();?>">

        <p>
            <br>
            <input type="submit" value="Modifier compétence">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>

