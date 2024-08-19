<?php 
    session_start();
    $id = null;
    $image = null;
    $nom_produit = null;
    $prix = null;
    if(!empty($_GET)){
        $id = $_GET['id'];
    }
    $userId = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vos balises meta, styles, scripts, etc. -->
</head>
<body class="container">
    <!-- Votre contenu HTML, y compris le formulaire -->
    <form action="panier.php" method="post" class="formulaire">
        <!-- Vos champs de formulaire -->
    </form>
    <!-- Le reste de votre HTML -->

    <?php
    // Vérifiez si l'identifiant du produit est valide
    if ($id !== null) {
        // Etape de la sélection du produit
        $connect = new PDO('mysql:host=localhost;dbname=bovin_solution', 'root', '');
        $requete = $connect->prepare("SELECT * FROM nos_produits WHERE id = '$id';");
        $requete->execute();
        $row = $requete->fetch();

        // Si le produit existe, effectuez l'insertion dans le panier
        if($requete->rowCount() > 0){
            $image = $row['image'];
            $nom_produit = $row['nom_produit'];
            $prix = $row['prix'];

            // Etape d'insertion du produit dans la table panier de l'utilisateur
            $requete1 = $connect->prepare("
                INSERT INTO panier_$userId(image, nom_produit, prix)
                VALUES('$image', '$nom_produit', '$prix');
            ");
            $requete1->execute();
        }
    }

    // Afficher un message si le panier est vide
    $requete2 = $connect->prepare("SELECT * FROM panier_$userId;");
    $requete2->execute();

    if($requete2->rowCount() == 0){
        echo '<div class="col text-center">
            <p>⚠️ Votre panier est vide 🛒</p>
        </div>';
    } else {
        // Afficher le contenu du panier
        echo '<div class="row justify-content-between">';
        while($user_panier = $requete2->fetch()){
            echo '<div class="col">
                <img src="images/' .$user_panier['image']. '" alt="Grazing Services Package" class="img w-100">
            </div>
            <div class="col-2 my-3">
                <h6><strong>' .$user_panier['nom_produit']. '</strong></h6>
                <h6 class="">Beige</h6>
            </div>
            <div class="col-2 my-5">
                <select name="#" id="#" class="px-3 rad">
                    <option value="#">M</option>
                    <option value="#">F</option>
                </select>
            </div>
            <div class="col-3 my-5 text-center">
                <input type="number" min="1" class="px-2 rad col-4 input-form" name="quantite1" id="quantite" placeholder="1" required>
            </div>
            <div class="col my-5">
                <div class="row">
                    <div class="col-6">' .$user_panier['prix'].'</div>
                    <div class="col-6 text-end">
                        <a href="delete_product.php?id=' .$user_panier['id']. '">
                            <i class="fa fa-remove"></i>
                        </a>
                    </div>
                </div>
            </div>';
            echo '<hr width="100%" size="10px">';
        }
        echo '</div>';
    }

    // Autres parties de votre code
    ?>
</body>
</html>
