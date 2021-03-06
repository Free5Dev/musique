<?php 
    session_start();
    if(isset($_GET['logout'])){
        unset($_SESSION['email']);
        unset($_SESSION['password']);
      }
    if(!isset($_SESSION['email']) and !isset($_SESSION['password'])){
        header("Location:../membreLogin.inc.php");
    }
    // function de connexion à la bdd
    require_once("../connexion.inc.php");
    // requete de selection de membres
    $req=$bdd->query("SELECT * FROM membres");
    $donnees=$req->fetch();
    $_SESSION['nom']= $donnees['id'];
    setcookie("nom", $donnees['id'],time()+3600*24*60*60,null,null,false,true);
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
   <header class="headerAdmin">
       <h1>Bienvenue "<?php echo htmlspecialchars($donnees['nom']); ?>"</h1>
       <p><a href="headerAdmin.inc.php?logout=ok">Deconnexion</a></p>
   </header> 
</body>
</html>