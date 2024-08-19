<?php
    session_start();
    function case_alimaux($title_image, $alt, $description){
        echo '<div class="col-3 case_border shadow m-4 py-3 text-center">
                <img src="'.$title_image.'" alt="'.$alt.'" class="img w-100">
                <p class="text-center">'.$description.'</p>
                <button class="btn rounded-5 px-3" style="background-color: rgb(54, 160, 50);">Acheter</button>
            </div>
        ';

    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gammes - WaxangariLabs</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gamme.css">
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
    .case_border{
        border: 1px solid black;
        border-radius: 20px;
    }
    .decouvrir_gamme{
        background-color: rgb(238,238,238);
        border-radius: 10px;
        padding:10px;
    }
</style>
<body class="container">
    <!-- 
        l'en-tete de la page
    -->
    <header>
        <?php require_once(__DIR__.'/header.php') ?>
    </header>

    <main>
        <section class="my-4">
            <img src="images/Image (23).png" alt="Image de semance de graine" class="img col-12">
        </section>

        <section class="my-4">
            <div class="row">
                <div class="col-2">
                    <aside>
                        <?php require_once(__DIR__.'/aside.php')?>
                    </aside>
                </div>
                <div class="col-10 ">
                    <div class="row">
                        <div class="col-3">
                            <button class="btn rounded-5 text-light px-5" style="background-color: rgb(54, 160, 50);">Beef Cattle</button>
                        </div>
                        <div class="col-3">
                            <button class="btn rounded-5 text-light px-5" style="background-color: rgb(54, 160, 50);">Dairy Cattle</button>
                        </div>
                        <div class="col-3">
                            <button class="btn rounded-5 text-light px-5" style="background-color: rgb(54, 160, 50);">Cattle Feed</button>
                        </div>
                        <div class="col-3">
                            <button class="btn rounded-5 text-light px-3" style="background-color: rgb(54, 160, 50);">Livestock Supplements</button>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <?php case_alimaux("images/Image (24).png", "Aliments de bovins","Aliments de bovins");?>
                        <?php case_alimaux("images/Image (25).png", "Service de paturage","Service de paturage");?>
                        <?php case_alimaux("images/Image (26).png", "Gardien peuhl","Gardien peuhl");?>
                    </div>
                    <div class="row mx-auto">
                        <?php case_alimaux("images/Image (27).png", "Produits d'élevage","Produits d'élevage");?>
                        <?php case_alimaux("images/Image (27).png", "Produits Bios","Produits Bios");?>
                        <?php case_alimaux("images/Image (27).png", "Équipement d'élevage","Équipement d'élevage");?>
                    </div>
                </div>
            </div>
        </section>

        <section class=" decouvrir_gamme my-3 rounded-2">
            <div class="row">
                <div class="col-7 p-5">
                    <h1 class="" style="color: rgb(54, 160, 50);">Découvrez notre gamme</h1>
                    <p class="my-3 col-11">
                        Explore the world of cattle farming with our diverse
                        selection of products and service. From grazing
                        essentials to health care, find everything you need for
                        your cattle business. Ethically sourced and quality
                        guaranteed.
                    </p>
                </div>
                <div class="col-5">
                    <img src="images/Image (22).png" alt="Image d'un agriculteur" class="img w-100 px-5">
                </div>
            </div>
        </section>
    </main>

    <!-- 
        pied de page
    -->
    <header>
        <?php require_once(__DIR__.'/footer.php') ?>
    </header>
</body>
</html>
<script>
    const before1 = document.getElementById('view1');
    const after1 =  document.getElementById('hide1');

    before1.addEventListener('click', function(){
        if(after1.style.display === 'none'){
            after1.style.display = 'block';
        }else{
            after1.style.display = 'none';
        }
    });
</script>
<script src="js/bootstrap.min.js"></script>