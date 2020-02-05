<?php $title = 'Bourgine B. FAGADE'; ?>

<?php ob_start(); ?>
<!--**************************
	 	HEADER
***************************-->

<?php
include('../Portfolio/View/Frontend/header.php');
?>

<!--***********************************
	 	COMPETENCES
*************************************-->
<!-- Compétences -->
<section class="reel container" id="competences">

    <!--******* Pour référencement *******-->
    <h2 style="display:none"> Compétences de Bourgine Bérenger developpeur intégrateur web</h2>

    <aside class="container special pt-25">
        <header><h2> COMPETENCES </h2></header>
    </aside>

    <aside id="competence_boby">
        <!--BLOCK FRONT-END-->
        <div class="competence_enfant">
            <div class="ordinateur">
                <p><img src="Public/images/frontend.jpg" alt="frontend" style="text-align: center; width: 100%;"></p>
            </div>
            <div class="titre_h3"><h3>FRONTEND</h3></div>

            <div class="bloc_list align-middle">
                <?php if(empty($frontCompetences)):?>
                    <p> il n'y a aucune competences  </p>

                    <?php else:?>
                        <?php if($frontCompetences === false):?>
                            <p> Une erreur vient de se produire</p>
                        <?php else:?>
                            <?php foreach ($frontCompetences as $competence):?>
                            <!-- POUR CHAQUE COMPETENCES Front-->
                            <div class="section_liste">
                                <div class="div_icone">
                                    <img src="Public/images/<?=$competence->getImg();?>" alt="compétences de FAGADE Bourgine Bérenger"/>   
                                </div>
                                <div class="div_texte">
                                    <span> <?= $competence->getTitle();?> </span> 
                                    <a href="<?= $competence->getLink();?>" class="btn btn-info btn-lg">
                                        <i class="fas fa-award">Certification</i>
                                    </a>  
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif;?>
                    <?php endif;?>
            </div>
        </div>  <!--Fin bloc liste-->

        <!--BLOCK BACKEND-->
        <div class="competence_enfant">
            <div class="ordinateur">
                <p><img src="Public/images/backend.jpg" alt="backend" style="text-align: center; width: 100%;"></p>
            </div>
            <div class="titre_h3"><h3>BACKEND</h3></div>

            <div class="bloc_list">

                <!-- POUR CHAQUE COMPETENCES de type back-->
                <div id="bloc_list">
                    <?php if(empty($backCompetences)):?>
                        <p>Il n'y a aucune competences  </p>

                    <?php else:?>
                        <?php if($backCompetences === false):?>
                            <p>Une erreur vient de se produire</p>

                        <?php else:?>

                            <?php foreach ($backCompetences as $competence):?>
                                <!-- POUR CHAQUE COMPETENCES Front-->
                                <div class="section_liste">
                                    <div class="div_icone">
                                        <img src="Public/images/<?= $competence->getImg();?>" alt=" bourgine fagade competences"/><!-- Image en php-->
                                    </div>
                                    <div class="div_texte">
                                        <span> <?= $competence->getTitle();?> </span> 
                                        <a href="<?= $competence->getLink();?>" class="btn btn-info btn-lg">
                                            <i class="fas fa-award"> Certification</i>
                                        </a>  
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        <?php endif;?>
                    <?php endif;?>
                </div>
            </div>
        </div>  <!--Fin bloc liste-->
    </aside>
    <!--Fin nos_services-->
</section>

<!--*************************************
	     PARCOURS
*****************************************-->
        <!-- Parcours -->
