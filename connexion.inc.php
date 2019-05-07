<?php
    
    try{
       
         // -----------------------------------pour kobaz.fr-------------------------
        //    $bdd=new PDO('mysql:host=db758739112.db.1and1.com;port=3306;dbname=db758739112;charset=utf8','dbo758739112','SaidSoumah.91',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

        // --------------------pour le localhost--------------------------------------------
        $bdd=new PDO('mysql:host=localhost;dbname=projetKbz;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

        // -----------------------------------pour saidsoumah.com-------------------------
        
    }
    catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }
?>