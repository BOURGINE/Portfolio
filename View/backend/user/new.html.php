<?php $title = 'Créer un compte Admin'; ?>

<div class="page_form container">
    <h2 class="text-center"> Créer un compte admin</h2>

    <form  action="index.php?ent=user&tsk=new" method="POST" id="form_CreateUser" >
        <p>
            <label for="pseudo"> Pseudo </label> <span class="error"></span>
            <input type="text" id="pseudo" name="pseudo">
        </p>

        <p>
            <label for="pass"> Mot de passe </label> <span class="error"></span>
            <input type="password" id="pass" name="password">
        </p>

        <p>
            <label for="confirmPass">  Confirmez votre Mot de passe </label> <span class="error"></span>
            <input type="password" id="confirmPass" name="confirmPass">
        </p>
        <p>
            <br>
            <input type="submit" value="CREER UN ADMIN">
        </p>
    </form>
</div>


