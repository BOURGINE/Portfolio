<?php $title = 'Bourgine B. FAGADE';
$dir= '/Portfolio/public/front/images';
define("DIR", "/Portfolio/public/front/images");
?>
<!--********** HERO ***********-->   
<section id="home-section" class="hero">
		  <div class="home-slider  owl-carousel">

	      <div class="slider-item ">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third js-fullheight order-md-last img" style="background-image:url(<?=$dir?>/bg_1.png);">
	          		<div class="overlay"></div>
	          	</div>
		          <div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">Salut!</span>
			            <h1 class="mb-4 mt-3">Je suis <span>Bourgine FAGADE</span></h1>
			            <h2 class="mb-4">I'm Bourgine FAGADE</h2>
			            <p><a href="index.php#about-section" class="btn btn-primary py-3 px-4">A propos</a> <a href="index.php?ent=post&tsk=list" class="btn btn-white btn-outline-white py-3 px-4">Mon blog</a></p>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third js-fullheight order-md-last img" style="background-image:url(<?=$dir?>/bg_2.png);">
	          		<div class="overlay"></div>
	          	</div>
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
                        <span class="subheading"></span>
			            <h1 class="mb-4 mt-3">Développeur <span>PHP/SYMFONY</span> basé à Paris</h1>
			            <p><a href="index.php#resume-section" class="btn btn-primary py-3 px-4">Parcours</a> <a href="index.php#contact-section" class="btn btn-white btn-outline-white py-3 px-4">Contact</a></p>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	    </div>
</section>

<!--********** ABOUT ME ***********-->
<section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-6 col-lg-5 d-flex">
        <div class="img-about img d-flex align-items-stretch">
          <div class="overlay"></div>
          <div class="img d-flex align-self-stretch align-items-center" style="background-image:url(<?=$dir?>/bg_3.png);">
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
        <div class="row justify-content-start pb-3">
          <div class="col-md-12 heading-section ftco-animate">
            <h1 class="big">A Propos</h1>
            <h2 class="mb-4">A propos</h2>
            <p> « Qui que vous soyez, vous serez jugé par rapport à ce que vous apportez au bilan de fin d'année et à l'éthique de travail que vous respectez.» </p>
            <em>Kevin LILES</em>
            <ul class="about-info mt-4 px-md-0 px-2">
              <li class="d-flex"><span>Identité:</span> <span>Bourgine Fagade</span></li>
              <li class="d-flex"><span>Région:</span> <span>Ile-de-France</span></li>
              <li class="d-flex"><span>Email:</span> <span>bourgine.fagade@gmail.com</span></li>
            </ul>
          </div>
        </div>
        <div class="counter-wrap ftco-animate d-flex mt-md-3">
          <div class="text">

            <p><a href="#" class="btn btn-primary py-3 px-3">Télécharger CV</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!--********** PARCOURS ***********-->  
<section class="ftco-section ftco-no-pb" id="resume-section">
  <div class="container">
    <div class="row justify-content-center pb-4">
      <div class="col-md-10 heading-section text-center ftco-animate">
        <h1 class="big big-2">Parcours</h1>
        <h2 class="mb-4">Parcours</h2>
        <p> « Prenez vos décisions en fonction d’où vous allez, pas en fonction d’où vous êtes.»</p>
        <em>James Arthur Ray</em>
      </div>
    </div>

    <div class="row">
            <!--********** foreach ***********-->  
                <?php if(empty($backgrounds)):?>
                    <p> Il n'y a aucun parcours  </p>
                <?php else:?>
                    <?php if($backgrounds === false):?>
                        <p> Une erreur est survenue</p>
                    <?php else:?>
                        <?php foreach ($backgrounds as $background):?>
                        <div class="col-md-6"> 
                            <div class="resume-wrap ftco-animate">
                                <div class="d-flex">
                                  <span class="date"><?= $background->getYear();?></span>
                                  <span class="h6 ml-2 mt-3"><?= $background->getCategory();?></span>
                                </div>
                                <h3><?= $background->getTitle();?></h3>
                                <span><?= $background->getLocation();?></span>
                                <p class="mt-3"><?= $background->getDescription();?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif;?>
                <?php endif;?>
            <!--********** foreach ***********-->  
    </div>

    <div class="row justify-content-center mt-3">
      <div class="col-md-6 text-center ftco-animate">
        <p><a href="#" class="btn btn-primary py-2 px-3">Télécharger CV</a></p>
      </div>
    </div>

  </div>
