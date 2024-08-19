<?php 
    session_start();
    $nom_prenoms = null;
    $mail = null;
    $tel = null;
    $profession = null;
    $id = $_SESSION['id'];
    $errorUpdate = null;
    $image = null;
    $imageErreur = null;
    if(!empty($_POST) && isset($_POST)){
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $nom_prenoms = check($_POST['nom_prenoms']);
            $mail = check($_POST['email']);
            $tel = check($_POST['telephone']);
            $profession = check($_POST['profession']);
            $image = check($_FILES["fichier"]["name"]);
            $image_path = 'images/img-profil/' . basename($image);
            $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);
            $upload = false;

            $connect = new PDO('mysql: host=localhost; dbname=bovin_solution', 'root', '');
            $requete = $connect->prepare("
                                        UPDATE users
                                        SET nom_prenoms = ?,
                                            mail = ?,
                                            tel = ?,
                                            profession = ?
                                        WHERE id = ?;
            ");
            $requete->execute(
                array(
                    $nom_prenoms, $mail, $tel, $profession, $id
                )
            );

            //Gestion de l'image de profil à ajouter par l'utilisateur
            if($image){
                $upload = true;
                $extension = array('jpg', 'png', 'jpeg', 'gif');
                $image_ext = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
        
                if(!in_array($image_ext, $extension)){
                    $imageErreur = "Le fichier doit être sous l'un de ces formats: .jpg, .png, .jpeg, et .gif";
                    $upload = false;
                }
        
                if(file_exists($image_path)){
                    $imageErreur = "Cette image existe déjà !";
                    $upload = false;
                }
        
                if($_FILES["fichier"]["size"] > 500000){
                    $imageErreur = "Le fichier ne doit pas dépasser 500kb";
                    $upload = false;
                }
        
                $special_char = array("'", "/", "\\", ":", "<", ">");
                if(preg_match('/[\'\/\\\\:<>\"]/', $image)){
                    $imageErreur = "Le nom du fichier ne doit pas contenir ces caractères: /, \\, :, < et >";
                    $upload = false;
                }
        
                if($upload){
                    if(!move_uploaded_file($_FILES["fichier"]["tmp_name"], $image_path)){
                        $imageErreur = "Erreur lors du chargement du fichier";
                        $upload = false;
                    }
                }
        
                if($upload){
                    // Insertion dans la base de données seulement si l'upload est réussi
                    $connect = new PDO("mysql:host=localhost; dbname=bovin_solution", "root", "");
                    $requete1 = $connect->prepare("
                            UPDATE users
                            SET profil = '$image'
                            WHERE id = '$id';
                    ");
                    $requete1->execute();
                    header("Location: completer_profil.php");
                }
            }
            header('Location: completer_profil.php');

            $connexion = new PDO("mysql: host=localhost; dbname=bovin_solution", "root", "");
            $requete0 = $connexion->prepare("SELECT * FROM users WHERE id = $id;");
            $requete0->execute();
            $row = $requete0->fetch();
            $_SESSION['profil'] = $row['profil'];
            $_SESSION['profession'] = $row['profession'];
        }else{
            $errorUpdate = "Votre mail n'est pas valide !";
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <title>Complétez Profil - WaxangariLabs</title>
</head>
<style>
    .section{
        height: 100%vh;
        background-color: #3498db;
        color: white;
        border-radius: 20px;
    }
    .profil{
        margin: 12px;
    }
    .ctn{
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 2px solid #fff;
    }
    .rad{
        border-radius: 10px;
    }
    .row-form{
        border: 0;
        background-color: rgb(238, 238, 238);
        border-radius: 20px;
        height: 20%;
    }
    p{
        color: white;
    }
</style>
<body>
    <section>
        <div class="container b">
            <form action="completer_profil.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col my-5">
                        <div class="row">
                            <div class="mx-5 mt-1">
                                <a href="accueil.php"><i class="fa fa-arrow-left text-dark" style="font-size: 20px;"></i></a>
                            </div>
                            <div>
                                <h1 class="text-center" style='color: rgb(84, 247, 78);'>Complétez votre profil</h1>
                            </div>
                        </div>
                        
                            <div class="my-3">
                                <label class="form-label" for="nom_prenoms">
                                    <i class="fa fa-arrow-right rad text-light p-1" style="background-color: rgb(84, 247, 78);"></i>
                                    <strong>Modifier votre nom et prénoms</strong>
                                </label>
                                <input class="form-control row-form py-3 mx-3" type="text" value="<?= $_SESSION['nom_prenoms'] ?>" name="nom_prenoms" id="nom_prenoms" required>
                            </div>
                            <div class="my-3">
                                <label class="form-label" for="nom_prenoms">
                                    <i class="fa fa-arrow-right rad text-light p-1" style="background-color: rgb(84, 247, 78);"></i>
                                    <strong>Modifier votre email</strong>
                                </label>
                                <input class="form-control row-form py-3 mx-3" type="email" value="<?= $_SESSION['mail'] ?>" name="email" id="email" required>
                            </div>
                            <?php if($errorUpdate): ?>
                                <p class="text-danger">
                                    <?= $errorUpdate ?>
                                </p>
                            <?php endif ?>
                            <div class="my-3">
                                <label class="form-label" for="nom_prenoms">
                                    <i class="fa fa-arrow-right rad text-light p-1" style="background-color: rgb(84, 247, 78);"></i>
                                    <strong>Numéro de Téléphone</strong>
                                </label>
                                <input class="form-control row-form py-3 mx-3" type="text" value="<?= $_SESSION['tel'] ?>" name="telephone" id="telephone" required>
                            </div>
                            <div class="my-3">
                                <label class="form-label" for="nom_prenoms">
                                    <i class="fa fa-arrow-right rad text-light p-1" style="background-color: rgb(84, 247, 78);"></i>
                                    <strong>Quelle est votre profession ?</strong>
                                </label>
                                <input class="form-control row-form py-3 mx-3" type="text" value="<?php if(empty($_SESSION['profession'])){ ?> Elevatrice des boeufs <?php }else{
                                    echo $_SESSION['profession']; }?>" name="profession" id="profession" required>
                            </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-12 bg-secondary section mx-5">
                        <div class="text-center">
                            <?php if(!empty($_SESSION['profil']) && isset($_SESSION['profil'])){ ?>
                                <img src="images/img-profil/<?= $_SESSION['profil'] ?>" alt="" class="img ctn my-5">
                                <input type="file" name="fichier" id="fichier" style="display: none;">
                                <span class="m-1" id="add-profile">
                                    <a href="#"><i class="fa fa-pencil" style="font-size: 20px;"></i></a>
                                </span>
                            <?php }else{ ?>
                                <span class="mx-2">
                                    <i class="fa fa-user ctn bg-light text-dark my-3 p-3" style="font-size: 150px;"></i>
                                </span>
                                <input type="file" name="fichier" id="fichier" style="display: none;">
                                <span class="" id="add-profile">
                                    <a href="#"><i class="fa fa-pencil" style="font-size: 20px;"></i></a>
                                </span>
                            <?php } ?>
                            <?php if($imageErreur): ?>
                                <p class="text-danger">
                                    <?= $imageErreur ?>
                                </p>
                            <?php endif ?>
                            <p><?= $_SESSION['nom_prenoms'] ?></p>
                        </div>
                        <div class="mx-3">
                            <p>
                                <?= $_SESSION['ville'] ?>
                            </p>
                            <p>
                                <?= $_SESSION['mail'] ?>
                            </p>
                            <p>
                                <?= $_SESSION['tel'] ?>
                            </p>
                            <p>
                                <?= $_SESSION['profession'] ?>
                            </p>
                        </div>
                        <div class="text-center">
                            <button class="btn text-dark" style="background-color: rgb(84, 247, 78);">Modifier Informations</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
<script>
    document.getElementById('add-profile').addEventListener('click', function() {
        document.getElementById('fichier').click();
    });
</script>