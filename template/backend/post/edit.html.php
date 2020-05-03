<?php $title = 'Modifier cet article'; ?>

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

                <form class="cmxform form-horizontal style-form" enctype="multipart/form-data" id="post_edit_form" method="POST" action="index.php?ent=post&tsk=edit">
                    <input type="hidden" id="id" name="id" value="<?=$post->getId();?>">

                  <div class="form-group ">
                    <label for="img" class="control-label col-lg-2">Images</label>
                    <div class="col-lg-10">
                      <img class="img-circle" src="/Portfolio/public/front/images/<?=$post->getImg();?>" alt="" width="32"/>
                      <input class=" form-control" id="img" name="img" type="file"/>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="title" class="control-label col-lg-2">Titre</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="title" name="title" type="text" value="<?=$post->getTitle();?>"/>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="chapo" class="control-label col-lg-2">Chapo</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="chapo" name="chapo" type="text" value="<?=$post->getChapo();?>"/>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="content" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                     <textarea name="content" class="form-control" id="content" cols="100" rows="5"><?=$post->getContent();?></textarea>
                    </div>
                  </div>

                  <!--bouton-->
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Modifier</button>
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



