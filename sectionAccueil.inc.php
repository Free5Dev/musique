<?php 
    // appel de la function de connexion à la bdd
    require_once('connexion.inc.php');
    // requete de select à la bdd des hit rap usa and rap fr
    $reqUsaEtFr=$bdd->query("SELECT z.id,z.nomArtiste,z.titre,z.url,z.description,z.photo,z.origine,date_format(datePub, 'Le %d/%m/%Y à %Hh%imin%ss') as datePub,z.idMembre,z.idMusiqueCategorie,m.nom FROM musiques as z,membres as m WHERE z.idMembre=m.id AND z.idMusiqueCategorie=1 ORDER BY ID DESC LIMIT 1");
    $donneesUsaEtFr=$reqUsaEtFr->fetch();
    // requete pour rap usa
    $reqUsa=$bdd->query("SELECT z.id,z.nomArtiste,z.titre,z.url,z.description,z.photo,z.origine,date_format(datePub, 'Le %d/%m/%Y à %Hh%imin%ss') as datePub,z.idMembre,z.idMusiqueCategorie,m.nom FROM musiques as z,membres as m WHERE z.idMembre=m.id AND z.idMusiqueCategorie=1 ORDER BY ID DESC LIMIT 1,3");
    // requete pour rap fr
    $reqFr=$bdd->query("SELECT z.id,z.nomArtiste,z.titre,z.url,z.description,z.photo,z.origine,date_format(datePub, 'Le %d/%m/%Y à %Hh%imin%ss') as datePub,z.idMembre,z.idMusiqueCategorie,m.nom FROM musiques as z,membres as m WHERE z.idMembre=m.id AND z.idMusiqueCategorie=2 ORDER BY ID DESC LIMIT 3");
     // requete pour rap Afro
     $reqAfro=$bdd->query("SELECT z.id,z.nomArtiste,z.titre,z.url,z.description,z.photo,z.origine,date_format(datePub, 'Le %d/%m/%Y à %Hh%imin%ss') as datePub,z.idMembre,z.idMusiqueCategorie,m.nom FROM musiques as z,membres as m WHERE z.idMembre=m.id AND z.idMusiqueCategorie=3 ORDER BY ID DESC LIMIT 3");
      // requete pour reggea Dancehall
      $reqReggeaDancehall=$bdd->query("SELECT z.id,z.nomArtiste,z.titre,z.url,z.description,z.photo,z.origine,date_format(datePub, 'Le %d/%m/%Y à %Hh%imin%ss') as datePub,z.idMembre,z.idMusiqueCategorie,m.nom FROM musiques as z,membres as m WHERE z.idMembre=m.id AND z.idMusiqueCategorie=4 ORDER BY ID DESC LIMIT 3");
    //   requete blog kbz
    $reqBlog=$bdd->query("SELECT b.id,b.titre,b.commentaire,b.idMembre,b.urlBlog,b.photoBlog,date_format(dateBlog,'Le %d/%m/%Y à %Hh%imin%ss') as dateBlog,m.nom FROM blog as b, membres as m WHERE b.idMembre=m.id order by id desc limit 1");
    $donneesBlog=$reqBlog->fetch();
     //   requete talent kbz
     $reqTalent=$bdd->query("SELECT t.id,t.titre,t.biographie,t.photoTalent,t.nomTalent,t.idMembre,date_format(dateTalent,'Le %d/%m/%Y à %Hh%imin%ss') as dateTalent,m.nom FROM talent as t, membres as m WHERE t.idMembre=m.id order by id desc limit 1");
     $donneesTalent=$reqTalent->fetch();
      //   requete kbzTv
      $reqKbzTv=$bdd->query("SELECT k.id,k.titre,k.photoKbzTv,k.idMembre,date_format(dateTv,'Le %d/%m/%Y à %Hh%imin%ss') as dateTv,m.nom FROM kbztv as k, membres as m WHERE k.idMembre=m.id order by id desc limit 1");
      $donneesKbzTv=$reqKbzTv->fetch();
   // $donneesUsa=$reqUsa->fetch();
    // echo"<pre>";
    // print_r($donneesUsaEtFr);
    // echo"</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KBZ prémière plateforme de musique</title>
    <!-- script d'injection des anciennes navigateurs -->
    <!--[if (lt IE 9) & (!IEMobile)]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/livingston-css3-mediaqueries-js/1.0.0/css3-mediaqueries.js"></script>
		<![endif]-->
    <!-- lien di favicon -->
    <link rel="icon" href="./images/kbzLogo.jpg"/>
    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- lien google font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400" rel="stylesheet">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- bootstrap min css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <!-- bootstrap min js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- lien du fichier css -->
    <link rel="stylesheet" href="./css/style.css"/>
    <!-- lien script js -->
    <script src="./js/script.js"></script>
