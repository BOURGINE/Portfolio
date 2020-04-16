<?php $title = 'Mes compétences - technos'; ?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <!--Titre-->
        <h3><i class="fa fa-angle-right"></i>
        <?=$title?>
        <a href="index.php?ent=skill&tsk=new" class="btn btn-success"> Ajouter </a>
        </h3>
        <!--end/Titre-->

        <!--Titre-->
        <div class="row mt">
            <div class="col-md-12">
            <?php $skills="toto"?>
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
                                <th> Img</th>
                                <th> Titre </th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($items as $skill):?>
                                <tr>
                                    <td><?= $skill->getImg();?> </td>
                                    <td><?= $skill->getTitle();?> </td>
                                    <!-- Actions -->
                                    <td>
                                        <!-- update -->
                                        <a class="btn btn-warning btn-xs" href="index.php?ent=skill&tsk=edit&id=<?= $skill->getId();?>">
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
        <!-- /Titre -->










    </section> 
</section>