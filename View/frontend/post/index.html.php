<!--header-->
<section class="hero-wrap js-fullheight" style="background-image: url('/Portfolio/public/front/images/bg_1.jpg');" data-stellar-background-ratio="0.3">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        <div class="col-md-12 ftco-animate pb-5 mb-3 text-center">
            <h1 class="mb-3 bread">Blog</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> </p>
        </div>
        </div>
    </div>
</section>
<!--header-->
<section class="ftco-section">
      <div class="container">
      <div class="row">
                <!--********** foreach ***********-->  
                
                <?php if(empty($projects)):?>
                    <p>No project</p>
                <?php else:?>
                    <?php if($projects === false):?>
                        <p>An error has occured</p>
                    <?php else:?>
                        <?php foreach ($projects as $project):?>
                            <!--********** foreach ***********-->  
                            <div class="col-md-6">
                                <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(/Portfolio/public/front/images/project-4.jpg);">
                                    <div class="overlay"></div>
                                    <div class="text text-center p-4">
                                        <h3><?= $project->getTitle();?></h3>
                                        <span><?= $project->getContent();?></span>

                                        <p><a href="<?= $project->getLink();?>" class="btn btn-primary">Voir le site</a></p>
                                    </div>
                                </div>
                            </div>
                            <!--********** foreach ***********-->  
                        <?php endforeach; ?>
                    <?php endif;?>
                <?php endif;?>
    		</div>
      </div>
    </section> <!-- .section -->