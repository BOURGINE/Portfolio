<?php $title = 'Modifier Realisation'; ?>

<div class="page_form container">
    <h2> Modifier réalisation</h2>

    <form  action="index.php?ent=project&tsk=edit" method="POST" id="form_UpdateRealisation" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$project->getId();?>">
        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img" value="<?=$project->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title" value="<?=$project->getTitle();?>">
        </p>

        <p>
            <label for="content"> Contenu </label> <span class="error"></span>
            <textarea name="content" id="content_o" form="form_UpdateRealisation" cols="100" rows="10" class="tinymce"> <?=$project->getContent();?></textarea>
        </p>

        <p>
            <label for="link_view"> Lien vue </label> <span class="error"></span>
            <input type="url" id="link_view" name="link_view" value="<?=$project->getLinkView();?>">
        </p>

        <p>
            <label for="link_git"> Lien github </label> <span class="error"></span>
            <input type="url" id="link_git" name="link_git" value="<?=$project->getLinkGit();?>">
        </p>
        <p>
            <br>
            <input type="submit" value="Modifier">
        </p>
    </form>
</div>


