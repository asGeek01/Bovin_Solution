<style>
    #ac{
        text-decoration: none;
        color: black;
        padding: 10px;
    }
    .bd{
        border-radius: 10px;
    }
    #profil{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 2px solid #fff;
    }
    #bell{
        text-decoration: none;
        color: black;
    }
    .h-line{
        display: flex;
        justify-content: space-around;
    }
</style>
<!-- <header class="mt-5 ms-2"> -->
    <div class="row h-line d-flex justify-content-between">
        <div class="col-1">
            <a href="accueil.php">
                <img src="images/logo.png" alt="Logo de BovinSolution" class="img">
            </a>
        </div>
        <div class="col-5 my-3 text-end">
            <ul class="list-unstyled">
                <li class="list-inline-item">
                    <a href="accueil.php" id="ac">Accueil</a>
                </li>
                <li class="list-inline-item">
                    <a href="panier.php" id="ac">Achat et livraison</a>
                </li>
                <li class="list-inline-item">
                    <a href="gamme.php" id="ac">Notre annuaire</a>
                </li>
            </ul>
        </div>
        <div class="col-6 my-3">
            <div class="row">
                <div class="col">
                    <a href="accueil.php#location" id="ac">
                        <i class="fa fa-map-marker p-2 bd" style="background-color: rgb(54, 160, 50);"><span class="px-2">Géolocation</span></i>
                    </a>
                </div>
                <div class="col-5">
                    <a href="publier_annonce.php" id="ac">
                        <i class="fa fa-bullhorn p-2 bd" style="background-color: rgb(54, 160, 50);"><span class="px-2">Plublier une annonce</span></i>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="statistique.php" id="bell"><i class="fa fa-bell"></i></a>
                    <?php if(!empty($_SESSION['profil']) && isset($_SESSION['profil'])){ ?>
                        <span class="mx-2">
                            <a href="completer_profil.php" id="bell">
                                <img src="images/img-profil/<?= $_SESSION['profil'] ?>" alt="" class="img" id="profil">
                            </a>
                        </span>
                        <span class="mx-2">
                            <a href="deconnexion.php" id="bell"><i class="fa fa-sign-out" style="font-size: 20px;" title="Deconnecter"></i></a>
                        </span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<!-- </header> -->