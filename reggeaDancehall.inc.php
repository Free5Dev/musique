<?php 
    // appel de la function de connexion à la bdd
    require_once('connexion.inc.php');
    // requete pour rap usa
    $reqReggeaDancehall=$bdd->query("SELECT z.id,z.nomArtiste,z.titre,z.url,z.description,z.photo,z.origine,date_format(datePub, 'Le %d/%m/%Y à %Hh%imin%ss') as datePub,z.idMembre,z.idMusiqueCategorie,m.nom FROM musiques as z,membres as m WHERE z.idMembre=m.id AND z.idMusiqueCategorie=4 ORDER BY ID DESC LIMIT 8");
    //   requete blog kbz
    $reqBlog=$bdd->query("SELECT b.id,b.titre,b.commentaire,b.idMembre,b.urlBlog,b.photoBlog,date_format(dateBlog,'Le %d/%m/%Y à %Hh%imin%ss') as dateBlog,m.nom FROM blog as b, membres as m WHERE b.idMembre=m.id order by id desc limit 1");
    $donneesBlog=$reqBlog->fetch();
     //   requete talent kbz
     $reqTalent=$bdd->query("SELECT t.id,t.titre,t.biographie,t.photoTalent,t.nomTalent,t.idMembre,date_format(dateTalent,'Le %d/%m/%Y à %Hh%imin%ss') as dateTalent,m.nom FROM talent as t, membres as m WHERE t.idMembre=m.id order by id desc limit 1");
     $donneesTalent=$reqTalent->fetch();
      //   requete kbzTv
      $reqKbzTv=$bdd->query("SELECT k.id,k.titre,k.photoKbzTv,k.idMembre,date_format(dateTv,'Le %d/%m/%Y à %Hh%imin%ss') as dateTv,m.nom FROM kbzTv as k, membres as m WHERE k.idMembre=m.id order by id desc limit 1");
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
     <!-- inclusion du header -->
     <?php include('header.inc.php'); ?>
    <!-- navbar -->
    <?php include('navbar.inc.php'); ?>
    <!-- section accueil -->
    <section class="container-fluid fluidAccueil">
        <section class="row rowAccueil">
            <!-- ---------------------------------------banniere de gauche---------------------------------------- -->
            <article class="col-sm-12 col-md-9 colRapUsaGauche">
                <!-- contenue de la banniere de gauche -->
                <div class="row rowColRapUsaGaucheElement">
                <?php while($donneesReggeaDancehall=$reqReggeaDancehall->fetch()) { ?>
                    <div class="col-sm-12 col-md-6 colRapUsaGaucheElementVideo">
                       
                        <div class="colRapUsaGaucheElementVideoElement">
                            <h3><a href="reggeaDancehallCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesReggeaDancehall['id']); ?>"><span class="text-danger">Artiste(s):</span> <?php echo htmlspecialchars($donneesReggeaDancehall['nomArtiste']); ?> <span class="text-danger">Titre:</span> <?php echo htmlspecialchars($donneesReggeaDancehall['titre']); ?></a></h3>
                           
                            <p id="img"><a href="reggeaDancehallCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesReggeaDancehall['id']); ?>"><img class="img-fluid img" src="<?php echo $donneesReggeaDancehall['photo']; ?>" /></a></p>
                            <p class="p1"><strong class="text-danger">Rédacteur: </strong><small><i class="fas fa-user-edit"></i> <?php echo htmlspecialchars($donneesReggeaDancehall['nom']); ?></small> <strong class="text-danger">Date:</strong> <small><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($donneesReggeaDancehall['datePub']); ?></small></p>
                            <p class="p4"><a href="reggeaDancehallCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesReggeaDancehall['id']); ?>">Commentaires</a></p>
                            <div class="row rowMusiqesBtnSociaux">
                                <div class="col-sm-12 col-md-4 colMusiquesBtnSociaux">
                                    <a class="btn btn-outline-primary btn-sm"><small>Partager sur Facebook</small></a>
                                </div>
                                <div class="col-sm-12 col-md-4 colMusiquesBtnSociaux">
                                    <a class="btn btn-outline-danger btn-sm"><small>Partager sur Google+</small></a>
                                </div>
                                <div class="col-sm-12 col-md-4 colMusiquesBtnSociaux">
                                    <a class="btn btn-outline-success btn-sm"><small>Partager sur Tweeter</small></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php } $reqReggeaDancehall->closeCursor(); ?>
                </div>
            </article>
            <!-- ----------------------------------------banniere de droite------------------------------ -->
            <article class="col-sm-12 col-md-3 colAccueilDroite">
               <!-- contenu de la banniere de droite- -->
                <div class="row rowColAccueilDroiteElement">
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
                        <h5 style="background-color:red;color:#fff;"><a href="https://www.facebook.com/kjpprod/?ref=br_rs" target="_blank"><small><i class="fas fa-tv"></i> Kbz Tv</small></a></h5>
                        <div class="pubSite img-responsive">
                        <h6><a href="" style=""><small><?php echo htmlspecialchars($donneesKbzTv['titre']); ?></small></a></h6>
                            <a href="https://www.facebook.com/photo.php?fbid=10217202887850740&set=a.4549317097452.2189542.1427091102&type=3" title="Suivez" target="_blank"><img src="<?php echo $donneesKbzTv['photoKbzTv']; ?>" alt=""></a><br>
                            <a href="" class="btn btn-outline-success " style="display:block;">Détails</a>
                        </div>
                    </div>
                    <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5 style="background-color:red;color:#fff;"><a href="https://www.facebook.com/kjpprod/?ref=br_rs" target="_blank"><small><i class="fas fa-volume-up"></i> Kbz Talent</small></a></h5>
                        <div class="pubSite img-responsive">
                        <h6><a href="" style=""><small><?php echo htmlspecialchars($donneesTalent['titre']); ?></small></a></h6>
                            <a href="https://www.facebook.com/photo.php?fbid=10217202887850740&set=a.4549317097452.2189542.1427091102&type=3" title="Suivez" target="_blank"><img src="<?php echo $donneesTalent['photoTalent']; ?>" alt=""></a><br>
                            <a href="" class="btn btn-outline-success " style="display:block;">Détails</a>
                        </div>
                    </div>
                    <div class="col-md-12 colAccueilDroiteElementPub">
                        <h5 style="background-color:red;color:#fff;"><a href="https://www.facebook.com/kjpprod/?ref=br_rs" target="_blank"><small><i class="fab fa-blogger"></i> Blog</small></a></h5>
                        <div class="pubSite img-responsive">
                            <h6><a href="" style=""><small><?php echo htmlspecialchars($donneesBlog['titre']); ?></small></a></h6>
                            <a href="https://www.facebook.com/photo.php?fbid=10217202887850740&set=a.4549317097452.2189542.1427091102&type=3" title="Suivez" target="_blank"><img src="<?php echo $donneesBlog['photoBlog']; ?>" alt=""></a><br>
                            <a href="" class="btn btn-outline-success " style="display:block;">Détails</a>
                        </div>
                    </div>
    
               </div>
            </article>

        </section>
    </section>
    <!-- inclusion du footer -->
    <?php include('footer.inc.php'); ?>
</body>
</html>