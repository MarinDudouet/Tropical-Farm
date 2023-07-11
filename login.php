<?php
    $serveur = "localhost";
    $dbname = "tropicalfarm";
    $user = "root";
    $pass = "";
    
    $username = $_POST["username"];
    $password = $_POST["password"];


    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM seller WHERE username = :username AND password = :password";
        $stmt = $dbco->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
        // Connexion réussie
        echo 'success';
    } else {
        // Identifiants invalides
        echo "error";
}
}
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>