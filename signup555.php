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
        //connexion to BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        if ($_POST['account']=='seller') {
       
        //insert data
        $sth = $dbco->prepare("
        INSERT INTO seller(username, password,photo,background)
        VALUES(:username, :password, :photo, :background)");
        $sth->bindParam(':username',$username);
        $sth->bindParam(':password',$password);
        $sth->bindParam(':photo',$photo);
        $sth->bindParam(':background',$background);

        $sth->execute();
        }

        
        else {
       
            //insert data
            $sth = $dbco->prepare("
                INSERT INTO buyer(username, password,photo,background)
                VALUES(:username, :password, :photo, :background)");
            $sth->bindParam(':username',$username);
            $sth->bindParam(':password',$password);
            $sth->bindParam(':photo',$photo);
            $sth->bindParam(':background',$background);
    
            $sth->execute();
            }

        header("Location: http://localhost:80/Tropical-Farm/login.php");


        }
    catch(PDOException $e){
        echo 'error: '.$e->getMessage();
    }