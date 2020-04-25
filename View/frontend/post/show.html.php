<section class="ftco-section">
      <div class="container">
        <div class="row">

         <!-- Partie 1 --> <!-- .col-md-4 -->
          <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">
            
            <!-- Chapo -->
            <div><?=$post->getChapo();?></div>
            <!-- ./Chapo -->

            <!-- TITRE -->
            <div>
              <h2 class="mb-3"> <?=$post->getTitle();?> </h2>
              <span><?= date('d M Y', strtotime($post->getCreated_at())) ;?></span>
            </div>
            <!-- Fin/.TITRE -->
            
            <!-- IMAGE -->
            <img src="/Portfolio/public/front/images/<?= $post->getImg() ;?>" alt="" class="img-fluid">
            
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
              <h3 class="mb-5"> <?= count($comments);?> <span class="icon-chat"></span></h3>
              <ul class="comment-list">
                  <?php if(empty($comments)):?>
                      <p>Ce article ne dispose d'aucun commentaire pour le moment.</p>
                      <p>Soyez le premier à l'écrire.</p>
                  <?php else:?>
                      <?php if($comments === false):?>
                        <p>Une erreur est subvenu lors de la récupération des commentaires de cet article.</p>
                      <?php else:?>
                          <?php foreach ($comments as $comment):?>
                            <!--********** for each ***********--> 
                            <li class="comment">
                              <div class="comment-body">
                                <h3> <?= $comment->getAuthor();?> </h3>
                                <div class="meta"> <?= $comment->getCreated_at();?></div>
                                <div> <?= $comment->getContent();?> </div>
                              </div>
                            </li>
                            <!--********** end/for each ***********--> 
                          <?php endforeach; ?>
                      <?php endif;?>
                  <?php endif;?>
              </ul>
              <!-- END comment-block -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Ajouter un nouveau commentaire</h3>
                <!--************** Comment Form **************-->
                <?php if(!empty($_SESSION['role_user'])):?>
                  <!--************** Message flash **************-->
                  <?php if(isset($message) AND !empty($message)):?>
                    <div class="container mt-5">
                        <div class="row">
                          <div class="col-md-auto mt-3 mx-auto">
                            <div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert">
                              <?= $message ?>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          </div>
                        </div>
                    </div>
                  <?php endif ?>
                <!--************** end message flash **************-->
                 <!--************** Comment Form **************-->
                  <form id="form_comment" method="POST" action="index.php?ent=comment&tsk=new" class="p-5 bg-dark">
                    <input type="hidden" class="form-control" id="post_id" name="post_id" value="<?=$post->getId();?>">
        
                    <div class="form-group">
                      <label for="content">Mon commentaire</label>
                      <textarea id="content" name="content" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <input type="submit" value="valider" class="btn py-3 px-4 btn-primary">
                    </div>
                    <p>Votre commentaire ne sera affiché qu'une fois validé par l'administrateur.</p>
                  </form>
                  <!--************** end Comment Form **************-->
                <?php else:?>
                  <h5>Vous devez vous connectez pour écrire un commentaire</h5>
                  <a href="index.php?tsk=login" class="btn btn-primary"> Connexion </a>
                <?php endif?>
              
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