<?php 
    // appel de la function de connexion à la bdd
    require_once('connexion.inc.php');
    // verification de l'existance du lien 
    if(isset($_GET['ref'])){
        // requete pour rap usa
        $reqUsa=$bdd->prepare("SELECT z.id,z.nomArtiste,z.titre,z.url,z.description,z.photo,z.origine,date_format(datePub, 'Le %d/%m/%Y à %Hh%i') as datePub,z.idMembre,z.idMusiqueCategorie,m.nom FROM musiques as z,membres as m WHERE z.idMembre=m.id AND z.id=? ");
        $reqUsa->execute(array($_GET['ref']));
        $donneesUsa=$reqUsa->fetch();
        if(empty($donneesUsa)){
            header('Location:rapUsa.inc.php');
        }
    }
    else{
       header("Location:rapUsa.inc.php");
    }
    
    
    //   requete Meme categorie
    $reqMm=$bdd->prepare("SELECT z.id,z.nomArtiste,z.titre,z.url,z.description,z.photo,z.origine,date_format(datePub, 'Le %d/%m/%Y à %Hh%imin%ss') as datePub,z.idMembre,z.idMusiqueCategorie,m.nom FROM musiques as z,membres as m WHERE z.idMembre=m.id AND z.idMusiqueCategorie=1 AND z.id!=? ORDER BY id DESC LIMIT 1,5");
    $reqMm->execute(array($_GET['ref']));
    
     //   requete Meme artiste
     $reqMArtiste=$bdd->prepare("SELECT z.id,z.nomArtiste,z.titre,z.url,z.description,z.photo,z.origine,date_format(datePub, 'Le %d/%m/%Y à %Hh%imin%ss') as datePub,z.idMembre,z.idMusiqueCategorie,m.nom FROM musiques as z,membres as m WHERE z.idMembre=m.id AND z.idMusiqueCategorie=1 AND z.id!=? ORDER BY id DESC LIMIT 6,6");
    $reqMArtiste->execute(array($_GET['ref']));
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
    <!--Début  code publicités pour google adsens -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-2672204138091937",
            enable_page_level_ads: true
        });
    </script>
    <!--Fin  code publicités pour google adsens  -->
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5bfd55e7ea80c50011bc5a2b&product=inline-share-buttons"></script>
</head>
<body>
     <!-- inclusion du header -->
    <?php include('header.inc.php'); ?>
    <!-- navbar -->
    <!-- debut navabr -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbarMenu">
        <a class="navbar-brand  text-danger" href="index.php">K.B.Z</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Musiques
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="rapUsa.inc.php">Rap Usa</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="rapFr.inc.php">Rap Fr</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="rapAfro.inc.php">Rap Afro</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="reggeaDancehall.inc.php">Reggue Dancehall</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kbzTv.inc.php">KbzTv</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kbzBlog.inc.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kbzTalent.inc.php">Talent</a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" href="kbzShop.inc.php">Shop</a> -->
            </li>

            </ul>
        </div>
    </nav>
    <!--end navbar-->
    <!-- section accueil -->
    <section class="container-fluid fluidAccueil">
        <section class="row rowAccueil">
            <!-- ---------------------------------------banniere de gauche---------------------------------------- -->
            <article class="col-sm-12 col-md-9 colRapUsaGauche"  style="background-color:#fff;">
               <div class="row rowCommentaire"  style="background-color:#D3D3D3;">
                   <div class="col-md-12 colCommentaire">
                        <h3><span class="text-danger"><?php echo htmlspecialchars($donneesUsa['nomArtiste']); ?></span>-<?php echo htmlspecialchars($donneesUsa['titre']); ?></h3>
                        <p id="iframe"><iframe class="img-fluid iframe" src="<?php echo $donneesUsa['url']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>

                        <p class="p1"><strong class="text-danger">Rédacteur: </strong><small><i class="fas fa-user-edit"></i> <?php echo htmlspecialchars($donneesUsa['nom']); ?></small> <strong class="text-danger">Date:</strong> <small><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($donneesUsa['datePub']); ?></small></p>
                        <p><strong class="text-danger">DESCRIPTION:</strong><?php echo nl2br(htmlspecialchars($donneesUsa['description'])); ?></p>
                        <div class="row rowMusiqesBtnSociaux">
                            <div class="col-md-12">
                                <div class="sharethis-inline-share-buttons"></div>
                            </div>
                            <!-- <div class="col-sm-12 col-md-4 colMusiquesBtnSociaux">
                                <a class="btn btn-outline-primary btn-sm"><small>Partager sur Facebook</small></a>
                            </div>
                            <div class="col-sm-12 col-md-4 colMusiquesBtnSociaux">
                                <a class="btn btn-outline-danger btn-sm"><small>Partager sur Google+</small></a>
                            </div>
                            <div class="col-sm-12 col-md-4 colMusiquesBtnSociaux">
                                <a class="btn btn-outline-success btn-sm"><small>Partager sur Tweeter</small></a>
                            </div> -->
                        </div>
                   </div>
                   <!--  -->
                   <div class="col-md-12 colCommentaire">
                       <h2>Commentaires</h2>
                       <p>
                       <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.0';
                            fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>

                            <div class="fb-comments" data-href="http://localhost/musique/rapUsaCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesUsa['id']); ?>" data-width="100%" data-numposts="5"></div>
                       </p>
                   </div>
                   <!--  -->
                    <!--  -->
                   <div class="col-md-12 colCommentaire">
                        <h2>Du même Catégories </h2>
                        <div class="row rowMemeArtiste">
                            <?php while($donneesMmArtiste=$reqMArtiste->fetch()) { ?>
                            <div class="col-sm-12 col-md-4 colMemeArtiste">
                                <h5><span class="text-danger"><?php echo htmlspecialchars($donneesMmArtiste['nomArtiste']); ?></span> <?php echo htmlspecialchars($donneesMmArtiste['titre']); ?></h5>
                                <p  class="img-fluid img-responsive"><a href="rapUsaCommentaire.inc.php?ref=<?php echo $donneesMmArtiste['id']; ?>"><img src="<?php echo htmlspecialchars($donneesMmArtiste['photo']); ?>" alt=""></a></p>
                                <p class="voir"><a href="rapUsaCommentaire.inc.php?ref=<?php echo $donneesMmArtiste['id']; ?>" class="btn btn-success btn-sm">Voir détails</a></p>
                            </div>
                            <?php } $reqMArtiste->closeCursor(); ?>
                        </div>
                   </div>
               </div>
            </article>
            <!-- ----------------------------------------banniere de droite------------------------------ -->
            <article class="col-sm-12 col-md-3 colAccueilDroite" style="background-color:#fff;">     
                <div class="row rowCommentaire" style="background-color:#D3D3D3;">
                <h2>Même Categories</h2>  
                    <?php while($donneesMm=$reqMm->fetch()) { ?>
                    <div class="col-md-12 colCommentaire">
                       <h5><span class="text-danger"><?php echo htmlspecialchars($donneesMm['nomArtiste']); ?></span> <?php echo htmlspecialchars($donneesMm['titre']); ?></h5>
                       <p  class="img-fluid img-responsive"><a href="rapUsaCommentaire.inc.php?ref=<?php echo $donneesMm['id']; ?>"><img src="<?php echo htmlspecialchars($donneesMm['photo']); ?>" alt=""></a></p>
                       <p class="voir"><a href="rapUsaCommentaire.inc.php?ref=<?php echo $donneesMm['id']; ?>" class="btn btn-success btn-sm">Voir détails</a></p>
                   </div>
                    <?php } $reqMm->fetch(); ?>
               </div>
            </article>

        </section>
    </section>
    <!-- inclusion du footer -->
    <?php include('footer.inc.php'); ?>
</body>
</html>