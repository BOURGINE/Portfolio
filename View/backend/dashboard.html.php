<?php $title = 'Administration'; ?>
<?php ob_start(); ?>

<div class="container"> 
<!--  Mettre l'entête ici ou mette en place un tempate pour le backend-->


<!-- ****************************************
                CORPS BODY
******************************************-->
<div style="margin-top:100px;">

    <!-- ****************************************
                COMPETENCES (ALL)
    ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_competence">
            <a href="#corps_competence"> <h3>COMPETENCES</h3> </a>
        </div>

        <!-- Corps -->
        <div class="corps_session" id="corps_competence">
            <?php if(empty($competences)):?>
                <p> il n'y a aucune compétence dans la base de données</p>
            <?php else:?>

            <?php if($competences === false):?>
                <p> Une erreur vient de se produire</p>
            <?php else:?>
                <table>

                    <tr>
                        <th colspan="6"> <a href="#fermer"> Fermer </a> </th>
                    </tr>
                    <tr>
                        <th> LOGO </th>
                        <th> Titre  </th>
                        <th> Categorie </th>
                        <th colspan="2"> ACTIONS </th>
                    </tr>

                    <?php foreach ($competences as $competence):?>
                    <tr>
                        <td> <?= $competence->getImg();?> </td>
                        <td> <?= $competence->getTitle();?> </td>
                        <td><?= $competence->getCategorie();?> </td>
                        <td> <a href="index.php?act=competence&req=form-update&id=<?= $competence->getId();?>"> <i class="far fa-edit"></i></a>  </td>
                        <td> <a href="index.php?act=competence&req=delete&id=<?= $competence->getId();?>"> <i class="fas fa-trash-alt"></i></a> </td>
                    </tr>
                    <?php endforeach;?>
                </table>

            <?php endif;?>
            <?php endif;?>
            <h3> <a href="index.php?act=competence&req=form-create" style="color: darkred">
                    Ajouter une nouvelle compétence
                </a>
            </h3>

        </div>

    </div>

<!-- ****************************************
           2- MON PARCOURS
******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_parcours">
            <a href="#corps_parcours"> <h3>PARCOURS</h3> </a>
        </div>

        <!-- Corps -->
        <div class="corps_session" id="corps_parcours">
            <?php if(empty($parcours)):?>
                <p> il n'y a aucun contact</p>
            <?php else:?>
                <?php if($parcours === false):?>
                    <p> Une erreur vient de se produire</p>

                <?php else:?>

                    <table>
                        <tr>
                            <th> Titre</th>
                            <th> Liens</th>
                            <th colspan="2"> ACTION </th>
                        </tr>

                        <?php foreach ($parcours as $parcour):?>
                            <tr>
                                <td> <?= $parcour->getTitle()?>  </td>
                                <td> <?= $parcour->getLink()?></td>
                                <td> <a href="index.php?act=parcour&req=form-update&id=<?= $parcour->getId()?>"> <i class="far fa-edit"></i></a>  </td>
                                <td> <a href="index.php?act=parcour&req=delete&id=<?= $parcour->getId()?>"> <i class="fas fa-trash-alt"></i></a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                <?php endif;?>
            <?php endif;?>
        <h3> <a href="index.php?act=parcour&req=form-create" style="color: darkred"> Ajouter un nouveau Parcours</a></h3>
        </div>
    </div>

    <!-- ****************************************
            3 - Realisation
     ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_realisation">
            <a href="#corps_realisation"> <h3>REALISATIONS</h3> </a>
        </div>

        <!-- Billets -->
        <div class="corps_session" id="corps_realisation">
            <?php if(empty($realisations)):?>
                <p> il n'y a aucun membre</p>
            <?php else:?>
                <?php if($realisations === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <table>
                        <tr>
                            <th> Titre </th>
                            <th> Content</th>
                            <th> Lien vue</th>
                            <th> Lien github</th>
                            <th colspan="2"> ACTIONS </th>
                        </tr>

                        <?php foreach ($realisations as $realisation):?>
                            <tr>
                                <td> <?= $realisation->getTitle()?>  </td>
                                <td> <?= $realisation->getContent()?></td>
                                <td> <?= $realisation->getLinkView()?></td>
                                <td> <?= $realisation->getLinkGit()?></td>
                                <td> <a href="index.php?act=realisation&req=form-update&id=<?= $realisation->getId()?>"> <i class="far fa-edit"></i></a> </td>
                                <td> <a href="index.php?act=realisation&req=delete&id=<?= $realisation->getId()?>"> <i class="fas fa-trash-alt"></i></a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif;?>
            <?php endif;?>
            <h4> <a href="index.php?act=realisation&req=form-create" style="color: darkred"> Ajouter une nouvelle REALISATION
                </a>
            </h4>
        </div>
    </div>

    <!-- ****************************************
                 CERTIFICAT
     ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_certificat">
            <a href="#corps_certificat"> <h3> CERTIFICATS</h3></a>
        </div>

        <!-- Corps -->
        <div class="corps_session" id="corps_certificat">
            <?php if(empty($certificats)):?>
                <p> il n'y a aucun certificat</p>
            <?php else:?>

                <?php if($certificats === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <table>
                        <tr>
                            <th> Titre </th>
                            <th> Categorie </th>
                            <th colspan="2"> ACTIONS </th>
                        </tr>

                        <?php foreach ($certificats as $certificat):?>
                            <tr>
                                <td> <?= $certificat->getTitle()?> </td>
                                <td> <?= $certificat->getCat()?> </td>
                                <td> <a href="index.php?act=certificat&req=form-update&id=<?= $certificat->getId()?>"> <i class="far fa-edit"></i></a> </td>
                                <td> <a href="index.php?act=certificat&req=delete&id=<?= $certificat->getId()?>"> <i class="fas fa-trash-alt"></i></a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                <?php endif;?>
            <?php endif;?>
            <h4> <a href="index.php?act=certificat&req=form-create" style="color: darkred"> Ajouter CERTIFICATS </a></h4>
        </div>

    </div>

    <!-- ****************************************
               3 - les utilisateurs
    ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_utilisateur">
            <a href="#corps_utilisateur"> <h3> COMPTES ADMIN</h3></a>
        </div>

        <!-- Corps -->
         <div class="corps_session" id="corps_utilisateur">
            <?php if(empty($users)):?>
                <p> il n'y a aucun membre</p>
            <?php else:?>

                <?php if($users === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <table>
                        <tr>
                            <th> Pseudo</th>
                            <th> ACTIONS </th>
                        </tr>

                        <?php foreach ($users as $user):?>
                            <tr>
                                <td> <?= $user->getPseudo()?></td>
                                <td> <a href="index.php?act=code-lioko?req=delete&id=<?= $user->getId()?>"> <i class="fas fa-trash-alt"></i></a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                <?php endif;?>
            <?php endif;?>
            <h4> <a href="index.php?act=code-lioko?req=form-create" style="color:darkred"> Créer un nouveau Compte </a></h4>
         </div>
    </div>


</div>
</div>  <!-- fin container -->

<?php $content = ob_get_clean(); ?>

<?php require('../Portfolio/View/Frontend/template.php'); ?>