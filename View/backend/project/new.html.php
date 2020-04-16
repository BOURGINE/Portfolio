<?php $title = 'Ajouter un projet'; ?>

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

                        <form  method="POST" action="index.php?ent=project&tsk=new" class="cmxform form-horizontal style-form" enctype="multipart/form-data" id="project_new">

                            <div class="form-group ">
                                <label for="img" class="control-label col-lg-2">Image</label>
                                <div class="col-lg-10">
                                <input class="form-control" id="img" name="img" type="file"/>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="title" class="control-label col-lg-2">Titre</label>
                                <div class="col-lg-10">
                                <input class=" form-control" id="title" name="title" type="text"/>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="control-label col-lg-2">Description</label>
                                <div class="col-lg-10">
                                    <textarea  class="form-control" name="content" id="content" cols="100" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="link" class="control-label col-lg-2">Lien vers le projet</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="link" name="link" type="text"/>
                                </div>
                            </div>

                            <!--bouton-->
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-theme" type="submit">Valider</button>
                                <button class="btn btn-theme04" type="button">Annuler</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div> 
            </div> 
        </div> 
    </section>
</section>

