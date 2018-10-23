<?php 
    // function de connexion à la bdd
    require_once("../connexion.inc.php");
    // verification du lien get pour recuperer les informations à modifier
    if(isset($_GET['ref'])){
        // requete de selection à la bdd
        $reqSelect=$bdd->prepare("SELECT * FROM musiques WHERE id=?");
        $reqSelect->execute(array($_GET['ref']));
        $donneesSelect=$reqSelect->fetch();
    }
    // verification de la soumission du formulaire
    if(isset($_POST['btnSupprim'])){
        // verification de la saisie des champs
        if(!empty($_POST['nomArtiste']) and !empty($_POST['titre']) and  !empty($_POST['url']) and !empty($_POST['description']) and !empty($_POST['photo'])){
            // requete d'insertion à la bdd
           $reqDelete=$bdd->prepare("DELETE FROM  musiques WHERE id=?");
           $reqDelete->execute(array($_POST['id']));
           header("Location:index.php");
        }else{
           if(empty($_POST['nomArtiste'])){
                $chps="Nom Artiste Obligatoire";
           }if(empty($_POST['titre'])){
                $chps="Le titre est Obligatoire";
           }if(empty($_POST['url'])){
                $chps="Le lien de la video est obligatoire ...";
            }if(empty($_POST['description'])){
                $chps="La description de la video est obligatoire ...";
            }if(empty($_POST['photo'])){
                $chps="Le lien de la video est obligatoire...";
            }
        }
    }
    // requete de categorie de musiques
    $reqCategorie=$bdd->query("SELECT id,categorie FROM musiqueCategories");
    
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
    <link rel="icon" href="../images/kbzLogo.jpg"/>
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
    <link rel="stylesheet" href="../css/style.css"/>
    <!-- lien script js -->
    <script src="../js/script.js"></script>
</head>
<body>
   <!-- include -->
   <?php include("headerAdmin.inc.php"); ?>
   <!-- section de site Admin -->
   <section class="indexAdminContenu">
        <div class="col-md-3 col-sm-12 indexAdminElement" style="border:3px double #000;">
                   <a href="index.php">
                       <h1>MUSIQUES</h1>
                       <p><i class="fas fa-play text-danger"></i></p>
                   </a>
        </div>
        <div class="col-md-3 col-sm-12 indexAdminElement">
                   <a href="gestionEmissions.inc.php">
                       <h1>EMISSION  TV</h1>
                       <p><i class="fas fa-tv text-danger"></i></p>
                   </a>
        </div>
        <div class="col-md-3 col-sm-12 indexAdminElement">
                   <a href="gestionBlog.inc.php ">
                       <h1>BLOG</h1>
                       <p><i class="fab fa-blogger-b text-danger"></i></p>
                   </a>
        </div>
        <div class="col-md-3 col-sm-12 indexAdminElement">
                   <a href="gestionTalent.inc.php">
                       <h1>TALENT</h1>
                       <p><i class="fas fa-microphone text-danger"></i></p>
                   </a>
               </div>
        </div>
   </section>
   <!-- partie gestion des contenus -->
   <section class="container-fluid indexMusicFluid">
       <h1 >Voulez vous vraiment supprimer cette musique</h1>
       <div class="row indexMusicRow">
           <div class="col-md-3 indexMusicCol" style="text-align:left;">
               <p><a href="index.php" class="btn btn-primary ">Retour </a></p>
           </div>
           <div class="col-md-9"></div>
       </div>
       <div class="container ajoutAdminContainer">
           <div class="row ajoutAdminRow">
               <div class="col-md-12 ajoutAdminCol">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-inline">
                            <label for=""></label>
                            <input type="hidden" name="id" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Nom" value="<?php if(isset($_GET['ref'])) echo $donneesSelect['id']; ?>">
                            
                        </div>
                        <div class="form-group">
                            <label for="nomArtiste">Nom Artiste</label>
                            <input type="text" name="nomArtiste" class="form-control" id="nomArtiste" aria-describedby="emailHelp" placeholder="Enter Nom" value="<?php if(isset($_GET['ref'])) echo $donneesSelect['nomArtiste']; ?>">
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($chps)) echo $chps; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="titre">Titre musique</label>
                            <input type="text" name="titre" class="form-control" id="titre" aria-describedby="emailHelp" placeholder="Enter titre" value="<?php if(isset($_GET['ref'])) echo $donneesSelect['titre']; ?>">
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($chps)) echo $chps; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="url">Lien de la video youTube</label>
                            <input type="url" name="url" class="form-control" id="url" aria-describedby="emailHelp" placeholder="Enter Lien de la video" value="<?php if(isset($_GET['ref'])) echo $donneesSelect['url']; ?>">
                            <?php 
                                if(isset($_GET['ref'])){
                                    ?>
                                    <iframe style="margin-top:10px;" width="100%" height="400" src="<?php echo $donneesSelect['url']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    <?php
                                }
                            ?>
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($chps)) echo $chps; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="9"><?php if(isset($_GET['ref'])) echo $donneesSelect['description']; ?></textarea>
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($chps)) echo $chps; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="photo">Lien de la photo clique <a href="https://boingboing.net/features/getthumbs" target="_blank">Ici pour générer le thumbnail</a> </label>
                            <input type="url" name="photo" class="form-control" id="photo" aria-describedby="emailHelp" placeholder="Enter lien de la photo" value="<?php if(isset($_GET['ref'])) echo $donneesSelect['photo']; ?>">
                            <?php 
                                if(isset($_GET['ref'])){
                                    ?>
                                    <p style="margin-top:10px;"><img style="height:100px; line-height:100px;" src="<?php echo $donneesSelect['photo']; ?>" alt=""></p>
                                    <?php
                                }
                            ?>
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($chps)) echo $chps; ?>
                            </small>
                        </div>
                        
                        <div class="form-group">
                            <label for="categorie">Categorie</label>
                            <select class="form-control" name="categorie" id="categorie">
                                <?php while($donneesCategorie=$reqCategorie->fetch()) { ?>
                                <option <?php if(!isset($donneesSelect['idMusiqueCategorie'])) $donneesSelect['idMusiqueCategorie']=1; if($donneesSelect['idMusiqueCategorie']==$donneesCategorie['id']) echo"selected='selected'";  ?> value="<?php  echo htmlspecialchars($donneesCategorie['id']); if(!isset($_GET['ref']))  $donneesSelect['idMusiqueCategorie']=1; ?>"><?php echo htmlspecialchars($donneesCategorie['categorie']); ?></option>
                                <?php } $reqCategorie->closeCursor(); ?>
                            </select>
                        </div>
                        <button type="submit" name="btnSupprim" class="btn btn-primary <?php if(!isset($_GET['ref'])) echo"disabled"; ?>  ">Confirmer la suppression</button>
                    </form>

               </div>
           </div>
       </div>
   </section>
  
</body>
</html>