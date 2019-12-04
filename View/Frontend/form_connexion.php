
<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<div class="page_form container">
    <div>
        <form  id="connexion" method="POST" action="index.php?ent=user&tsk=authen">
            <h2> CONNEXION </h2>

            <label for="pseudo">Votre pseudo:</label>
            <input type="text" name="pseudo" id="pseudo"/>
            <br>
            <label for="password"> Votre Mot de Passe: </label>
            <input type="password" name="password" id="password"/>
            <br>
            <input  id="button" type="submit" value="Connexion" style="text-align:center"/>
        </form>
    </div>

    <div>
        <p> <a href="index.php">Retour à la page d'acceuil</a></p>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

