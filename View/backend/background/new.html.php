<?php $title = 'Ajouter un Parcours'; ?>

<div class="page_form container">
    <h1> Ajouter un parcours</h1>
    <form  action="index.php?ent=background&tsk=new" method="POST" id="form_CreateCompetence" enctype="multipart/form-data">
        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title">
        </p>
        <p>
            <label for="link"> Lien (vers école)</label> <span class="error"></span>
            <input type="url" id="link" name="link">
        </p>
        <div>
            <input type="submit" value="Ajouter un parcours">
        </div>
    </form>
</div>


