<?php

session_start();

$serveur = "localhost";
$dbname = "tropicalfarm";
$user = "root";
$pass = "";

$name = $_POST["name"];
$photo = $_POST["photo"];
$category = $_POST["category"];
$second_category = $_POST["second_category"];
$description = $_POST["description"];
$price = $_POST["price"];
$stock = $_POST["stock"];
$sell = $_POST["sell"];
$auction = $_POST["auction"];
$trade = $_POST["trade"];

// Récupérer l'ID du vendeur à partir de la session
$idseller = $_SESSION["idseller"];

try {
    //connexion to database
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Insert data
    $sth = $dbco->prepare("
        INSERT INTO item(name, photo, category, second_category, description, price, stock, sell, auction, trade, idseller)
        VALUES(:name, :photo, :category, :second_category, :description, :price, :stock, :sell, :auction, :trade, :idseller)");
    $sth->bindParam(':name', $name);
    $sth->bindParam(':photo', $photo);
    $sth->bindParam(':category', $category);
    $sth->bindParam(':second_category', $second_category);
    $sth->bindParam(':description', $description);
    $sth->bindParam(':price', $price);
    $sth->bindParam(':stock', $stock);
    $sth->bindParam(':sell', $sell);
    $sth->bindParam(':auction', $auction);
    $sth->bindParam(':trade', $trade);
    $sth->bindParam(':idseller', $idseller);

    $sth->execute();

    $iditemInserted = $dbco->lastInsertId();

    // Enregistrez l'ID de l'item inséré dans une variable de session
    $_SESSION['lastInsertedItemId'] = $iditemInserted;

    // Redirigez l'utilisateur vers la page itemseller.php avec l'ID de l'item dans l'URL
    header("Location: http://localhost:80/Tropical-Farm/itemseller.php?iditem=$iditemInserted");
    exit();
} catch (PDOException $e) {
    echo 'Impossible d\'insérer les données. Erreur : ' . $e->getMessage();
}
?>
