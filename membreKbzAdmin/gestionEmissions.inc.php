<?php 
    // function de connexion à la bdd
    require_once("../connexion.inc.php");
    // requete de recuperage de toute la table musiques
    $reqEmission=$bdd->query("SELECT * FROM kbztv ORDER BY id DESC LIMIT 20");
    // form de search 
    if(isset($_GET['btnSearch'])){
        // verification de la saisie du champs de reserch
        if(!empty($_GET['search'])){
            $reqEmission=$bdd->prepare("SELECT * FROM kbztv WHERE invite like ? ORDER BY id DESC LIMIT 20");
            $reqEmission->execute(array("%$_GET[search]%"));
        }
    }
    
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
        <div class="col-md-3 col-sm-12 indexAdminElement">
                   <a href="index.php">
                       <h1>MUSIQUES</h1>
                       <p><i class="fas fa-play text-danger"></i></p>
                   </a>
        </div>
        <div class="col-md-3 col-sm-12 indexAdminElement" style="border:3px double #000;">
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
       <h1 >Gestions des Emissions KBZ TV au tour du thé</h1>
       <div class="row indexMusicRow">
           <div class="col-md-6 indexMusicCol">
               <p><a href="ajoutEmission.inc.php" class="btn btn-primary">Ajouter une nouvelle Emission</a></p>
           </div>
           <div class="col-md-6 indexMusicCol">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="form-inline">
                    <input type="search" name="search" id="search" placeholder="Recherche Music" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>" class="col-md-6 form-control"/>
                    <input type="submit" name="btnSearch" value="Rechercher" class="btn btn-primary ">
                </form>
           </div>
       </div>
       <div class="row indexMusicRow">
           <div class="col-md-12">
               <table class="table table-hover ">
                   <tr>
                       <th>Titre</th>
                       <th>Invite</th>
                       <th>Photo</th>
                       <th>Modification</th>
                       <th>Suppression</th>
                   </tr>
                   <?php while($donneesEmission=$reqEmission->fetch()) { ?>
                   <tr>
                       <td><?php echo htmlspecialchars($donneesEmission['titre']); ?></td>
                       <td><?php echo htmlspecialchars($donneesEmission['invite']); ?></td>
                       <td> <img src="<?php echo htmlspecialchars($donneesEmission['photoKbzTv']); ?>" alt="" style="width:80px;height:50px;" class="img-responsive"> </td>
                       <td> <a href="modifEmission.inc.php?ref=<?php echo $donneesEmission['id']; ?>">Modification</a> </td>
                       <td> <a href="supprimEmission.inc.php?ref=<?php echo $donneesEmission['id']; ?>">Suppression</a> </td>
                   </tr>
                   <?php } $reqEmission->closeCursor(); ?>
               </table>
           </div>
       </div>
   </section>
</body>
</html>