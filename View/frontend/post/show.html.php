<section class="ftco-section">
      <div class="container">
        <div class="row">

         <!-- Partie 1 --> <!-- .col-md-4 -->
          <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">
            
            <!-- Chapo -->
            <div><?=$post->getChapo();?></div>
            <!-- ./Chapo -->

            <!-- TITRE -->
            <h2 class="mb-3"> <?=$post->getTitle();?> </h2>
            <!-- Fin/.TITRE -->
            
            <!-- IMAGE -->
            <img src="/Portfolio/public/front/images/image_3.jpg" alt="" class="img-fluid">
            
            <!-- CONTENT -->
            <div>
              <?=$post->getContent();?> 
            </div>
            <!-- ./CONTENTE -->
            
            <!-- AUTEUR -->
            <div class="about-author d-flex p-4 bg-dark">
              <div class="desc">
                <h3>Auteur: Bourgine FAGADE</h3>
              </div>
            </div>
            <!-- fin /AUTEUR -->

            <!-- Comment-block -->
            <div class="pt-5 mt-5">
              <h3 class="mb-5"> <?= count($comments);?> Comments</h3>
              <ul class="comment-list">

            <?php if(empty($comments)):?>
                <p>Ce article ne dispose d'aucun commentaire pour le moment.</p>
                <p>Soyez le premier à l'écrire.</p>
            <?php else:?>
                <?php if($comments === false):?>
                  <p>Une erreur est subvenu lors de la récupération des commentaires de cet article.</p>
                <?php else:?>
                    <?php foreach ($comments as $comment):?>

                     
                      <!-- Foreach  -->
                      <li class="comment">
                        <div class="comment-body">
                          <h3> <?= $comment->getAuthor();?> </h3>
                          <div class="meta"> <?= $comment->getCreated_at();?></div>
                          <div> <?= $comment->getContent();?> </div>
                        </div>
                      </li>
                      <!--********** for each ***********--> 
                    <?php endforeach; ?>
                <?php endif;?>
            <?php endif;?>





              </ul>
              <!-- END comment-block -->
              

              <!--************** Comment Form **************-->
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Ajouter un nouveau commentaire</h3>
                <form  method="POST" action="index.php?ent=comment&tsk=new" class="p-5 bg-dark">
                  <input type="hidden" class="form-control" id="post_id" name="post_id" value="<?=$post->getId();?> ">
      
                  <div class="form-group">
                    <label for="content">Mon commentaire</label>
                    <textarea name="content" id="content" cols="30" rows="5" class="form-control" require></textarea>
                  </div>

                  <div class="form-group">
                    <p>Pour des raisons de sécurité, votre commentaire ne sera affiché qu'après validation de l'administrateur.</p>
                    <input type="submit" value="valider" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>
          </div> 
          <!-- fin Partie 1 --> <!-- .col-md-4 -->

          <!-- Partie 2 LISTE DES ARTICLES --> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate fadeInUp ftco-animated">
           
            <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
            	<h3 class="heading-sidebar">LISTE DES ARTICLES (<?= count($posts);?>)</h3>
              <ul class="categories">
                <?php foreach ($posts as $post):?>
                    <li><a href="index.php?ent=post&tsk=show&slug=<?=$post->getSlug();?>"> <?=$post->getTitle();?> </a></li>
                <?php endforeach; ?>
              </ul>
            </div>

          </div>
          <!-- Fin/Partie 2 --> <!-- .col-md-8 -->

        </div>
      </div>
    </section>