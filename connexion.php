<?php
    session_start();
    $userId = null;
    $errorConnect = null;

    if(!empty($_POST) && isset($_POST)){ 
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $connect = new PDO('mysql: host=localhost; dbname=bovin_solution', 'root', '');
            $requete = $connect->prepare("SELECT * FROM users");
            $requete->execute();
            $users = $requete->fetchAll();

            foreach ($users as $user) {
                if (
                    $user['mail'] === $_POST['email']
                    && $user['mot_passe'] === sha1($_POST['motDePasse'])
                ) {
                    $_SESSION['nom_prenoms'] = $user['nom_prenoms'];
                    $_SESSION['mail'] = $user['mail'];
                    $_SESSION['ville'] = $user['ville'];
                    $_SESSION['tel'] = $user['tel'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['profession'] = $user['profession'];
                    $_SESSION['profil'] = $user['profil'];
                    header("Location: accueil.php");
                }else{
                    $errorConnect = "Identifiants incorrects !";
                }
            }
        }else{
            $errorConnect = "Votre mail n'est pas valide !";
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&famil
    y=Reem+Kufi+Fun:wght@400..700&display=swap" 
    rel="stylesheet">
    <title>Connexion - WaxangariLabs</title>
</head>
<style>
    *{
    font-size: 15px;
    font-family: "Outfit", sans-serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    }
    .row-form{
        border: 0;
        background-color: rgb(238, 238, 238);
        border-radius: 20px;
        height: 20%;
    }
    .img-form{
        width: 60%;
        height: 60%;
    }
    .but-con{
        padding-left: 100px;
        padding-right: 100px;
    }
</style>
<body>
    <section class="my-5">
        <div class="container">
            <h1 class="text-center">Connexion à <span class="h1" style="color: rgb(84, 247, 78);">BovinSolution</span></h1>
            <form action="connexion.php" method="post">
                <div class="row mt-5">
                    <div class="col-lg-7 col-md-12 col-12">
                            <?php if($errorConnect){ ?>
                                <p class="alert alert-danger mt-5">
                                    <?= $errorConnect ?>
                                </p>
                            <?php } ?>
                            <div class="mb-4">
                                <label class="form-label" for="email"><strong>Email</strong></label>
                                <input class="form-control row-form py-3" type="text" placeholder="Ex : johndoe@gmail.com" name="email" id="email" required>
                            </div>
                            <div class="mt-2 mb-4">
                                <label class="form-label" for="mot_de_passe"><strong>Mot de passe</strong></label>
                                <input class="form-control row-form py-3" type="password" placeholder="Ex : ******" name="motDePasse" id="mot_de_passe" required>
                            </div>
                            <div class="my-2">
                                <input type="checkbox" name="connect" id="connect">
                                <label for="connect">Rester connecté(e)</label>
                            </div>
                            <div>
                                <p>
                                    Vous n'avez pas encore un compte ? <span><a href="inscription.php" class="" style="color: rgb(84, 247, 78); text-decoration: none;">S'inscrire !</a></span>
                                </p>
                                <p>
                                    Vous avez oublié votre mot de passe ? <span><a href="#" class="" style="color: rgb(84, 247, 78); text-decoration: none;">Cliquer ici</a></span>
                                </p>
                            </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="text-center">
                            <img class="img img-form" src="images/bovin_connexion.png" alt="image sur la page d'inscription">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <button class="btn rounded-4 but-con py-3 text-dark " style="background-color: rgb(54, 160, 50); font-size: 20px; font-weight: bold;">Me connecter</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>