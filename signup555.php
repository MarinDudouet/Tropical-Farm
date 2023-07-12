<?php
session_start();

    $serveur = "localhost";
    $dbname = "tropicalfarm";
    $user = "root";
    $pass = "";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $photo = $_POST["photo"];
    $background = $_POST["color"];

    $_SESSION["photo"]=$photo;

    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        if ($_POST['account']=='seller') {
       
        //On insère les données reçues
        $sth = $dbco->prepare("
        INSERT INTO buyer(username, password,photo,background)
        VALUES(:username, :password, :photo, :background)");
        $sth->bindParam(':username',$username);
        $sth->bindParam(':password',$password);
        $sth->bindParam(':photo',$photo);
        $sth->bindParam(':background',$background);

        $sth->execute();
        }

        
        else {
       
            //On insère les données reçues
            $sth = $dbco->prepare("
                INSERT INTO buyer(username, password,photo,background)
                VALUES(:username, :password, :photo, :background)");
            $sth->bindParam(':username',$username);
            $sth->bindParam(':password',$password);
            $sth->bindParam(':photo',$photo);
            $sth->bindParam(':background',$background);
    
            $sth->execute();
            }

        //On renvoie l'utilisateur vers la page de remerciement
        header("Location: http://localhost:80/Tropical-Farm/login.php");


        }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }