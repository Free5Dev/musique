<?php 
    // appel de la function de connexion à la bdd
    require_once("connexion.inc.php");
    // verification de la soumission du formulaire
    if(isset($_POST['btnSoumettre'])){
        // verification des champs
        if(!empty($_POST['nom'] and $_POST['email'] and $_POST['sujet'] and $_POST['message'])){
            // requete d'insertion à la bdd
            $reqInsertContact=$bdd->prepare("INSERT INTO contact SET nomPrenom=?,email=?,sujet=?,message=?,dateContact=now()");
            $reqInsertContact->execute(array($_POST['nom'],$_POST['email'],$_POST['sujet'],$_POST['message']));
            $success="Mr. ".$_POST['nom']." votre message à été postuler avec succès!";
        }else{
            // verification de si l'un des champs du formulaire de contact est vide!
            if(empty($_POST['nom'])){
               $chpNom="Veuillez renseignez le nom complet";
            }if(empty($_POST['email'])){
                $chpEmail="Veuillez renseignez le mail";
            }if(empty($_POST['sujet'])){
                $chpSujet="Veuillez renseignez le titre";
            }if(empty($_POST['message'])){
                $chpMessage="Veuillez renseignez le message";
            }
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
    <!-- include header -->
    <?php include('header.inc.php'); ?>

     <!-- include navbar -->
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
                <a class="nav-link" href="kbzShop.inc.php">Shop</a>
            </li>

            </ul>
        </div>
    </nav>
    <!--end navbar-->


    <section class="container-fluid fluidContact">
        <h1>contactez - nous </h1><hr>
        <section class="row rowContact">
            <section class="col-sm-12 col-md-4 col-md-8 colContact">
                <h2>Envoyez nous une note</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"/>
                    <span class="text-primary"><?php if(isset($success)) echo $success; ?></span>
                    <div class="form-group">
                        <label for="">Nom - Prénom *</label>
                        <input type="text" name="nom" id="" class="form-control col-md-11"/>
                        <small class="form-text text-danger "><?php if(isset($chpNom)) echo $chpNom ?></small>
                    </div>
                    <div class="form-group">
                        <label for="">Email *</label>
                        <input type="email" name="email" id="" class="form-control col-md-11"/>
                        <small class="form-text text-danger "><?php if(isset($chpEmail)) echo $chpEmail ?></small>
                    </div>
                    <div class="form-group">
                        <label for="">Sujet *</label>
                        <input type="text" name="sujet" id="" class="form-control col-md-11"/>
                        <small class="form-text text-danger "><?php if(isset($chpSujet)) echo $chpSujet ?></small>
                    </div>
                    <div class="form-group">
                        <label for="">Message *</label>
                        <textarea name="message" id="" class="form-control col-md-11" rows="5"/></textarea>
                        <small id="emailHelp" class="form-text text-danger "><?php if(isset($chpMessage)) echo $chpMessage ?></small>
                    </div>
                    <button type="submit" name="btnSoumettre" class="btn btn-dark">Soumettre</button>
                </form>
            </section>
            <section class="col-sm-12 col-md-4 col-md-4 colContact">
            <h2><span>K.B.Z</span></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In nisi provident minus ut ullam dolor perferendis deserunt accusamus culpa tempora. Similique accusantium veritatis provident laboriosam culpa expedita tempora aut consequuntur.</p>
                <h2>Email</h2>
                <p><a href="http://">kbzOfficiel@gmail.com</a></p>
                <h2>Téléphon</h2>
                <p>0605897553</p>
                <p>0605897553</p>
                <h2>Réseaux</h2>
                    <p><a href="" title="Facebook"><i class="fab fa-facebook"></i> Facebook</a></p>
                    <p><a href="" title="Youtube"><i class="fab fa-youtube"></i> Youtube</a></p>
                    <p><a href="" title="Twitter"><i class="fab fa-twitter"></i> Twitter</a></p>
            </section>
        </section>
    </section>



     <!-- include header -->
    <?php include('footer.inc.php'); ?>
</body>
</html>