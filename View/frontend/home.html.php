<?php $title = 'Bourgine B. FAGADE'; ?>

<!--*****HEADER
// Affichage des infos de connexion, si connexion encours
               // if (isset($_SESSION['pseudo']) AND !empty($_SESSION['pseudo']))
               // {$info1 = '<li><a href="index.php?ent=user&tsk=authentification">BACKOFFICE</a></li>';}
********-->

<!--********** HERO ***********-->   
<section id="home-section" class="hero">
		  <div class="home-slider  owl-carousel">




	      <div class="slider-item ">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third js-fullheight order-md-last img" style="background-image:url(/Portfolio/public/front/images/bg_1.png);">
	          		<div class="overlay"></div>
	          	</div>
		          <div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">Salut!</span>
			            <h1 class="mb-4 mt-3">Je suis <span>Bourgine FAGADE</span></h1>
			            <h2 class="mb-4">I'm Bourgine FAGADE</h2>
			            <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third js-fullheight order-md-last img" style="background-image:url(/Portfolio/public/front/images/bg_1.jpg);">
	          		<div class="overlay"></div>
	          	</div>
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
                        <span class="subheading"></span>
			            <h1 class="mb-4 mt-3">Développeur <span>PHP/SYMFONY</span> basé à Paris</h1>
			            <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
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
	    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(/Portfolio/public/front/images/bg_2.png);">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<h1 class="big">Ci</h1>
		            <h2 class="mb-4">A propos</h2>
		            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
		            <ul class="about-info mt-4 px-md-0 px-2">
		            	<li class="d-flex"><span>Identité:</span> <span>Bourgine Fagade</span></li>
		            	<li class="d-flex"><span>Date of birth:</span> <span>January 01, 1987</span></li>
		            	<li class="d-flex"><span>Address:</span> <span>32 Rue Cauchoix, 95170</span></li>
		            	<li class="d-flex"><span>Zip code:</span> <span>1000</span></li>
		            	<li class="d-flex"><span>Email:</span> <span>clarkthomp@gmail.com</span></li>
		            </ul>
		          </div>
		        </div>
	          <div class="counter-wrap ftco-animate d-flex mt-md-3">
              <div class="text">

                <p><a href="#" class="btn btn-primary py-3 px-3">Download CV</a></p>
              </div>
	          </div>
	        </div>
        </div>
    	</div>
    </section>


<!--********** PARCOURS ***********-->  
    <section class="ftco-section ftco-no-pb" id="resume-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Parcours</h1>
            <h2 class="mb-4">Parcours</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
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
                                    <span class="date"><?= $background->getYear();?></span>
                                    <h3><?= $background->getTitle();?></h3>
                                    <p class="h6"><?= $background->getCategory();?></p>
                                    <span class="position"><?= $background->getLocation();?></span>
                                    <p class="mt-4"><?= $background->getDescription();?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif;?>
                    <?php endif;?>
                <!--********** foreach ***********-->  
    		</div>

    		<div class="row justify-content-center mt-5">
    			<div class="col-md-6 text-center ftco-animate">
    				<p><a href="#" class="btn btn-primary py-4 px-5">Download CV</a></p>
    			</div>
    		</div>
    	</div>
    </section>

<!--********** TECHNO ET COMPETENCES (Skills) ***********-->  
<section class="ftco-section" id="services-section">
    	<div class="container">
    		<div class="row justify-content-center py-5 mt-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Skills et Techno</h1>
            <h2 class="mb-4">Skills et Techno</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
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
                                        <i class="flaticon-analysis"></i>
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
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
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
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="single.html" class="block-20" style="background-image: url('/Portfolio/public/images/image_1.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center mb-3 meta">
	                <p class="mb-0">
	                	<span class="mr-2">June 21, 2019</span>
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <!--********** for each ***********--> 

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

        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">Address</h3>
	            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<h3 class="mb-4">Website</h3>
	            <p><a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>

        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-light p-4 p-md-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div class="img" style="background-image: url(/images/about.jpg);"></div>
          </div>
        </div>
      </div>
    </section>

<!--********PROJECT*************-->
<section class="carousel pt-25" id="portefolio">

    <h2 style="display:none">Réalisation de Bourgine Bérenger developpeur intégrateur web</h2>
    <header class="pt-25"><h2>PORTFOLIO</h2></header>

    <div class="reel">

    </div>
</section>
