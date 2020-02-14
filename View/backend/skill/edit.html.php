<?php $title = 'Modifier Competence'; ?>

<div class="page_form container">
    <h2 class="text-center"> Modifier compétence</h2>
    <form  action="index.php?ent=skill&tsk=edit" method="POST" id="form_CreateCompetence" enctype="multipart/form-data" >
        <input type="hidden" id="id" name="id" value="<?=$skill->getId();?>">
        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img" value="<?=$skill->getImg();?>">
        </p>
        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title" value="<?=$skill->getTitle();?>">
        </p>
        <p>
            <label for="link"> Lien (vers certificats)</label> <span class="error"></span>
            <input type="url" id="link" name="link" value="<?=$skill->getLink();?>">
        </p>
        <label for="categorie"> Catégorie (1 pour Front et 2 pour Back)</label> <span class="error"></span>
        <input type="number" id="categorie" min="1" max="2" name="categorie"  value="<?=$skill->getCategorie();?>">
        <p>
            <br>
            <input type="submit" value="Modifier compétence">
        </p>
    </form>
</div>
