<?php

// Affichage des infos de connexion, si connexion encours
if (isset($_SESSION['pseudo']) AND !empty($_SESSION['pseudo']))
{$info1 = '<li><a href="index.php?ent=user&tsk=authentification">BACKOFFICE</a></li>';}
?>

<div id="header">

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#skill">Compétences</a></li>
            <li><a href="#background">Parcours</a></li>
            <li><a href="#project">Portfolio</a></li>
            <li><a href="#footer">Contact</a></li>
            <?= $info1;?>
        </ul>
        <a href="https://github.com/kirokou"><img style="position: absolute; top: 0; right: 0; border: 0; width: 120px; height: 129px;" src="http://aral.github.com/fork-me-on-github-retina-ribbons/right-white@2x.png" alt="Fork me on GitHub"></a>
    </nav>

    <!-- Hero -->
    <div class="inner">
        <header>
            <h1><a href="index.php" id="logo">Bourgine FAGADE</a></h1>
            <hr />
            <p>Développeur PHP/SYMFONY,<br/> Intrégrateur d'application web</p>
        </header>
    </div>

    <!-- Présentation -->
    <section id="banner">
    <header>
        <h2><strong>Hello!</strong> Bienvenue sur mon site </h2>
        <p>
            Je souhaite une bonne expérience utilisateur. N'hésitez pas à me faire un <a href="#footer">retour</a>. A bientôt.
        </p>
    </header>
</section>
</div>