<?php
    
    try{
        //$bdd=new PDO('mysql:host=localhost;dbname=projetKbz;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

       $bdd=new PDO('mysql:host=db693303573.db.1and1.com;port=3306;dbname=db693303573','dbo693303573','SaidSoumah.91',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        
    }
    catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }
?>