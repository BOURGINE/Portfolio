<?php $title = 'Liste des commentaires'; ?>

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
        
                <?php if(empty($items)):?>
                        <p> il n'y a aucun commentaire dans la base de données</p>
                <?php else:?>
                    <?php if($items === false):?>
                        <p> Une erreur vient de se produire</p>
                    <?php else:?>

                        <div class="content-panel">
                       
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Id article</th>
                                <th>Statut</th>
                                <th>Auteur</th>
                                <th>Commentaire</th>
                                <th>Date de création</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($items as $comment):?>
                                
                                <!-- Gestion des couleurs du statut -->
                                <?php 
                                    $statut= $comment->getStatut();
                                    switch($statut) {
                                        case "ACCEPTE": $label="success"; break;
                                        case "REFUSE": $label="danger"; break;
                                        default: $label= "info"; break;
                                    }
                                ?> 

                                <tr>
                                    <td> <?= $comment->getId();?>  </td>
                                    <td> <?= $comment->getPostId();?>  </td>
                                    <td> <span class="label label-<?=$label?> label-mini"><?= $comment->getStatut();?> </span></td>
                                    <td><?= $comment->getAuthor();?> </td>
                                    <td><?= $comment->getContent();?> </td>
                                    <td><?= $comment->getCreated_at();?> </td>
                                    
                                    <!-- Actions -->
                                    <td>
                                        <!-- Accepter -->
                                        <a class="btn btn-success btn-xs" href="index.php?ent=comment&tsk=validate&id=<?= $comment->getId();?>">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <!-- Refuser -->
                                        <a class="btn btn-warning btn-xs" href="index.php?ent=comment&tsk=refuse&id=<?= $comment->getId();?>">
                                            <i class="fa fa-ban"></i>
                                        </a>                                        
                                    </td>
                                    <td>
                                        <!-- Supprimer -->
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