<div class="reel" id="parcours">

    <section id="features" class="container special">
        <h2 style="display:none"> Parcours de Bourgine Bérenger developpeur intégrateur web</h2>
        <header class="pt-25">
            <h2> PARCOURS </h2>
        </header>
        <div class="content">
            <!-- POUR CHAQUE COMPETENCES de type back-->
            <?php if(empty($parcours)):?>
                <p> il n'y a aucune Parcours  </p>

            <?php else:?>
                <?php if($parcours === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <?php foreach ($parcours as $parcour):?>

                    <div class="card">
                        <div class="card-head">
                            <i class="fas fa-graduation-cap fa-3x"></i>
                        </div>
                        <div class="card-body">
                            <h3><?= $parcour->getTitle();?></h3> <!-- title en php -->
                            <p class="bold"><a href="<?= $parcour->getLink();?>"> Détails</a></p>
                        </div>
                    </div>

                    <?php endforeach; ?>

                <?php endif;?>
            <?php endif;?>

        </div>
    </section>

</div>


<!--***********************************
	 		REALISATION
*************************************-->
        <!-- Carousel / Portefolio -->
<section class="carousel pt-25" id="portefolio">

    <h2 style="display:none"> Réalisation de Bourgine Bérenger developpeur intégrateur web</h2>
    <header class="pt-25">
        <h2> PORTFOLIO </h2>
    </header>

    <div class="reel">

        <div class="div-mac">
            <?php if(empty($realisations)):?>
                <p> il n'y a aucune Parcours  </p>

            <?php else:?>
            <?php if($realisations === false):?>
                <p> Une erreur vient de se produire</p>

            <?php else:?>

            <?php foreach ($realisations as $realisation):?>
                
                        <!-- begin macbook pro mockup -->
                        <div class="md-macbook-pro md-glare">
                            <div class="md-lid">
                                <div class="md-camera"></div>
                                <div class="md-screen">
                                <!-- content goes here -->                
                                    <div class="tab-featured-image">
                                        <div class="tab-content">
                                            <div id="tab1">
                                                <a href="<?= $realisation->getLinkView();?>" class="image_realisation" >
                                                    <img src="Public/images/<?= $realisation->getImg();?>" alt="tab1" class="img img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md-base"></div>
                        </div> <!-- end macbook pro mockup -->
                        
            <?php endforeach; ?>

            <?php endif;?>
            <?php endif;?>
        </div> <!-- fin div-mac -->
    </div>
</section>

<!--*************************************
        CERTIFICAT DE REUSSITE
*****************************************-->
        <!-- Certificat -->
<section class="reel" id="certificat">

    <h2 style="display:none"> Certificat de réussite Bourgine Bérenger developpeur intégrateur web</h2>
    <h2>CERTIFICATIONS</h2>
    <!-- Nos_projets2 -->
    <aside id="certificat_enfant" class="container">

    </aside>

</section>

<!--*************************************
	 			CONTACT
*****************************************-->
<!-- Footer -->
<div id="footer">

    <div class="container">

        <div class="row">

            <!-- projets github -->
            <section class="4u 12u(mobile)">
                <header>
                    <h2 class="icon fa-file circled"><span class="label">Posts</span></h2>
                </header>
                <ul class="divided">
                    <li>
                        <article class="post stub">
                            <h2 style="display: none"> CV de Bourgine Bérenger développeur intégrateur web Paris Mulhouse Alsace </h2>
                            <header>
                                <h3> <a href='http://www.bourgine-fagade.com/Public/imgages/cv.pdf' target='_blank' title='Télécharger cv.ext' download="CV_FAGADE_Bourgine_Developpeur_Web"> Télécharger mon CV </a></h3>
                            </header>
                        </article>
                    </li>
                </ul>
            </section>

            <!-- Form de contact -->
            <section class="4u 12u(mobile)">
                <header>
                    <h2 class="icon fa-envelope circled"><span class="label">Posts</span></h2>
                </header>

                <form method="POST" action="index.php?act=sendmail" id="form_visiteur">

                        <span class="error"></span>
                        <input type="text" name="nom" id="nom" placeholder="Nom et prenom"/> <br/>

                        <span class="error"></span>
                        <input type="email" name="mail" id="mail" placeholder="Courriel" /> <br/>

                        <span class="error"></span>
                        <input type="text" name="subject" id="subject" placeholder="Sujet" /> <br/>

                        <span class="error"></span>
                        <textarea name="content" id="message" placeholder="Message" rows="4" cols="30"></textarea> <br/>
                        <!-- Notre boite de vérification -->
                        <div class="g-recaptcha"
                             data-sitekey="6LeJZFYUAAAAAAXBP-PFYb018EGo5GFmBrEVkJvU">
                        </div>
                        <input type="hidden" name="statut" id="statut" value="non lu"/> <br/>
                        <input type="submit" value="Envoyer" id="submit"/>
                </form>
            </section>

            <section>

                <header>
                    <h2 class="icon fa-building"><span class="label">Posts</span></h2>
                </header>

                <ul class="divided">
                    <li>
                        <article class="post stub">
                            <h2 style="display: none"> Contact de Bourgine Bérenger developpeur intégrateur web</h2>
                           <div>
                               <p> <strong style="color: white;">FAGADE Bourgine Bérenger</strong> <br> 5 rue Raoul Sberro
                                   95120 – Ermont
                                   <br>Tel 06 52 26 64 37
                                   <br> bourgine.fagade@gmail.com
                               </p>
                           </div>
                        </article>
                    </li>
                </ul>

            </section>
        </div>
        <hr />

        <!-- BAS DE PAGE-->
        <div class="row">
            <div class="12u">
                <!-- RESEAUX SOCIAUX -->
                <section class="contact">
                    <!-- pour réf -->
                    <h2 style="display: none"> Réseaux sociaux de Bourgine Bérenger developpeur intégrateur web</h2>

                    <ul class="icons">
                        <li><a href="https://www.linkedin.com/in/bourginefagade/" target="_blank" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
                        <li><a href="https://github.com/BOURGINE/" target="_blank" class="icon fa-github"><span class="label">Github</span></a></li>
                    </ul>
                </section>
                <!-- Copyright -->
                <div class="copyright">
                    <p class="menu" style="text-align: center;">
                        &copy; Thème Helios - Modifié et adpaté par Bourgine Bérenger FAGADE
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>
