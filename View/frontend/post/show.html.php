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
            <!-- AUTEUR -->


            <div class="pt-5 mt-5">
              <h3 class="mb-5">6 Comments</h3>
              <ul class="comment-list">

                <li class="comment">
                  <div class="vcard bio">
                    <img src="/Portfolio/public/front/images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>John Doe</h3>
                    <div class="meta">June 20, 2019 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  </div>
                </li>

              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-dark">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>
          </div> 
          <!-- fin Partie 1 --> <!-- .col-md-4 -->

          <!-- Partie 2 --> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate fadeInUp ftco-animated">
           
            <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
            	<h3 class="heading-sidebar">LISTE DES ARTICLES (<?= count($posts);?>)</h3>
              <ul class="categories">
                <?php foreach ($posts as $post):?>
                    <li><a href="index.php?ent=post&tsk=show&id=<?=$post->getId();?>"> <?=$post->getTitle();?> </a></li>
                <?php endforeach; ?>
              </ul>
            </div>

          </div>
          <!-- Fin/Partie 2 --> <!-- .col-md-8 -->

        </div>
      </div>
    </section>