<?php 
    session_start(); 
    if(!empty($_POST) && isset($_POST)){
        if($_POST['search'] == "Grazing Services"){
            header('Location: services.php');
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - WaxangariLabs</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    body{
        font-size: 18px;
    }
    .bg{
        background-image: url("images/after-header.png");
        background-size: 100%;
        background-repeat: no-repeat;
    }
    .sh{
        background-color: rgb(238, 238, 238);
        border-radius: 50px;
        padding: 15px;
    }
    #search1{
        border: 0;
        margin-top: -40px;
        padding: 20px;
        background-color: rgb(238, 238, 238);
        border-radius: 100px;
    }
    #search{
        border: 0;
        background-color: transparent;
    }
    #img-footer{
        border-radius: 10px;
    }
    .h-line{
        display: flex;
        justify-content: space-around;
    }
</style>
<body class="container">
    <header>
        <?php require_once(__DIR__.'/header.php') ?>
    </header>
    <main>
        <div class="row bg mt-3">
            <div class="col-lg-4 col-8 col-md-4 p-lg-5 p-md-5 p-5 mb-5 mb-lg-5 mb-md-5">
                <strong><h3 class="mb-lg-2 mb-md-2" style="color: rgb(54, 160, 50);">BovinSolution</h3></strong>
                <p class="text-light mb-lg-5 mb-0 mb-md-5">
                    Nous vous facilitons l'accès aux ressources et
                    informations concernant l'élevage au Bénin
                </p>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-10 mx-auto text-center mb-5">
            <form action="accueil.php" method="post">
                <div class="row justify-content-between space-search" id="search1">
                    <div class="col-10 col-lg-8 col-md-6 text-center">
                        <input class="form-control mx-5" size="" type="text" name="search" id="search" placeholder="Rechercher Des Animaliers Peulhs Disponibles">
                    </div>
                    <div class="col-2">
                        <i class="fa fa-search text-success" style="font-size: 30px;"></i>
                    </div>
                </div>
            </form>
        </div>
        <div class="row h-line" style="color: rgb(54, 160, 50);">
            <h6 class="col-10 h3">Catégories-Achat</h6>
            <h6 class="col-2 h3 text-end">Voir tout</h6>
        </div>
        <div class="row">
            <?php
                $connect = new PDO('mysql: host=localhost; dbname=bovin_solution', 'root', '');
                $requete = $connect->prepare("SELECT * FROM nos_produits;");
                $requete->execute();
                
                while($row = $requete->fetch()){
                    echo    '<div class="mx-5 p-0 col-lg-2 col-md-4 col-12 my-2" style="border: 1px solid gray; border-radius: 15px;">
                                <form action="panier.php?id=' .$row['id']. '" method="post">
                                    <p class="text-center">
                                        <img src="images/' .$row['image']. '" style="width: 150px; height: 150px;" alt="Une image de lait de vache" id="img-ac" class="img w-100">
                                    </p>
                                    <h4 class="text-center">' .$row['nom_produit']. '</h4>
                                    <p class="text-center">
                                        <button name="but" class="btn px-3 py-0 " style="background-color: rgb(54, 160, 50);">Ajouter au panier</button>
                                    </p>
                                </form>
                            </div>';
                }
            ?>
        </div>
        <div class="row bg-secondary m-2 text-center">
            <h4 class="text-light p-2" id="location">Annuaire géolocalisé des marchés du bétails</h4>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-6 col-md-12 col-12 text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125977.52701863702!2d2.527193495
                    4203368!3d9.351160549754804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10320550a556d695
                    %3A0x706d4b90bc86232d!2sParakou!5e0!3m2!1sfr!2sbj!4v1708417046394!5m2!1sfr!2sbj" width="80%" 
                    height="250px" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="col-lg-6 col-md-12 col-12 mx-md-5 mx-lg-0 mx-auto my-3 text-center text-lg-start text-md-start">
                <div class="mx-5 my-2">
                    <h4><strong>Annotation</strong></h4>
                </div>
                <div class="mx-2 my-3">
                    <span>
                        <i class="fa fa-map-marker text-warning" style="font-size: 20px;">:<span class="px-2 text-dark">Points de Ventes de boeufs</span></i>
                    </span>
                </div>
                <div class="mx-2 my-3">
                    <span>
                        <i class="fa fa-map-marker text-primary" style="font-size: 20px;">:<span class="px-2 text-dark">Points de Ventes d'oeufs</span></i>
                    </span>
                </div>
                <div class="mx-2 my-3">
                    <span>
                        <i class="fa fa-map-marker text-danger" style="font-size: 20px;">:<span class="px-2 text-dark">Points de Ventes de poisson</span></i>
                    </span>
                </div>
                <div class="mx-2">
                    <button class="btn btn-secondary py-0 px-3">En savoir plus sur le marché du bétail</button>
                </div>
            </div>
        </div>
        <div class="row px-2" style="background-color: rgb(54, 160, 50);">
            <div class="mx-auto my-3">
                <strong class="text-light"><h2>Annonce</h2></strong>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="container bg-light" id="img-footer">
                        <p>
                            <img src="images/vache.png" alt="L'élevage de boeufs" class="img container">
                        </p>
                        <h5>Formation en élevage de boeufs</h5>
                        <p>
                            In this article we will provide advice on cattle
                            grazing for healthy cattle 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="container bg-light" id="img-footer">
                        <p>
                            <img src="images/p_poisson.png" alt="L'élevage de poisson" class="img container">
                        </p>
                        <h5>Formation en élevage de poisson</h5>
                        <p>
                            In this article we will provide advice on cattle
                            grazing for healthy cattle 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="container bg-light" id="img-footer">
                        <p>
                            <img src="images/poules.png" alt="L'élevage de poules" class="img container">
                        </p>
                        <h5>Formation en élevage de poules</h5>
                        <p>
                            In this article we will provide advice on cattle
                            grazing for healthy cattle 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php require "footer.php"; ?>
    </footer>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