</head>
<body>
    <!-- section accueil -->
    <section class="container-fluid fluidAccueil">
        <section class="row rowAccueil">
            <!-- ---------------------------------------banniere de gauche---------------------------------------- -->
            <article class="col-sm-12 col-md-9 colAccueilGauche" >
                <!-- contenue de la banniere de gauche -->
                <div class="row rowColAccueilGaucheElement" >
                    <div class="col col-md-12 colAccueilGaucheElementVideo">
                        <!-- contenue de colAccueilGaucheElementVideo -->
                        <h2><span class="text-danger">Artiste(s):</span> <?php echo htmlspecialchars($donneesUsaEtFr['nomArtiste']); ?> <span class="text-danger">Titre:</span> <?php echo htmlspecialchars($donneesUsaEtFr['titre']); ?></h2>
                        <p class="p1"><strong class="text-danger">Rédacteur: </strong><small><i class="fas fa-user-edit"></i> <?php echo htmlspecialchars($donneesUsaEtFr['nom']); ?></small> <strong class="text-danger">Date:</strong> <small><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($donneesUsaEtFr['datePub']); ?></small></p>
                        <p><iframe class="img-fluid iframe" src="<?php echo $donneesUsaEtFr['url']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>
                        <p class="p4"><a href="rapUsaCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesUsaEtFr['id']); ?>">Commentaires</a></p>
                        <!-- button reseaux sociaux -->
                        <div class="row rowAccueilBtnSociaux">
                            <div class="col-md-4 col-sm-4 img-fluid">
                                <button class="btn btn-outline-primary">Partager sur Facebook</button>
                            </div>
                            <div class="col-md-4 col-sm-4 img-fluid">
                                <button class="btn btn-outline-danger">Partager sur Gmail</button>
                            </div>
                            <div class="col-md-4 col-sm-4 img-fluid">
                                <button class="btn btn-outline-success">Partager sur Tweeter</button>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-12 colAccueilGaucheElementVideo">
                        <!-- contenu top hit rap usa -->
                        <h3><a href="rapUsa.inc.php">Top Hit Usa</a></h3>
                        <div class="row rowHit">
                            <?php while($donneesUsa=$reqUsa->fetch()) { ?>
                            <div class="col-sm-12 col-md-4 colHit">
                                <p><a href="rapUsaCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesUsa['id']); ?>"><strong class="text-danger">Artiste(s):</strong> <?php echo htmlspecialchars($donneesUsa['nomArtiste']); ?></a></p>
                                <p class="photo"><a href="rapUsaCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesUsa['id']); ?>"><img src="<?php echo htmlspecialchars($donneesUsa['photo']); ?>" alt=""></a></p>
                                <p><a href="rapUsaCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesUsa['id']); ?>"><strong class="text-danger">Titre:</strong> <?php echo htmlspecialchars($donneesUsa['titre']); ?></a></p>
                            </div>
                            <?php } $reqUsa->closeCursor(); ?>
                        </div>
                        <!-- end -->
                    </div>
                   <!--  -->
                   <div class="col col-md-12 colAccueilGaucheElementVideo">
                        <!-- contenu top hit rap Fr -->
                        <h3><a href="rapFr.inc.php">Top Hit Fr</a></h3>
                        <div class="row rowHit">
                            <?php while($donneesFr=$reqFr->fetch()) { ?>
                            <div class="col-sm-12 col-md-4 colHit">
                                <p><a href="rapFrCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesFr['id']); ?>"><strong class="text-danger">Artiste(s):</strong> <?php echo htmlspecialchars($donneesFr['nomArtiste']); ?></a></p>
                                <p class="photo"><a href="rapFrCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesFr['id']); ?>"><img src="<?php echo htmlspecialchars($donneesFr['photo']); ?>" alt=""></a></p>
                                <p><a href="rapFrCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesFr['id']); ?>"><strong class="text-danger">Titre:</strong> <?php echo htmlspecialchars($donneesFr['titre']); ?></a></p>
                            </div>
                            <?php } $reqFr->closeCursor(); ?>
                        </div>
                        <!-- end -->
                    </div>
                    <!--  -->
                    <div class="col col-md-12 colAccueilGaucheElementVideo">
                        <!-- contenu top hit rap Fr -->
                        <h3><a href="rapAfro.inc.php">Top Hit Afro</a></h3>
                        <div class="row rowHit">
                            <?php while($donneesAfro=$reqAfro->fetch()) { ?>
                            <div class="col-sm-12 col-md-4 colHit">
                                <p><a href="rapAfroCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesAfro['id']); ?>"><strong class="text-danger">Artiste(s):</strong> <?php echo htmlspecialchars($donneesAfro['nomArtiste']); ?></a></p>
                                <p class="photo"><a href="rapAfroCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesAfro['id']); ?>"><img src="<?php echo htmlspecialchars($donneesAfro['photo']); ?>" alt=""></a></p>
                                <p><a href="rapAfroCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesAfro['id']); ?>"><strong class="text-danger">Titre:</strong> <?php echo htmlspecialchars($donneesAfro['titre']); ?></a></p>
                            </div>
                            <?php } $reqAfro->closeCursor(); ?>
                        </div>
                        <!-- end -->
                    </div>
                    <!--  -->
                    <div class="col col-md-12 colAccueilGaucheElementVideo">
                        <!-- contenu top hit rap Fr -->
                        <h3><a href="reggeaDancehall.inc.php">Top Hit Reggea-Dancehall</a></h3>
                        <div class="row rowHit">
                            <?php while($donneesReggeaDancehall=$reqReggeaDancehall->fetch()) { ?>
                            <div class="col-sm-12 col-md-4 colHit">
                                <p><a href="reggeaDancehallCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesReggeaDancehall['id']); ?>"><strong class="text-danger">Artiste(s):</strong> <?php echo htmlspecialchars($donneesReggeaDancehall['nomArtiste']); ?></a></p>
                                <p class="photo"><a href="reggeaDancehallCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesReggeaDancehall['id']); ?>"><img src="<?php echo htmlspecialchars($donneesReggeaDancehall['photo']); ?>" alt=""></a></p>
                                <p><a href="reggeaDancehallCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesReggeaDancehall['id']); ?>"><strong class="text-danger">Titre:</strong> <?php echo htmlspecialchars($donneesReggeaDancehall['titre']); ?></a></p>
                            </div>
                            <?php } $reqReggeaDancehall->closeCursor(); ?>
                        </div>
                        <!-- end -->
                    </div>
                    <!--  -->
                </div>
            </article>
            <!-- ----------------------------------------banniere de droite------------------------------ -->
            <article class="col-sm-12 col-md-3 colAccueilDroite" style="background-color:#fff;">
               <!-- contenu de la banniere de droite- -->
                <div class="row rowColAccueilDroiteElement" style="background-color:#D3D3D3;">
                    <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5><a href="contact.inc.php" target="_blank"><small>  Passer vos Pub c'est gratuit</small></a></h5>
                        <div class="pubSite img-responsive">
                            
                            <a href="https://www.facebook.com/profile.php?id=391164374695204&ref=br_rs" title="Suivez" target="_blank"><img src="./images/flightVoyage.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5><a href="https://www.facebook.com/photo.php?fbid=356990684827903&set=a.123557278171246.1073741827.100015509238427&type=3" target="_blank"><small>Sortie de L'album du Général Lion</small></a></h5>
                        <div class="pubSite img-responsive">
                            <a href="https://www.facebook.com/photo.php?fbid=356990684827903&set=a.123557278171246.1073741827.100015509238427&type=3" title="Suivez" target="_blank"><img src="./images/generalLion.jpg" alt=""></a>
                        </div>
                           
                    </div>
                    <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5><a href="https://www.facebook.com/148669531832326/photos/p.1870910762941519/1870910762941519/" target="_blank"><small>Nos Partenaires</small></a></h5>
                        <div class="pubSite img-responsive">
                            <a href="https://www.facebook.com/148669531832326/photos/p.1870910762941519/1870910762941519/" title="Suivez" target="_blank"><img src="./images/couleursTropicales.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5><a href="https://www.facebook.com/kjpprod/?ref=br_rs" target="_blank"><small>Nos Partenaires</small></a></h5>
                        <div class="pubSite img-responsive">
                            <a href="https://www.facebook.com/kjpprod/?ref=br_rs" title="Suivez" target="_blank"><img src="./images/kjp.jpg" alt=""></a>
                        </div>
                    </div>
                   
                    <!-- <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5><a href="https://www.facebook.com/photo.php?fbid=10217202887850740&set=a.4549317097452.2189542.1427091102&type=3" target="_blank"><small>Nos Partenaires</small></a></h5>
                        <div class="pubSite img-responsive">
                            <a href="https://www.facebook.com/photo.php?fbid=10217202887850740&set=a.4549317097452.2189542.1427091102&type=3" title="Suivez" target="_blank"><img src="./images/carteVisite.jpg" alt=""></a>
                        </div>
                    </div> -->
                    <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5 style="background-color:red;color:#fff;"><a href="kbzTvCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesKbzTv['id']); ?>" target="_blank"><small><i class="fas fa-tv"></i> Kbz Tv</small></a></h5>
                        <div class="pubSite img-responsive">
                        <h6><a href="kbzTvCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesKbzTv['id']); ?>" style=""><small><?php echo htmlspecialchars($donneesKbzTv['titre']); ?></small></a></h6>
                            <a href="kbzTvCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesKbzTv['id']); ?>" title="Suivez" target="_blank"><img src="<?php echo $donneesKbzTv['photoKbzTv']; ?>" alt=""></a><br>
                            <a href="kbzTvCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesKbzTv['id']); ?>" class="btn btn-outline-success " style="display:block;">Détails</a>
                        </div>
                    </div>
                    <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5 style="background-color:red;color:#fff;"><a href="kbzTalentCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesTalent['id']); ?>" target="_blank"><small><i class="fas fa-volume-up"></i> Kbz Talent</small></a></h5>
                        <div class="pubSite img-responsive">
                        <h6><a href="kbzTalentCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesTalent['id']); ?>" style=""><small><?php echo htmlspecialchars($donneesTalent['titre']); ?></small></a></h6>
                            <a href="kbzTalentCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesTalent['id']); ?>" title="Suivez" target="_blank"><img src="<?php echo $donneesTalent['photoTalent']; ?>" alt=""></a><br>
                            <a href="kbzTalentCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesTalent['id']); ?>" class="btn btn-outline-success " style="display:block;">Détails</a>
                        </div>
                    </div>
                    <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5 style="background-color:red;color:#fff;"><a href="kbzBlogCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesBlog['id']); ?>" target="_blank"><small><i class="fab fa-blogger"></i> Blog</small></a></h5>
                        <div class="pubSite img-responsive">
                            <h6><a href="kbzBlogCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesBlog['id']); ?>" style=""><small><?php echo htmlspecialchars($donneesBlog['titre']); ?></small></a></h6>
                            <a href="kbzBlogCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesBlog['id']); ?>" title="Suivez" target="_blank"><img src="<?php echo $donneesBlog['photoBlog']; ?>" alt=""></a><br>
                            <a href="kbzBlogCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesBlog['id']); ?>" class="btn btn-outline-success " style="display:block;">Détails</a>
                        </div>
                    </div>
    
               </div>
            </article>

        </section>
    </section>
</body>
</html>