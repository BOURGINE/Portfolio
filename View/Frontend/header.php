<?php
if (isset($_SESSION['pseudo']))
{
    //Affiche les infos de la session
    $info1 = '<li><a href="index.php?act=code-lioko&req=authentification">BACKOFFICE</a></li>';
}
else
{
    $info1 = '';
}

?>

<div id="header">
    <!-- Inner -->
    <div class="inner">
        <header>
            <h1><a href="index.php" id="logo">Bourgine FAGADE</a></h1>
            <hr />
            <p>Développeur PHP/SYMFONY,<br/> Intrégrateur d'application web</p>
        </header>
    </div>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#competences">Compétences</a></li>
            <li><a href="#parcours">Parcours</a></li>
            <li><a href="#portefolio">Portfolio</a></li>
            <li><a href="#certificat">Certificats</a></li>
            <li><a href="#footer">Contact</a></li>
            <?= $info1;?>
        </ul>
        <a href="https://github.com/BOURGINE"><img style="position: absolute; top: 0; right: 0; border: 0; width: 120px; height: 129px;" src="http://aral.github.com/fork-me-on-github-retina-ribbons/right-white@2x.png" alt="Fork me on GitHub"></a>
    </nav>
</div>