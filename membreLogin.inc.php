<?php 
    session_start();
    // function de connexion à la bdd
    require_once("connexion.inc.php");
    // soumission du formulaire 
    if(isset($_POST['btnConnexion'])){
        if(!empty($_POST['email'] and $_POST['password'])){
            //requete de recuperage du contenu de la table membre
            $req=$bdd->query("SELECT * FROM membres");
            $donnees=$req->fetch();
            //condition de verification des identifiants
            if($_POST['email']==$donnees['email'] and $_POST['password']==$donnees['password']){
                $_SESSION['email']=$_POST['email'];
                $_SESSION['password']=$_POST['password'];
                // redirection car tout est bon
                header("Location:membreKbzAdmin/index.php");
            }else{
                if($_POST['email']!=$donnees['email']){
                    $email="Email Incorrecte";
                }if($_POST['password']!=$donnees['password']){
                    $password="Mots de passe Incorrecte";
                }
            }
        }else{
            if(empty($_POST['email'])){
                $email="Email Vide";
            }if(empty($_POST['password'])){
                $password="Mots de passe Vide";
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
    <title>KBZ prémière plateforme de musique-Espace Login</title>
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
    <!-- inclusion du navbarlogin -->
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


    <!-- section -->
    <section class="container-fluid loginFluid">
        <div class="container loginContainer">
            <div class="row loginRow">
                <div class="col-md-12 loginCol">
                    <!-- formulaire de login pour la partie admin du site -->
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <fieldset>
                            <legend>Espace Admininstateurs KOBAZ</legend>
                            <div class="form-group">
                                <label for="email">Email address *</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"  placeholder="Enter email">
                                <small id="emailHelp" class="form-text  text-danger"><?php if(isset($email)) echo $email; ?></small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                                <small id="emailHelp" class="form-text text-danger"><?php if(isset($password)) echo $password; ?></small>
                            </div>
                            
                            <button type="submit" name="btnConnexion" class="btn btn-outline-dark">Connexion</button>
                        </fieldset>
                    </form>
                    <!-- end formulaire login de admin  -->
                </div>
            </div>
        </div>
    </section>


    <!-- inclusion du footer -->
    <?php include('footer.inc.php'); ?>
</body>
</html>