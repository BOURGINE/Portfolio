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

            <h1>LISTE DES ARTICLES</h1>
            <!--********** foreach ***********-->  
            
            <?php if(empty($items)):?>
                <p>No project</p>
            <?php else:?>
                <?php if($items === false):?>
                    <p>An error has occured</p>
                <?php else:?>
                    <?php foreach ($items as $post):?>
                        <!--********** foreach ***********--> 
                        <div class="col-md-4 mt-3 ftco-animate">
                            <div class="blog-entry justify-content-end">
                                <a href="index.php?ent=post&tsk=show&slug=<?=$post->getSlug()?>" class="block-20" style="background-image: url('/Portfolio/public/front/images/image_1.jpg');">
                                </a>
                                <div class="text mt-3 float-right d-block">
                                    <div class="d-flex align-items-center mb-3 meta">
                                        <p class="mb-0">
                                            <span class="mr-2"><?=$post->getCreatedAt();?></span>
                                            <a href="#" class="mr-2">Bourgine Bérenger</a>
                                            <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                        </p>
                                    </div>
                                    <h3 class="heading"><a href="single.html"><?=$post->getTitle();?></a></h3>
                                    <p><?= $post->getChapo();?></p>
                                </div>
                            </div>
                        </div>
                        <!--********** for each ***********--> 
                    <?php endforeach; ?>
                <?php endif;?>
            <?php endif;?>
    	</div>
    </div>
</section> <!-- .section -->