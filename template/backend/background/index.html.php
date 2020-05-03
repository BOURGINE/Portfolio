<?php $title = 'Mon parcours'; ?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <!--Titre-->
        <h3><i class="fa fa-angle-right"></i>
            <?=$title?>
            <a href="index.php?ent=background&tsk=new" class="btn btn-success"> Ajouter </a>
        </h3>
        <!--end/Titre-->

        <!--Tableau-->
        <div class="row mt">
            <div class="col-md-12">
                <?php if(empty($items)):?>
                        <p> il n'y a aucun parcours dans la base de données</p>
                <?php else:?>
                    <?php if($items === false):?>
                        <p> Une erreur vient de se produire</p>
                    <?php else:?>

                        <div class="content-panel">
                       
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Période </th>
                                    <th> Titre </th>  
                                    <th> Description </th>
                                    <th> Lieu </th>
                                    <th colspan="2"> Actions </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($items as $background):?>
                                    <tr>
                                        <td> <?= $background->getId();?> </td>
                                        <td> <span class="label label-info label-mini"><?= $background->getYear();?> </span></td>
                                        <td> <?= $background->getTitle();?> </td>
                                        <td><?= $background->getDescription();?> </td>
                                        <td><?= $background->getLocation();?> </td>
                                        <!-- Actions -->
                                        <td>
                                            <a class="btn btn-warning btn-xs" href="index.php?ent=background&tsk=edit&id=<?= $background->getId();?>">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
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
        <!-- /tableau -->

    </section> 
</section>