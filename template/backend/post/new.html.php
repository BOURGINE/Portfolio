<?php $title = 'Ajouter un Article'; ?>

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

                <form method="POST" action="index.php?ent=post&tsk=new" enctype="multipart/form-data" class="cmxform form-horizontal style-form" id="post_new_form" >

                  <div class="form-group ">
                    <label for="img" class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="img" name="img" type="file"/>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="title" class="control-label col-lg-2">Titre</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="title" name="title" type="text"/>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="chapo" class="control-label col-lg-2">Chapo</label>
                    <div class="col-lg-10">
                    <input class="form-control" id="chapo" name="chapo" type="text"/>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="content" class="control-label col-lg-2">Content</label>
                    <div class="col-lg-10">
                      <textarea  class="form-control" name="content" id="content" cols="100" rows="5"></textarea>
                    </div>
                  </div>

                  <!--boutons-->
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Valider</button>
                      <a href="index.php?ent=post" class="btn btn-theme04" type="button">Annuler</a>
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





