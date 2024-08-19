<?php
    session_start();
    $titre = null;
    $prix = null;
    $success = null;
    if(!empty($_POST) && isset($_POST)){
        $titre = check($_POST['titre']);
        $prix = check($_POST['prix']);

        $connect = new PDO('mysql: host=localhost; dbname=bovin_solution', 'root',"");
        $requete = $connect->prepare("
            INSERT INTO ajout_investissement(titre_achat, prix)
            VALUES('$titre', '$prix');
        ");
        $requete->execute();
        $success = "Investissement ajouté !";
        //header("Location: statistique.php");
    }
    function check($donnee){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);
        return $donnee;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - WaxangariLabs</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&famil
    y=Reem+Kufi+Fun:wght@400..700&display=swap" 
    rel="stylesheet">
</head>
<style>
    *{
    font-size: 15px;
    font-family: "Outfit", sans-serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    }
    .bg{
        height: 75%vh;
    }
    .input-form{
        border: 0;
        border-radius: 20px;
        background-color: rgb(200, 200, 200);
    }
    .rad{
        border-radius: 20px;
    }
    .div-form{
        background-color: rgb(238, 238, 238);
        border-radius: 20px;
    }
    .top{
        margin-top: -30px;
    }
</style>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-4 bg" style="background-color: rgb(54, 160, 50);">
                    <strong><h1 class="text-center text-light mt-3">Bovin Solution</h1></strong>
                </div>
                <div class="col-lg-10 col-md-8 col-8">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-12 mx-4">
                            <div class="row mt-3">
                                <div class="col-lg-4 col-md-4 col-10 my-2">
                                    <h3>Suivie</h3>
                                </div>
                                <div class="col-lg-4 col-md-4 col-10 my-2">
                                    <button class="btn btn-light border border-dark bg-light">Voir l'historique</button>
                                </div>
                                <div class="col-lg-4 col-md-4 col-10 my-2">
                                    <button class="btn text-light" style="background-color: rgb(54, 160, 50);">Nouvelle entrée</button>
                                </div>
                            </div>
                            <div class="row my-3 div-form p-3 justify-content-between">
                                <div class="bg-light border border-dark p-3 mx-2 rad col-lg-3 col-md-3 col-12 my-2">
                                    <p class="text-center">Dépenses Annuelles</p>
                                    <h5 class="text-center" style="color: rgb(54, 160, 50);"><strong>300.750 FCFA</strong></h5>
                                </div>
                                <div class="bg-light border border-dark p-3 mx-2 rad col-lg-3 col-md-3 col-12 my-2">
                                    <p class="text-center">Nombre total de troupeau</p>
                                    <h5 class="text-center"><strong>10</strong></h5>
                                </div>
                                <div class="bg-light border border-dark p-3 mx-2 rad col-lg-3 col-md-3 col-12 my-2">
                                    <p class="text-center mb-lg-5 mb-5">Nombre total</p>
                                    <h5 class="text-center"><strong>27</strong></h5>
                                </div>
                            </div>
                            <div class="top mx-5">
                                <i class="fa fa-arrow-down" style="color: rgb(54, 160, 50); font-size: 50px;"></i>
                            </div>
                            <div>
                                <img src="images/statistique.png" alt="Une statistique !" class="img w-100">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="text-center">
                                <img src="images/oeuf-statistique.png" alt="L'oeuf de la statistique" class="img">
                            </div>
                            <div>
                                <p class="bg-warning px-3 text-center py-2"><strong>Votre investissement du mois</strong></p>
                            </div>
                            <div class="bg-dark text-center rad p-2 my-3">
                                <p class="h5 text-light">Achat de produit pour boeuf</p>
                                <p class="text-warning">12.500 FCFA</p>
                                <p class="h5 text-light">Repas pour volaille</p>
                                <p class="text-warning">7800 FCFA</p>
                            </div>
                            <div class="div-form my-3 px-3 py-2">
                                <form action="statistique.php" method="post">
                                    <legend class="text-center">Formulaire d'ajout d'un nouveau investissement</legend>
                                    <?php if($success): ?>
                                        <p class="alert alert-success">
                                            <?= $success ?>
                                        </p>
                                    <?php endif ?>
                                    <div class="mt-2">
                                        <label for="titre" class="form-label" style="color: rgb(54, 160, 50);">Titre de l'achat</label>
                                        <input type="text" class="form-control input-form" name="titre" id="titre" required>
                                    </div>
                                    <div class="mt-2">
                                        <label for="prix" class="form-label" style="color: rgb(54, 160, 50);">Prix de l'investissement</label>
                                        <input type="text" class="form-control input-form" name="prix" id="prix" required>
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" value="Ajouter" style="background-color: rgb(54, 160, 50);" class="mt-3 text-light py-0 px-5 btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr size="10px" width="100%">
            <?php require "footer.php" ?>
        </div>
    </section>
</body>
</html>