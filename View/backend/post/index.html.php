<?php $title = 'Mes Articles'; ?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <!--Titre-->
        <h3><i class="fa fa-angle-right"></i>
            <?=$title?>
            <a href="index.php?ent=post&tsk=new" class="btn btn-success"> Ajouter </a>
        </h3>
        <!--end/Titre-->

        <!--Tableau-->
        <div class="row mt">
            <div class="col-md-12">
                <?php if(empty($items)):?>
                        <p> il n'y a aucun article dans la base de données</p>
                <?php else:?>
                    <?php if($items === false):?>
                        <p> Une erreur vient de se produire</p>
                    <?php else:?>

                        <div class="content-panel">
                       
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Slug</th>
                                    <th>Chapo</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($items as $post):?>
                                    <tr>
                                        <td><img class="img-circle" src="/Portfolio/public/front/images/<?=$post->getImg();?>" alt="" width="32"></td>
                                        <td><?=$post->getTitle();?></td>
                                        <td><?=$post->getSlug();?></td>
                                        <td><?=$post->getChapo();?></td>
                                        <!-- Actions -->
                                        <td>
                                            <a class="btn btn-success btn-xs" href="index.php?ent=post&tsk=show&slug=<?=$post->getSlug();?>">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-xs" href="index.php?ent=post&tsk=edit&id=<?=$post->getId();?>">
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