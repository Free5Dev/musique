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
<!-- <div class="row rowAccueilBtnSociaux"> -->
    <div class="col-md-4 col-sm-4 img-fluid">
        <!-- plegun partage facebook -->
        <div id="fb-root"></div>
            <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.1';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <!-- end plegun partage facebook -->
            <button type="submit" href="http://www.saidsoumah.com/<?php echo $_SERVER['PHP_SELF']; ?>" data-mobile-iframe="false"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.saidsoumah.com%2F<?php echo $_SERVER['PHP_SELF']; ?>&amp;src=sdkpreparse" class="btn btn-outline-primary"> Partager sur Facebook </a>
            </button>
    </div>
    <div class="col-md-4 col-sm-4 img-fluid">
        <button type="submit" ><a  href="https://plus.google.com/share?url=http://www.saidsoumah.com/<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-outline-danger" target="_blank">Partager sur Google+ </a></button>
    </div>
    <div class="col-md-4 col-sm-4 img-fluid">
        <button type="submit"> <a href="https://twitter.com/intent/tweet?text=<?php echo 'Découvrer le clip de :'.$donneesUsaEtFr['nomArtiste'].' '.$donneesUsaEtFr['titre']; ?> via=KBZOfficial&url=<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-outline-success" target="_blank"> Partager sur Tweeter </a></button>
    </div>
<!-- </div> -->
</body>
</html>