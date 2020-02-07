<?php $title = 'Bourgine B. FAGADE'; ?>

<!--*****HEADER********-->
<div id="header">

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#skill">Compétences</a></li>
            <li><a href="#background">Parcours</a></li>
            <li><a href="#project">Portfolio</a></li>
            <li><a href="#footer">Contact</a></li>
            <?php // Affichage des infos de connexion, si connexion encours
                if (isset($_SESSION['pseudo']) AND !empty($_SESSION['pseudo']))
                {$info1 = '<li><a href="index.php?ent=user&tsk=authentification">BACKOFFICE</a></li>';}
            ?>
        </ul>
    </nav>

    <!-- Hero -->
    <div class="inner">
        <header>
            <h1><a href="index.php" id="logo">Bourgine FAGADE</a></h1>
            <hr />
            <p >Développeur PHP/SYMFONY,<br/> Intrégrateur d'application web</p>
        </header>
    </div>

    <!-- Présentation -->
    <section id="banner">
        <header>
            <h2><strong>Hello!</strong> Bienvenue sur mon site </h2>
            <p style="color:black;">
                Je souhaite une bonne expérience utilisateur. N'hésitez pas à me faire un <a href="#footer">retour</a>. A bientôt.
            </p>
        </header>
    </section>
</div>

<!--********** COMPETENCES ***********-->
<section class="reel container" id="competences" style="margin-top:100px">

    <!--******* Pour référencement *******-->
    <h2 style="display:none"> Compétences de Bourgine Bérenger developpeur intégrateur web</h2>

    <aside class="container special pt-25">
        <header><h2> COMPETENCES </h2></header>
    </aside>

    <aside id="competence_boby">
        <!--BLOCK FRONT-END-->
        <div class="competence_enfant">
            <div class="ordinateur">
                <p><img src="Public/img/frontend.jpg" alt="frontend" style="text-align: center; width: 100%;"></p>
            </div>
            <div class="titre_h3"><h3>FRONTEND</h3></div>

            <div class="bloc_list align-middle">
                <?php if(empty($frontSkills)):?>
                    <p> no skills </p>

                    <?php else:?>
                        <?php if($frontSkills === false):?>
                            <p> Une erreur vient de se produire</p>
                        <?php else:?>
                            <?php foreach ($frontSkills as $skill):?>
                            <!-- POUR CHAQUE COMPETENCES Front-->
                            <div class="section_liste">
                                <div class="div_icone">
                                    <img src="Public/img/<?=$skill->getImg();?>" alt="compétences de FAGADE Bourgine Bérenger"/>   
                                </div>
                                <div class="div_texte">
                                    <span> <?= $skill->getTitle();?> </span> 
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
                <p><img src="Public/img/backend.jpg" alt="backend" style="text-align: center; width: 100%;"></p>
            </div>
            <div class="titre_h3"><h3>BACKEND</h3></div>

            <div class="bloc_list">

                <!-- POUR CHAQUE COMPETENCES de type back-->
                <div id="bloc_list">
                    <?php if(empty($backSkills)):?>
                        <p>no skill  </p>

                    <?php else:?>
                        <?php if($backSkills === false):?>
                            <p>Une erreur vient de se produire</p>

                        <?php else:?>

                            <?php foreach ($backSkills as $skill):?>
                                <!-- POUR CHAQUE COMPETENCES Front-->
                                <div class="section_liste">
                                    <div class="div_icone">
                                        <img src="Public/img/<?= $skill->getImg();?>" alt=" bourgine fagade competences"/><!-- Image en php-->
                                    </div>
                                    <div class="div_texte">
                                        <span> <?= $skill->getTitle();?> </span>  
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

<!--********* PARCOURS *******************-->
<div class="reel" id="parcours">

    <section id="features" class="container special">
        <h2 style="display:none"> Parcours de Bourgine Bérenger developpeur intégrateur web</h2>
        <header class="pt-25"><h2> PARCOURS </h2></header>

        <div class="content">
            <!-- POUR CHAQUE COMPETENCES de type back-->
            <?php if(empty($backgrounds)):?>
                <p> no background  </p>
            <?php else:?>
                <?php if($backgrounds === false):?>
                    <p> An error has occured</p>
                <?php else:?>
                    <?php foreach ($backgrounds as $background):?>
                        <div class="card">
                            <div class="card-head">
                                <i class="fas fa-graduation-cap fa-3x"></i>
                            </div>
                            <div class="card-body">
                                <h3><?= $background->getTitle();?></h3> <!-- title en php -->
                                <p class="bold"><a href="<?= $background->getLink();?>"> Détails</a></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif;?>
            <?php endif;?>
        </div>
    </section>
</div>

<!--********PROJECT*************-->
<section class="carousel pt-25" id="portefolio">

    <h2 style="display:none">Réalisation de Bourgine Bérenger developpeur intégrateur web</h2>
    <header class="pt-25"><h2>PORTFOLIO</h2></header>

    <div class="reel">

        <div class="div-mac">
            <?php if(empty($projects)):?>
                <p>No project</p>
            <?php else:?>
            <?php if($projects === false):?>
                <p>An error has occured</p>
            <?php else:?>
            <?php foreach ($projects as $project):?>
                <!-- begin macbook pro mockup -->
                <div class="md-macbook-pro md-glare">
                    <div class="md-lid">
                        <div class="md-camera"></div>
                        <div class="md-screen">
                        <!-- content goes here -->                
                            <div class="tab-featured-image">
                                <div class="tab-content">
                                    <div id="tab1">
                                        <a href="<?= $project->getLinkView();?>" class="image_realisation" >
                                            <img src="Public/img/<?= $project->getImg();?>" alt="tab1" class="img img-responsive">
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
