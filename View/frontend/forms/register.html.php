<?php $title = 'Login'; ?>

<div class="container">
    <div class="row mt-5">
        <div class="mt-5 col-4 mx-auto">
            <form class="form-login" method="POST" action="index.php?ent=user&tsk=register">
                <h2 class="form-login-heading">Inscription</h2>

                <div class="login-wrap">
                    <input type="email" class="form-control"  name="pseudo" placeholder="e-mail" autofocus>
                    <br/>
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                    <br/>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirmez votre mot de passe">
                    <br/>
                    <button class="btn btn-primary btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> S'inscrire</button>
                    <hr>
                </div>

            </form>
        </div>
    </div>
</div>

