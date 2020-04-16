<?php $title = 'Ajouter un parcours'; ?>

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

                <form class="cmxform form-horizontal style-form" id="form_CreateCompetence" method="POST" action="index.php?ent=background&tsk=new">
                    <input type="hidden" id="id" name="id">

                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Titre</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="title" name="title" type="text"/>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="lastname" class="control-label col-lg-2">Période</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="year" name="year" type="text"/>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="username" class="control-label col-lg-2">Lieu</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="location" name="location" type="text"/>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="description" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                     <textarea  class="form-control" name="description" id="description" cols="100" rows="5"></textarea>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="category" class="control-label col-lg-2">Catégorie</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="category" name="category">
                            <option>EXPERIENCE PRO</option>
                            <option>FORMATION</option>
                        </select>
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
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->

    </div>
    </section>
</section>





