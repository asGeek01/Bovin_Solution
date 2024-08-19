<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grazing Services - WaxangariLabs</title>
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
    .b-s{
        border: 0;
        box-shadow: none;
    }
    .padding-filter{
        margin-bottom: 100px;
    }
    .padding-filter-new{
        margin-bottom: 150px;
    }
    .hide{
        display: none;
    }
    .hide1{
        display: none;
    }
</style>
<body class="container">
    <header>            
        <?php require "header.php"; ?>
    </header>
    <main class="">
        <div class="mx-auto">
        <div class="row my-3 mx-5">
            <div>
                <a href="accueil.php"><i class="fa fa-arrow-left" style="font-size: 35px;"></i></a>
            </div>
            <div class="mx-auto">
                <p class="h4">Search results for "Grazing Services"</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-6 col-12">
                <?php require "aside1.php"; ?>
            </div>
            <div class="col-lg-7 col-md-6 col-12">
                <div class="row">
                    <div class="col-5 row-form mr-4">
                        <p class="container">
                            <img src="images/boeuf.png" alt="" class="img img-service">
                            <h6 class="text-success px-3">Service rating</h6>
                        </p>
                        <div class="row justify-content-between px-4">
                            <div class="">4.5 stars</div>
                            <div class="text-success">Available now</div>
                        </div>
                    </div>
                    <div class="col-5 row-form">
                        <p class="container-fluid">
                            <img src="images/ferme.png" alt="" class="img img-service">
                            <h6 class="text-success px-3">Service rating</h6>
                        </p>
                        <div class="row justify-content-between px-4 pb-2">
                            <div class="">4.5 stars</div>
                            <div class="text-success">20.000 FCFA</div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-5 row-form mr-4">
                        <p class="container">
                            <img src="images/cheval.png" alt="" class="img img-service">
                            <h6 class="text-success px-3">Service rating</h6>
                        </p>
                        <div class="row justify-content-between px-4 pb-2">
                            <div class="">4.5 stars</div>
                            <div class="text-success">Available now</div>
                        </div>
                    </div>
                    <div class="col-5 row-form">
                        <p class="container-fluid">
                            <img src="images/ferme.png" alt="" class="img img-service">
                            <h6 class="text-success px-3">Service rating</h6>
                        </p>
                        <div class="row justify-content-between px-4 pb-2">
                            <div class="">4.5 stars</div>
                            <div class="text-success">20.000 FCFA</div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-5 row-form mr-4">
                        <p class="container">
                            <img src="images/plantes.png" alt="" class="img img-service">
                            <h6 class="text-success px-3">Service rating</h6>
                        </p>
                        <div class="row justify-content-between px-4 pb-2">
                            <div class="">4.5 stars</div>
                            <div class="text-success">Available now</div>
                        </div>
                    </div>
                    <div class="col-5 row-form">
                        <p class="container-fluid">
                            <img src="images/accessoire.png" alt="" class="img img-service">
                            <h6 class="text-success px-3">Service rating</h6>
                        </p>
                        <div class="row justify-content-between px-4 pb-2">
                            <div class="">4.5 stars</div>
                            <div class="text-success">Available now</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </main>
    <footer>
        <?php require "footer.php" ?>
    </footer>
</body>
</html>
<script>
    const before = document.getElementById('text-view');
    const after =  document.getElementById('text-hide');

    before.addEventListener('click', function(){
        if(after.style.display === 'none'){
            after.style.display = 'block';
        }else{
            after.style.display = 'none';
        }
    });

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