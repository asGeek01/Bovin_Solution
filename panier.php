<?php 
    session_start();
    $id = null;
    $image = null;
    $nom_produit = null;
    $prix = null;
    if(!empty($_GET)){
        $id = $_GET['id'];
    }
    if(!empty($_POST)){
        $montant_total = 10000;
    }
    if(!empty($_SESSION)){
        $userId = $_SESSION['id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier - WaxangariLabs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&famil
    y=Reem+Kufi+Fun:wght@400..700&display=swap" 
    rel="stylesheet">
    <script src="https://cdn.kkiapay.me/k.js"></script>
</head>
<style>
    *{
    font-size: 15px;
    font-family: "Outfit", sans-serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    }
    .form-toggle{
        border: 1px solid black;
    }
    .form-control{
        border-radius: 0px;
    }
    .bd-input{
        border: 0;
        border-bottom: 2px solid #fff;
    }
    .row-form{
        background-color: rgb(238, 238, 238);
        border-radius: 20px;
    }
    .img-service{
        width: 100%;
    }
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{
        color: black;
        text-decoration: none;
    }
    .rad{
        border-radius: 40px;
    }
    .input-form{
        padding-right: 50px;
        padding-left: 50px;
    }
</style>
<?php
    if(!empty($_SESSION)){
    ?>
<body class="container">
    <header>
        <?php require "header.php"; ?>
    </header>
    <main>
        <form action="panier.php" method="post" class="formulaire">
            <div class="row my-3 p-2 justify-content-between">
                <div class="col-lg-8 col-md-12 col-12 row-form px-5 py-4">
                    <div>
                        <h2 class="" style="color: rgb(54, 160, 50);"><strong>Mon panier</strong></h2>
                    </div>
                    <div class="row justify-content-between p-2">
                        <div class="col">
                            <p>Détails du produits</p>
                        </div>
                        <div class="col text-end">
                            <p>Type</p>
                        </div>
                        <div class="col text-end">
                            <p>Quantité</p>
                        </div>
                        <div class="col text-center">
                            <p>Prix Total</p>
                        </div>
                    </div>
                    <hr width="100%" size="10px">
                    <?php
                        $connect = new PDO('mysql: host=localhost; dbname=bovin_solution', 'root', '');
                        if($id !== null){
                            //Etape de la sélection
                            $requete = $connect->prepare("SELECT * FROM nos_produits WHERE id = '$id';");
                            $requete->execute();
                            $row = $requete->fetch();

                            //Etape d'insertion du produit dans la table panier de l'utilisateur
                            if($requete->rowCount() > 0){
                                $image = $row['image'];
                                $nom_produit = $row['nom_produit'];
                                $prix = $row['prix'];
                            }
                            $requete1 = $connect->prepare("
                                        INSERT INTO panier_$userId(image, nom_produit, prix)
                                        VALUES('$image', '$nom_produit', '$prix');
                                        ");
                            $requete1->execute();
                        }
                        ?>
                        <?php 
                            //Etape de l'affichage de la table ou panier vide sinon
                            $requete2 = $connect->prepare("SELECT * FROM panier_$userId;");
                            $requete2->execute();

                            if($requete2->rowCount() == 0){
                                echo '<div class="row">
                                        <h2 class="text-center my-5">⚠️ Votre panier est vide 🛒 </h2>
                                      </div>';
                                echo '<hr width="100%" size="10px">';
                            }else{
                                echo '<div class="row justify-content-between">';
                                while($user_panier = $requete2->fetch()){
                                        echo    '<div class="col">
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
                                                <script>
                                                    const quantite = document.getElementById("quantite");
                                                    quantite.addEventListener("input", function(event){
                                                        const val = event.target.value;
                                                        const prixUnitairePHP = ' . $user_panier['prix'] . '; // Récupérer le prix unitaire PHP
                                                        const prixTotal = val * prixUnitairePHP; // Calculer le prix total
                                                        document.getElementById("prixTotalPHP").textContent = prixTotal; // Afficher le prix total dans la page HTML
                                                    });
                                                </script>
                                                <div class="col my-5">
                                                    <div class="row">
                                                        <div class="col-6" id="prixTotalPHP">' .$user_panier['prix'].'</div>
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
                            echo '<div class="col">
                                    <div class="row">
                                        <div class="col-10 text-end"><strong>Sous-Total:</strong></div>
                                        <div class="col-2 text-start">$35.17</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 text-end"><strong>Livraison:</strong></div>
                                        <div class="col-2 text-start">$ 2.00</div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-10 text-end"><strong>Total:</strong></div>
                                        <div class="col-2 text-start">$ 37.17</div>
                                    </div>
                                <hr width="100%" size="10px">
                                </div>';
                    ?>
                </div>
                <div class="col-lg-3 col-md-12 col-12 my-5 rounded-4 text-light p-3" style="background-color: rgb(54, 160, 50); height: 95vh;">
                    <div>
                        <p>Checkout: </p>
                    </div>
                    <div class="my-2">
                        <legend>Shipping Details</legend>
                        <div class="row mt-2">
                            <div class="col text-light">
                                <label class="form-label" for="first_name">First Name</label>
                                <input class="form-control bd-input text-light" style="background-color: rgb(54, 160, 50);" type="text" name="first_name" id="first_name" value="Jane" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="last_name">Last Name</label>
                                <input class="form-control bd-input text-light" style="background-color: rgb(54, 160, 50);" type="text" name="last_name" id="last_name" value="Doe" required>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label class="form-label" for="mail">Email</label>
                            <input class="form-control bd-input text-light" style="background-color: rgb(54, 160, 50);" type="email" name="mail" id="mail" value="jane.doe@gmail.com" required>
                        </div>
                        <div class="mt-2">
                            <label class="form-label" for="phone">Phone</label>
                            <input class="form-control bd-input text-light" style="background-color: rgb(54, 160, 50);" type="text" name="phone" id="phone" value="+1 317 404 5562" required>
                        </div>
                        <div class="mt-2">
                            <label class="form-label" for="addresse">Addresse</label>
                            <input class="form-control bd-input text-light" style="background-color: rgb(54, 160, 50);" type="text" name="addresse" id="address" value="123 Grazing Street" required>
                        </div>
                        <div class="row mt-2">
                            <div class="col mb-3">
                                <label class="form-label" for="code_post">Postal Code</label>
                                <input class="form-control bd-input text-light" style="background-color: rgb(54, 160, 50);" type="text" name="code_post" id="code_post" value="12345" required>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label" for="country">Country/Région</label>
                                <select name="country" id="country" class="bd-input form-control text-light" style="background-color: rgb(54, 160, 50);">
                                    <option value="#">Nigéria</option>
                                    <option value="#">Bénin</option>
                                    <option value="#">Pays-Bas</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2 mb-5">
                            <p>
                                <span><i class="fa fa-check"></i></span>
                                <span>Use for Billing</span>
                            </p>
                        </div>
                        <div>
                            <!-- <button class="btn btn-light form-control rad">Proceed to Payment ></button> -->
                            <input value="Procéder au paiement >" type="submit" class="btn btn-light form-control rad">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <footer>
        <?php require "footer.php" ?>
    </footer>
    <?php }else{
                    header("Location: connexion.php");
                }
                ?>
</body>
</html>
<script>
    var formulaire = document.querySelector(".formulaire");

    formulaire.onsubmit=(e)=>{
        e.preventDefault();
        openKkiapayWidget({amount:<?=$montant_total ?>, position: "right", callback: "/success", 
        data: "Test de paiement",
        theme: "#092374",
        sandbox: "true",
        key: "ea194080f5a011ee9f805f907fefa779"
        })
    }
</script>