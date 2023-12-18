<?php
include "./public/headers.php";
?>
<!--Page de renvoie une fois la commande effectuée-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'Achat</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .confirmation-container {
            text-align: center;
            margin-top: 50px;
        }

        .btn-home {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container confirmation-container">
    <h1 class="display-4"><i class="bi bi-handbag-fill"></i></h1>
    <h1 class="display-4">Votre achat a été effectué avec succès! <i class="bi bi-hand-thumbs-up-fill"></i> </h1>
    <p class="lead">Merci pour votre achat. Nous vous souhaitons une excellente expérience de magasinage.</p>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg btn-home" href="home.php" role="button">Retour à l'accueil</a>
</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
