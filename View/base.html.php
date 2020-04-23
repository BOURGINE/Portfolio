<?php
require_once "Controller/Security.php";
use Portfolio\Controller\Security;

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Bourgine Bérenger FAGADE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="public/front/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="public/front/css/animate.css">
    <link rel="stylesheet" href="public/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="public/front/css/magnific-popup.css">
    <link rel="stylesheet" href="public/front/css/aos.css">
    <link rel="stylesheet" href="public/front/css/ionicons.min.css">
    <link rel="stylesheet" href="public/front/css/flaticon.css">
    <link rel="stylesheet" href="public/front/css/icomoon.css">
    <link rel="stylesheet" href="public/front/css/style.css">
  </head>

<style>

</style>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <!-- Navbarre -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Bourgine</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link"><span>Accueil</span></a></li>
	          <li class="nav-item"><a href="index.php#resume-section" class="nav-link"><span>Parcours</span></a></li>
	          <li class="nav-item"><a href="index.php#services-section" class="nav-link"><span>Compétences</span></a></li>
	          <li class="nav-item"><a href="index.php#projects-section" class="nav-link"><span>Projets</span></a></li>
	          <li class="nav-item"><a href="index.php#blog-section" class="nav-link"><span>Blog</span></a></li>
	          <li class="nav-item"><a href="index.php#contact-section" class="nav-link"><span>Contact</span></a></li>
            <?php if((Security::is_logged())):?>
                <?php if((Security::is_admin())):?>
                  <li class="nav-item"><a href="index.php?tsk=dashboard" class="btn btn-primary mt-2"><span>Dashboard</span></a></li>
                <?php else:?>
                  <li class="nav-item"><a href="index.php?tsk=logout" class="btn btn-primary mt-2"><span>Déconnexion</span></a></li>
                <?php endif?>
            <?php else:?>
              <li class="nav-item">
                <div class="btn-group mt-2">
                  <a class="btn btn-primary" href="#"><i class="icon-user"></i>Compte</a>
                  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"></a>
                  <ul class="dropdown-menu" style="width:10px">
                    <li class="ml-3"><a href="index.php?tsk=login">Connexion</a></li>
                    <li class="ml-3"><a href="index.php?ent=user&tsk=register">Inscription</a></li>
                  </ul>
                </div>
              </li>
            <?php endif?>
	        </ul>
	      </div>
	    </div>
    </nav>
    <!--/Navbarre -->

    <!-- Content -->
    <div id="page-wrapper">
       <!-- Gestion de message flash -->
      <?php if(isset($message) AND !empty($message)):?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-auto mt-3 mx-auto">
                    <div class="mt-4 alert alert-<?= $type ?>">
                      <?= $message ?>
                    </div>
                </div>
            </div>
        </div>
      <?php endif ?>
      <!-- end/ Gestion de message flash -->

      <!-- Content page -->
      <?= $pageContent ?>
      <!-- fin Content page -->
    </div>
    <!-- /Content -->

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md">
            <div class="ftco-footer-widget">
              <ul class="ftco-footer-social list-unstyled">
                <li class="ftco-animate"><a href="https://twitter.com/FAGADEB"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.linkedin.com/in/bourginefagade/"><span class="icon-linkedin"></span></a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <p> Template Colorlib modifié et adpaté</p>
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="public/front/js/jquery.min.js"></script>
  <script src="public/front/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="public/front/js/popper.min.js"></script>
  <script src="public/front/js/bootstrap.min.js"></script>
  <script src="public/front/js/jquery.easing.1.3.js"></script>
  <script src="public/front/js/jquery.waypoints.min.js"></script>
  <script src="public/front/js/jquery.stellar.min.js"></script>
  <script src="public/front/js/owl.carousel.min.js"></script>
  <script src="public/front/js/jquery.magnific-popup.min.js"></script>
  <script src="public/front/js/aos.js"></script>
  <script src="public/front/js/jquery.animateNumber.min.js"></script>
  <script src="public/front/js/scrollax.min.js"></script>
  <script src="public/front/js/main.js"></script>
  <script src="public/front/js/contact.js"></script>
  <script src="public/front/js/register.js"></script>
  <script src="public/front/js/login.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.1/jquery.validate.js"></script>
  <!--Google Captcha-->
  <script src="https://www.google.com/recaptcha/api.js?render=ICI_LA_CLE_DU_SITE"></script>
    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('ICI_LA_CLE_DU_SITE', {action: 'homepage'}).then(function(token) {
            document.getElementById('recaptchaResponse').value = token
        });
    });
    </script>

    <script>
      //Show more tricks on home page */
      function loadMore()
      {
          // Hide trick from trick number 6
          $(".grid-item").slice(5, $("div.grid-item").length).hide();
          $("#loadLess").hide();  
          $("#loadMore").on('click', function (e) { e.preventDefault(); 
              $("div.grid-item:hidden").slice(0, 3).slideDown(); 
              // Si le nombre de truc caché =0 dc si tout est affiché
              if ($("div.grid-item:hidden").length == 0){ 
                  //cache le button loadMore
                  $("#loadMore").hide(); 
                  // Affiche le button loadless
                  $("#loadLess").show(); } }); 
                  // Si je clique sur le button loadless
                  $("#loadLess").on('click', function (e) { e.preventDefault(); 
                  
                  $("div.grid-item").slice(5, $("div.grid-item").length).slideUp(); 
                  //je cache le button loadless
                  $("#loadLess").hide(); 
                  $("#loadMore").show(); 
              }
          ); 
      } 
      loadMore();
    </script>
</body>
</html>