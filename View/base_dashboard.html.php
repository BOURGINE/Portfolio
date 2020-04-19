<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Bourgine - <?=$title?></title>

  <!-- Favicons -->
  <link href="public/back/img/favicon.png" rel="icon">
  <link href="public/back/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Bootstrap core CSS -->
  <link href="public/back/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="public/back/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="public/back/css/style.css" rel="stylesheet">
  <link href="public/back/css/style-responsive.css" rel="stylesheet">
</head>

<body>
    <div id="container">
        <!-- ************TOP BAR CONTENT & NOTIFICATIONS************************ -->
          <!--header start-->
          <header class="header black-bg">
              <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
              <!--logo start-->
              <a href="index.html" class="logo"><b>BOURGINE<span>ADMIN</span></b></a>
              <!--logo end-->
              <div class="top-menu">
                <ul class="nav pull-right top-menu">
                  <li><a class="logout" href="login.html">Logout</a></li>
                </ul>
              </div>
          </header>
        <!-- ******* Affichage du content de page ******** --> 

        <!-- ************ MAIN SIDEBAR MENU *********** -->
        <!--sidebar start-->
          <aside>
            <div id="sidebar" class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                <!-- Présentation -->
                <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
                <h5 class="centered">Sam Soffes</h5>

                <!-- Background -->
                <li class="sub-menu">
                  <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Background</span>
                    </a>
                  <ul class="sub">
                    <li><a href="index.php?ent=background">Lister</a></li>
                    <li><a href="index.php?ent=background&tsk=new">Créer</a></li>
                  </ul>
                </li>

                <!-- Skills -->
                <li class="sub-menu">
                  <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Skills et Techno</span>
                    </a>
                  <ul class="sub">
                    <li><a href="index.php?ent=skill">Lister</a></li>
                    <li><a href="index.php?ent=skill&tsk=new">Créer</a></li>
                  </ul>
                </li>

                <!-- Project -->
                <li class="sub-menu">
                  <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Projets</span>
                    </a>
                  <ul class="sub">
                    <li><a href="index.php?ent=project">Lister</a></li>
                    <li><a href="index.php?ent=project&tsk=new">Créer</a></li>
                  </ul>
                </li>

                <!-- Post -->
                <li class="sub-menu">
                  <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Articles</span>
                    </a>
                  <ul class="sub">
                    <li><a href="index.php?ent=post">Lister</a></li>
                    <li><a href="index.php?ent=post&tsk=new">Créer</a></li>
                  </ul>
                </li>

                <!-- Commentaire -->
                <li class="sub-menu">
                  <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Commentaires</span>
                    </a>
                  <ul class="sub">
                    <li><a href="index.php?ent=comment">Lister</a></li>
                  </ul>
                </li>

              </ul>
              <!-- sidebar menu end-->
            </div>
          </aside>
        <!--sidebar end-->

        <!-- ******* MAIN CONTENT ******** -->
        <section> 
          <?= $pageContent ?> 
        </section>
    
    </div>
  <!-- /MAIN CONTENT -->
  <!--main content end-->

  <!--footer start-->
  <footer class="site-footer">
    <div class="text-center">
      <p>
        &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
      </p>
      <div class="credits">
        <!--
          You are NOT allowed to delete the credit link to TemplateMag with free version.
          You can delete the credit link only if you bought the pro version.
          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
          Licensing information: https://templatemag.com/license/
        -->
        Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
      </div>
      <a href="profile.html#" class="go-top">
        <i class="fa fa-angle-up"></i>
        </a>
    </div>
  </footer>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="public/back/lib/jquery/jquery.min.js"></script>
  <script src="public/back/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="public/back/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="public/back/lib/jquery.scrollTo.min.js"></script>
  <script src="public/back/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="public/back/lib/common-scripts.js"></script>
  <!--script for this page-->
  <!-- MAP SCRIPT - ALL CONFIGURATION IS PLACED HERE - VIEW OUR DOCUMENTATION FOR FURTHER INFORMATION -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>

  <script>
    $('.contact-map').click(function() {

      //google map in tab click initialize
      function initialize() {
        var myLatlng = new google.maps.LatLng(40.6700, -73.9400);
        var mapOptions = {
          zoom: 11,
          scrollwheel: false,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Dashio Admin Theme!'
        });
      }
      google.maps.event.addDomListener(window, 'click', initialize);
    });
  </script>
</body>

</html>