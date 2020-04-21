<?php $title = 'Modifier le Projet'; ?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <!--Titre-->
        <h3><i class="fa fa-angle-right"></i><?=$title?></h3>
        <!--end/Titre-->

        <!-- /row -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                <div class="form">

                    <form class="cmxform form-horizontal style-form" method="POST" action="index.php?ent=project&tsk=edit" enctype="multipart/form-data" >
                        <input type="hidden" id="id" name="id" value="<?=$project->getId();?>">

                        <div class="form-group ">
                            <label for="img" class="control-label col-lg-2">Image</label>
                            <div class="col-lg-10">
                                <img class="img-circle" src="/Portfolio/public/front/images/<?=$project->getImg();?>" alt="" width="32">
                                <input class="form-control" type="file" id="img" name="img" value="<?=$project->getImg();?>"/>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="title" class="control-label col-lg-2">Titre</label>
                            <div class="col-lg-10">
                            <input class="form-control" id="title" name="title" type="text" value="<?=$project->getTitle();?>"/>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="content" class="control-label col-lg-2">Description</label>
                            <div class="col-lg-10">
                            <textarea name="content" class="form-control" id="content" cols="100" rows="10"><?=$project->getContent();?></textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="link" class="control-label col-lg-2">Lien vers le projet</label>
                            <div class="col-lg-10">
                            <input class="form-control " id="link" name="link" type="text" value="<?=$project->getLink();?>"/>
                            </div>
                        </div>

                        <!--bouton-->
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-theme" type="submit">Modifier</button>
                            <a href="index.php?ent=project" class="btn btn-theme04" type="button">Annuler</a>
                            </div>
                        </div>

                    </form>
                </div>
                </div>
                <!-- /form-panel -->
            </div>
            <!-- /col-lg-12 -->
            </div>
            <!-- /row -->
        </div>
    </section>
</section>



