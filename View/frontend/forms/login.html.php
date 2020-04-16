<?php $title = 'Login'; ?>

<div class="container">
    <div class="row mt-5">
        <div class="mt-5 col-4 mx-auto">
            <form class="form-login" method="POST" action="index.php?ent=user&tsk=signin">
                <h2 class="form-login-heading">Connexion</h2>

                <div class="login-wrap">
                    <input type="text" class="form-control"  name="pseudo" placeholder="pseudo" autofocus>
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <label class="checkbox">
                        <span class="pull-right">
                            <a data-toggle="modal" href="login.html#myModal"> Mot de passe oublié ?</a>
                        </span>
                    </label>
                    <button class="btn btn-primary btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Se connecter</button>
                    <hr>
                
                    <div class="registration text-center">
                        <p> Vous n'avez pas encore de compte ?</p> 
                        <p><a href="#">Inscription</a></p> 
                    </div>
                </div>

                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Mot de passe perdu ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-danger" type="button">Connexion</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- modal -->
            </form>
        </div>
    </div>
</div>

