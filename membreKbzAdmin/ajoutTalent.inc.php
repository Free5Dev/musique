<?php 
    // function de connexion à la bdd
    require_once("../connexion.inc.php");
    
    // verification de la soumission du formulaire
    if(isset($_POST['btnAjout'])){
        // verification de la saisie des champs
        if(!empty($_POST['titre']) and !empty($_POST['nomTalent']) and  !empty($_POST['biographie']) and !empty($_POST['url']) and !empty($_POST['photoTalent'])){
            // requete d'insertion à la bdd
           $reqInsert=$bdd->prepare("INSERT INTO talent (titre,nomTalent,biographie,idMembre,url,photoTalent,datetalent) VALUES(?,?,?,?,?,?,NOW())");
           $reqInsert->execute(array($_POST['titre'],$_POST['nomTalent'],$_POST['biographie'],$_COOKIE['nom'],$_POST['url'],$_POST['photoTalent']));
           header("Location:gestionTalent.inc.php");
        }else{
           if(empty($_POST['titre'])){
                $titre="Le titre de la biographie";
           }if(empty($_POST['nomTalent'])){
                $nomTalent="Le nom du talent ";
           }if(empty($_POST['biographie'])){
                $biographie="La biographie ...";
            }if(empty($_POST['url'])){
                $url="Liende la video est obligatoire ...";
            }if(empty($_POST['photoTalent'])){
                $photoTalent="Le lien de la photo est obligatoire...";
            }
        }
    }
    // requete de categorie de musiques
    $reqCategorie=$bdd->query("SELECT id,categorie FROM musiquecategories");
    
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
        <div class="col-md-3 col-sm-12 indexAdminElement" >
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
        <div class="col-md-3 col-sm-12 indexAdminElement" style="border:3px double #000;">
                   <a href="gestionTalent.inc.php">
                       <h1>TALENT</h1>
                       <p><i class="fas fa-microphone text-danger"></i></p>
                   </a>
               </div>
        </div>
   </section>
   <!-- partie gestion des contenus -->
   <section class="container-fluid indexMusicFluid">
       <h1 >Ajout d'un nouveau Talent</h1>
       <div class="row indexMusicRow">
           <div class="col-md-3 indexMusicCol" style="text-align:left;">
               <p><a href="gestionTalent.inc.php" class="btn btn-primary ">Retour </a></p>
           </div>
           <div class="col-md-9"></div>
       </div>
       <div class="container ajoutAdminContainer">
           <div class="row ajoutAdminRow">
               <div class="col-md-12 ajoutAdminCol">

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="titre">Titre </label>
                            <input type="text" name="titre" class="form-control" id="titre" aria-describedby="emailHelp" placeholder="Enter titre">
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($titre)) echo $titre; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="nomTalent">Nom Talent</label>
                            <input type="text" name="nomTalent" class="form-control" id="nomTalent" aria-describedby="emailHelp" placeholder="Enter Nom">
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($nomTalent)) echo $nomTalent; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="biographie">Biographie</label>
                            <textarea class="form-control" name="biographie" id="biographie" rows="3"></textarea>
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($biographie)) echo $biographie; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="url">Lien de la video youTube</label>
                            <input type="url" name="url" class="form-control" id="url" aria-describedby="emailHelp" placeholder="Enter Lien de la video">
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($url)) echo $url; ?>
                            </small>
                        </div>
                       
                        <div class="form-group">
                            <label for="photoTalent">Lien de la photo clique <a href="https://boingboing.net/features/getthumbs" target="_blank">Ici pour générer le thumbnail</a> </label>
                            <input type="url" name="photoTalent" class="form-control" id="photoTalent" aria-describedby="emailHelp" placeholder="Enter lien de la photo">
                            <small id="emailHelp" class="form-text text-danger text-danger">
                                <?php if(isset($photoTalent)) echo $photoTalent; ?>
                            </small>
                        </div>
                        
                        <button type="submit" name="btnAjout" class="btn btn-primary">Ajouter Talent</button>
                    </form>

               </div>
           </div>
       </div>
   </section>
  
</body>
</html>