</section>

<!--********** TECHNO ET COMPETENCES (Skills) ***********-->  
<section class="ftco-section" id="services-section">
    	<div class="container">
    		<div class="row justify-content-center py-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Skills et Techno</h1>
            <h2 class="mb-4">Skills et Techno</h2>
            <p> « Vis comme si tu devais mourir demain, apprends comme si tu devais vivre toujours. » </p>
            <em>Gandhi</em>
          </div>
        </div>

    		<div class="row">
                <?php if(empty($skills)):?>
                    <p> no skills </p>
                <?php else:?>
                    <?php if($skills === false):?>
                        <p> Une erreur vient de se produire</p>
                    <?php else:?>
                        <?php foreach ($skills as $skill):?>
                            <!--********** for each ***********-->
                            <div class="col-md-2 text-center d-flex ftco-animate">
                                <a href="#" class="services-1">
                                    <span class="icon">
                                      <img src="<?=$dir?>/<?= $skill->getImg();?>" alt="" height="48px" class="rounded-circle"/>
                                    </span>
                                    <div class="desc">
                                        <h3 class="mb-5"><?= $skill->getTitle();?></h3>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif;?>
                <?php endif;?>
			  </div>
    	</div>
</section>

<!--********** PROJECT ***********-->  
<section class="ftco-section ftco-project" id="projects-section">
      <!--********** section title ***********-->                     
  <div class="container">
    <div class="row justify-content-center pb-5">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <h1 class="big big-2">Projets</h1>
        <h2 class="mb-4">Mes Projets</h2>
        <p> « Le seul endroit où le succès vient avant le travail, c’est dans le dictionnaire.» </p>
        <em>Vidal Sassoon </em>   
      </div>
    </div>
    <!--********** /section title ***********-->  

    <!--********** content row ***********-->                 
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
                            <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?=$dir?>/<?=$project->getImg();?>);">
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
        <!--********** ./ section title ***********-->   
  </div>
</section>

<!--********** BLOG ***********-->  
<section class="ftco-section" id="blog-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h1 class="big big-2">Blog</h1>
        <h2 class="mb-4"> Mon Blog</h2>
        <p>Dernières articles</p>
      </div>
    </div>
    
    <div class="row d-flex">
          <!--********** foreach ***********-->  
          <?php if(empty($posts)):?>
            <p>Il n'y a aucun article en ligne.</p>
          <?php else:?>
            <?php if($posts === false):?>
                <p>Une erreur vient de de produire</p>
            <?php else:?>
                <?php foreach ($posts as $post):?>
                  <!--********** foreach ***********--> 
                  <div class="col-md-4 mt-3 ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="index.php?ent=post&tsk=show&slug=<?=$post->getSlug()?>" class="block-20" style="background-image: url('<?=$dir?>/<?=$post->getImg()?>');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center mb-3 meta">
                                <p class="mb-0">
                                    <a href="index.php?ent=post&tsk=show&slug=<?=$post->getSlug()?>" class="mr-2">Bourgine Bérenger</a>
                                    <a href="index.php?ent=post&tsk=show&slug=<?=$post->getSlug()?>" class="meta-chat">
                                      - <?= $post->getCreated_at() ;?>
                                    </a>
                                </p>
                            </div>
                            <h3 class="heading"><a href="index.php?ent=post&tsk=show&slug=<?=$post->getSlug()?>"><?=$post->getTitle();?></a></h3>
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
    <div class="container text-center">
      <a href="index.php?ent=post&tsk=list" class="btn btn-primary">Voir tous</a>
    </div>
</section>

<!--********** CONTACT ***********-->  
<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h1 class="big big-2">Contact</h1>
        <h2 class="mb-4">Me Contacter</h2>
        <p>Nous prendrons peut-être un verre ensemble un jour, mais discutons avant tous de projet.</p>
      </div>
    </div>

    <div class="row no-gutters block-9">
      <div class="col-md-6 order-md-last d-flex">
          <?php include("forms/contact.html.php"); ?>
      </div>

      <div class="col-md-6 d-flex">
        <div class="img" style="background-image: url(<?=$dir?>/bg_3.png);"></div>
      </div>
    </div>
  </div>
</section>
