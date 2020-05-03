<?php $title = 'Liste des utilisateurs'; ?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <!--Titre-->
        <h3><i class="fa fa-angle-right"></i>
        <?=$title?>
        </h3>
        <!--end/Titre-->

        <!--Titre-->
        <div class="row mt">
            <div class="col-md-12">
            <?php $skills="toto"?>
                <?php if(empty($items)):?>
                        <p> il n'y a aucun utilisateur dans la base de données.</p>
                <?php else:?>
                    <?php if($items === false):?>
                        <p> Une erreur vient de se produire</p>
                    <?php else:?>
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th> Id</th>
                                        <th> Pseudo </th>
                                        <th> Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($items as $user):?>
                                    <tr>
                                        <td> <?= $user->getId();?> </td>
                                        <td> <span class="label label-info label-mini"><?= $user->getPseudo();?> </span></td>
                                        <td><?= $user->getRole_user();?> </td>
                                        <!-- Actions -->
                                        <td>
                                        <!-- delete -->
                                            <span class="d-inline">
                                                <?php include(__DIR__.'/_delete_form.php'); ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach;?>

                                </tbody>
                            </table>
                        </div>

                    <?php endif;?>
                <?php endif;?>

          </div>
        </div>
        <!-- /Titre -->










    </section> 
</section>