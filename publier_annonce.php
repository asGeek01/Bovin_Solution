<?php
    session_start();
    function check( $donnee ){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);
        return $donnee;
    }

    $titre = null;
    $nom_prenoms = null;
    $description = null;
    $image = null;
    $imageErreur = null;
    $userId = null;

    if(!empty($_POST) && isset($_POST)){
        $titre = check($_POST["titre"]);
        $nom_prenoms = check($_POST["nom_prenoms"]);
        $description = check($_POST["description"]);
        $image = check($_FILES["fichier"]["name"]);
        $image_path = 'images/img-pub/' . basename($image);
        $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);
        $upload = false;

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
            $userId = $_SESSION['id'];
    
            if($upload){
                // Insertion dans la base de données seulement si l'upload est réussi
                $connect = new PDO("mysql:host=localhost; dbname=bovin_solution", "root", "");
                $requete = $connect->prepare("
                    INSERT INTO publication_$userId(titre, nom_prenoms, image, description)
                    VALUES('$titre','$nom_prenoms','$image','$description')
                ");
                $requete->execute();
                header("Location: accueil.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&famil
    y=Reem+Kufi+Fun:wght@400..700&display=swap" 
    rel="stylesheet">
    <title>Publier_annonce - WaxangariLabs"</title>
</head>
<style>
    *{
    font-size: 15px;
    font-family: "Outfit", sans-serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    }
    textarea{
        border: none;
        border-radius: 20px;
        background-color: rgb(238, 238, 238);
    }
    .input{
        border: none;
        border-radius: 20px;
        background-color: rgb(238, 238, 238);
        height: 50px;
        
    }
    .but{
        border-radius: 20px;
    }
</style>
<body class="container">
    <!-- 
        l'en-tete de la page
    -->
    <header>
        <?php require_once(__DIR__.'/header.php') ?>
    </header>

    <!-- 
        corps de page
    -->
    <main>
        <form action="publier_annonce.php" method="post" enctype="multipart/form-data">
            <div class="row m-3">
                <div class="col-5 p-1">
                    <img src="images/Image (29).png" alt="Une image de profil" class="img w-100 mb-5">
                    <strong class="">Petite description de la publication</strong>
                    <textarea class="mt-4 p-4" name="description" id="description" cols="40" rows="5" placeholder="Cliquer ici pour décrire" required></textarea>
                </div>
                <div class="col-7 mt-5">
                    <h4 class="text-center">
                        Publiez une annonce sur notre site afin de gagner en visibilité 
                        sur vos services
                    </h4>
                    <h3><legend class="text-center mt-4" style="color: rgb(54, 160, 50);">FORMULAIRE DE PUBLILCATION</legend></h3>
                    <div class="mt-4">
                        <label for="titre_publication" class="form-label">
                            <strong>Titre de la publication</strong>
                        </label>
                        <input type="text" name="titre" class="form-control input py-4" placeholder="Ex: Formation en élévage de poisson" required>
                    </div>
                    <div class="mt-2 mt-4">
                        <label for="titre_publication" class="form-label">
                            <strong>Votre Nom et Prénoms</strong>
                        </label>
                        <input type="text" name="nom_prenoms" class="form-control input py-4" placeholder="Ex: John Doe" required>
                    </div>
                    <div class="row mt-2 mt-4">
                        <div class="col-8"><strong>Importer une photo pour la publication</strong></div>
                        <div class="col-2"><button class="btn py-0 but" style="background-color: rgb(54, 160, 50);" id="import-file">Import</button></div>
                        <input type="file" name="fichier" id="fichier" style="display: none;">
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn text-light px-5 but" style="background-color: black;">Valider la publication</button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <hr>

    <!-- 
        pied de page
    -->
    <header>
        <?php require_once(__DIR__.'/footer.php') ?>
    </header>
</body>
</html>
<script>
    document.getElementById('import-file').addEventListener('click', function() {
        document.getElementById('fichier').click();
    });
</script>