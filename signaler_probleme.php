<?php
    session_start();
    $nomPrenoms = null;
    $email = null;
    $message = null;
    $successError = null;
    if(!empty($_POST) && isset($_POST)){
        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $nomPrenoms = check($_POST['nom_prenoms']);
            $email = check($_POST['email']);
            $message = check($_POST['message']);

            $connect = new PDO('mysql: host=localhost; dbname=bovin_solution', 'root',"");
            $requete = $connect->prepare("
                INSERT INTO signalement(nom_prenoms, mail, message)
                VALUES(?, ?, ?);
            ");
            $requete->execute(array($nomPrenoms, $email, $message));                
            $successError = "Signalement enregistré !";
        }else{
            $successError = "Votre mail n'est pas valide !";
        }
        
    }
    function check($donnee){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);
        return $donnee;
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signaler_Problème - WaxangariLabs</title>
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
    .input_edit{
        border: none;
        height: 50px;
        padding-left: 20px;
        border-radius: 20px;
        background-color: rgb(200,200,200);
    }
</style>
<body class="container">
    <!-- 
        l'en tete de la page
    -->
    <header>
        <?php require_once(__DIR__.'/header.php') ?>
    </header>
    
    <!-- 
        le corps de la page
    -->
    <main class="mt-4">
        <h3 class="text-center">Signaler un problème ou faire une plainte</h3>
        <section class="row mt-4">
            <div class="col-6">
                <img src="images/Image (30).png" alt="Image d'amplificateur sonore" class="img w-100">
            </div>
            <div class="col-6">
                <form action="#" method="post">
                    <legend><h3 class="text-success text-center"><strong>Contactez-nous</strong></h3></legend>
                    <div class="m-4">
                        <?php if($successError): ?>
                            <p class="alert alert-success">
                                <?= $successError ?>
                            </p>
                        <?php endif ?>
                        <label for="nom_prenoms" class="form-label mx-4"><strong>Votre Nom et Prénoms</strong></label>
                        <input type="text" class="form-control input_edit text-dark" name="nom_prenoms" id="nom_prenoms" value="Ex : Ange TOGNON" required>
                    </div>
                    <div class="m-4">
                        <label for="email" class="form-label mx-4"><strong>Email</strong></label>
                        <input type="text" class="form-control input_edit text-dark" name="email" id="email" value="angetognon@gmail.com" required>
                    </div>
                    <div class="m-4">
                        <label for="message" class="form-label"><strong>Message</strong></label>
                        <textarea class="form-control input_edit p-3 text-dark" name="message" id="message" cols="30" rows="3" placeholder="Cliquer ici pour entrer votre message de plainte" required></textarea>
                    </div>
                    <div class="text-center col-11">
                        <button class="btn btn-success m-4 form-control p-2">Envoyer</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>