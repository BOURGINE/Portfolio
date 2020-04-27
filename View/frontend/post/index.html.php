<!--header-->
<section class="hero-wrap js-fullheight" style="background-image: url('/Portfolio/public/front/images/project_1.jpg'); opacity: 0.9;" data-stellar-background-ratio="0.3">
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
<!--./header-->

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-3">
                <h1>LISTE DES ARTICLES</h1>
            </div>
        </div>
        <div class="row">
             <!--********** conditions - liste des articles ***********-->  
             <?php if(empty($items)):?>
                <p> Il n'y a aucun article.</p>
            <?php else:?>
                <?php if($items === false):?>
                    <p>Un erreur est arrivée.</p>
                <?php else:?>
                    <div class="row"> 
                    <?php foreach ($items as $post):?>
                        <!--********** foreach ***********--> 
                        <div class="col-md-4 mt-4 ftco-animate grid-item">
                            <div class="blog-entry justify-content-center">
                                <a href="index.php?ent=post&tsk=show&slug=<?=$post->getSlug()?>" class="block-20" style="background-image: url('/Portfolio/public/front/images/<?=$post->getImg();?>');">
                                </a>
                                <div class="text mt-4 float-right d-block">
                                    <div class="d-flex align-items-center mb-3 meta">
                                        <p class="mb-0">
                                            <span class="mr-2"><?=$post->getCreated_at();?></span>
                                            <a href="#" class="mr-2">Bourgine Bérenger</a>
                                            <a href="#" class="meta-chat"></a>
                                        </p>
                                    </div>
                                    <h3 class="heading"><a href="index.php?ent=post&tsk=show&slug=<?=$post->getSlug()?>"><?=$post->getTitle();?></a></h3>
                                    <p><?= $post->getChapo();?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <!--********** for each ***********-->
                    <div class="container mt-4 text-center">
                        <a href="#" id="loadMore" class="btn btn-primary  py-3 px-3 mt-4 "> Voir + </a>
                        <a href="#" id="loadLess" class="btn btn-primary py-3 px-3 mt-4 "> Voir - </a>
                    </div> 
                   
                    
                <?php endif;?>
            <?php endif;?>
            <!--********** conditions - liste des articles ***********--> 
        </div>
           
           
    	</div>
    </div>
</section> <!-- .section -->