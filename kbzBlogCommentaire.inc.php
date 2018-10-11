<?php 
    // appel de la function de connexion à la bdd
    require_once('connexion.inc.php');
    // verification de l'existance du lien 
    if(isset($_GET['ref'])){
        $reqBlog=$bdd->prepare("SELECT b.id,b.titre,b.commentaire,b.idMembre,b.urlBlog,b.photoBlog,date_format(dateBlog,'Le %d/%m/%Y à %Hh%i') as dateBlog,m.nom FROM blog as b, membres as m WHERE b.idMembre=m.id AND b.id=? ");
        
        $reqBlog->execute(array($_GET['ref']));
        $donneesBlog=$reqBlog->fetch();
        if(empty($donneesBlog)){
            header('Location:kbzBlog.inc.php');
        }
    }
    else{
       header("Location:kbzBlog.inc.php");
    }
    
    
    //   requete Meme categorie
    $reqMm=$bdd->prepare("SELECT b.id,b.titre,b.commentaire,b.idMembre,b.urlBlog,b.photoBlog,date_format(dateBlog,'Le %d/%m/%Y à %Hh%imin%ss') as dateBlog,m.nom FROM blog as b, membres as m WHERE b.idMembre=m.id AND b.id!=? ORDER BY id DESC LIMIT 1,5");
    $reqMm->execute(array($_GET['ref']));
    
     //   requete Meme blog
     $reqMBlog=$bdd->prepare("SELECT b.id,b.titre,b.commentaire,b.idMembre,b.urlBlog,b.photoBlog,date_format(dateBlog,'Le %d/%m/%Y à %Hh%imin%ss') as dateBlog,m.nom FROM blog as b, membres as m WHERE b.idMembre=m.id AND b.id!=? ORDER BY id DESC LIMIT 6,6");
    $reqMBlog->execute(array($_GET['ref']));
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
            <li class="nav-item ">
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
            <li class="nav-item active">
                <a class="nav-link" href="kbzBlog.inc.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kbzTalent.inc.php">Talent</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kbzShop.inc.php">Shop</a>
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
                        <h3><?php echo htmlspecialchars($donneesBlog['titre']); ?></h3>
                        <p id="iframe"><iframe class="img-fluid iframe" src="<?php echo $donneesBlog['urlBlog']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>

                        <p class="p1"><strong class="text-danger">Rédacteur: </strong><small><i class="fas fa-user-edit"></i> <?php echo htmlspecialchars($donneesBlog['nom']); ?></small> <strong class="text-danger">Date:</strong> <small><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($donneesBlog['dateBlog']); ?></small></p>
                        <p><strong class="text-danger">DESCRIPTION:</strong><?php echo nl2br(htmlspecialchars($donneesBlog['commentaire'])); ?></p>
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

                            <div class="fb-comments" data-href="http://localhost/musique/rapAfroCommentaire.inc.php?ref=<?php echo htmlspecialchars($donneesBlog['id']); ?>" data-width="100%" data-numposts="5"></div>
                       </p>
                   </div>
                   <!--  -->
                    <!--  -->
                   <div class="col-md-12 colCommentaire">
                        <h2>Du même Catégories </h2>
                        <div class="row rowMemeArtiste">
                            <?php while($donneesMBlog=$reqMBlog->fetch()) { ?>
                            <div class="col-sm-12 col-md-4 colMemeArtiste">
                                <h5><?php echo htmlspecialchars($donneesMBlog['titre']); ?></h5>
                                <p  class="img-fluid img-responsive"><a href="kbzBlogCommentaire.inc.php?ref=<?php echo $donneesMBlog['id']; ?>"><img src="<?php echo htmlspecialchars($donneesMBlog['photoBlog']); ?>" alt=""></a></p>
                                <p class="voir"><a href="kbzBlogCommentaire.inc.php?ref=<?php echo $donneesMBlog['id']; ?>" class="btn btn-success btn-sm">Voir détails</a></p>
                            </div>
                            <?php } $reqMBlog->closeCursor(); ?>
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
                       <h5><?php echo htmlspecialchars($donneesMm['titre']); ?></h5>
                       <p  class="img-fluid img-responsive"><a href="kbzBlogCommentaire.inc.php?ref=<?php echo $donneesMm['id']; ?>"><img src="<?php echo htmlspecialchars($donneesMm['photoBlog']); ?>" alt=""></a></p>
                       <p class="voir"><a href="kbzBlogCommentaire.inc.php?ref=<?php echo $donneesMm['id']; ?>" class="btn btn-success btn-sm">Voir détails</a></p>
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