
<?php $title = 'Login'; ?>

<div class="page_form container">
    <div>
        <form  id="connexion" method="POST" action="index.php?ent=user&tsk=login">
            <h2> LOGIN </h2>
            <label for="pseudo">Votre pseudo:</label>
            <input type="text" name="pseudo" id="pseudo"/>
            <br/>
            <label for="password"> Votre Mot de Passe: </label>
            <input type="password" name="password" id="password"/>
            <br/>
            <input  id="button" type="submit" value="Connexion" style="text-align:center"/>
        </form>
    </div>

    <div>
        <p> <a href="index.php">Retour à la page d'acceuil</a></p>
    </div>
</div>

