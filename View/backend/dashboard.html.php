<div class="container"> 
<!-- ********CORPS BODY****************-->
    <div style="margin-top:100px;">
        <!--**************skillS (ALL)******************-->
        <div class="section_articles">
            <!-- Titre -->
            <div class="entete_session" id="entete_competence">
                <a href="#corps_competence"> <h3>COMPETENCES</h3> </a>
            </div>
            <!-- Corps -->
            <div class="corps_session" id="corps_competence">
                <?php if(empty($skills)):?>
                    <p> il n'y a aucune compétence dans la base de données</p>
                <?php else:?>
                <?php if($skills === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>
                    <table>
                        <tr><th colspan="6"> <a href="#fermer"> Fermer </a> </th></tr>
                        <tr>
                            <th> LOGO </th>
                            <th> Titre  </th>
                            <th> Categorie </th>
                            <th colspan="2"> ACTIONS </th>
                        </tr>
                        <?php foreach ($skills as $skill):?>
                        <tr>
                            <td> <?= $skill->getImg();?> </td>
                            <td> <?= $skill->getTitle();?> </td>
                            <td><?= $skill->getCategorie();?> </td>
                            <!-- update -->
                            <td> <a href="index.php?ent=skill&tsk=edit&id=<?= $skill->getId();?>"> <i class="far fa-edit"></i></a>  </td>
                            <!-- delete -->
                            <td>
                                <?php include(__DIR__.'/skill/_delete_form.php'); ?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                <?php endif;?>
                <?php endif;?>
                <h3> 
                    <a href="index.php?ent=skill&tsk=new" style="color: darkred">Ajouter une nouvelle compétence</a>
                </h3>
            </div>
        </div>

        <!-- ************** Background **************-->
        <div class="section_articles">
            <!-- Titre -->
            <div class="entete_session" id="entete_parcours">
                <a href="#corps_parcours"> <h3>PARCOURS</h3> </a>
            </div>

            <!-- Corps -->
            <div class="corps_session" id="corps_parcours">
                <?php if(empty($backgrounds)):?>
                    <p> il n'y a aucun content</p>
                <?php else:?>
                    <?php if($backgrounds === false):?>
                        <p> Une erreur vient de se produire</p>
                    <?php else:?>
                        <table>
                            <tr>
                                <th>Titre</th>
                                <th>Liens</th>
                                <th colspan="2">ACTION</th>
                            </tr>
                            <?php foreach ($backgrounds as $background):?>
                                <tr>
                                    <td> <?= $background->getTitle()?> </td>
                                    <td> <?= $background->getLink()?> </td>
                                    <td> <a href="index.php?ent=background&tsk=edit&id=<?= $background->getId()?>"> <i class="far fa-edit"></i></a>  </td>
                                    <td>
                                        <?php include(__DIR__.'/background/_delete_form.php'); ?>
                                     </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>

                    <?php endif;?>
                <?php endif;?>
            <h3> <a href="index.php?ent=background&tsk=new" style="color:darkred"> Ajouter un nouveau Parcours</a></h3>
            </div>
        </div>

        <!-- *********Projects******************-->
        <div class="section_articles">
            <!-- Titre -->
            <div class="entete_session" id="entete_realisation">
                <a href="#corps_realisation"> <h3>REALISATIONS</h3> </a>
            </div>

            <!-- Billets -->
            <div class="corps_session" id="corps_realisation">
                <?php if(empty($projects)):?>
                    <p> il n'y a aucun membre</p>
                <?php else:?>
                    <?php if($projects === false):?>
                        <p> Une erreur vient de se produire</p>
                    <?php else:?>

                        <table>
                            <tr>
                                <th> Titre </th>
                                <th> Content</th>
                                <th> Lien vue</th>
                                <th> Lien github</th>
                                <th colspan="2"> entIONS </th>
                            </tr>
                            <?php foreach ($projects as $project):?>
                                <tr>
                                    <td> <?= $project->getTitle()?> </td>
                                    <td> <?= $project->getContent()?></td>
                                    <td> <?= $project->getLinkView()?></td>
                                    <td> <?= $project->getLinkGit()?></td>
                                    <!-- update -->
                                    <td> <a href="index.php?ent=project&tsk=edit&id=<?= $project->getId()?>"> <i class="far fa-edit"></i></a> </td>
                                    <!-- delete -->
                                    <td>
                                        <?php include(__DIR__.'/project/_delete_form.php'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif;?>
                <?php endif;?>
                <h4> <a href="index.php?ent=project&tsk=new" style="color: darkred"> NOUVELLE REALISATION</a>
                </h4>
            </div>
        </div>

        <!-- **********Users*************-->
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
                                    <!-- delete -->
                                    <td>
                                        <?php include(__DIR__.'/user/_delete_form.php'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>

                    <?php endif;?>
                <?php endif;?>
                <h4> <a href="index.php?ent=user&tsk=new" style="color:darkred">Créer un nouveau Compte</a></h4>
            </div>
        </div>
    </div>
</div>  <!-- fin container -->