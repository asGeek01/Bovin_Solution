<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="https://cdn.kkiapay.me/k.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="test.php" method='post' class="formulaire">
                <div class="my-2">
                    <label for="montant" class="form-label">Ajoutez le montant</label>
                    <input type="number" class="form-control" min="0" name="montant" id="montant" required>
                </div>
                <div>
                    <button class="btn btn-primary">Payer maintenant !</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script src="main.js"></script>