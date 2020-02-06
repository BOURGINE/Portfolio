<?php $title = 'Ajouter un Realisation'; ?>
<?php ob_start(); ?>
<!--  Mettre l'entête ici ou mette en place un tempate pour le backend-->

<div class="page_form container">
    <h2 class="text-center"> Ajouter une réalisation</h2>

    <form  action="index.php?act=realisation&req=create-realisation" method="POST" id="form_CreateRealisation" enctype="multipart/form-data">
        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img">
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title">
        </p>

        <p>
            <label for="content"> Contenu </label> <span class="error"></span>
            <textarea name="content" id="content_o" form="form_CreateRealisation" cols="100" rows="10" class="tinymce"> </textarea>
        </p>

        <p>
            <label for="link_view"> Lien vers le site</label> <span class="error"></span>
            <input type="url" id="link_view" name="link_view">
        </p>

        <p>
            <label for="link_git"> Lien vers github</label> <span class="error"></span>
            <input type="url" id="link_git" name="link_git">
        </p>

        <div>
            <input type="submit" value="Ajouter une réalisation">
        </div>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>

