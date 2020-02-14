<?php $title = 'Ajouter Competence'; ?>

<div class="page_form container">
    <h2 class="text-center">Ajouter une compétence</h2>

    <form  action="index.php?ent=skill&tsk=new" method="POST" id="form_CreateCompetence" enctype="multipart/form-data">
        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img">
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title"/>
        </p>
        
        <p>
            <label for="link"> Lien (vers certificats)</label> <span class="error"></span>
            <input type="url" id="link" name="link"/>
        </p>

        <label for="categorie"> Catégorie (1 pour Front et 2 pour Back)</label> <span class="error"></span>
        <input type="number" min="1" max="2" name="categorie" id="categorie"/>

        <div>
            <br/>
            <input type="submit" value="Ajouter"/>
        </div>
    </form>
</div>