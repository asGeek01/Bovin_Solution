<?php
    session_start();
    $userId = $_SESSION['id'];
    $id = null;
    if(!empty($_GET)){
        $id = $_GET['id'];
    }

    // if(!empty($_POST) && isset($_POST)){
        $connect = new PDO('mysql: host=localhost; dbname=bovin_solution', 'root', '');
        $requete = $connect->prepare("DELETE FROM panier_$userId WHERE id = '$id';");
        $requete->execute();
        header("Location: panier.php");
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer vraiment ce produit !?</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&famil
    y=Reem+Kufi+Fun:wght@400..700&display=swap" 
    rel="stylesheet">
</head>
<style>
    a{
        text-decoration: none;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="delete_product.php" method="post">
                    <div>
                        <p class="alert alert-warnning">
                            Etes-vous sûr de vouloir supprimer ce produit de votre panier ?
                        </p>
                        <button class="btn btn-secondary">Oui</button>
                        <a href="panier.php" class="text-light btn btn-primary">Non</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>